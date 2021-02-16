@extends('layouts.formulario')

@section('title', 'Crear Bolsa')

@section('imgUrl',  asset('images/bolsa-de-papel.svg'))

@section('namePage', 'Crear Bolsa')

@section('form')
<form action="{{ route('bag.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value="{{old('nomenclatura')}}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="DISPONIBLE" readonly>
            </div>
            <div class="col-lg-4 px-2">
                <label>Cantidad</label>
                <input type="number" step="0.0001" class="form-control" name="cantidad" value="{{old('cantidad')}}">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Proveedor</label>
                <!--<input type="text" class="form-control" name="proveedor">-->
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo" value="{{old('fechaInicioTrabajo')}}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Inicio</label>
                <input type="time" class="form-control" name="horaInicioTrabajo" value="{{old('horaInicioTrabajo')}}">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Medida</label>
                <input type="text" class="form-control" name="medida" value="{{old('medida')}}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Termino</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value="{{old('fechaFinTrabajo')}}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Termino</label>
                <input type="time" class="form-control" name="horaFinTrabajo" value="{{old('horaFinTrabajo')}}">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Tipo de unidad</label>
                <select class="form-control" name="tipoUnidad">
                    <option selected>--seleccione una opción--</option>
                    <option value="MILLAR">Millar</option>
                    <option value="CIENTO">Ciento</option>
                </select>
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso (Kg)</label>
                <input type="number" step="0.0001" class="form-control" name="peso" value="{{old('peso')}}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Temperatura</label>
                <input type="number" step="0.0001" class="form-control" name="temperatura" value="{{old('temperatura')}}">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Quién elaboro</label>
                <!--<input type="text" class="form-control" name="estado"-->
            </div>
            <div class="col-lg-4 px-2">
                <label>Cliente Stock</label>
                <select class="form-control" name="clienteStock">
                    <option selected>--seleccione una opción--</option>
                    <option value="Cliente">Cliente</option>
                    <option value="Stock">Stock</option>
                </select>
            </div>
            <div class="col-lg-4 px-2">
                <label>Velocidad</label>
                <input type="number" step="0.0001" class="form-control" name="velocidad" value="{{old('velocidad')}}">
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Tiene Pestaña</label>
                <select class="form-control" name="pestania">
                    <option selected>--seleccione una opción--</option>
                    <option value="Sí">Sí</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
        <input type="hidden" class="form-control" name="ribbonId" value="{{$bag}}">
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones">{{old('observaciones')}}</textarea>
            </div>  
        </div>
        <div class="col-12 mt-3 text-center">
           {{-- <a class="btn btn-danger mx-3" href="{{ route('ribbon.show'), $ribbon = $bag }}">Cancelar</a>--}}
            <button type="submit" class="btn btn-success mx-3">Guardar</button>
        </div>    
    </div>
</form>
@endsection


