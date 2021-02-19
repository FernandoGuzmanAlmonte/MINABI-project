@extends('layouts.tablaIndex')

@section('title', 'Bolsas')

@section('imgUrl',  asset('images/bolsa-de-papel.svg'))

@section('namePage', 'Bolsas')

@section('route', route('ribbon.create'))

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
    @foreach ($ribbonProduct as $item)
    <tr>
        <th scope="row" class="align-middle">{{$item->id}}</th>
        <td class="align-middle">{{$item->nomenclatura}}</td>
        <td class="align-middle">{{$item->fAdquisicion}}</td>
        <td class="align-middle"><label class="btn btn-outline-{{ ($item->status == 'DISPONIBLE') ? 'success' : 'danger' }} m-0">{{$item->status}}</label></td>
        @if ($item->ribbon_product_type == 'App\Models\Bag')
        <td><a href="{{route('bag.show',$item->ribbon_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
        @elseif($item->ribbon_product_type == 'App\Models\WasteBag')
        <td><a href="{{route('wasteBag.show',$item->ribbon_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
        @elseif($item->ribbon_product_type == 'App\Models\CoilReel')
        <td><a href="{{route('coilReel.show',$item->coil_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
        @endif
    </tr>
    @endforeach
</tbody>
</table>
<div class="d-flex  justify-content-center">{{$ribbonProduct->links()}}</div>

@endsection