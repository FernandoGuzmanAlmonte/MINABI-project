@extends('layouts.tablaIndex')

@section('title', 'Usuarios')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Usuarios')

@section('route', route('register'))

@section('table')
<table class="table table-striped my-4" >
    <thead class="bg-info">
<tr>
    <th scope="col">#</th>
    <th scope="col">Nombre</th>
    <th scope="col">Usuario</th>
    <th scope="col"></th>
  </tr>
</thead>
<tbody>
    @foreach ($users as $item)
    <tr>
        <th scope="row" class="align-middle">{{$item->id}}</th>
        <td class="align-middle">{{$item->name}}</td>
        <td class="align-middle">{{$item->email}}</td>
        <td><form action="{{ route('user.delete', $item->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm">
                <img src="{{ asset('images/icono-eliminar.svg') }}" class="iconosPequeños">
            </button>
        </form>
    </td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="d-flex  justify-content-center">{{$users->links()}}</div>

@endsection