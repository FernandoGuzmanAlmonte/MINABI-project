@extends('layouts.formulario')

@section('title', 'Rollo')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Rollo')

@section('form')
<form action="{{route('coilReel.update', $coilReel)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2"> 
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value="{{$coilReel->nomenclatura}}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso</label>
                <input type="number" class="form-control" name="tipo" >
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Alta</label>
                <input type="date" class="form-control" name="status" value="{{$coilReel->status}}">
            </div>
        </div>
    
        <div class="col-lg-12 d-flex mt-4">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones">{{$coilReel->observaciones}}"</textarea>
            </div>
        </div>

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-danger mx-3" href="{{route('coilReel.show', $coilReel->id)}}">Cancelar</a>
        <button type="submit" class="btn btn-success mx-3">Guardar</button>
    </div>
</div>
</form>
@endsection