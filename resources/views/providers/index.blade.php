@extends('layouts.tablaIndex')

@section('title', 'Proveedores')

@section('imgUrl',  asset('images/proveedor.svg'))

@section('namePage', 'Proveedores')

@section('route', route('provider.create'))

@section('filtrado')
    <form action="{{ route('provider.index') }}" method="GET" class="row g-3" id="formOrder">
        <div class="col-lg-5">
            <h6 class="textoConLinea"><span>Ordenar</span></h6>
            <div class="row">
                <div class="col-lg-7 d-flex align-items-center">
                    <div class="select">
                        <select class="form-control" name="orderBy" onchange="cambioOrden()">
                            <option value="id" {{ ($orderBy == 'id') ? 'selected' : '' }}>Ordenar por Identificador</option>
                            <option value="nombreEmpresa" {{ ($orderBy == 'nombreEmpresa') ? 'selected' : '' }}>Ordenar por Nombre Empresa</option>
                            <option value="telefono" {{ ($orderBy == 'telefono') ? 'selected' : '' }}>Ordenar por Teléfono</option>
                            <option value="direccion" {{ ($orderBy == 'direccion') ? 'selected' : '' }}>Ordenar por Dirección</option>
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
        </div>        
        <div class="col-lg-7 d-flex align-items-center">
            <div class="col-lg-10 pr-0 pl-5">
                <input class="form-control" style="width: 100%" type="search" placeholder="Nombre Empresa..." name="nombreEmpresa" value="{{ ($nombreEmpresa != '') ? $nombreEmpresa : '' }}">
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
    <th scope="col"> Nombre Empresa </th>
    <th scope="col"> Teléfono </th>
    <th scope="col"> Dirección </th>
    <th scope="col"> <span class="sr-only"> (botonConsultar) </span> </th>
</tr>
</thead>
<tbody id="tableBody">
    @foreach ($providers as $provider)
    <tr>
        <th scope="row" class="align-middle"> {{ $provider->id }} </th>
        <td class="align-middle"> {{ $provider->nombreEmpresa }} </td>
        <td class="align-middle"> 
            {{-- Si proveedor tiene algun contacto, se imprime el telefono del pimero de ellos.
                 Si no tiene un contacto se imprime '-' --}}
            {{ $provider->telefono ?? '-' }} 
        </td>
        <td class="align-middle"> {{ $provider->direccion }} </td>
        <td><a href="{{ route('provider.show', $provider) }}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    </tr>
    @endforeach
@endsection

@section('paginacion')
    {{$providers->render()}}
@endsection

@section('scripts')
<script type="text/javascript">
    function cambioOrdenAscendente()
    {
        ascendente();
        cambioOrden();
    }

    function cambioOrdenDescendente()
    {
        descendente();
        cambioOrden();
    }

    function cambioOrden()
    {
        var form = $("#formOrder");
        var formData = form.serialize(); //variable con el valor de todos los input del formulario

        $.ajax({
            url: "{{ route('provider.index') }}",
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

    function inicializador(){
        if('{{$order}}' == 'ASC')
            ascendente();
        else
            descendente();
    }
    
    window.onload = inicializador;
</script>
@endsection