@extends('layouts.tablaIndexSinAgregar')

@section('title', 'Reporte Producción')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Reporte Producción')

@section('filtrado')
    {{--<form action="{{ route('coil.produccion') }}" method="GET" class="row g-3" id="formOrder">
        <div class="col-lg-5 mt-4">
                <h6 class="textoConLinea"><span>Ordenar</span></h6>
                <div class="row">
                    <div class="col-lg-7 d-flex align-items-center">
                        <div class="select">
                            <select class="form-control" name="orderBy" onchange="actualizarTabla()">
                                <option value="nomenclatura"{{ ($orderBy == 'nomenclatura') ? 'selected' : '' }}>Ordenar por Bobina</option>
                                <option value="fArribo" {{ ($orderBy == 'fArribo') ? 'selected' : '' }}>Ordenar por Fecha Adquisicion Bobina</option>
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
        
        <div class="col-lg-9 d-flex">
            <h6 class="textoConLinea mt-3"><span>Filtrar</span></h6>                 
        </div>
        <div class="col-lg-12 d-flex">
            <div class="col-lg-3 pl-0 pr-0">
                <div class="row">
                    <div class="col-lg-9 mb-1 mt-1">
                        <div class="form-check float-right">
                            <input class="form-check-input" type="checkbox" onchange="cambiarFecha(this)">
                            <label class="form-check-label float-right text-muted" for="flexCheckDefault" id="labelFecha">
                                Fecha Adquisición Bobina
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1 d-flex align-items-center">
                        <img src="{{ asset('images/fecha-disabled.svg') }}" class="iconosPequeños" id="icoFecha">
                    </div> 
                    <div class="col-lg-9">
                        <input class="form-control" type="text" name="fecha" id="daterange" value="" disabled> 
                    </div> 
                </div>
            </div>
            <div class="col-lg-3 pl-0 pr-0">
                <div class="row">
                    <div class="col-lg-9 mb-1 mt-1">
                        <div class="form-check float-right">
                            <input class="form-check-input" type="checkbox" onchange="cambiarFechaRollo(this)"> 
                            <label class="form-check-label float-right text-muted" for="flexCheckDefault" id="labelFecha2">
                                Fecha Adquisición Rollos
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1 d-flex align-items-center">
                        <img src="{{ asset('images/fecha-disabled.svg') }}" class="iconosPequeños" id="icoFecha2">
                    </div> 
                    <div class="col-lg-9">
                        <input class="form-control" type="text" name="fAdquisicionRollo" id="daterange2" value="" disabled> 
                    </div> 
                </div>
            </div>
            <div class="col-lg-3 pl-0 pr-0">
                <div class="row">
                    <div class="col-lg-9 mb-1 mt-1">
                        <div class="form-check float-right">
                            <input class="form-check-input" type="checkbox" onchange="cambiarFechaProductosRollo(this)"> 
                            <label class="form-check-label float-right text-muted" for="flexCheckDefault" id="labelFecha3">
                                Fecha Adquisición Bolsas
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1 d-flex align-items-center">
                        <img src="{{ asset('images/fecha-disabled.svg') }}" class="iconosPequeños" id="icoFecha3">
                    </div> 
                    <div class="col-lg-9">
                        <input class="form-control" type="text" name="fAdquisicionBolsa" id="daterange3" value="" disabled> 
                    </div> 
                </div>
            </div>
        </div>
        
    </form>
    <div class="mt-3">
        <button class="btn mx-2" onclick="descargarPdf()"><img src="{{asset('images/pdf.svg')}}" class="iconoTitle"></button>
        <button class="btn mx-2" onclick="exportTableToExcel('tabla')"><img src="{{asset('images/excel.svg')}}" class="iconoTitle"></button>        
    </div>
    @endsection--}}

@section('table')
    <table class="table table-striped my-4" id="tabla">
        <thead class="bg-info">
            <tr>
                <th scope="col">#</th>
                <th>Tipo</th>
                <th>Nomenclatura</th>
                <th>Fecha Alta</th>
                <th>Peso</th>
                <th>Fecha eliminación</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach($destroys as $destroy)
            <tr>
                <td>{{$destroy->id}}</td>
                <td>@switch($destroy->type)
                    @case('App\Models\Coil')
                        Bobina                        
                        @break
                    @case('App\Models\Ribbon')
                        Rollo
                        @break    
                    @case('App\Models\Bag')
                        Bolsa
                        @break
                    @case('App\Models\CoilReel')
                        Hueso de bobina
                        @break
                    @case('App\Models\RibbonReel')
                        Hueso de rollo
                        @break
                    @case('App\Models\WasteBag')
                        Merma de rollo
                        @break
                    @case('App\Models\WasteRibbon')
                        Merma de bobina
                        @break
                    @case('App\Models\WhiteCoil')
                        Bobina de cenefa
                        @break
                    @case('App\Models\WhiteRibbon')
                        Rollo de cenefa
                        @break
                    @case('App\Models\WhiteRibbonReel')
                        Hueso de rollo de cenefa
                        @break
                     @case('App\Models\WhiteWaste')
                        Merma de bobina de cenefa
                        @break
                    @case('App\Models\WhiteWasteRibbon')
                        Merma de rollo de cenefa
                        @break
                @endswitch</td>
                <td>{{$destroy->nomenclatura}}</td>
                <td>{{$destroy->fArribo}}</td>
                <td>{{$destroy->peso}}</td>
                <td>{{$destroy->created_at}}</td>
            </tr>
            @endforeach
            </tbody>
    </table>
