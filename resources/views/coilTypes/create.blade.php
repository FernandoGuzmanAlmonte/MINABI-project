@extends('layouts.formulario')

@section('title', 'Registrar Medida de Bobina')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Registrar Tipo de Bobina')

@section('form')
<form action="{{ route('coilType.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Alias</label>
                <input type="text" class="form-control" name="alias">
            </div>
            <div class="col-lg-4 px-2">
                <label>Ancho (cm)</label>
                <input type="number" step="0.0001" class="form-control" name="anchoCm">
            </div>
            <div class="col-lg-4 px-2">
                <label>Largo (m)</label>
                <input type="number" step="0.0001" class="form-control" name="largoM">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Densidad</label>
                <input type="number" step="0.0001" class="form-control" name="densidad">
            </div>
            <div class="col-lg-4 px-2">
                <label>Material</label>
                <input type="text" class="form-control" name="material">
            </div>
            <div class="col-lg-4 px-2">
                <label>Calibre</label>
                <input type="text" class="form-control" name="calibre">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Tipo</label>
                <input type="text" class="form-control" name="tipo">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-4">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones" placeholder="Máximo 255 caracteres"></textarea>
            </div>
        </div>
        <div class="col-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href="{{ route('coilType.index') }}">Cancelar</a>
            <button type="submit" name="coilTypeForm" class="btn btn-success mx-3">Guardar</button>
        </div>
    </div>
</form>
@endsection


