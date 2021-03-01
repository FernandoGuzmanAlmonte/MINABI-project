@extends('layouts.formulario')

@section('title', 'Merma de Rollo de cinta blanca')

@section('imgUrl',  asset('images/cinta.svg'))

@section('namePage', 'Merma Rollo de cinta blanca')

@section('retornar')
<a href="{{route('whiteCoilProduct.index')}}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection
    
@section('form')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2"> 
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value="{{$whiteWaste->nomenclatura}}" disabled>
              
            </div>
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="N/A" disabled>      
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Arribo</label>
                <input type="date" class="form-control" name="fAlta" value="{{$whiteWaste->fAlta}}" disabled>
           
            </div>
        </div>
    
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Peso (KG)</label>
                <input type="number" step="0.0001" class="form-control" name="peso" value="{{$whiteWaste->peso}}" disabled>
           
            </div>
            <div class="col-lg-4 px-2">
                <label>Largo (metros)</label>
                <input type="number" class="form-control" name="largo" value="{{$whiteWaste->largo}}" disabled>
            </div> 
        </div>
    
        <div class="col-lg-12 d-flex mt-4">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones" disabled>{{$whiteWaste->observaciones}}</textarea>
            </div>
        </div>

        <div class="col-lg-12 d-flex mt-5">
            <h3><img src="{{ asset('images/base-de-datos.svg') }}" class="iconoTitle"> Bobina <a href="{{route('whiteCoil.show', $whiteCoil->id)}}"><small>Ver Bobina</small></a> </h3>
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
        <a class="btn btn-warning mx-3" href="{{route('whiteWaste.edit', $whiteWaste->id)}}">Editar</a>
    </div>
</div>

@endsection