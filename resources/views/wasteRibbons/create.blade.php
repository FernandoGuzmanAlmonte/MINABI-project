@extends('layouts.formulario')

@section('title', 'Merma de Rollo')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Merma Rollo')

@section('form')
<form action="{{route('wasteRibbon.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12 d-flex mt-2"> 
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value="{{$nomenclatura}}" readonly>
                @error('nomenclatura')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label><span class="required">*</span>Fecha Inicio Trabajo</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo" value="{{old('fechaInicioTrabajo')}}">
                @error('fechaInicioTrabajo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label><span class="required">*</span>Hora Inicio Trabajo</label>
                <input type="time" class="form-control" name="horaInicioTrabajo" value="{{old('horaInicioTrabajo')}}">
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
                <label><span class="required">*</span>Peso (KG)</label>
                <input type="number" step="0.0001" class="form-control" name="peso" value="{{old('peso')}}">
                @error('peso')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label><span class="required">*</span>Fecha Fin Trabajo</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value="{{old('fechaFinTrabajo')}}">
                @error('fechaFinTrabajo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label><span class="required">*</span>Hora Fin Trabajo</label>
                <input type="time" class="form-control" name="horaFinTrabajo" value="{{old('horaFinTrabajo')}}">
                @error('horaFinTrabajo')
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
                <label><span class="required">*</span>Largo (metros)</label>
                <input type="number" step="0.0001" class="form-control" name="largo" value="{{old('largo')}}">
                @error('largo')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Temperatura</label>
                <input type="text" class="form-control" name="temperatura" value="{{old('temperatura')}}">
            </div>
            <div class="col-lg-4 px-2">
                <label>Velocidad</label>
                <input type="number" step="0.0001" class="form-control" name="velocidad" value="{{old('velocidad')}}">
            </div>
           <!--Id de bobina relacionado-->
           <input type="hidden" class="form-control" name="coilId" value="{{$coilId}}">
        </div>
    
        <div class="col-lg-12 d-flex mt-3">
            <div class="form-cloned col-lg-4 px-2">
                <label>Empleado(s)</label>
                <button type="button" onclick="clonar()" class="btn btn-success btn-sm">+</button>
                <button type="button" onclick="remover()" class="btn btn-secondary btn-sm">-</button>
                <select class="form-control" name="empleados[]">
                    <option value="" selected>--seleccione empleado--</option>
                    @foreach($employees as $employee)
                        <option value={{ $employee->id }}>
                            {{ $employee->nombre }}
                        </option>
                    @endforeach
                </select>            
            </div>
        </div>
    
        <div class="col-lg-12 d-flex mt-4">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones" placeholder="Máximo 255 caracteres">{{old('observaciones')}}</textarea>
                @error('observaciones')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
        </div>
        @if($errors->any())
        <div class="col-12 mt-3 text-center">
            <br>
                <div class="alert alert-danger">
                    {{$errors->first()}}
                </div>
                <br>
        </div>
        @endif
        <div class="col-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href="{{route('coil.show', $coilId)}}">Cancelar</a>
            <button type="submit" class="btn btn-success mx-3">Guardar</button>
        </div>
</div>
</form>
@endsection

@section('scripts')
<script type="text/javascript">
    function clonar()
    {
        var $form = $('.form-cloned .form-control').last().clone();

        $form.appendTo('.form-cloned');
    }

    function remover()
    {
        var $form = $('.form-cloned .form-control');

        if($form.length != 1) $form.last().remove();
    }
</script>
@endsection