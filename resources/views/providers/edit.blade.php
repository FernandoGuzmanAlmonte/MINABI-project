@extends('layouts.formulario')

@section('title', 'Proveedores')

@section('imgUrl',  asset('images/proveedor.svg'))

@section('namePage', 'Editar Proveedor ' . $provider->id)

@section('form')
<form action="{{ route('provider.update', $provider) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Nombre empresa</label>
                <input type="text" class="form-control" name="nombreEmpresa" value={{ $provider->nombreEmpresa }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Dirección</label>
                <input type="text" class="form-control" name="direccion" value={{ $provider->direccion }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Pagina web</label>
                <input type="text" class="form-control" name="paginaWeb" value={{ $provider->paginaWeb }}>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Estado</label>
                <input type="text" class="form-control" name="estado" value={{ $provider->estado }}>
            </div>
        </div>
        <div class="col-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href="{{ route('provider.show', $provider) }}">Cancelar</a>
            <button type="submit" class="btn btn-success mx-3">Guardar</button>
        </div>
    </div>
</form>
@endsection


