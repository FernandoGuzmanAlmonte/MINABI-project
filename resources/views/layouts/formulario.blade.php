@extends('layouts.plantilla')

@section('content')
    <div class="container">
        <img src="@yield('imgUrl')">
        <h1> @yield('namePage') </h1>
        <h3> Información General </h3>
    <!-- Formulario -->
        @yield('form')
    </div>
@endsection

    