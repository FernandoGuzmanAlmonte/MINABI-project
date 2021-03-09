@extends('layouts.tablaIndexSinAgregar')

@section('title', 'Rollos de cinta blanca')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Rollos de cinta blanca')

@section('table')
<table class="table table-striped my-4" >
    <thead class="bg-info">
<tr>
    <th scope="col">#</th>
    <th scope="col">Nomenclatura</th>
    <th scope="col">Fecha Adquisición</th>
    <th scope="col">Status</th>
    <th scope="col"></th>
  </tr>
</thead>
<tbody>
    @foreach ($whiteCoilProducts as $item)
    <tr>
        <th scope="row" class="align-middle">{{$item->id}}</th>
        <td class="align-middle">{{$item->nomenclatura}}</td>
        <td class="align-middle">{{$item->fAdquisicion}}</td>
        <td class="align-middle"><label class="btn btn-outline-{{ ($item->status == 'DISPONIBLE') ? 'success' : 'danger' }} m-0">{{$item->status}}</label></td>
        @if ($item->white_coil_product_type == 'App\Models\WhiteRibbon')
        <td><a href="{{route('whiteRibbon.show',$item->white_coil_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
        @elseif($item->white_coil_product_type == 'App\Models\WhiteWaste')
        <td><a href="{{route('whiteWaste.show',$item->white_coil_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
        @endif
    </tr>
    @endforeach
</tbody>
</table>
<div class="d-flex  justify-content-center">{{$whiteCoilProducts->links()}}</div>

@endsection