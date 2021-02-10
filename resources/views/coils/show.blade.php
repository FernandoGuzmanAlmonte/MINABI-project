@extends('layouts.formulario')

@section('title', 'Bobinas')

@section('imgUrl',  asset('images/base-de-datos.svg'))

@section('namePage', 'Bobinas')

@section('retornar')
<a href="{{route('coil.index')}}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection
    
@section('form')
    <div class="row">
    <div class="col-lg-12 d-flex mt-2"> 
        <div class="col-lg-4 px-2">
            <label>Nomenclatura</label>
            <input type="text" class="form-control" name="nomenclatura" value="{{$coil->nomenclatura}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha llegada</label>
            <input type="datetime" class="form-control" name="fArribo" value="{{$coil->fArribo}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Tipo bobina</label>
            <input type="text" class="form-control" name="idTipoBobina" value="{{$coil->coil_type_id}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Proveedor</label>
            <input type="text" class="form-control" name="provider_id" value="{{$coil->provider_id}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Status</label>
            <input type="datetime" class="form-control" name="status" value="{{$coil->status}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Largo (metros)</label>
            <input type="text" class="form-control" name="largoM" value="{{$coil->largoM}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Peso Bruto (Kg)</label>
            <input type="text" class="form-control" name="pesoBruto" value="{{$coil->pesoBruto}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso Neto (Kg)</label>
            <input type="datetime" class="form-control" name="pesoNeto" value="{{$coil->pesoNeto}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso Utilizado (Kg)</label>
            <input type="text" class="form-control" name="pesoUtilizado" value="{{$coil->pesoUtilizado}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Diametro Exterior</label>
            <input type="text" class="form-control" name="diametroExterno" value="{{$coil->diametroExterno}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Diametro Bobina</label>
            <input type="datetime" class="form-control" name="diametroBobina"value="{{$coil->diametroBobina}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Diametro Interior</label>
            <input type="text" class="form-control" name="diametroInterno" value="{{$coil->diametroInterno}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Costo</label>
            <input type="text" class="form-control" name="costo" value="{{$coil->costo}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-4">
        <div class="col-lg-12 px-2">
            <label>Observaciones</label>
            <textarea rows="3" class="form-control" name="observaciones" disabled>{{$coil->observaciones}}</textarea>
        </div>
    </div>

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-warning mx-3" href="{{route('coil.edit', $coil->id)}}">Editar</a>
    </div>
</div>

@endsection