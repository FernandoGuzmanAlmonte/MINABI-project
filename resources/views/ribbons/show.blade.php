@extends('layouts.formulario')

@section('title', 'Rollo')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Rollo')

@section('retornar')
<a href="{{route('ribbon.index')}}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection
    
@section('form')
    <div class="row">
    <div class="col-lg-12 d-flex mt-2"> 
        <div class="col-lg-4 px-2">
            <label>Nomenclatura</label>
            <input type="text" class="form-control" name="nomenclatura" value="{{$ribbon->nomenclatura}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Tipo</label>
            <input type="text" class="form-control" name="tipo" >
        </div>
        <div class="col-lg-4 px-2">
            <label>Status</label>
            <input type="text" class="form-control" name="status" value="{{$ribbon->status}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Quien Elaboro</label>
            <input type="text" class="form-control" name="employee_id" value="{{$ribbon->employee_id}}"  disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha Inicio</label>
            <input type="date" class="form-control" name="fechaInicioTrabajo" value="{{$ribbon->fechaInicioTrabajo}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Hora Inicio</label>
            <input type="time" class="form-control" name="horaInicioTrabajo" value="{{$ribbon->horaInicioTrabajo}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Largo (metros)</label>
            <input type="text" class="form-control" name="largo" value="{{$ribbon->largo}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha Termino</label>
            <input type="date" class="form-control" name="fechaFinTrabajo" value="{{$ribbon->fechaFinTrabajo}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Hora Termino</label>
            <input type="time" class="form-control" name="horaFinTrabajo" value="{{$ribbon->horaFinTrabajo}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Peso (KG)</label>
            <input type="text" class="form-control" name="peso" value="{{$ribbon->peso}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso Utilizado (KG)</label>
            <input type="datetime" class="form-control" name="pesoUtilizado" value="{{$ribbon->pesoUtilizado}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Temperatura (C°)</label>
            <input type="text" class="form-control" name="temperatura" value="{{$ribbon->temperatura}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Velocidad</label>
            <input type="text" class="form-control" name="velocidad" value="{{$ribbon->velocidad}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Pestaña</label>
            <input type="text" class="form-control" name="white_ribbon_id" value="{{$ribbon->white_ribbon_id}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-4">
        <div class="col-lg-12 px-2">
            <label>Observaciones</label>
            <textarea rows="3" class="form-control" name="observaciones" disabled>{{$ribbon->observaciones}}"</textarea>
        </div>
    </div>

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-warning mx-3" href="{{route('ribbon.edit', $ribbon->id)}}">Editar</a>
    </div>
</div>

@endsection