@extends('layouts.plantilla')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="mt-5"><img src="@yield('imgUrl')" class="iconoTitle"> @yield('namePage') </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success float-right my-3" href="@yield('route')"> Nuevo </a>
        </div>
    </div> 
    
<!-- Filtrado -->
    @yield('filtrado')
    
<!-- tabla -->
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped my-4" >
                <thead class="bg-info">
                <!--info de cada tabla-->
                    @yield('table')
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
            @yield('paginacion')
        </div>
    </div>
</div>
@endsection