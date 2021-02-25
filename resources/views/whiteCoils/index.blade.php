@extends('layouts.tablaIndex')

@section('title', 'Bobinas de cinta blanca')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Bobinas de cinta blanca')

@section('route', route('whiteCoil.create'))

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
    @foreach ($whiteCoils as $item)
    <tr>
        <th scope="row" class="align-middle">{{$item->id}}</th>
        <td class="align-middle">{{$item->nomenclatura}}</td>
        <td class="align-middle">{{$item->fArribo}}</td>
        <td class="align-middle">{{$item->coil_type_id}}</td>
        <td class="align-middle">
            <label class="btn btn-outline-{{ ($item->status == 'DISPONIBLE') ? 'success' : 'danger' }} m-0">
                {{$item->status}}
            </label>
        </td>
        <td><a href="{{route('whiteCoil.show', $item->id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="d-flex  justify-content-center">{{$whiteCoils->links()}}</div>

@endsection