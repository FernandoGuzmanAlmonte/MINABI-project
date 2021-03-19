@extends('layouts.tablaIndex')

@section('title', 'Usuarios')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Usuarios')

@section('route', route('ribbon.create'))

@section('table')
<table class="table table-striped my-4" >
    <thead class="bg-info">
<tr>
    <th scope="col">#</th>
    <th scope="col">Nomenclatura</th>
    <th scope="col">Fecha Adquisición</th>
    <th scope="col">Tipo</th>
    <th scope="col">Status</th>
    <th scope="col"></th>
  </tr>
</thead>
<tbody>
    @foreach ($ribbons as $item)
    <tr>
        <th scope="row" class="align-middle">{{$item->id}}</th>
        <td class="align-middle">{{$item->nomenclatura}}</td>
        <td class="align-middle">{{$item->fechaInicioTrabajo}}</td>
        <td class="align-middle">{{$item->white_ribbon_id}}</td>
        <td class="align-middle"><label class="btn btn-outline-success m-0">{{$item->status}}</label></td>
        <td><a href="{{route('ribbon.show', $item->id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="d-flex  justify-content-center">{{$ribbons->links()}}</div>

@endsection