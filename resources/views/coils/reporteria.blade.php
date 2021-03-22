@extends('layouts.tablaIndexSinAgregar')

@section('title', 'Reporte bobinas')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Reporte de almacen de bobinas')

@section('table')
<script type="text/javascript">

    var array = [];

    function proveedores(idProveedor){
        array.push(idProveedor); 
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
<tbody id = "tbody">
    {{$anterior = $bobinas[0]->medida}}
    <tr>
    @foreach ($bobinas as $item)
    @if ($anterior != $item->medida)
    <tr>
    @endif
    <script type="text/javascript">

        var i = 0;
    
        function insertar(idObjecto, cantidad, peso, medida){
           for(; i < array.length;i++){
               console.log("arrego "+array[i]);
               console.log("objeto "+idObjecto);
               console.log("medida "+medida);
            if(idObjecto == array[i]){
                var contendor  = document.getElementById("tbody");
            }
            else{
                       
                var contendor  = document.getElementById("tbody").insertRow(-1).innerHTML = '<td scope="row" class="align-middle">'+cantidad+'</td><td class="align-middle">'+peso+'</td>';
            }
           }
           i = 1;
           
        }
        </script>
    <script languaje="javascript">
        var id = "{{$provider->id}}"
        var cantidad = "{{$provider->cantidad}}"
        var peso = "{{$provider->peso}}"
        var medida = "{{$provider->medida}}"
        insertar(id, cantidad, peso, medida);
    </script>
    {{--<td scope="row" class="align-middle">{{$item->cantidad}}</td>
    <td class="align-middle">{{$item->peso}}</td>
    {@if ($anterior != $item->medida)
    </tr>
    @endif--}}
    {{$anterior = $item->medida}}
    @endforeach
</tbody>
</table>



@endsection