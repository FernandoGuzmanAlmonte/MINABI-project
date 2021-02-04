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
<!-- comento las lineas de codigo
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    

-->
</head>
<body>
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">
            <img src={{ asset('images/logotipo.png') }} width="30" height="43" class="d-inline-block align-center" alt="">
            <b> MINABI </b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/">
                    Proveedores
                </a>
                <a class="nav-item nav-link disabled" href="/">
                    Catálogos
                </a>
                <a class="nav-item nav-link disabled" href="/">
                    Cintilla
                </a>
                <a class="nav-item nav-link" href="/">
                    Bobinas
                </a>
                <a class="nav-item nav-link disabled" href="/">
                    Rollos
                </a>
                <a class="nav-item nav-link disabled" href="/">
                    Bolsas
                </a>
                <a class="nav-item nav-link disabled" href="/">
                    Rollos Cintilla
                </a>
            </div>
        </div>
    </nav>
<!-- Contenido -->
    @yield('content')    
    <script src="{{ asset('js/app.js') }}" defer></script>  
</body>
</html>