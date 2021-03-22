@extends('layouts.formulario')

@section('title', 'Rollo')

@section('imgUrl',  asset('images/cinta.svg'))

@section('namePage', 'Merma Rollo')

@section('form')
<form action="{{route('whiteWaste.update', $whiteWaste)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2"> 
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value={{$whiteWaste->nomenclatura}} readonly>
                @error('nomenclatura')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <input type="text" class="form-control" name="status" value={{$whiteWaste->status}} readonly>
                @error('largo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Arribo</label>
                <input type="date" class="form-control" name="fAlta" value={{$whiteWaste->fAlta}}>
                @error('fAlta')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
        </div>
    
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Peso (KG)</label>
                <input type="number" step="0.0001" class="form-control" name="peso" value={{$whiteWaste->peso}}>
                @error('peso')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Largo (metros)</label>
                <input type="number" step="0.0001" class="form-control" name="largo" value={{$whiteWaste->largo}}>
                @error('largo')
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
                <textarea rows="3" class="form-control" name="observaciones" placeholder="Máximo 255 caracteres">{{$whiteWaste->observaciones}}</textarea>
            </div>
        </div>

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-danger mx-3" href="{{route('whiteWaste.show', $whiteWaste->id)}}">Cancelar</a>
        <button type="submit" class="btn btn-success mx-3">Guardar</button>
    </div>
</div>
</form>
@endsection