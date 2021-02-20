@extends('layouts.formulario')

@section('title', 'Editar Hueso')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Editar Hueso ' . $coilReel->nomenclatura)

@section('form')
<form action="{{route('coilReel.update', $coilReel)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2"> 
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value="{{$coilReel->nomenclatura}}" readonly>
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso</label>
                <input type="number" step="0.0001" class="form-control" name="peso" value="{{$coilReel->peso}}" >
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Alta</label>
                <input type="date" class="form-control" name="fechaAlta" value="{{$coilReel->fechaAlta}}">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="N/A" readonly>
                @error('status')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div> 
        </div>
        <div class="col-lg-12 d-flex mt-4">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones">{{$coilReel->observaciones}}</textarea>
            </div>
        </div>

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-danger mx-3" href="{{route('coilReel.show', $coilReel->id)}}">Cancelar</a>
        <button type="submit" class="btn btn-success mx-3">Guardar</button>
    </div>
</div>
</form>
@endsection