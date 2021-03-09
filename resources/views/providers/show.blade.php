@extends('layouts.formulario')

@section('title', 'Proveedores')

@section('imgUrl',  asset('images/proveedor.svg'))

@section('namePage', 'Proveedor ' . $provider->id)

@section('retornar')
<a href="{{ route('provider.index') }}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection

@section('form')
<div class="row">
    <div class="col-lg-12 d-flex mt-2">
        <div class="col-lg-4 px-2">
            <label>Nombre Empresa</label>
            <input type="text" class="form-control" name="nombreEmpresa" value="{{ $provider->nombreEmpresa }}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Dirección</label>
            <input type="text" class="form-control" name="direccion" value="{{ $provider->direccion }}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Pagina web</label>
            <input type="text" class="form-control" name="paginaWeb" value="{{ $provider->paginaWeb }}" disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Estado</label>
            <input type="text" class="form-control" name="estado" value="{{ $provider->estado }}" disabled>
        </div>
    </div>
    <div class="col-12 mt-3 text-center">
        <a class="btn btn-warning mx-3" href="{{ route('provider.edit', $provider) }}">Editar</a>
    </div>
    
    <div class="col-lg-12 d-flex mt-5">
        <div class="col-lg-6 px-2 float-left">
            <h3><img src="{{ asset('images/contactos.svg') }}" class="iconoTitle"> Contactos </h3>
        </div>
        <div class="col-lg-6 px-2 mt-2 float-left">
            <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#create">
                Añadir Contacto
            </button>
        </div>
    </div>
    <div class="col-lg-12">   
    {{-- Modal de contactos --}}
        @include('contacts.create')
    {{-- Modal de contactos --}}
    
    {{-- Index de contactos --}}
        @include('contacts.index')
    {{-- Index de contactos --}}    
    </div>
    <div class="col-lg-12 d-flex mt-5">
        <div class="col-lg-6 px-2 float-left">
            <h3><img src="{{ asset('images/bobina.svg') }}" class="iconoTitle"> Bobinas </h3>
        </div>
       {{-- <div class="col-lg-6 px-2 mt-2 float-left">
            <a type="button" class="btn btn-success float-right mb-3" href="{{ route('coil.createFromProvider', $provider->id) }}">
                Añadir Bobina
            </a>
        </div>--}}
    </div>
    <div class="col-lg-12 d-flex">
        <table class="table table-striped mt-1 mb-5" >
            <thead class="bg-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nomenclatura</th>
                    <th scope="col">Fecha Adquisición</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coils as $coil)
                <tr>
                    <th scope="row" class="align-middle">{{$coil->id}}</th>
                    <td class="align-middle">{{$coil->nomenclatura}}</td>
                    <td class="align-middle">{{$coil->fArribo}}</td>
                    <td class="align-middle">{{$coil->coil_type_id}}</td>
                    <td class="align-middle">
                        <label class="btn btn-outline-{{ ($coil->status == 'DISPONIBLE') ? 'success' : 'danger' }} m-0">
                            {{$coil->status}}
                        </label>
                    </td>
                    <td><a href="{{route('coil.show', $coil, )}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


