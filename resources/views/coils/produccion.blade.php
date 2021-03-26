@extends('layouts.tablaIndexSinAgregar')

@section('title', 'Reporte Producción')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Reporte Producción')

@section('table')
   {{-- <script type="text/javascript">   
        function insertar()
        {
            var bobinas = @json($bobinas);
            for(i = 0; i < bobinas.length; i++)
            {
                var medidaId = bobinas[i].medida;
                var providerId = bobinas[i].proveedor;
                $('#medida' + medidaId + providerId).text(bobinas[i].medida);
                $('#peso'   + medidaId + providerId).text(bobinas[i].peso);
            }
            console.log(bobinas);
        }
    </script>--}}
    
    <table class="table table-striped my-4" id="tabla">
        <thead class="bg-info">
            <tr>
                {{--
                <th>Total de piezas</th>
                <th>Total (KG)</th>--}}
                <th scope="col">Bobina</th>
                <th>Medida</th>
                <th>Rollos</th>
                <th>Peso</th>
                <th>Bolsas</th>
                <th>Peso</th>
                <th>Medida</th>
                <th>Unidad</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody id="table">
            @foreach($produccion as $bobina)
            @php
            $BanderaBobina = true;  
            @endphp
            
            <tr>
                <td>{{$bobina->nomenclatura}}</td>
                <td>{{$bobina->coilType->alias}}</td>
                @foreach ($bobina->ribbons as $ribbon)
                    @if ($BanderaBobina == false )
                    <td></td>
                    <td></td>
                    @endif
                        <td>{{$ribbon->nomenclatura}}</td>
                        <td>{{$ribbon->peso}}</td>
                        @php
                            $rollo =  true
                        @endphp
                        @foreach ($ribbon->related as $bolsas)
                            @if ($rollo == false )
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            @endif
                            <td>{{$bolsas->nomenclatura}}</td>
                            <td>{{$bolsas->peso}}</td>
                            <td>{{$bolsas->medidaBolsa}}</td>
                            <td>{{$bolsas->unidad}}</td>
                            <td>{{$bolsas->cantidad}}</td>
                        </tr>
                            @php
                                $rollo =  false
                            @endphp
                        @endforeach
                    @php
                    $BanderaBobina = false;  
                    @endphp
                @endforeach
            @endforeach
        </tbody>
        {{--<script type="text/javascript">   
            insertar();
        </script>--}}
    </table>
@endsection