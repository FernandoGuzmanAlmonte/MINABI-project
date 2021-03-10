<div class="modal fade" id="createCinta">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Agregar Cinta blanca</b></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
                <div class="modal-body row">
                    <div class="col-lg-8 px-2">
                        <label align-midle> Cinta:</label>
                        <select class="form-control" id="modalEmpleado" onchange="cambio()">
                            <option selected>--seleccione la cinta blanca--</option>
                            @foreach($cintaBlancas as $cintaBlanca)
                                <option value={{ $cintaBlanca->id }}>{{ $cintaBlanca->nomenclatura }}</option>
                            @endforeach
                        </select>    
                    </div>
                    <div class="col-lg-4 px-2">
                        <label> Largo (metros):</label>
                        <input type="number" step="0.0001" class="form-control" id="largoCinta">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="crearFila()">Agregar Empleado</button>
                </div>
        </div>
    </div>
</div>
