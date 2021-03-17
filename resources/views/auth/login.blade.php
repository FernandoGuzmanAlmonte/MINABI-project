@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class=" justify-content-center mt-5 row">
                            <div class="col-lg-9">
                        <div class="row mt-4">
                            <div class="col-lg-1 d-flex">
                                <img src={{ asset('images/usuario.svg') }}  class="iconosLogin" style="width: 45px; height: 45px; align-self: center;" alt="">
                            </div>
                            <div class="col-lg-8">
                                <h6 class="text-info font-weight-bold">Usuario</h6>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-1 d-flex">
                                <img src={{ asset('images/bloquear.svg') }}  class="iconosLogin" style="width: 45px; height: 45px; align-self: center;" alt="">
                            </div>
                            <div class="col-lg-8">
                                <h6 class="text-info font-weight-bold">Contraseña</h6>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <!--    <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo electronico</label>

                            <div class="col-md-6">
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                
                            </div>
                        </div>-->

                        <div class="form-group row">
                            <div class="col-md-6 offset-lg-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Recordar Usuario
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-1">
                                <button type="submit" class="btn btn-primary">
                                    Iniciar sesion
                                </button>
                            </div>
                        </div>
</div>

<div class="col-lg-3 bg-info text-center">
    <img src={{ asset('images/logotipo.png') }} width="120" height="200" class="my-5" alt="">
</div>
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
