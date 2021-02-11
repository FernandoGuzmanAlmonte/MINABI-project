@extends('layouts.formulario')

@section('title', 'Bolsas')

@section('imgUrl',  asset('images/bolsa-de-papel.svg'))

@section('namePage', 'Bolsas')

@section('form')
<form action="{{ route('bag.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura">
            </div>
            <div class="col-lg-4 px-2">
                <label>Tipo</label>
                <input type="text" class="form-control" name="tipo">
            </div>
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option selected>--seleccione una opción--</option>
                    <option value="DISPONIBLE">DISPONIBLE</option>
                    <option value="TERMINADO">TERMINADO</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Proveedor</label>
                <!--<input type="text" class="form-control" name="proveedor">-->
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo">
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Inicio</label>
                <input type="time" class="form-control" name="horaInicioTrabajo">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Medida</label>
                <input type="text" class="form-control" name="medida">
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Termino</label>
                <input type="date" class="form-control" name="fechaFinTrabajo">
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Termino</label>
                <input type="time" class="form-control" name="horaFinTrabajo">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Tipo de unidad</label>
                <input type="text" class="form-control" name="tipoUnidad">
            </div>
            <div class="col-lg-4 px-2">
                <label>Cantidad</label>
                <input type="text" class="form-control" name="cantidad">
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso (Kg)</label>
                <input type="text" class="form-control" name="peso">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Quién elaboro</label>
                <!--<input type="text" class="form-control" name="estado"-->
            </div>
            <div class="col-lg-4 px-2">
                <label>Cliente Stock</label>
                <input type="text" class="form-control" name="clienteStock">
            </div>
            <div class="col-lg-4 px-2">
                <label>Velocidad</label>
                <input type="text" class="form-control" name="velocidad">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Temperatura</label>
                <input type="text" class="form-control" name="temperatura">
            </div>
            <div class="col-lg-4 px-2">
                <label>Tiene Pestaña</label>
                <select class="form-control" name="pestania">
                    <option selected>--seleccione una opción--</option>
                    <option value="Sí">Sí</option>
                    <option value="No">No</option>
                </select>
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


