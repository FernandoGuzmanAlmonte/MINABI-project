@extends('layouts.formulario')

@section('title', 'Hueso')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Hueso')

@section('retornar')
<a href="{{route('whiteRibbonProduct.index')}}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection
    
@section('form')
    <div class="row">
    <div class="col-lg-12 d-flex mt-2"> 
        <div class="col-lg-4 px-2">
            <label>Nomenclatura</label>
            <input type="text" class="form-control" name="nomenclatura" value="{{$whiteRibbonReel->nomenclatura}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso</label>
            <input type="text" class="form-control" name="peso" value="{{$whiteRibbonReel->peso}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha Alta</label>
            <input type="date" class="form-control" name="status" value="{{$whiteRibbonReel->fechaAlta}}" disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-2">
        <div class="col-lg-4 px-2">
            <label>Status</label>
            <input type="text" class="form-control" name="status" value="{{$whiteRibbonReel->status}}" disabled>
            @error('status')s
            <br>
            <div class="alert alert-danger">
                <small>{{$message}}</small>
            </div>
            <br>
        @enderror
        </div> 
    </div>
    <div class="col-lg-12 d-flex mt-4">
        <div class="col-lg-12 px-2">
            <label>Observaciones</label>
            <textarea rows="3" class="form-control" name="observaciones" disabled>{{$whiteRibbonReel->observaciones}}</textarea>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-5">
        <h3><img src="{{ asset('images/cinta.svg') }}" class="iconoTitle">Rollo <a href="{{route('whiteRibbon.show', $whiteRibbon->id)}}"><small>Ver Rollo</small></a> </h3>
        </div>
        
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="coilNomenclatura" value="{{$whiteRibbon->nomenclatura}}" disabled>
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Adquisición</label>
                <input type="datetime" class="form-control" name="coilfArribo" value="{{$whiteRibbon->fechaInicioTrabajo}}" disabled>
            </div>
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <input type="text" class="form-control" name="coilStatus" value="{{$whiteRibbon->status}}" disabled>
            </div>
        </div>

    <div class="col-lg-12 d-flex mt-5">
        <h3><img src="{{ asset('images/base-de-datos.svg') }}" class="iconoTitle">Bobina <a href="{{route('whiteCoil.show', $whiteCoil->id)}}"><small>Ver Bobina</small></a> </h3>
        </div>
        
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="coilNomenclatura" value="{{$whiteCoil->nomenclatura}}" disabled>
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Adquisición</label>
                <input type="datetime" class="form-control" name="coilfArribo" value="{{$whiteCoil->fArribo}}" disabled>
            </div>
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <input type="text" class="form-control" name="coilStatus" value="{{$whiteCoil->status}}" disabled>
            </div>
        </div>

    

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-warning mx-3" href="{{route('whiteRibbonReel.edit', $whiteRibbonReel->id)}}">Editar</a>
    </div>
</div>

@endsection