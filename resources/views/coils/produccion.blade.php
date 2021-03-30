@extends('layouts.tablaIndexSinAgregar')

@section('title', 'Reporte Producción')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Reporte Producción')

@section('table')
    <table class="table table-striped my-4" id="tabla">
        <thead class="bg-info">
            <tr>
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
                {{-- Escribe bobinas --}}
                <td>{{$bobina->nomenclatura}}</td>
                <td>{{$bobina->coilType->alias}}</td>
                {{-- Escribe rollos --}}
               @if ($bobina->ribbons->isEmpty() && $bobina->related->isEmpty())
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               @endif
                @foreach ($bobina->ribbons as $ribbon)
                    @if ($BanderaBobina == false )
                    {{--Si ya se imprimio la bobina perteneciente a este rollo deja los espacios en blanco de bobina--}}
                        <td></td>
                        <td></td>
                    @endif
                    {{--imprime el rollo--}}
                    <td>{{$ribbon->nomenclatura}}</td>
                    <td>{{$ribbon->peso}}</td>
                    @php
                        $rollo =  true
                    @endphp
                    {{--Si no tiene bolsas el rollo entonces deja vacio--}}
                    @if (!$ribbon->related->isEmpty())
                        @foreach ($ribbon->related as $bolsas)
                        {{--si ya se imprimio la información del rollo--}}
                                @if ($rollo == false )
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif
                                {{--Si no imprime la info de las bolsas--}}
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
                    @else
                    {{--Deja los espacios vacios en caso de que no tenga bolsas relacionadas al rollo--}}
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                    @endif
                    @php
                    $BanderaBobina = false;  
                    @endphp
                @endforeach
                {{--imprime las mermas y los huesos de las bobinas--}}
                @foreach ($bobina->related as $coilProduct)
                @if ($coilProduct->coil_product_type != "App\Models\Ribbon")
                @if ($BanderaBobina == false )
                {{--Si ya se imprimio la bobina perteneciente a este rollo deja los espacios en blanco de bobina--}}
                <td></td>
                <td></td>
                @endif
                {{--Sino imprime la el producto de bobina y pone vacios los campos de bolsas--}}
                <td>{{$coilProduct->nomenclatura}}</td>
                <td>{{$coilProduct->peso}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                @endif
                {{--Termina la linea y da salto--}}
                </tr>
                @php
                    $BanderaBobina = false;  
                    @endphp
                @endforeach
            @endforeach
            </tbody>
    </table>
@endsection