@extends('layouts.formulario')

@section('title', 'Rol')

@section('imgUrl',  asset('images/usuario.svg'))

@section('namePage', 'Rol')

@section('retornar')
<a href="{{route('rol.index')}}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection
    
@section('form')
<div class="row">
    <div class="col-lg-12 d-flex mt-2">
        <div class="col-lg-8 px-2">
            <label>Nombre del permiso</label>
            <input type="text" class="form-control" name="name" value="{{$rol->name}}" readonly>
            @error('name')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
        </div>
    </div>
    <div class="col-lg-12 mt-2">
        @foreach ($permisos as $permiso)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" readonly checked>
            <label class="form-check-label" for="flexCheckDefault">
            {{$permiso->name}}
            </label>
          </div>
        @endforeach
    </div>
    @can('rol.edit')
    <div class="col-12 mt-4 mb-4 text-center">
        <a class="btn btn-warning mx-3" href="{{route('rol.edit', $rol)}}">Editar</a>
    </div>   
    @endcan
</div>
@endsection