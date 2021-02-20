@extends('layouts.formulario')

@section('title', 'Rollo')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Rollo')

@section('form')
<form action="{{route('ribbon.update', $ribbon)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2"> 
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value="{{$ribbon->nomenclatura}}">
                @error('nomenclatura')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
                @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="{{$ribbon->status}}" readonly>
                @error('status')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
                @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Quién Elaboro</label>
                <input type="text" class="form-control" name="employee_id" value="1" readonly>
                @error('employee_id')
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
                <label>Peso (KG)</label>
                <input type="text" class="form-control" name="peso" value="{{$ribbon->peso}}">
                @error('peso')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
                @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo" value="{{$ribbon->fechaInicioTrabajo}}">
                @error('fechaIncioTrabajo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
                @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Inicio</label>
                <input type="time" class="form-control" name="horaInicioTrabajo" value="{{$ribbon->horaInicioTrabajo}}">
                @error('horaInicioTrabajo')
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
                <label>Fecha Termino</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value="{{$ribbon->fechaFinTrabajo}}">
                @error('fechaFinTermino')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
                @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Termino</label>
                <input type="time" class="form-control" name="horaFinTrabajo" value="{{$ribbon->horaFinTrabajo}}">
                @error('horaFinTrabajo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
                @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso Utilizado (KG)</label>
                <input type="number" step="0.0001" class="form-control" name="pesoUtilizado" value="{{$ribbon->pesoUtilizado}}">
                @error('pesoUtilizado')
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
            <label>Largo (metros)</label>
            <input type="number" step="0.0001" class="form-control" name="largo" value="{{$ribbon->largo}}">
            @error('largo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
                @enderror
        </div>
        <div class="col-lg-4 px-2">
            <label>Temperatura (C°)</label>
            <input type="number" step="0.0001" class="form-control" name="temperatura" value="{{$ribbon->temperatura}}">
        </div>
        <div class="col-lg-4 px-2">
            <label>Velocidad</label>
            <input type="number" step="0.0001" class="form-control" name="velocidad" value="{{$ribbon->velocidad}}">
        </div>
    </div>
    
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Cintilla Blanca</label>
                <input type="text" class="form-control" name="white_ribbon_id" value="{{$ribbon->white_ribbon_id}}" readonly>
                @error('white_ribbon_id')
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
                <textarea rows="3" class="form-control" name="observaciones" placeholder="Máximo 255 caracteres">{{$ribbon->observaciones}}</textarea>
                @error('observaciones')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
                @enderror
            </div>
        </div>

    <div class="col-12 mt-4 mb-4 text-center">
        <a class="btn btn-danger mx-3" href="{{route('ribbon.show', $ribbon->id)}}">Cancelar</a>
        <button type="submit" class="btn btn-success mx-3">Guardar</button>
    </div>
</div>
</form>
@endsection