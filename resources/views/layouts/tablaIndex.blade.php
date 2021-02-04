@extends('layouts.plantilla')

@section('content')
<div class="container">
    
    <h1 class="mt-5"><img src="@yield('imgUrl')" class="iconoTitle"> @yield('namePage') </h1>
    <a class="btn btn-success float-right my-3" href="@yield('route')"> Nuevo </a>
<!-- tabla -->
<table class="table table-striped my-4">
    <thead class="bg-info">
        <!--info de cada tabla-->
        @yield('table')
      
    </tbody>
  </table>
    @yield('form')
</div>
@endsection