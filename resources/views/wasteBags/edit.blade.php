@extends('layouts.formulario')

@section('title', 'Merma de Bolsas')

@section('imgUrl',  asset('images/bolsa-de-papel.svg'))

@section('namePage', 'Editar Merma de Bolsas')

@section('form')
<form action="{{ route('wasteBag.update', $wasteBag) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12 d-flex mt-2">
            <div class="col-lg-4 px-2">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo" value={{ $wasteBag->fechaInicioTrabajo }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Fecha Fin</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value={{ $wasteBag->fechaFinTrabajo }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Peso</label>
                <input type="text" class="form-control" name="peso" value={{ $wasteBag->peso }}>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Largo</label>
                <input type="number" step="0.0001" class="form-control" name="largo" value={{ $wasteBag->largo }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Temperatura</label>
                <input type="number" step="0.0001" class="form-control" name="temperatura" value={{ $wasteBag->temperatura }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Velocidad</label>
                <input type="number" step="0.0001" class="form-control" name="velocidad" value={{ $wasteBag->velocidad }}>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="DISPONIBLE" {{ ($wasteBag->status === 'DISPONIBLE') ? 'Selected' : '' }}>
                        DISPONIBLE
                    </option>
                    <option value="TERMINADO" {{ ($wasteBag->status === 'TERMINADO') ? 'Selected' : '' }}>
                        TERMINADO
                    </option>
                </select>
            </div>
            <div class="col-lg-4 px-2">
                <label>Tipo Unidad</label>
                <input type="text" class="form-control" name="tipoUnidad" value={{ $wasteBag->tipoUnidad }}>
            </div>
            <div class="col-lg-4 px-2">
                <label>Cantidad</label>
                <input type="number" step="0.0001" class="form-control" name="cantidad" value={{ $wasteBag->cantidad }}>
            </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-4 px-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value={{ $wasteBag->nomenclatura }}>
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
                    @include('wasteBags/modalCreateEmployee')
                    {{-- Modal crear empleado --}}
                    
                    <thead class="bg-info">
                    <tr>                        
                        <th scope="col">Nombre</th>
                        <th scope="col">Satus</th>
                        <th scope="col">Quitar o Cambiar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($wasteBag->employees as $employee)
                        @include('wasteBags.modalEditEmployee')
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
                <textarea rows="3" class="form-control" name="observaciones">{{ $wasteBag->observaciones }}</textarea>
            </div>  
        </div>
        <div class="col-12 mt-3 text-center">
            <a class="btn btn-danger mx-3" href="{{route('wasteBag.show', $wasteBag->id)}}">Cancelar</a>
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


