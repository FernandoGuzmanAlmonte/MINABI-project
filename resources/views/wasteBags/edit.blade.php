@extends('layouts.formulario')

@section('title', 'Merma de Bolsas')

@section('imgUrl',  asset('images/bolsa-de-papel.svg'))

@section('namePage', 'Editar Merma de Bolsas')

@section('form')
<form action="{{ route('wasteBag.update', $wasteBag) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo" value={{ $wasteBag->fInicioTrabajo }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Fin</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value={{ $wasteBag->fFinTrabajo }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso</label>
                <input type="text" class="form-control" name="peso" value={{ $wasteBag->peso }}>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Largo</label>
                <input type="number" step="0.0001" class="form-control" name="largo" value={{ $wasteBag->largo }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Temperatura</label>
                <input type="number" step="0.0001" class="form-control" name="temperatura" value={{ $wasteBag->temperatura }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Velocidad</label>
                <input type="number" step="0.0001" class="form-control" name="velocidad" value={{ $wasteBag->velocidad }}>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="DISPONIBLE" {{ ($wasteBag->status === 'DISPONIBLE') ? 'Selected' : '' }}>
                        DISPONIBLE
                    </option>
                    <option value="TERMINADO" {{ ($wasteBag->status === 'TERMINADO') ? 'Selected' : '' }}>
                        TERMINADO
                    </option>
                </select>
            </div>
            <div class="col-lg-4 px-2">
                <label>Tipo Unidad</label>
                <input type="text" class="form-control" name="tipoUnidad" value={{ $wasteBag->tipoUnidad }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Cantidad</label>
                <input type="number" step="0.0001" class="form-control" name="cantidad" value={{ $wasteBag->horaFinTrabajo }}>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones">{{ $wasteBag->observaciones }}</textarea>
            </div>  
        </div>
        <div class="col-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href="{{ route('bag.index') }}">Cancelar</a>
            <button type="submit" class="btn btn-success mx-3">Guardar</button>
        </div>    
    </div>
    <div class="col-12 mt-3 text-center">
        <a class="btn btn-danger mx-3" href="{{route('wasteBags.show', $wasteBag)}}">Cancelar</a>
        <button type="submit" class="btn btn-success mx-3">Guardar</button>
    </div>
</form>
@endsection


