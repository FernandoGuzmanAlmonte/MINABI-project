@extends('layouts.formulario')

@section('title', 'Rollo')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Rollo')

@section('form')
<form action="{{route('ribbon.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12 d-flex mt-2"> 
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura">
                @error('nomenclatura')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
                @enderror
            </div>
            <div class="col-lg-4 px-2">
<<<<<<< Updated upstream
                <label>Quién Elaboro</label>
                <input type="number" class="form-control" name="employee_id" value="1" readonly>
                @error('employee_id')
=======
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="DISPONIBLE" readonly>
                @error('status')
>>>>>>> Stashed changes
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
<<<<<<< Updated upstream
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="ACTIVO" readonly>
                @error('status')
=======
                <label>Quien Elaboro</label>
                <input type="text" class="form-control" name="employee_id" value="{{old('employee_id')}}">
                @error('employee_id')
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======
                <label>Peso (KG)</label>
                <input type="text" class="form-control" name="peso" value="{{old('peso')}}">
                @error('peso')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
>>>>>>> Stashed changes
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo">
                @error('fechaInicioTrabajo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Inicio</label>
                <input type="time" class="form-control" name="horaInicioTrabajo">
                @error('horaInicioTrabajo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Largo (metros)</label>
                <input type="number" step="0.0001" class="form-control" name="largo">
                @error('largo')
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
                <input type="date" class="form-control" name="fechaFinTrabajo">
                @error('fechaFinTrabajo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Hora Termino</label>
                <input type="time" class="form-control" name="horaFinTrabajo">
                @error('horaFinTrabajo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
<<<<<<< Updated upstream
            <div class="col-lg-4 px-2">
                <label>Peso (KG)</label>
                <input type="number" step="0.0001" class="form-control" name="peso">
                @error('peso')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
        </div>
    
        <div class="col-lg-12 d-flex mt-3">
=======
        </div>
    
        <div class="col-lg-12 d-flex mt-3">
            
>>>>>>> Stashed changes
            <div class="col-lg-4 px-2">
                <label>Peso Utilizado (KG)</label>
                <input type="number" step="0.0001" class="form-control" name="pesoUtilizado">
                @error('pesoUtilizado')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Temperatura (C°)</label>
                <input type="number" step = "0.0001" class="form-control" name="temperatura">
                @error('temperatura')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Velocidad</label>
                <input type="number" step = "0.0001" class="form-control" name="velocidad">
                @error('velocidad')
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
                <label>Cintilla Blanca</label>
                <input type="number" class="form-control" name="white_ribbon_id" value="1" readonly>
                @error('white_ribbon_id')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <!--Id de bobina relacionado-->
                <input type="hidden" class="form-control" name="coilId" value="{{$coilId}}">
        </div>
    
        <div class="col-lg-12 d-flex mt-4">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
<<<<<<< Updated upstream
                <textarea rows="3" class="form-control" name="observaciones"></textarea>
=======
                <textarea rows="3" class="form-control" name="observaciones">{{old('observaciones')}}</textarea>
>>>>>>> Stashed changes
            </div>
        </div>

        <div class="col-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href="{{route('ribbon.index')}}">Cancelar</a>
            <button type="submit" class="btn btn-success mx-3">Guardar</button>
        </div>
</div>
</form>
@endsection