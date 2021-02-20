@extends('layouts.formulario')

@section('title', 'Rollo')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Merma Rollo')

@section('form')
<form action="{{route('wasteRibbon.update', $wasteRibbon)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2"> 
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value={{$wasteRibbon->nomenclatura}} readonly>
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
                <input type="text" class="form-control" name="status" value={{$wasteRibbon->status}} readonly>
                @error('largo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso (KG)</label>
                <input type="number" class="form-control" name="peso" value={{$wasteRibbon->peso}}>
                @error('peso')
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
                <input type="number" class="form-control" name="largo" value={{$wasteRibbon->largo}}>
                @error('largo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Incio Trabajo</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo" value={{$wasteRibbon->fechaInicioTrabajo}}>
                @error('fechaInicioTrabajo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Inicio Trabajo</label>
                <input type="time" class="form-control" name="horaInicioTrabajo" value={{$wasteRibbon->horaInicioTrabajo}}>
                @error('horaInicioTrabajo')
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
                <input type="text" class="form-control" name="temperatura" value={{$wasteRibbon->temperatura}}>
                @error('temperatura')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
                @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Fin Trabajo</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value={{$wasteRibbon->fechaFinTrabajo}}>
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
                <input type="time" class="form-control" name="horaFinTrabajo" value={{$wasteRibbon->horaFinTrabajo}}>
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
                <label>Velocidad</label>
                <input type="number" class="form-control" name="velocidad" value={{$wasteRibbon->velocidad}}>
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
                <textarea rows="3" class="form-control" name="observaciones" placeholder="Máximo 255 caracteres">{{$wasteRibbon->observaciones}}</textarea>
            </div>
        </div>

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-danger mx-3" href="{{route('wasteRibbon.show', $wasteRibbon->id)}}">Cancelar</a>
        <button type="submit" class="btn btn-success mx-3">Guardar</button>
    </div>
</div>
</form>
@endsection