@extends('layouts.formulario')

@section('title', 'Bolsas')

@section('imgUrl',  asset('images/bolsa-de-papel.svg'))

@section('namePage', 'Editar Bolsa ' . $bag->nomenclatura)

@section('form')
<form action="{{ route('bag.update', $bag) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value={{ $bag->nomenclatura }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Tipo</label>
                <input type="text" class="form-control" name="tipo" value={{ $bag->tipo }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="DISPONIBLE" {{ ($bag->status === 'DISPONIBLE') ? 'Selected' : '' }}>
                        DISPONIBLE
                    </option>
                    <option value="TERMINADO" {{ ($bag->status === 'TERMINADO') ? 'Selected' : '' }}>
                        TERMINADO
                    </option>
                </select>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Proveedor</label>
                <!--<input type="text" class="form-control" name="proveedor" value=>-->
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo" value={{ $bag->fechaInicioTrabajo }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Inicio</label>
                <input type="time" class="form-control" name="horaInicioTrabajo" value={{ $bag->horaInicioTrabajo }}>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Medida</label>
                <input type="text" class="form-control" name="medida" value={{ $bag->medida }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Termino</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value={{ $bag->fechaFinTrabajo }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Termino</label>
                <input type="time" class="form-control" name="horaFinTrabajo" value={{ $bag->horaFinTrabajo }}>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Tipo de unidad</label>
                <input type="text" class="form-control" name="tipoUnidad" value={{ $bag->tipoUnidad }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Cantidad</label>
                <input type="text" class="form-control" name="cantidad" value={{ $bag->cantidad }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso (Kg)</label>
                <input type="text" class="form-control" name="peso" value={{ $bag->peso }}>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Quién elaboro</label>
                <!--<input type="text" class="form-control" name="estado" value=>-->
            </div>
            <div class="col-lg-4 px-2">
                <label>Cliente Stock</label>
                <input type="text" class="form-control" name="clienteStock" value={{ $bag->clienteStock }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Velocidad</label>
                <input type="text" class="form-control" name="velocidad" value={{ $bag->velocidad }}>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Temperatura</label>
                <input type="text" class="form-control" name="temperatura" value={{ $bag->temperatura }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Tiene Pestaña</label>
                <select class="form-control" name="pestania">
                    <option value="Sí" {{ ($bag->pestania === 'Sí') ? 'Selected' : '' }}>
                        Sí
                    </option>
                    <option value="No" {{ ($bag->pestania === 'No') ? 'Selected' : '' }}>
                        No
                    </option>
                </select>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones">
                    {{ $bag->observaciones }}
                </textarea>
            </div>  
        </div>
        <div class="col-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href="{{ route('bag.show', $bag) }}">Cancelar</a>
            <button type="submit" class="btn btn-success mx-3">Guardar</button>
        </div>
    </div>
</form>
@endsection


