<div class="modal fade" id="edit{{$contact->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Editar Contacto</b></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('provider.update', $contact->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Télefono:</label>
                        <input type="number" class="form-control" name="telefono" value={{$contact->telefono}}>
                    </div>
                    <div class="form-group">
                        <label>Nombre(s):</label>
                        <input type="text" class="form-control" name="nombre" value={{$contact->nombre}}>
                    </div>
                    <div class="form-group">
                        <label>Apellidos:</label>
                        <input type="text" class="form-control" name="apellidos" value={{$contact->apellidos}}>
                    </div>
                    <div class="form-group">
                        <label>Correo electrónico:</label>
                        <input type="email" class="form-control" name="correoElectronico" value={{$contact->correoElectronico}}>
                    </div>
                    <input type="hidden" name="provider_id" value="{{ $provider->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="contactForm" class="btn btn-success">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>