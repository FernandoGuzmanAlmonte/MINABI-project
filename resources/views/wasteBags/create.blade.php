@extends('layouts.formulario')

@section('title', 'Merma de Bolsas')

@section('imgUrl',  asset('images/bolsa-de-papel.svg'))

@section('namePage', 'Merma de Bolsas')

@section('form')
<form action="{{ route('wasteBag.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value="{{$nomenclatura}}" readonly>
            </div>
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="N/A" readonly>
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso</label>
                <input type="number" step="0.0001" class="form-control" name="peso">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Largo</label>
                <input type="number" step="0.0001" class="form-control" name="largo">
            </div> 
            <div class="col-lg-4 px-2">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo">
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Inicio</label>
                <input type="time" class="form-control" name="horaInicioTrabajo">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Tipo Unidad</label>
                <select class="form-control" name="tipoUnidad">
                    <option selected>--seleccione una opción--</option>
                    <option value="DISPONIBLE">MILLAR</option>
                    <option value="TERMINADO">CIENTO</option>
                </select>
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Fin</label>
                <input type="date" class="form-control" name="fechaFinTrabajo">
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Fin</label>
                <input type="time" class="form-control" name="horaFinTrabajo">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Temperatura</label>
                <input type="number" step="0.0001" class="form-control" name="temperatura">
            </div>
            <div class="col-lg-4 px-2">
                <label>Velocidad</label>
                <input type="number" step="0.0001" class="form-control" name="velocidad">
            </div>
            <div class="col-lg-4 px-2">
                <label>Cantidad</label>
                <input type="number" step="0.0001" class="form-control" name="cantidad">
            </div>
        </div>
        <input type="hidden" class="form-control" name="ribbonId" value="{{$ribbonId}}">
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones"></textarea>
            </div>  
        </div>
        <div class="col-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href="{{ route('ribbon.show', $ribbonId) }}">Cancelar</a>
            <button type="submit" class="btn btn-success mx-3">Guardar</button>
        </div> 
    </div>
</form>
@endsection


