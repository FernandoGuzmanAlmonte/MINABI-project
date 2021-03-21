@extends('layouts.tablaIndex')

@section('title', 'Empleados')

@section('imgUrl',  asset('images/empleado.svg'))

@section('namePage', 'Empleados')

@section('route', route('employee.create'))

@section('filtrado')
    <form action="{{ route('employee.index') }}" method="GET" class="row g-3" id="formOrder">
        <div class="col-lg-5">
            <h6 class="textoConLinea"><span>Ordenar</span></h6>
            <div class="row">
                <div class="col-lg-7 d-flex align-items-center">
                    <div class="select">
                        <select class="form-control" name="orderBy" onchange="actualizarTabla()">
                            <option value="id" {{ ($orderBy == 'id') ? 'selected' : '' }}>Ordenar por Identificador</option>
                            <option value="nombre" {{ ($orderBy == 'nombre') ? 'selected' : '' }}>Ordenar por Nombre</option>
                            <option value="telefono" {{ ($orderBy == 'telefono') ? 'selected' : '' }}>Ordenar por Teléfono</option>
                            <option value="status" {{ ($orderBy == 'status') ? 'selected' : '' }}>Ordenar por Status</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-2 d-flex align-items-center">
                            <div class="mt-1 mb-0 form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="order" id="radioAsc" value="ASC" onclick="cambioOrdenAscendente()">
                            </div>
                        </div>
                        <div class="col-lg-10 d-flex align-items-center">
                            <h5 class="mt-1 mb-0">
                                <span class="badge badge-pill badge-light pr-4" id="badgeAsc" style="color:#343A40; font-weight:normal; width: 95%;">
                                    <img src={{ asset('images/ascendente-black.svg') }}  class="iconosFiltrado" id="imgAsc">
                                    Ascendente
                                </span>
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 d-flex align-items-center">
                            <div class="mt-4 mb-0 form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="order" id="radioDesc" value="DESC" onclick="cambioOrdenDescendente()">
                            </div>
                        </div>
                        <div class="col-lg-10 d-flex align-items-center">
                            <h5 class="mt-4 mb-0">
                                <span class="badge badge-pill badge-light pr-4" id="badgeDesc" style="color:#343A40; font-weight:normal; width: 95%;">
                                    <img src={{ asset('images/descendente-black.svg') }}  class="iconosFiltrado" id="imgDesc">
                                    Descendente
                                </span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="textoConLinea mt-3"><span>Filtrar</span></h6>
            <div class="row">
                <div class="col-lg-6">
                    <div class="row ">
                        <div class="col-lg-12 mb-1 mt-1">
                            <div class="form-check float-right">
                                <input class="form-check-input" type="checkbox" onchange="cambiarStatus(this)" {{ ($status) ? 'checked' : '' }}>
                                <label class="form-check-label float-right text-muted mr-3" for="flexCheckDefault" id="labelStatus">
                                  Status
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <select class="form-control text-muted" name="status" id="checkStatus" onchange="actualizarTabla()" {{ ($status) ? '' : 'disabled' }}>
                                <option value="">--todos--</option>
                                @foreach($allStatus as $s)  
                                    <option {{ ($status == $s->status) ? 'selected' : ''}} value="{{$s->status}}">{{$s->status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <div class="col-lg-7 d-flex align-items-center">
            <div class="col-lg-10 pr-0 pl-5">
                <input class="form-control" style="width: 100%" type="search" placeholder="Nombre..." name="nombre" value="{{ ($nombre != '') ? $nombre : '' }}">
            </div>
            <div class="col-lg-2 pl-0 pr-0">
                <button class="form-control btn btn-secondary pl-2" style="width: 100%" type="submit">
                    <img src={{ asset('images/buscar.svg') }}  class="iconosPequeños float-left">
                    Buscar
                </button>
            </div>   
        </div>
    </form>
@endsection

@section('table')
<tr>
    <th scope="col"> # </th>
    <th scope="col"> Nombre </th>
    <th scope="col"> Teléfono </th>
    <th scope="col"> Status </th>
    <th scope="col"> <span class="sr-only"> (botonConsultar) </span> </th>
</tr>
</thead>
<tbody id="tableBody">
    @foreach ($employees as $employee)
    <tr>
        <th scope="row" class="align-middle"> {{ $employee->id }} </th>
        <td class="align-middle"> {{ $employee->nombre }} </td>
        <td class="align-middle"> {{ $employee->telefono }} </td>
        <td class="align-middle"> 
            <label class="btn btn-outline-{{ ($employee->status == 'ACTIVO') ? 'success' : 'danger' }} m-0">
                {{$employee->status}}
            </label>
        </td>
        <td><a href="{{ route('employee.show', $employee) }}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    </tr>
    @endforeach
@endsection

@section('paginacion')
    {{$employees->render()}}
@endsection

@section('scripts')
<script type="text/javascript">
    function cambioOrdenAscendente()
    {
        ascendente();
        actualizarTabla();
    }

    function cambioOrdenDescendente()
    {
        descendente();
        actualizarTabla();
    }

    function actualizarTabla()
    {
        var form = $("#formOrder");
        var formData = form.serialize(); //variable con el valor de todos los input del formulario

        $.ajax({
            url: "{{ route('employee.index') }}",
            type: 'GET',
            data: formData,
            success: function(response)
                     {
                        var table = document.getElementById('tableBody');
                        var newTable = $(response).find('tbody');
                        $(table).html(newTable.html());
                     },
            error: function(response)
                   {
                        alert(response);
                   }
        });
    }
    
    function ascendente()
    {
        $('#badgeAsc').attr('class', 'badge badge-pill badge-info pr-4');
        $('#badgeAsc').attr('style', 'color:white; font-weight:normal; width: 95%;');
        $('#imgAsc').attr('src', "{{ asset('images/ascendente-white.svg') }}");
        $('#radioAsc').prop('checked', true);
        
        $('#badgeDesc').attr('class', 'badge badge-pill badge-light pr-4');
        $('#badgeDesc').attr('style', 'color:black; font-weight:normal; width: 95%;');
        $('#imgDesc').attr('src', "{{ asset('images/descendente-black.svg') }}");
        $('#radioDesc').prop('checked', false);
    }

    function descendente()
    {
        $('#badgeAsc').attr('class', 'badge badge-pill badge-light pr-4');
        $('#badgeAsc').attr('style', 'color:black; font-weight:normal; width: 95%;');
        $('#imgAsc').attr('src', "{{ asset('images/ascendente-black.svg') }}");
        $('#radioAsc').prop('checked', false);

        $('#badgeDesc').attr('class', 'badge badge-pill badge-info pr-4');
        $('#badgeDesc').attr('style', 'color:white; font-weight:normal; width: 95%;');
        $('#imgDesc').attr('src', "{{ asset('images/descendente-white.svg') }}");
        $('#radioDesc').prop('checked', true);
    }

    function cambiarStatus(checkbox)
    {
        if(checkbox.checked)
        {
            $('#labelStatus').attr('class', 'form-check-label float-right mr-3');

            $('#checkStatus').attr('class', 'form-control');
            $('#checkStatus').prop('disabled', false);
        }
        else
        {
            $('#labelStatus').attr('class', 'form-check-label float-right text-muted mr-3');

            var selectStatus = $('#checkStatus');
            selectStatus.attr('class', 'form-control text-muted');
            selectStatus.prop('disabled', true);
            selectStatus[0].selectedIndex = 0;
        }

        actualizarTabla();
    }

    function inicializador(){
        if('{{$order}}' == 'ASC')
            ascendente();
        else
            descendente();
    }
    
    window.onload = inicializador;
</script>
@endsection