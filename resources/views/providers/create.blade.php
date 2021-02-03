@extends('layouts.formulario')

@section('title', 'Proveedores')

@section('namePage', 'Proveedores')

@section('form')
   <div class="row">
        <div class="col-lg-12"> 
            <form action="">
                @csrf
                <div class="col-lg-12 d-flex mt-2">
                    <div class="col-lg-4 px-2">
                        <label>Nombre empresa</label>
                        <input type="text" class="form-control" name="nombre empresa">
                    </div>
                    <div class="col-lg-4 px-2">
                        <label>Dirección</label>
                        <input type="text" class="form-control" name="direccion">
                    </div>
                    <div class="col-lg-4 px-2">
                        <label>Pagina web</label>
                        <input type="text" class="form-control" name="pagina web">
                    </div>
                </div>

                <div class="col-lg-12 d-flex mt-3">
                    <div class="col-lg-4 px-2">
                        <label>Estado</label>
                        <input type="text" class="form-control" >
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-danger mx-3">Cancelar</button>
                    <button type="submit" class="btn btn-success mx-3">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <!--<div class="form-group row">
        <label for="" class="col-2 col-form-label">Nombre</label>
        <input type="text" placeholder="escribe aqui" class="form-control col-10">
    </div>-->

@endsection


