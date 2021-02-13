@extends('layouts.formulario')

@section('title', 'Rollo')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Rollo')

@section('form')
<form action="{{route('ribbon.update', $ribbon)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2"> 
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value="{{old('nomenclatura')}}">
                @error('nomenclatura')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Incio Trabajo</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo" >
                @error('fechaIncioTrabajo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Inicio Trabajo</label>
                <input type="time" class="form-control" name="horaIncioTrabajo" >
                @error('horaIncioTrabajo')
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
                <input type="number" class="form-control" name="peso" value="{{old('peso')}}">
                @error('peso')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Fin Trabajo</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value="{{old('fechaFinTrabajo')}}">
                @error('fechaFinTrabajo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Fin Trabajo</label>
                <input type="time" class="form-control" name="horaFinTrabajo" value="{{old('horaFinTrabajo')}}">
                @error('horaFinTrabajo')
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
                <label>Largo (metros)</label>
                <input type="number" class="form-control" name="largo" value="{{old('largo')}}">
                @error('largo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Termino</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value="{{old('fechaFinTrabajo')}}">
                @error('fechaFinTrabajo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Termino</label>
                <input type="time" class="form-control" name="horaFinTrabajo" value="{{old('horaFinTrabajo')}}">
                @error('horaFinTrabajo')
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
                <label>Temperatura</label>
                <input type="text" class="form-control" name="temperatura" value="{{old('temperatura')}}">
                @error('temperatura')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Velocidad</label>
                <input type="number" class="form-control" name="velocidad" value="{{old('velocidad')}}">
                @error('velocidad')
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
                <textarea rows="3" class="form-control" name="observaciones">{{old('observaciones')}}"</textarea>
            </div>
        </div>

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-danger mx-3" href="{{route('ribbon.show', $ribbon->id)}}">Cancelar</a>
        <button type="submit" class="btn btn-success mx-3">Guardar</button>
    </div>
</div>
</form>
@endsection