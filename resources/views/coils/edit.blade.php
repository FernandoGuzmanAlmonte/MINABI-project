@extends('layouts.formulario')

@section('title', 'Bobinas')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Bobinas ' . $coil->nomenclatura)

@section('form')
<form action="{{route('coil.update', $coil)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
    <div class="col-lg-12 d-flex mt-2"> 
        <div class="col-lg-4 px-2">
            <label>Nomenclatura</label>
            <input type="text" class="form-control" name="nomenclatura" value="{{$coil->nomenclatura}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha llegada</label>
            <input type="datetime" class="form-control" name="fArribo" value="{{$coil->fArribo}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Tipo bobina</label>
            <input type="text" class="form-control" name="idTipoBobina" value="{{$coil->coil_type_id}}">
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Proveedor</label>
            <input type="text" class="form-control" name="provider_id" value="{{$coil->provider_id}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Status</label>
            <input type="datetime" class="form-control" name="status" value="{{$coil->status}}" readonly>
        </div>
        <div class="col-lg-4 px-2">
            <label>Largo (metros)</label>
            <input type="number" step="0.0001" class="form-control" name="largoM" value="{{$coil->largoM}}">
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Peso Bruto (Kg)</label>
            <input type="number" step="0.0001" class="form-control" name="pesoBruto" value="{{$coil->pesoBruto}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso Neto (Kg)</label>
            <input type="number" step="0.0001" class="form-control" name="pesoNeto" value="{{$coil->pesoNeto}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso Utilizado (Kg)</label>
            <input type="number" step="0.0001"class="form-control" name="pesoUtilizado" value="{{$coil->pesoUtilizado}}">
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Diametro Exterior</label>
            <input type="number" step="0.0001" class="form-control" name="diametroExterno" value="{{$coil->diametroExterno}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Diametro Bobina</label>
            <input type="number" step="0.0001" class="form-control" name="diametroBobina"value="{{$coil->diametroBobina}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Diametro Interior</label>
            <input type="number" step="0.0001" class="form-control" name="diametroInterno" value="{{$coil->diametroInterno}}">
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Costo</label>
            <input type="number" step="0.0001" class="form-control" name="costo" value="{{$coil->costo}}">
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-4">
        <div class="col-lg-12 px-2">
            <label>Observaciones</label>
            <textarea rows="3" class="form-control" name="observaciones">{{$coil->observaciones}}</textarea>
        </div>
    </div>

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-danger mx-3" href="{{route('coil.show', $coil->id)}}">Cancelar</a>
        <button type="submit" class="btn btn-success mx-3">Guardar</button>
    </div>
</div>
</form>
@endsection