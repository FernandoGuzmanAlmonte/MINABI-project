@extends('layouts.formulario')

@section('title', 'Merma de Bolsas')

@section('imgUrl',  asset('images/bolsa-de-papel.svg'))

@section('namePage', 'Merma de Bolsas')

@section('retornar')
<a href="{{ route('ribbonProduct.index') }}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection

@section('form')
<div class="row">
    <div class="col-lg-12 d-flex mt-2">
        <div class="col-lg-4 px-2">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" value={{ $employee->nombre }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fNacimiento" value={{ $employee->fNacimiento }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha de Ingreso</label>
            <input type="date" class="form-control" name="fIngreso" value={{ $employee->fIngreso }} disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Años de Antigüedad</label>
            <input type="number" class="form-control" name="antiguedad" value={{ $employee->antiguedad }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Sueldo x Hora</label>
            <input type="number" step="0.0001" class="form-control" name="sueldoHora" value={{ $employee->sueldoHora }} disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Télefono</label>
            <input type="number" class="form-control" name="telefono" value={{ $employee->telefono }} disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Status</label>
            <input type="text" class="form-control" name="status" value={{ $employee->status }} disabled>
        </div>
    </div>

    <div class="col-12 mt-4 mb-4 text-center">
        <a class="btn btn-warning mx-3" href="{{route('employee.edit', $employee)}}">Editar</a>
    </div>   
</div>
@endsection
