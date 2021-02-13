@extends('layouts.formulario')

@section('title', 'Rollo')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Rollo')

@section('retornar')
<a href="{{route('coilProduct.index')}}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection
    
@section('form')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2"> 
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value="{{old('nomenclatura')}}">
              
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Incio Trabajo</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo" >
           
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Inicio Trabajo</label>
                <input type="time" class="form-control" name="horaIncioTrabajo" >
             
            </div>
        </div>
    
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Peso (KG)</label>
                <input type="number" class="form-control" name="peso" value="{{old('peso')}}">
               
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Fin Trabajo</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value="{{old('fechaFinTrabajo')}}">
             
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Fin Trabajo</label>
                <input type="time" class="form-control" name="horaFinTrabajo" value="{{old('horaFinTrabajo')}}">
              
            </div>
        </div>
    
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Largo (metros)</label>
                <input type="number" class="form-control" name="largo" value="{{old('largo')}}">
              
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Termino</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value="{{old('fechaFinTrabajo')}}">
              
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Termino</label>
                <input type="time" class="form-control" name="horaFinTrabajo" value="{{old('horaFinTrabajo')}}">
             
            </div>
        </div>
    
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Temperatura</label>
                <input type="text" class="form-control" name="temperatura" value="{{old('temperatura')}}">
                
            </div>
            <div class="col-lg-4 px-2">
                <label>Velocidad</label>
                <input type="number" class="form-control" name="velocidad" value="{{old('velocidad')}}">
            </div>
           
        </div>
    
    
        <div class="col-lg-12 d-flex mt-4">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones">{{old('observaciones')}}"</textarea>
            </div>
        </div>

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-warning mx-3" href="{{route('wasteRibbon.edit', $wasteRibbon->id)}}">Editar</a>
    </div>
</div>

@endsection