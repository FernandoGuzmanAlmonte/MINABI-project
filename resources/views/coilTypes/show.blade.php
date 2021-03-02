@extends('layouts.formulario')

@section('title', 'Medida de Bobina')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Medida de Bobina ' . $coilType->alias)

@section('retornar')
<a href="{{ route('coilType.index') }}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection

@section('form')
<div class="row">
    <div class="col-lg-12 d-flex mt-2">
        <div class="col-lg-4 px-2">
            <label>Alias</label>
            <input type="text" class="form-control" name="alias" value="{{ $coilType->alias }}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Ancho (cm)</label>
            <input type="number" step="0.0001" class="form-control" name="anchoCm" value="{{ $coilType->anchoCm }}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Largo (m)</label>
            <input type="number" step="0.0001" class="form-control" name="largoM" value="{{ $coilType->largoM }}" disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Densidad</label>
            <input type="number" step="0.0001" class="form-control" name="densidad" value="{{ $coilType->densidad }}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Material</label>
            <input type="text" class="form-control" name="material" value="{{ $coilType->material }}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Calibre</label>
            <input type="text" class="form-control" name="calibre" value="{{ $coilType->calibre }}" disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Tipo</label>
            <input type="text" class="form-control" name="tipo" value="{{ ($coilType->tipo == 'CELOFAN') ? 'CELOFÁN' : 'CENEFA'}}" disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-4">
        <div class="col-lg-12 px-2">
            <label>Observaciones</label>
            <textarea rows="3" class="form-control" name="observaciones" placeholder="Máximo 255 caracteres" disabled>{{ $coilType->observaciones }}</textarea>
        </div>
    </div>
    <div class="col-12 mt-4 mb-4 text-center">
        <a class="btn btn-warning mx-3" href="{{route('coilType.edit', $coilType)}}">Editar</a>
    </div>
    
    <div class="col-lg-12 d-flex mt-5">
        <div class="col-lg-6 px-2 float-left">
            <h3><img src="{{ asset('images/bolsa-de-papel.svg') }}" class="iconoTitle"> Medidas de Bolsas </h3>
        </div>
        <div class="col-lg-6 px-2 mt-2 float-left">
            <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#create">
                Añadir Medida de Bolsa
            </button>
        </div>
    </div>
    <div class="col-lg-12">   
        {{-- Modal de contactos --}}
            @include('bagMeasures.create')
        {{-- Modal de contactos --}}
        
        {{-- Index de contactos --}}
            @include('bagMeasures.index')
        {{-- Index de contactos --}}    
    </div>
</div>
@endsection


