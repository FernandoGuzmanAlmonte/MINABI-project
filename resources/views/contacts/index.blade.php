<table class="table table-striped my-4" >
    <thead class="bg-info">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Télefono</th>
            <th scope="col">Nombre(s)</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Correo electrónico</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <th scope="row" class="align-middle">{{ $contact->id }}</th>
                <td class="align-middle">{{ $contact->telefono }}</td>
                <td class="align-middle">{{ $contact->nombre }}</td>
                <td class="align-middle">{{ $contact->apellidos }}</td>
                <td class="align-middle">{{ $contact->correoElectronico }}</td>
                <td class="align-middle">
                    <a  href="{{ route('provider.edit', $contact->id) }}" value="Editar" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit">
                        <img src="{{ asset('images/icono-editar.svg') }}" class="iconosPequeños">
                    </a>
                    <button type="submit" value="Eliminar" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">
                        <img src="{{ asset('images/icono-eliminar.svg') }}" class="iconosPequeños">
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>