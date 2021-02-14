@extends('layouts.formulario')

@section('title', 'Rollo')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Rollo')

@section('retornar')
<a href="{{route('coilReel.index')}}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection
    
@section('form')
    <div class="row">
    <div class="col-lg-12 d-flex mt-2"> 
        <div class="col-lg-4 px-2">
            <label>Nomenclatura</label>
            <input type="text" class="form-control" name="nomenclatura" value="{{$coilReel->nomenclatura}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso</label>
            <input type="text" class="form-control" name="tipo" >
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha Alta</label>
            <input type="date" class="form-control" name="status" value="{{$coilReel->fechaAlta}}" disabled>
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

    <div class="col-lg-12 d-flex mt-4">
        <div class="col-lg-12 px-2">
            <label>Observaciones</label>
            <textarea rows="3" class="form-control" name="observaciones" disabled>{{$coilReel->observaciones}}</textarea>
        </div>
    </div>

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-warning mx-3" href="{{route('coilReel.edit', $coilReel->id)}}">Editar</a>
    </div>
</div>

@endsection