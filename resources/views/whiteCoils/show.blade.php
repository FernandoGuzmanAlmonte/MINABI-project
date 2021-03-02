@extends('layouts.formulario')

@section('title', 'Bobinas de cinta blanca')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Bobinas de cinta blanca')

@section('retornar')
<a href="{{route('whiteCoil.index')}}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection
    
@section('form')
    <div class="row">
    <div class="col-lg-12 d-flex mt-2"> 
        <div class="col-lg-4 px-2">
            <label>Nomenclatura</label>
            <input type="text" class="form-control" name="nomenclatura" value="{{$whiteCoil->nomenclatura}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha llegada</label>
            <input type="datetime" class="form-control" name="fArribo" value="{{$whiteCoil->fArribo}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Tipo bobina</label>
            <input type="text" class="form-control" name="coil_type_id" value="{{(($coilType = $whiteCoil->coilType) != null) ? $coilType->alias : ''}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Proveedor</label>
            <input type="text" class="form-control" name="provider_id" value="{{(($provider = $whiteCoil->provider) != null) ? $provider->nombreEmpresa : ''}}" disabled>
        </div>
        <div class="col-lg-4 px-2 disponible">
            <label>Status</label>
            <input type="datetime" class="form-control" name="status" value="{{$whiteCoil->status}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Costo</label>
            <input type="number" step="0.0001" class="form-control" name="costo" value="{{$whiteCoil->costo}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Peso (Kg)</label>
            <input type="text" class="form-control" name="peso" value="{{$whiteCoil->peso}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso Utilizado (Kg)</label>
            <input type="text" class="form-control" name="pesoUtilizado" value="{{$whiteCoil->pesoUtilizado}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-4">
        <div class="col-lg-12 px-2">
            <label>Observaciones</label>
            <textarea rows="3" class="form-control" name="observaciones" disabled>{{$whiteCoil->observaciones}}</textarea>
        </div>
    </div>
    <div class="col-12 mt-5 text-center">
        <a class="btn btn-warning mx-3 mb-5" href="{{route('whiteCoil.edit', $whiteCoil->id)}}">Editar</a>
    </div>
    <div class="col-lg-12 my-3">
    <h3><img src="{{ asset('images/cinta.svg') }}" class="iconoTitle"> Rollos de Cinta </h3>
    <a class="btn btn-success float-right mb-3"  data-toggle="modal" data-target="#createProduct">Nueva Cinta</a>
    <!--Tabla para rollos de cinta relacionados-->
    <table class="table table-striped my-4" >
        <thead class="bg-info">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nomenclatura</th>
        <th scope="col">Peso</th>
        <th scope="col">Fecha Adquisición</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($whiteRibbons as $item)
        <tr>
            <th scope="row" class="align-middle">{{$item->id}}</th>
            <td class="align-middle">{{$item->nomenclatura}}</td>
            <td class="align-middle">{{$item->peso}}</td>
            <td class="align-middle">{{$item->fAdquisicion}}</td>
            <td class="align-middle">
                <label class="btn btn-outline-{{ ($item->status == 'DISPONIBLE') ? 'success' : 'danger' }} m-0">
                    {{$item->status}}
                </label>
            </td>
           <!--Realizamos if para validacion de adonde dirgir el show-->
        @if ($item->white_coil_product_type == 'App\Models\WhiteRibbon')
        <td><a href="{{route('whiteRibbon.show',$item->white_coil_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
        @elseif($item->white_coil_product_type == 'App\Models\WhiteWaste')
        <td><a href="{{route('whiteWaste.show',$item->white_coil_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
        @endif
        </tr>
      @endforeach
    </tbody>
    </table>

<!--Tabla para bolsas relacionadas-->
<h3 class="mt-5"> <img src="{{ asset('images/bolsa-de-papel.svg') }}" class="iconoTitle"> Bolsas </h3>
<table class="table table-striped my-4" >
    <thead class="bg-info">
<tr>
    <th scope="col">#</th>
    <th scope="col">Nomenclatura</th>
    <th scope="col">Fecha Adquisición</th>
    <th scope="col">Status</th>
    <th scope="col"></th>
  </tr>
</thead>
<tbody>
    @foreach ($whiteRibbonProduct as $item)

    <tr>
        <th scope="row" class="align-middle">{{$item->id}}</th>
        <td class="align-middle">{{$item->nomenclatura}}</td>
        <td class="align-middle">{{$item->fAdquisicion}}</td>
        <td class="align-middle"><label class="btn btn-outline-{{ ($item->status == 'DISPONIBLE') ? 'success' : 'danger' }} m-0">{{$item->status}}</label></td>
       <!--Realizamos if para validacion de adonde dirgir el show-->
    @if ($item->white_ribbon_product_type == 'App\Models\Bag')
    <td><a href="{{route('bag.show',$item->ribbon_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    @elseif($item->white_ribbon_product_type == 'App\Models\WhiteWasteRibbon')
    <td><a href="{{route('whiteWasteRibbon.show',$item->white_ribbon_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    @elseif($item->white_ribbon_product_type == 'App\Models\WhiteRibbonReel')
    <td><a href="{{route('whiteRibbonReel.show',$item->white_ribbon_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    @endif
    </tr>
  @endforeach
</tbody>
</table>    
</div>
</div>
@include('whiteCoils.modalTypeSelection')

@endsection