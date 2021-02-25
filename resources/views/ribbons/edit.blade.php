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

        <div class="col-lg-12 d-flex mt-5 mb-2">
            <div class="col-lg-2 px-2"></div>
            <div class="col-lg-8 px-2">
                <div class="col-lg-12 d-flex">
                    <div class="col-lg-10 px-0">
                        <h3><img src="{{ asset('images/empleado.svg') }}" class="iconoTitle"> Empleados que laboraron</h3>
                    </div>
                    <div class="col-lg-2 px-0 pt-3">
                        <button type="button" class="btn btn-success  float-right" data-toggle="modal" data-target="#create">
                            Agregar
                        </button>    
                    </div>
                </div>
                <table class="table table-striped my-2" id="tablaEmpleadosLaboraron">
                    {{-- Modal crear empleado --}}
                    @include('ribbons/modalCreateEmployee')
                    {{-- Modal crear empleado --}}
                    
                    <thead class="bg-info">
                    <tr>                        
                        <th scope="col">Nombre</th>
                        <th scope="col">Satus</th>
                        <th scope="col">Quitar o Cambiar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($ribbon->employees as $employee)
                        @include('ribbons.modalEditEmployee')
                            <tr>
                                <td class="align-middle">
                                    <input type="hidden" name="empleados[]" class="form-control" value="{{$employee->id}}">
                                    {{$employee->nombre}}
                                </td>
                                <td class="align-middle">{{$employee->status}}</td>
                                <td class="align-middle">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)">
                                        <img src="{{ asset('images/cruz.svg') }}" class="iconosPequeños">
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" onclick="editarFila(this)" data-target="#edit{{$employee->id}}" disabled>
                                        <img src="{{ asset('images/cambiar-empleado.svg') }}" class="iconosPequeños">
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-2 px-2"></div>
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

@section('scripts')
<script type="text/javascript">
    function crearFila()
    {
        var idEmpleado = $("#modalEmpleado").val();
        var nombreEmpleado = $("#modalEmpleado option:selected").text();
        var statusEmpleado = $("#modalStatusEmpleado").val();
        
        var fila =
        '<tr>'+
            '<td class="align-middle">'+
                '<input type="hidden" name="empleados[]" class="form-control" value="'+idEmpleado+'">'+
                nombreEmpleado+
            '</td>'+
            '<td class="align-middle">'+statusEmpleado+'</td>'+
            '<td class="align-middle">'+
                '<button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)">'+
                    '<img src="{{ asset('images/cruz.svg') }}" class="iconosPequeños">'+
                '</button>'+
                '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit'+idEmpleado+'" disabled>'+
                    '<img src="{{ asset('images/cambiar-empleado.svg') }}" class="iconosPequeños">'+
                '</button>'+
            '</td>'+
        '</tr>';

        $('#tablaEmpleadosLaboraron').append(fila);
    }

    function cambio()
    {
        var idEmpleado = $("#modalEmpleado").val();
        //Obtengo el array de empleados que pase desde el controlador y lo convierto en un objeto json
        //para poder utilizarlo en javascript. Se utilizó la clausula json de laravel
        var empleados = @json($employees);
        //Obtengo un array(empleado) con los elementos que coincidan del array(empleados) 
        //filtrandolos por el id
        var empleado = empleados.filter(function (empleado) { return empleado.id == idEmpleado; });
        
        var statusEmpleado = document.getElementById("modalStatusEmpleado");

        statusEmpleado.value = empleado[0].status;
    }

    function eliminarFila(t)
    {
        var td = t.parentNode;
        var tr = td.parentNode;
        var table = tr.parentNode;
        table.removeChild(tr);
    }

    function editarFila(item)
    {
        console.log(item);
    }
</script>
@endsection
