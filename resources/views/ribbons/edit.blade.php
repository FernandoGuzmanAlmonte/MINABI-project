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
                <input type="text" class="form-control" name="nomenclatura" value="{{$ribbon->nomenclatura}}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="{{$ribbon->status}}" readonly>
            </div>
            <div class="col-lg-4 px-2">
                <label>Quien Elaboro</label>
                <input type="text" class="form-control" name="employee_id" value="{{$ribbon->employee_id}}">
            </div>
        </div>
    
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Peso (KG)</label>
                <input type="text" class="form-control" name="peso" value="{{$ribbon->peso}}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo" value="{{$ribbon->fechaInicioTrabajo}}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Inicio</label>
                <input type="time" class="form-control" name="horaInicioTrabajo" value="{{$ribbon->horaInicioTrabajo}}">
            </div>
        </div>
    
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Fecha Termino</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value="{{$ribbon->fechaFinTrabajo}}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Termino</label>
                <input type="time" class="form-control" name="horaFinTrabajo" value="{{$ribbon->horaFinTrabajo}}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso Utilizado (KG)</label>
                <input type="number" step="0.0001" class="form-control" name="pesoUtilizado" value="{{$ribbon->pesoUtilizado}}">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Largo (metros)</label>
            <input type="number" step="0.0001" class="form-control" name="largo" value="{{$ribbon->largo}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Temperatura (C°)</label>
            <input type="number" step="0.0001" class="form-control" name="temperatura" value="{{$ribbon->temperatura}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Velocidad</label>
            <input type="number" step="0.0001" class="form-control" name="velocidad" value="{{$ribbon->velocidad}}">
        </div>
    </div>
    
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Cintilla Blanca</label>
                <input type="text" class="form-control" name="white_ribbon_id" value="{{$ribbon->white_ribbon_id}}" readonly>
            </div>
        </div>
    
        <div class="col-lg-12 d-flex mt-4">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones">{{$ribbon->observaciones}}</textarea>
            </div>
        </div>

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-danger mx-3" href="{{route('ribbon.show', $ribbon->id)}}">Cancelar</a>
        <button type="submit" class="btn btn-success mx-3">Guardar</button>
    </div>
</div>
</form>
@endsection