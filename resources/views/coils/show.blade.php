@extends('layouts.formulario')

@section('title', 'Bobinas')

@section('imgUrl',  asset('images/bobina.svg'))

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
            <input type="text" class="form-control" name="idTipoBobina" value="{{$coil->coilType->alias}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Proveedor</label>
            <input type="text" class="form-control" name="provider_id" value="{{$coil->provider->nombreEmpresa}}" disabled>
        </div>
        <div class="col-lg-4 px-2 disponible">
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
    <div class="col-12 mt-5 text-center">
        <a class="btn btn-warning mx-3 mb-5" href="{{route('coil.edit', $coil->id)}}">Editar</a>
        <button class="btn btn-danger mx-3 mb-5"  onclick="terminar({{$coil->id}})" href="{{route(asset('coil.terminar'), $coil->id)}}">Terminar</button>
        @if($errors->any())
        <div class="col-12 mt-3 text-center">
            <br>
                <div class="alert alert-danger">
                    {{$errors->first()}}
                </div>
                <br>
        </div>
        @endif
    </div>
    <div class="col-lg-12 my-3">
    <h3><img src="{{ asset('images/rollo-de-papel.svg') }}" class="iconoTitle"> Rollos </h3>
    <a class="btn btn-success float-right mb-3"  data-toggle="modal" data-target="#createProduct">Nuevo Rollo</a>
    <!--Tabla para rollos relacionados-->
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
        @foreach ($ribbons as $item)
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
        @if ($item->coil_product_type == 'App\Models\Ribbon')
        <td><a href="{{route('ribbon.show',$item->coil_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
        @elseif($item->coil_product_type == 'App\Models\WasteRibbon')
        <td><a href="{{route('wasteRibbon.show',$item->coil_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
        @elseif($item->coil_product_type == 'App\Models\CoilReel')
        <td><a href="{{route('coilReel.show',$item->coil_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
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
    <th scope="col">Peso</th>
    <th scope="col">Medida</th>
    <th scope="col">Fecha Adquisición</th>
    <th scope="col">Status</th>
    <th scope="col"></th>
  </tr>
</thead>
<tbody>
    @foreach ($ribbonProduct as $item)

    <tr>
        <th scope="row" class="align-middle">{{$item->id}}</th>
        <td class="align-middle">{{$item->nomenclatura}}</td>
        <td class="align-middle">{{$item->peso}}</td>
        <td class="align-middle">{{$item->medidaBolsa}}</td>
        <td class="align-middle">{{$item->fAdquisicion}}</td>
        <td class="align-middle"><label class="btn btn-outline-{{ ($item->status == 'DISPONIBLE') ? 'success' : 'danger' }} m-0">{{$item->status}}</label></td>
       <!--Realizamos if para validacion de adonde dirgir el show-->
    @if ($item->ribbon_product_type == 'App\Models\Bag')
    <td><a href="{{route('bag.show',$item->ribbon_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    @elseif($item->ribbon_product_type == 'App\Models\WasteBag')
    <td><a href="{{route('wasteBag.show',$item->ribbon_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    @elseif($item->ribbon_product_type == 'App\Models\RibbonReel')
    <td><a href="{{route('ribbonReel.show',$item->ribbon_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    @endif
    </tr>
  @endforeach
</tbody>
</table>    
</div>
</div>
@include('coils.modalTypeSelection')
<script type="text/javascript">
    function terminar(id){
        var opcion = confirm("¿Esta seguro que desea terminar la bobina?");
        if (opcion == true) {
        location.replace ("http://bolsasdecelofanminabi.com.mx/coil/terminar/"+id)
	    } 
    }
</script>

@endsection