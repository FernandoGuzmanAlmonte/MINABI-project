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
        <td class="align-middle"><label class="btn btn-outline-success m-0">{{$item->status}}</label></td>
        <td><a href="{{route('ribbon.show', $item->ribbon_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="d-flex  justify-content-center">{{$ribbonProduct->links()}}</div>

@endsection