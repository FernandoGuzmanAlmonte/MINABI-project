@extends('layouts.formulario')

@section('title', 'Proveedores')

@section('imgUrl',  asset('images/bolsa-de-papel.svg'))

@section('namePage', 'Bolsa ' . $bag->nomenclatura)

@section('retornar')
<a href="{{ route('ribbonProduct.index') }}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection

@section('form')
<div class="row">
    <div class="col-lg-12 d-flex mt-2">
        <div class="col-lg-4 px-2">
            <label>Nomenclatura</label>
            <input type="text" class="form-control" name="nomenclatura" value={{ $bag->nomenclatura }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Status</label>
            <input type="text" class="form-control" name="status" value={{ $bag->status }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Cantidad</label>
            <input type="text" class="form-control" name="cantidad" value={{ $bag->cantidad }} disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Proveedor</label>
            <!--<input type="text" class="form-control" name="proveedor" value= disabled>-->
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha Inicio</label>
            <input type="date" class="form-control" name="fechaInicioTrabajo" value={{ $bag->fechaInicioTrabajo }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Hora Inicio</label>
            <input type="time" class="form-control" name="horaInicioTrabajo" value={{ $bag->horaInicioTrabajo }} disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Medida</label>
            <input type="text" class="form-control" name="medida" value={{ $bag->medida }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha Termino</label>
            <input type="date" class="form-control" name="fechaFinTrabajo" value={{ $bag->fechaFinTrabajo }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Hora Termino</label>
            <input type="time" class="form-control" name="horaFinTrabajo" value={{ $bag->horaFinTrabajo }} disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Tipo de unidad</label>
            <input type="text" class="form-control" name="tipoUnidad" value={{ $bag->tipoUnidad }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso (Kg)</label>
            <input type="text" class="form-control" name="peso" value={{ $bag->peso }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Velocidad</label>
            <input type="text" class="form-control" name="velocidad" value={{ $bag->velocidad }} disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Quién elaboro</label>
            <!--<input type="text" class="form-control" name="estado" value=disabled>-->
        </div>
        <div class="col-lg-4 px-2">
            <label>Cliente Stock</label>
            <input type="text" class="form-control" name="clienteStock" value={{ $bag->clienteStock }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Temperatura</label>
            <input type="text" class="form-control" name="temperatura" value={{ $bag->temperatura }} disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">  
        <div class="col-lg-4 px-2">
            <label>Tiene Pestaña</label>
            <input type="text" class="form-control" name="status" value={{ $bag->pestania }} disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-12 px-2">
            <label>Observaciones</label>
            <textarea rows="3" class="form-control" name="observaciones" disabled>{{ $bag->observaciones }}</textarea>
        </div>  
    </div>

    <div class="col-lg-12 d-flex mt-5">
        <h3><img src="{{ asset('images/rollo-de-papel.svg') }}" class="iconoTitle">Rollo <a href="{{route('ribbon.show', $ribbon->id)}}"><small>Ver Rollo</small></a> </h3>
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
        <h3><img src="{{ asset('images/bobina.svg') }}" class="iconoTitle">Bobina <a href="{{route('coil.show', $coil->id)}}"><small>Ver Bobina</small></a> </h3>
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
        <a class="btn btn-warning mx-3" href="{{ route('bag.edit', $bag) }}">Editar</a>
    </div>
</div>
@endsection
