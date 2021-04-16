@extends('layouts.formulario')

@section('title', 'Empleados')

@section('imgUrl',  asset('images/empleado.svg'))

@section('namePage', 'Empleado ' . $employee->nombre)

@section('retornar')
<a href="{{ route('employee.index') }}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection

@section('form')
<div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-2">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $employee->nombre }}" disabled>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-2">
            <label>Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fNacimiento" value="{{ $employee->fNacimiento }}" disabled>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-2">
            <label>Fecha de Ingreso</label>
            <input type="date" class="form-control" name="fIngreso" value="{{ $employee->fIngreso }}" disabled>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
            <label>Años de Antigüedad</label>
            <input type="number" class="form-control" name="antiguedad" value="{{ $employee->antiguedad }}" disabled>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
            <label>Sueldo por Hora</label>
            <input type="number" step="0.0001" class="form-control" name="sueldoHora" value="{{ $employee->sueldoHora }}" disabled>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
            <label>Teléfono</label>
            <input type="number" class="form-control" name="telefono" value="{{ $employee->telefono }}" disabled>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
            <label>Status</label>
            <input type="text" class="form-control" name="status" value="{{ $employee->status }}" disabled>
        </div>

    @can('employee.edit')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 text-center">
        <a class="btn btn-warning mx-3" href="{{route('employee.edit', $employee)}}">Editar</a>
    </div>   
    @endcan
</div>
@endsection
