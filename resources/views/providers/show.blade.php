@extends('layouts.formulario')

@section('title', 'Proveedores')

@section('imgUrl',  asset('images/proveedor.png'))

@section('namePage', 'Proveedor ' . $provider->id)

@section('retornar')
<a href="{{ route('provider.index') }}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection

@section('form')
<div class="row">
    <div class="col-lg-12 d-flex mt-2">
        <div class="col-lg-4 px-2">
            <label>Nombre empresa</label>
            <input type="text" class="form-control" name="nombreEmpresa" value={{ $provider->nombreEmpresa }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Dirección</label>
            <input type="text" class="form-control" name="direccion" value={{ $provider->direccion }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Pagina web</label>
            <input type="text" class="form-control" name="paginaWeb" value={{ $provider->paginaWeb }} disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Estado</label>
            <input type="text" class="form-control" name="estado" value={{ $provider->estado }} disabled>
        </div>
    </div>
    <div class="col-12 mt-3 text-center">
        <a class="btn btn-warning mx-3" href="{{ route('provider.edit', $provider) }}">Editar</a>
    </div>
</div>
@endsection


