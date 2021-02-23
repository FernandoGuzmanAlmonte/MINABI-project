@extends('layouts.formulario')

@section('title', 'Rollo')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Rollo')

@section('retornar')
<a href="{{route('coilProduct.index')}}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection
    
@section('form')
    <div class="row">
    <div class="col-lg-12 d-flex mt-2"> 
        <div class="col-lg-4 px-2">
            <label>Nomenclatura</label>
            <input type="text" class="form-control" name="nomenclatura" value="{{$ribbon->nomenclatura}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Status</label>
            <input type="text" class="form-control" name="status" value="{{$ribbon->status}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Quien Elaboro</label>
            <input type="text" class="form-control" name="employee_id" value="{{$ribbon->employee_id}}"  disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Peso (KG)</label>
            <input type="text" class="form-control" name="peso" value="{{$ribbon->peso}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha Inicio</label>
            <input type="text" class="form-control" name="fechaInicioTrabajo" value="{{$ribbon->fechaInicioTrabajo}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Hora Inicio</label>
            <input type="time" class="form-control" name="horaInicioTrabajo" value="{{$ribbon->horaInicioTrabajo}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Fecha Termino</label>
            <input type="text" class="form-control" name="fechaFinTrabajo" value="{{$ribbon->fechaFinTrabajo}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Hora Termino</label>
            <input type="time" class="form-control" name="horaFinTrabajo" value="{{$ribbon->horaFinTrabajo}}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso Utilizado (KG)</label>
            <input type="datetime" class="form-control" name="pesoUtilizado" value="{{$ribbon->pesoUtilizado}}" disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
    <div class="col-lg-4 px-2">
        <label>Largo (metros)</label>
        <input type="text" class="form-control" name="largo" value="{{$ribbon->largo}}" disabled>
    </div>
    <div class="col-lg-4 px-2">
        <label>Temperatura (C°)</label>
        <input type="text" class="form-control" name="temperatura" value="{{$ribbon->temperatura}}" disabled>
    </div>
    <div class="col-lg-4 px-2">
        <label>Velocidad</label>
        <input type="text" class="form-control" name="velocidad" value="{{$ribbon->velocidad}}" disabled>
    </div>
</div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Cintilla Blanca</label>
            <input type="number" class="form-control" name="white_ribbon_id" value="{{$ribbon->white_ribbon_id}}" disabled>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-4">
        <div class="col-lg-12 px-2">
            <label>Observaciones</label>
            <textarea rows="3" class="form-control" name="observaciones" disabled>{{$ribbon->observaciones}}</textarea>
        </div>
    </div>

    <div class="col-lg-12 mt-4 mb-2">
        <h3><img src="{{ asset('images/empleado.svg') }}" class="iconoTitle"> Empleados</h3>
        <table class="table table-striped my-4" >
            <thead class="bg-info">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Satus</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($ribbon->employees as $employee)
                    <tr>
                        <th scope="row" class="align-middle">{{$employee->id}}</th>
                        <td class="align-middle">{{$employee->nombre}}</td>
                        <td class="align-middle">{{$employee->status}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-12 mt-2 mb-2 text-center">
        <a class="btn btn-warning mx-3" href="{{route('ribbon.edit', $ribbon->id)}}">Editar</a>
    </div>

    <div class="col-lg-12 d-flex mt-5">
    <h3><img src="{{ asset('images/rollo-de-papel.svg') }}" class="iconoTitle">Bobina <a href="{{route('coil.show', $coil->id)}}"><small>Ver Bobina</small></a> </h3>
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

    
    <div class="col-lg-12 my-5">
        <h3><img src="{{ asset('images/bolsa-de-papel.svg') }}" class="iconoTitle"> Bolsas y Mermas de Bolsa</h3>
        <a class="btn btn-success float-right mb-3"  data-toggle="modal" data-target="#createProduct">Nueva Bolsa</a>
        
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
            @foreach ($bag as $item)
    
            <tr>
                <th scope="row" class="align-middle">{{$item->id}}</th>
                <td class="align-middle">{{$item->nomenclatura}}</td>
                <td class="align-middle">{{$item->fechaInicioTrabajo}}</td>
                <td class="align-middle"><label class="btn btn-outline-success m-0">{{$item->status}}</label></td>
               <!--Realizamos if para validacion de adonde dirgir el show-->
            @if ($item->ribbon_product_type == 'App\Models\Bag')
            <td><a href="{{route('bag.show',$item->ribbon_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
            @elseif($item->ribbon_product_type == 'App\Models\WasteBag')
            <td><a href="{{route('wasteBag.show',$item->ribbon_product_id)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
            @endif
            </tr>
          @endforeach
        </tbody>
        </table>
    @include('ribbons.modalTypeSelection')
</div>

@endsection