<div class="modal fade" id="edit{{$bagMeasure->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Editar Medida de Bolsa</b></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('coilType.update', $bagMeasure->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body row">
                    <div class="col-lg-6 px-2">
                        <label>Ancho:</label>
                        <input type="number" step="0.0001" class="form-control" name="ancho" value="{{ $bagMeasure->ancho }}">
                    </div>
                    <div class="col-lg-6 px-2">
                        <label>Largo:</label>
                        <input type="number" step="0.0001" class="form-control" name="largo" value="{{ $bagMeasure->largo }}">
                    </div>
                    <input type="hidden" name="coil_type_id" value="{{ $coilType->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="bagMeasureForm" class="btn btn-success">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>