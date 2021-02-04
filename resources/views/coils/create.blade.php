@extends('layouts.formulario')

@section('title', 'Bobinas')

@section('namePage', 'Bobinas')

@section('form')
<form action="{{route('coil.store')}}" method="POST">
    @csrf
    <div class="row">
    <div class="col-lg-12 d-flex mt-2">
        <div class="col-lg-4 px-2">
            <label>Nomenclatura</label>
            <input type="text" class="form-control" name="nomenclatura">
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha llegada</label>
            <input type="datetime" class="form-control" name="fArribo" >
        </div>
        <div class="col-lg-4 px-2">
            <label>Tipo bobina</label>
            <input type="text" class="form-control" name="idTipoBobina">
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Proveedor</label>
            <input type="text" class="form-control" name="provider_id" >
        </div>
        <div class="col-lg-4 px-2">
            <label>Status</label>
            <input type="datetime" class="form-control" name="status">
        </div>
        <div class="col-lg-4 px-2">
            <label>Largo (metros)</label>
            <input type="text" class="form-control" name="largoM">
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Peso Bruto (Kg)</label>
            <input type="text" class="form-control" name="pesoBruto">
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso Neto (Kg)</label>
            <input type="datetime" class="form-control" name="pesoNeto">
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso Utilizado (Kg)</label>
            <input type="text" class="form-control" name="pesoUtilizado">
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Diametro Exterior</label>
            <input type="text" class="form-control" name="diametroExterno">
        </div>
        <div class="col-lg-4 px-2">
            <label>Diametro Bobina</label>
            <input type="datetime" class="form-control" name="diametroBobina">
        </div>
        <div class="col-lg-4 px-2">
            <label>Diametro Interior</label>
            <input type="text" class="form-control" name="diametroInterno">
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Costo</label>
            <input type="text" class="form-control" name="costo">
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-4">
        <div class="col-lg-4 px-2">
            <label>Observaciones</label>
            <input type="text" class="form-control" name="observaciones">
        </div>
    </div>

    <div class=" col-12 mt-3 text-center">
        <button class="btn btn-danger mx-3">Cancelar</button>
        <button type="submit" class="btn btn-success mx-3">Guardar</button>
    </div>
</div>
</form>
@endsection
