@extends('layouts.formulario')

@section('title', 'Editar Bolsa')

@section('imgUrl',  asset('images/bolsa-de-papel.svg'))

@section('namePage', 'Editar Bolsa ' . $bag->nomenclatura)

@section('form')
<form action="{{ route('bag.update', $bag) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value={{ $bag->nomenclatura }}>
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
                <input type="text" class="form-control" name="status" value={{$bag->status}} readonly>
            </div>
            <div class="col-lg-4 px-2">
                <label>Cantidad</label>
                <input type="number" step="0.0001" class="form-control" name="cantidad" value={{ $bag->cantidad }}>
                @error('cantidad')
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
                <label>Temperatura</label>
                <input type="number" step="0.0001" class="form-control" name="temperatura" value={{ $bag->temperatura }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo" value={{ $bag->fechaInicioTrabajo }}>
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
                <input type="time" class="form-control" name="horaInicioTrabajo" value={{ $bag->horaInicioTrabajo }}>
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
                <label>Medida</label>
                <input type="text" class="form-control" name="medida" value={{ $bag->medida }}>
                @error('medida')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Termino</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value={{ $bag->fechaFinTrabajo }}>
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
                <input type="time" class="form-control" name="horaFinTrabajo" value={{ $bag->horaFinTrabajo }}>
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
                <label>Tipo de unidad</label>
                <select class="form-control" name="tipoUnidad">
                    <option value="MILLAR" {{ ($bag->tipoUnidad === 'MILLAR') ? 'Selected' : '' }}>
                        MILLAR
                    </option>
                    <option value="CIENTO" {{ ($bag->tipoUnidad === 'CIENTO') ? 'Selected' : '' }}>
                        CIENTO
                    </option>
                </select>
                @error('tipoUnidad')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso (Kg)</label>
                <input type="number" step="0.0001" class="form-control" name="peso" value={{ $bag->peso }}>
                @error('peso')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Velocidad</label>
                <input type="number" step="0.0001" class="form-control" name="velocidad" value={{ $bag->velocidad }}>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Tiene Pestaña</label>
                <select class="form-control" name="pestania">
                    <option value="Sí" {{ ($bag->pestania === 'Sí') ? 'Selected' : '' }}>
                        Sí
                    </option>
                    <option value="No" {{ ($bag->pestania === 'No') ? 'Selected' : '' }}>
                        No
                    </option>
                </select>
            </div>
            <div class="col-lg-4 px-2">
                <label>Cliente Stock</label>
                <select class="form-control" name="clienteStock">
                    <option value="CLIENTE" {{ ($bag->clienteStock === 'CLIENTE') ? 'Selected' : '' }}>
                        CLIENTE
                    </option>
                    <option value="STOCK" {{ ($bag->clienteStock === 'STOCK') ? 'Selected' : '' }}>
                        STOCK
                    </option>
                </select>
                @error('clienteStock')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>
            <div class="col-lg-4 px-2">
                <label>Medida de Bolsa (largo x ancho)</label>
                <select class="form-control" name="bag_measure_id">
                    @foreach($combinedBagMeasures as $key => $bagMeasure)                    
                        <option {{ ($key == $bag->bag_measure_id) ? 'selected' : ''}} value="{{ $key }}">
                            {{ $bagMeasure }}
                        </option>
                    @endforeach
                </select>
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
                    @include('bags/modalCreateEmployee')
                    {{-- Modal crear empleado --}}
                    
                    <thead class="bg-info">
                    <tr>                        
                        <th scope="col">Nombre</th>
                        <th scope="col">Satus</th>
                        <th scope="col">Quitar o Cambiar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($bag->employees as $employee)
                        @include('bags.modalEditEmployee')
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

        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-12 px-2">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones">{{ $bag->observaciones }}</textarea>
                @error('observaciones')
                <br>
                <div class="alert alert-danger">
                    <small>{{$message}}</small>
                </div>
                <br>
            @enderror
            </div>  
        </div>
        <div class="col-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href="{{ route('bag.show', $bag) }}">Cancelar</a>
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
