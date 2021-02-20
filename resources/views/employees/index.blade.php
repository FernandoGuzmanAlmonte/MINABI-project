@extends('layouts.tablaIndex')

@section('title', 'Empleados')

@section('imgUrl',  asset('images/empleado.svg'))

@section('namePage', 'Empleados')

@section('route', route('employee.create'))

@section('table')
<tr>
    <th scope="col"> # </th>
    <th scope="col"> Nombre </th>
    <th scope="col"> Teléfono </th>
    <th scope="col"> Status </th>
    <th scope="col"> <span class="sr-only"> (botonConsultar) </span> </th>
</tr>
</thead>
<tbody>
    @foreach ($employees as $employee)
    <tr>
        <th scope="row" class="align-middle"> {{ $employee->id }} </th>
        <td class="align-middle"> {{ $employee->nombre }} </td>
        <td class="align-middle"> {{ $employee->telefono }} </td>
        <td class="align-middle"> 
            <label class="btn btn-outline-{{ ($employee->status == 'ACTIVO') ? 'success' : 'danger' }} m-0">
                {{$employee->status}}
            </label>
        </td>
        <td><a href="{{ route('employee.show', $employee) }}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    </tr>
    @endforeach
@endsection