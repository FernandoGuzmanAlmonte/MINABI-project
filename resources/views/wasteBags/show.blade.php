@extends('layouts.formulario')

@section('title', 'Merma de Bolsas')

@section('imgUrl',  asset('images/bolsa-de-papel.svg'))

@section('namePage', 'Merma de Bolsas')

@section('retornar')
<a href="{{ route('ribbonProduct.index') }}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection

@section('form')
<div class="row">
    <div class="col-lg-12 d-flex mt-2">
        <div class="col-lg-4 px-2">
            <label>Fecha Inicio</label>
            <input type="text" class="form-control" name="fInicioTrabajo" value={{ $wasteBag->fechaInicioTrabajo }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha Fin</label>
            <input type="text" class="form-control" name="fFinTrabajo" value={{ $wasteBag->fechaFinTrabajo }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso</label>
            <input type="text" class="form-control" name="peso" value={{ $wasteBag->peso }} disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Largo</label>
            <input type="text" class="form-control" name="largo" value={{ $wasteBag->largo }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Temperatura</label>
            <input type="text" class="form-control" name="temperatura" value={{ $wasteBag->temperatura }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Velocidad</label>
            <input type="text" class="form-control" name="velocidad" value={{ $wasteBag->velocidad }} disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Status</label>
            <input type="text" class="form-control" name="status" value={{ $wasteBag->status }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Tipo Unidad</label>
            <input type="text" class="form-control" name="tipoUnidad" value={{ $wasteBag->tipoUnidad }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Cantidad</label>
            <input type="text" class="form-control" name="cantidad" value={{ $wasteBag->cantidad }} disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-12 px-2">
            <label>Observaciones</label>
            <textarea rows="3" class="form-control" name="observaciones" disabled>{{ $wasteBag->observaciones }}</textarea>
        </div>  
    </div>

    <div class="col-lg-12 d-flex mt-5">
        <h3>Rollo <a href="{{route('ribbon.show', $ribbon->id)}}"><small>Ver Rollo</small></a> </h3>
        </div>
        
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="coilNomenclatura" value="{{$ribbon->nomenclatura}}" disabled>
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Adquisición</label>
                <input type="datetime" class="form-control" name="coilfArribo" value="{{$ribbon->fechaInicioTrabajo}}" disabled>
            </div>
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <input type="text" class="form-control" name="coilStatus" value="{{$ribbon->status}}" disabled>
            </div>
        </div>

    <div class="col-lg-12 d-flex mt-5">
        <h3>Bobina <a href="{{route('coil.show', $coil->id)}}"><small>Ver Bobina</small></a> </h3>
        </div>
        
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="coilNomenclatura" value="{{$coil->nomenclatura}}" disabled>
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Adquisición</label>
                <input type="datetime" class="form-control" name="coilfArribo" value="{{$coil->fArribo}}" disabled>
            </div>
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <input type="text" class="form-control" name="coilStatus" value="{{$coil->status}}" disabled>
            </div>
        </div>

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-danger mx-3" href="{{ route('ribbonProduct.index') }}">Cancelar</a>
        <button type="submit" class="btn btn-success mx-3">Guardar</button>
    </div>    
</div>
@endsection
