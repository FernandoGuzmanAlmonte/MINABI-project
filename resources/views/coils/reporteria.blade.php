@extends('layouts.tablaIndexSinAgregar')

@section('title', 'Reporte bobinas')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Reporte de almacen de bobinas')

@section('table')
    <script type="text/javascript">   
        function insertar()
        {
            var bobinas = @json($bobinas);
            for(i = 0; i < bobinas.length; i++)
            {
                var medidaId = bobinas[i].medida;
                var providerId = bobinas[i].proveedor;
                $('#medida' + medidaId + providerId).text(bobinas[i].cantidad);
                $('#peso'   + medidaId + providerId).text( bobinas[i].peso);
            }
            console.log(bobinas);

        }
    </script>

    <div class="mt-3">
        <a href="{{ route('coil.reporteriaPDF') }}" class="mx-2"><img src="{{asset('images/pdf.svg')}}" class="iconoTitle"></a>
        <a href="" class="mx-2"><img src="{{asset('images/excel.svg')}}" class="iconoTitle"></a>
    </div>
    <table class="table table-striped my-4" id="tabla">
        <thead class="bg-info">
            <tr>
                <th scope="col">Tamaño</th>            
                <th>Total de piezas</th>
                <th>Total (KG)</th>
                @foreach ($providers as $provider)
                    <th>{{$provider->nombreEmpresa}}</th>
                    <th>Peso (KG)</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($medidas as $medida)
                <tr>
                    <th>{{$medida->alias}}</th>       
                    <td>{{$medida->total_de_piezas}}</td>
                    <td>{{round($medida->total_kg, 2)}}</td>
                    @foreach ($providers as $provider)
                        <td id="medida{{$medida->id . $provider->id}}"></th>
                        <td id="peso{{$medida->id . $provider->id}}"></th>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
        {{--<tfoot class="bg-info">
            <tr>
                <td></td>
                <th>{{$sumaDeTotales[0]->suma_total_piezas}}</th>
                <th>{{$sumaDeTotales[0]->suma_total_peso}}</th>
                @foreach($totalesDeProveedores as $total)
                    <th>{{$total->cantidad}}</th>
                    <th>{{round($total->peso),2}}</th>
                @endforeach
            </tr>
        </tfoot>--}}
        <script type="text/javascript">   
            insertar();
        </script>
    </table>
@endsection