@endsection
{{--
@section('scripts')
<script type="text/javascript">

    $('#daterange').on('apply.daterangepicker', function(ev, picker) {
        actualizarTabla();
    });
    $('#daterange').daterangepicker(
        {
            "locale": 
            {
                "format": "YYYY-MM-DD",
                "separator": " - ",
                "applyLabel": "Filtrar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Personalizar",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Setiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            },
            "opens": "center"
        }
    ); // cargamos el datarange

    $('#daterange2').on('apply.daterangepicker', function(ev, picker) {
        actualizarTabla();
    });
    $('#daterange2').daterangepicker(
        {
            "locale": 
            {
                "format": "YYYY-MM-DD",
                "separator": " - ",
                "applyLabel": "Filtrar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Personalizar",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Setiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            },
            "opens": "center"
        }
    ); // cargamos el datarange

    $('#daterange3').on('apply.daterangepicker', function(ev, picker) {
        actualizarTabla();
    });
    $('#daterange3').daterangepicker(
        {
            "locale": 
            {
                "format": "YYYY-MM-DD",
                "separator": " - ",
                "applyLabel": "Filtrar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Personalizar",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Setiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            },
            "opens": "center"
        }
    ); // cargamos el datarange
    
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
            url: "{{ route('coil.produccion') }}",
            type: 'GET',
            data: formData,
            success: function(response)
                     {
                        console.log(response);
                        var table = document.getElementById('tableBody');
                        var newTable = $(response).find('tbody');
                        $(table).html(newTable.html());
                     },
            error: function(response)
                   {
                        console.log(response);
                        alert(response);
                   }
        });
    }

    function actualizarTabla()
    {
        var form = $("#formOrder");
        var formData = form.serialize(); //variable con el valor de todos los input del formulario
        
        $.ajax({
            url: "{{ route('coil.produccion') }}",
            type: 'GET',
            data: formData,
            success: function(response)
                     {
                        console.log(response);
                        var table = document.getElementById('tableBody');
                        var newTable = $(response).find('tbody');
                        $(table).html(newTable.html());
                     },
            error: function(response)
                   {
                        console.log(response);
                        alert(response);
                   }
        });
    }

    function descargarPdf()
    {
        var form = $("#formOrder");
        var formData = form.serialize(); //variable con el valor de todos los input del formulario
        $.ajax({
            url: "{{ route('coil.produccionPDF') }}",
            type: 'GET',
            data: formData,
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response)
                     {
                        console.log(response);
                        var a = document.createElement('a');
                        var url = window.URL.createObjectURL(response);
                        a.href = url;
                        a.download = 'produccion.pdf';
                        a.click();
                        window.URL.revokeObjectURL(url);
                        
                     },
            error: function(response)
                   {
                        console.log(response);
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

    function cambiarFecha(checkbox)
    {
        if(checkbox.checked)
        {
            $('#labelFecha').attr('class', 'form-check-label float-right');
            $('#icoFecha').attr('src', "{{ asset('images/fecha-enabled.svg') }}");

            $('#daterange').attr('class', 'form-control');
            $('#daterange').prop('disabled', false);
        }
        else
        {
            $('#labelFecha').attr('class', 'form-check-label float-right text-muted');
            $('#icoFecha').attr('src', "{{ asset('images/fecha-disabled.svg') }}");

            $('#daterange').attr('class', 'form-control text-muted');
            $('#daterange').prop('disabled', true);

            actualizarTabla();
        }
    }

    function cambiarFechaRollo(checkbox)
    {
        if(checkbox.checked)
        {
            $('#labelFecha2').attr('class', 'form-check-label float-right');
            $('#icoFecha2').attr('src', "{{ asset('images/fecha-enabled.svg') }}");

            $('#daterange2').attr('class', 'form-control');
            $('#daterange2').prop('disabled', false);
        }
        else
        {
            $('#labelFecha2').attr('class', 'form-check-label float-right text-muted');
            $('#icoFecha2').attr('src', "{{ asset('images/fecha-disabled.svg') }}");

            $('#daterange2').attr('class', 'form-control text-muted');
            $('#daterange2').prop('disabled', true);

            actualizarTabla();
        }
    }

    function cambiarFechaProductosRollo(checkbox)
    {
        if(checkbox.checked)
        {
            $('#labelFecha3').attr('class', 'form-check-label float-right');
            $('#icoFecha3').attr('src', "{{ asset('images/fecha-enabled.svg') }}");

            $('#daterange3').attr('class', 'form-control');
            $('#daterange3').prop('disabled', false);
        }
        else
        {
            $('#labelFecha3').attr('class', 'form-check-label float-right text-muted');
            $('#icoFecha3').attr('src', "{{ asset('images/fecha-disabled.svg') }}");

            $('#daterange3').attr('class', 'form-control text-muted');
            $('#daterange3').prop('disabled', true);

            actualizarTabla();
        }
    }

    function inicializador(){
        if('{{$order}}' == 'ASC')
            ascendente();
        else
            descendente();
    }
    window.onload = inicializador;

    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
        
        // Specify file name
        filename = filename?filename+'.xls':'excel_data.xls';
        
        // Create download link element
        downloadLink = document.createElement("a");
        
        document.body.appendChild(downloadLink);
        
        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
        
            // Setting the file name
            downloadLink.download = filename;
            
            //triggering the function
            downloadLink.click();
        }
    }
</script>
@endsection--}}