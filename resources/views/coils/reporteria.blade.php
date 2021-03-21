@extends('layouts.tablaIndexSinAgregar')

@section('title', 'Reporte bobinas')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Reporte de almacen de bobinas')

@section('table')
<script type="text/javascript">

    var array = [];
    var i = 0;

    function proveedores(idProveedor){
        array.push(idProveedor); 
        console.log(array);
    }

    function insertar(idObjecto){
       for(; i){

       }
    }
    </script>
<table class="table table-striped my-4" id="tabla">
    <thead class="bg-info">
        <tr>
            {{--<th scope="col">Tamaño</th>
            <th>Total de piezas</th>
            <th>Total (KG)</th>--}}
            @foreach ($providers as $provider)
            <script languaje="javascript">
                var id = "{{$provider->id}}"
                proveedores(id);
            </script>
                <th id="col {{$provider->id}}">{{$provider->nombreEmpresa}}</th>
                <th>Peso (KG)</th>
            @endforeach
          </tr>
</thead>
<tbody >
    {{$anterior = $bobinas[0]->medida}}
    <tr>
    @foreach ($bobinas as $item)
    @if ($anterior != $item->medida)
    <tr>
    @endif

    <td scope="row" class="align-middle">{{$item->cantidad}}</td>
    <td class="align-middle">{{$item->peso}}</td>
    {{--@if ($anterior != $item->medida)
    </tr>
    @endif--}}
    {{$anterior = $item->medida}}
    @endforeach
</tbody>
</table>



@endsection