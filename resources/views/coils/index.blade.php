@extends('layouts.tablaIndex')

@section('title', 'Bobinas')

@section('imgUrl',  asset('images/base-de-datos.svg'))

@section('namePage', 'Bobinas')

@section('table')
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
    @foreach ($coils as $item)
    <tr>
        <th scope="row" class="align-middle">{{$item->id}}</th>
        <td class="align-middle">{{$item->nomenclatura}}</td>
        <td class="align-middle">{{$item->fArribo}}</td>
        <td class="align-middle">{{$item->coil_type_id}}</td>
        <td class="align-middle"><label class="btn btn-outline-success m-0">{{$item->status}}</label></td>
        <td><a><img src="../public/images/flecha-derecha.svg" class="iconosFlechas"></a></td>
    </tr>
    @endforeach
@endsection