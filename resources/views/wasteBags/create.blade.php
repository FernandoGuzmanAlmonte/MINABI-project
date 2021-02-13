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
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fInicioTrabajo">
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Fin</label>
                <input type="date" class="form-control" name="fFinTrabajo">
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso</label>
                <input type="text" class="form-control" name="peso">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Largo</label>
                <input type="text" class="form-control" name="largo">
            </div>
            <div class="col-lg-4 px-2">
                <label>Temperatura</label>
                <input type="text" class="form-control" name="temperatura">
            </div>
            <div class="col-lg-4 px-2">
                <label>Velocidad</label>
                <input type="text" class="form-control" name="velocidad">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option selected>--seleccione una opción--</option>
                    <option value="DISPONIBLE">DISPONIBLE</option>
                    <option value="TERMINADO">TERMINADO</option>
                </select>
            </div>
            <div class="col-lg-4 px-2">
                <label>Tipo Unidad</label>
                <input type="text" class="form-control" name="tipoUnidad">
            </div>
            <div class="col-lg-4 px-2">
                <label>Cantidad</label>
                <input type="time" class="form-control" name="cantidad">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones"></textarea>
            </div>  
        </div>
        <div class="col-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href="{{ route('bag.index') }}">Cancelar</a>
            <button type="submit" class="btn btn-success mx-3">Guardar</button>
        </div>    
    </div>
</form>
@endsection


