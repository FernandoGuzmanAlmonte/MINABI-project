@extends('layouts.formulario')

@section('title', 'Editar Medida de Bobina')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Editar Tipo de Bobina ' . $coilType->alias)

@section('form')
<form action="{{ route('coilType.update', $coilType) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Alias</label>
                <input type="text" class="form-control" name="alias" value="{{ $coilType->alias }}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Ancho (cm)</label>
                <input type="number" step="0.0001" class="form-control" name="anchoCm" value="{{ $coilType->anchoCm }}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Largo (m)</label>
                <input type="number" step="0.0001" class="form-control" name="largoM" value="{{ $coilType->largoM }}">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Densidad</label>
                <input type="number" step="0.0001" class="form-control" name="densidad" value="{{ $coilType->densidad }}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Material</label>
                <input type="text" class="form-control" name="material" value="{{ $coilType->material }}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Calibre</label>
                <input type="number" step="0.0001" class="form-control" name="calibre" value="{{ $coilType->calibre }}">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Tipo</label>
                <select class="form-control" name="tipo">
                    <option {{ ($coilType->tipo == 'CELOFAN') ? 'selected' : ''}} value="CELOFAN">CELOFÁN</option>
                    <option {{ ($coilType->tipo == 'CENEFA') ? 'selected' : ''}} value="CENEFA">CENEFA</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-4">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones" placeholder="Máximo 255 caracteres">{{ $coilType->observaciones }}</textarea>
            </div>
        </div>
        <div class="col-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href="{{ route('coilType.show', $coilType) }}">Cancelar</a>
            <button type="submit" name="coilTypeForm" class="btn btn-success mx-3">Guardar</button>
        </div>
    </div>
</form>
@endsection


