@extends('layouts.formulario')

@section('title', 'Merma de Bolsas')

@section('imgUrl',  asset('images/bolsa-de-papel.svg'))

@section('namePage', 'Editar Merma de Bolsas')

@section('form')
<form action="{{ route('employee.update', $employee) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ $employee->nombre }}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fNacimiento" value="{{ $employee->fNacimiento }}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha de Ingreso</label>
                <input type="date" class="form-control" name="fIngreso" value="{{ $employee->fIngreso }}">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Años de Antigüedad</label>
                <input type="number" class="form-control" name="antiguedad" value="{{ $employee->antiguedad }}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Sueldo x Hora</label>
                <input type="number" step="0.0001" class="form-control" name="sueldoHora" value="{{ $employee->sueldoHora }}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Teléfono</label>
                <input type="number" class="form-control" name="telefono" value="{{ $employee->telefono }}">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option {{ ($employee->status === 'ACTIVO') ? 'selected' : '' }} value="ACTIVO">
                        ACTIVO
                    </option>
                    <option {{ ($employee->status === 'DE BAJA') ? 'selected' : '' }} value="DE BAJA">
                        DE BAJA
                    </option>
                </select>
            </div>
        </div>
        <div class="col-12 mt-4 mb-4 text-center">
            <a class="btn btn-danger mx-3" href="{{ route('employee.show', $employee) }}">Cancelar</a>
            <button type="submit" class="btn btn-success mx-3">Guardar</button>
        </div>    
    </div>
</form>
@endsection


