<div class="modal fade" id="create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Nueva Medida de Bolsa</b></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('coilType.store') }}" method="POST">
                @csrf
                <div class="modal-body row">
                    <div class="col-lg-6 px-2">
                        <label>Ancho:</label>
                        <input type="number" step="0.0001" class="form-control" name="ancho" value="{{ old('ancho') }}">
                        @error('ancho')
                            <div class="alert alert-danger mt-2">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 px-2">
                        <label>Largo:</label>
                        <input type="number" step="0.0001" class="form-control" name="largo" value="{{ old('largo') }}">
                        @error('largo')
                            <div class="alert alert-danger mt-2">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" name="coil_type_id" value="{{ $coilType->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="bagMeasureForm" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
