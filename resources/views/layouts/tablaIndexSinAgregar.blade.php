@extends('layouts.plantilla')

@section('content')
<div class="container">
    
    <h1 class="mt-5"><img src="@yield('imgUrl')" class="iconoTitle"> @yield('namePage') </h1>

<!-- Filtrado -->
    @yield('filtrado')

<!-- tabla -->
<table class="table table-striped my-4" >
    <thead class="bg-info">
        <!--info de cada tabla-->
        @yield('table')
      
    </tbody>
  </table>

</div>
@endsection