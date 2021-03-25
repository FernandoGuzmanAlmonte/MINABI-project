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
                $('#medida' + medidaId + providerId).text(bobinas[i].medida);
                $('#peso'   + medidaId + providerId).text(bobinas[i].peso);
            }
            console.log(bobinas);
        }
    </script>
    
    <table class="table table-striped my-4" id="tabla">
        <thead class="bg-info">
            <tr>
                {{--
                <th>Total de piezas</th>
                <th>Total (KG)</th>--}}
                <th scope="col">Tamaño</th>            
                @foreach ($providers as $provider)
                    <th>{{$provider->nombreEmpresa}}</th>
                    <th>Peso (KG)</th>
                @endforeach
            </tr>
        </thead>
        <tbody id="table">
            @foreach($medidas as $medida)
                <tr>
                    <td>{{$medida->id}}</td>
                    @foreach ($providers as $provider)
                        <td id="medida{{$medida->id . $provider->id}}"></th>
                        <td id="peso{{$medida->id . $provider->id}}"></th>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
        <script type="text/javascript">   
            insertar();
        </script>
    </table>
@endsection