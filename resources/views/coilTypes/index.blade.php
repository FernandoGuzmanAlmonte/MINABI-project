@extends('layouts.tablaIndex')

@section('title', 'Medidas de Bobina')

@section('imgUrl',  asset('images/bobina.svg'))

@section('namePage', 'Medidas de Bobina')

@section('route', route('coilType.create'))

@section('table')
<tr>
    <th scope="col"> # </th>
    <th scope="col"> Alias </th>
    <th scope="col"> Largo </th>
    <th scope="col"> Ancho </th>
    <th scope="col"> Tipo </th>
    <th scope="col"> <span class="sr-only"> (botonConsultar) </span> </th>
</tr>
</thead>
<tbody>
    @foreach ($coilTypes as $coilType)
    <tr>
        <th scope="row" class="align-middle"> {{ $coilType->id }} </th>
        <td class="align-middle"> {{ $coilType->alias }} </td>
        <td class="align-middle"> {{ $coilType->largoM }} </td>
        <td class="align-middle"> {{ $coilType->anchoCm }} </td>
        <td class="align-middle"> {{ ($coilType->tipo == 'CELOFAN') ? 'CELOFÁN' : 'CENEFA'}} </td>
        <td><a href="{{ route('coilType.show', $coilType) }}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
    </tr>
    @endforeach
@endsection