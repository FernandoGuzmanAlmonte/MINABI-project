@extends('layouts.tablaIndex')

@section('title', 'Proveedores')

@section('imgUrl',  asset('images/proveedor.svg'))

@section('namePage', 'Proveedores')

@section('route', route('provider.create'))

@section('table')
<tr>
    <th scope="col"> # </th>
    <th scope="col"> Nombre Empresa </th>
    <th scope="col"> Teléfono </th>
    <th scope="col"> Dirección </th>
    <th scope="col"> <span class="sr-only"> (botonConsultar) </span> </th>
</tr>
</thead>
<tbody>
    @foreach ($providers as $provider)
    <tr>
        <th scope="row" class="align-middle"> {{ $provider->id }} </th>
        <td class="align-middle"> {{ $provider->nombreEmpresa }} </td>
        <td class="align-middle"> Télefono </td>
        <td class="align-middle"> {{ $provider->direccion }} </td>
        <td><a href="{{ route('provider.show', $provider) }}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    </tr>
    @endforeach
@endsection