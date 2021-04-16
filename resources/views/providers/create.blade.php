@extends('layouts.formulario')

@section('title', 'Proveedores')

@section('imgUrl',  asset('images/proveedor.svg'))

@section('namePage', 'Proveedores')

@section('form')
<form action="{{ route('provider.store') }}" method="POST">
    @csrf
    <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 px-2 mt-2">
                <label><span class="required">*</span> Nombre Empresa</label>
                <input type="text" class="form-control" name="nombreEmpresa" value="{{ old('nombreEmpresa') }}">
                @error('nombreEmpresa')
                    <div class="alert alert-danger mt-2">   
                        <small>{{ $message }}</small>
                    </div>
                @enderror
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 px-2 mt-2">
                <label><span class="required">*</span> Dirección</label>
                <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">
                @error('direccion')
                    <div class="alert alert-danger mt-2">   
                        <small>{{ $message }}</small>
                    </div>
                @enderror
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 px-2 mt-2">
                <label>Pagina web</label>
                <input type="text" class="form-control" name="paginaWeb" value="{{ old('paginaWeb') }}">
                @error('paginaWeb')
                    <div class="alert alert-danger mt-2">   
                        <small>{{ $message }}</small>
                    </div>
                @enderror
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 px-2 mt-3">
                <label><span class="required">*</span> Estado</label>
                <input type="text" class="form-control" name="estado" value="{{ old('estado') }}">
                @error('estado')
                    <div class="alert alert-danger mt-2">   
                        <small>{{ $message }}</small>
                    </div>
                @enderror
            </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href="{{ route('provider.index') }}">Cancelar</a>
            <button type="submit" name="providerForm" class="btn btn-success mx-3">Guardar</button>
        </div>
    </div>
</form>
@endsection


