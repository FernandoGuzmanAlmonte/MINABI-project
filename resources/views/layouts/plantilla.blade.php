<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Shortcut icon -->
    <link rel="shortcut icon" href="{{ asset('images/logotipo.png') }}">

<!-- Título -->
    <title> @yield('title') </title>

<!-- Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- HTML -->
    <link rel="stylesheet" href="{{ asset('css/general.css') }}"/>

</head>
<body>
<!-- Navbar -->
    @include('layouts.partials.header')
<!-- Contenido -->
    @yield('content')
 <!-- Scripts -->       
    <script src="{{ asset('js/app.js') }}" defer></script> 
    @yield('scripts')
</body>
</html>