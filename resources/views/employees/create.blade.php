@extends('layouts.formulario')

@section('title', 'Registrar Empleado')

@section('imgUrl',  asset('images/empleado.svg'))

@section('namePage', 'Registrar Empleado')

@section('form')
<form action="{{ route('employee.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fNacimiento">
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha de Ingreso</label>
                <input type="date" class="form-control" name="fIngreso">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Años de Antigüedad</label>
                <input type="number" class="form-control" name="antiguedad">
            </div>
            <div class="col-lg-4 px-2">
                <label>Sueldo por Hora</label>
                <input type="number" step="0.0001" class="form-control" name="sueldoHora">
            </div>
            <div class="col-lg-4 px-2">
                <label>Télefono</label>
                <input type="number" class="form-control" name="telefono">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="ACTIVO" readonly>
                <!--<select class="form-control" name="status">
                    <option selected>--seleccione una opción--</option>
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="DE BAJA">DE BAJA</option>
                </select>-->
            </div>
        </div>
        <div class="col-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href={{ route('employee.index') }}>Cancelar</a>
            <button type="submit" class="btn btn-success mx-3">Guardar</button>
        </div>    
    </div>
</form>
@endsection


