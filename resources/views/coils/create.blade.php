@extends('layouts.formulario')

@section('title', 'Bobinas')

@section('imgUrl',  asset('images/base-de-datos.svg'))

@section('namePage', 'Bobinas')

@section('form')
<form action="{{route('coil.store')}}" method="POST">
    @csrf
    <div class="row">
    <div class="col-lg-12 d-flex mt-2">
        <div class="col-lg-4 px-2">
            <label>Nomenclatura</label>
            <input type="text" class="form-control" name="nomenclatura" value="{{old('nomenclatura')}}" id="nomenclaturas" readonly>
            @error('nomenclatura')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
        </div>
        <div class="col-lg-4 px-2">
            <label>Fecha llegada</label>
            <input type="date" class="form-control" name="fArribo" value="{{old('fArribo')}}" onblur="llenaNomen()" id="fArribo">
            @error('fArribo')
                <br>
                <div class="alert alert-danger">
                <small>{{$message}}</small>
                </div>
                <br>
            @enderror
        </div>
        <script type="text/javascript">
            function llenaNomen(){
                var fecha = document.getElementById("fArribo");
                var folio =  document.getElementById("nomenclaturas");
                fecha = fecha.value.replace(/-/g, "");
                folio.value = "MNB"+fecha.substring(6,8)+fecha.substring(4,6)+fecha.substring(1,4);
            }
        </script>
        <div class="col-lg-4 px-2">
            <label>Tipo bobina</label>
            <input type="text" class="form-control" name="coil_type_id" value="1" readonly >
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Proveedor</label>
            <input type="text" class="form-control" name="provider_id" value="{{$provider->nombreEmpresa}}" readonly>
            @error('provider_id')
                <br>
                <div class="alert alert-danger">
                <small>{{$message}}</small>
                </div>
                <br>
            @enderror
        </div>
        <div class="col-lg-4 px-2">
            <label>Status</label>
            <input type="datetime" class="form-control" name="status" value="DISPONIBLE" readonly>
            @error('status')
                <br>
                <div class="alert alert-danger">
                <small>{{$message}}</small>
                </div>
                <br>
            @enderror
        </div>
        <div class="col-lg-4 px-2">
            <label>Largo (metros)</label>
            <input type="number" step="0.0001" class="form-control" name="largoM" value="{{old('largoM')}}">
            @error('largoM')
                <br>
                <div class="alert alert-danger">
                <small>{{$message}}</small>
                </div>
                <br>
            @enderror
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Peso Bruto (Kg)</label>
            <input type="number" step="0.0001" class="form-control" name="pesoBruto" value="{{old('pesoBruto')}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso Neto (Kg)</label>
            <input type="number" step="0.0001" class="form-control" name="pesoNeto" value="{{old('pesoNeto')}}">
            @error('pesoNeto')
                <br>
                <div class="alert alert-danger">
                <small>{{$message}}</small>
                </div>
                <br>
            @enderror
        </div>
        <div class="col-lg-4 px-2">
            <label>Peso Utilizado (Kg)</label>
            <input type="number" step="0.0001" class="form-control" name="pesoUtilizado" value="0" readonly>
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Diametro Exterior</label>
            <input type="number" step="0.0001" class="form-control" name="diametroExterno" value="{{old('diametroExterno')}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Diametro Bobina</label>
            <input type="number" step="0.0001" class="form-control" name="diametroBobina" value="{{old('diametroBobina')}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Diametro Interior</label>
            <input type="number" step="0.0001" class="form-control" name="diametroInterno" value="{{old('diametroInterno')}}">
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Costo</label>
            <input type="number" step="0.0001" class="form-control" name="costo" value="{{old('costo')}}">
            @error('costo')
                <br>
                <div class="alert alert-danger">
                <small>{{$message}}</small>
                </div>
                <br>
            @enderror
        </div>
    </div>

    <div class="col-lg-12 d-flex mt-4">
        <div class="col-lg-12 px-2">
            <label>Observaciones</label>
            <textarea rows="3" class="form-control" name="observaciones">{{old('observaciones')}}</textarea>
        </div>
    </div>

    <input type="hidden" name="provider_id" value="{{ $provider->id }}">

    <div class="col-12 mt-3 text-center">
        <a class="btn btn-danger mx-3" href="{{route('coil.index')}}">Cancelar</a>
        <button type="submit" class="btn btn-success mx-3">Guardar</button>
    </div>
</div>

</form>
@endsection