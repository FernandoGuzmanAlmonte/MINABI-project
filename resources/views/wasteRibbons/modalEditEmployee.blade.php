<div class="modal fade" id="edit{{$employee->id}}">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Cambiar Empleado</b></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
                <div class="modal-body row">
                    <div class="col-lg-8 px-2">
                        <label align-midle> Empleado:</label>
                        <select class="form-control" id="modalEmpleado" onchange="cambio()">
                            @foreach($employees as $employeeC)
                                <option {{ ($employeeC->id == $employee->id)? 'selected' : '' }} value="{{ $employeeC->id }}">{{ $employeeC->nombre }}</option>
                            @endforeach
                        </select>    
                    </div>
                    <div class="col-lg-4 px-2">
                        <label> Status:</label>
                        <input type="text" class="form-control" id="modalStatusEmpleado" value="{{ $employee->status }}" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="crearFila()">Aceptar</button>
                </div>
        </div>
    </div>
</div>
