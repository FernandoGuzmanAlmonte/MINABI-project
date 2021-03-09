@extends('layouts.formulario')

@section('title', 'Proveedores')

@section('imgUrl',  asset('images/proveedor.svg'))

@section('namePage', 'Proveedor ' . $provider->id)

@section('retornar')
<a href="{{ route('provider.index') }}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection

@section('form')
<div class="row">
    <div class="col-lg-12 d-flex mt-2">
        <div class="col-lg-4 px-2">
            <label>Nombre Empresa</label>
            <input type="text" class="form-control" name="nombreEmpresa" value="{{ $provider->nombreEmpresa }}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Dirección</label>
            <input type="text" class="form-control" name="direccion" value="{{ $provider->direccion }}" disabled>
        </div>
        <div class="col-lg-4 px-2">
            <label>Pagina web</label>
            <input type="text" class="form-control" name="paginaWeb" value="{{ $provider->paginaWeb }}" disabled>
        </div>
    </div>
    <div class="col-lg-12 d-flex mt-3">
        <div class="col-lg-4 px-2">
            <label>Estado</label>
            <input type="text" class="form-control" name="estado" value="{{ $provider->estado }}" disabled>
        </div>
    </div>
    <div class="col-12 mt-3 text-center">
        <a class="btn btn-warning mx-3" href="{{ route('provider.edit', $provider) }}">Editar</a>
    </div>
    
    <div class="col-lg-12 d-flex mt-5">
        <div class="col-lg-6 px-2 float-left">
            <h3><img src="{{ asset('images/contactos.svg') }}" class="iconoTitle"> Contactos </h3>
        </div>
        <div class="col-lg-6 px-2 mt-2 float-left">
            <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#create" onclick="cleanModal()">
                Añadir Contacto
            </button>
        </div>
    </div>
    <div class="col-lg-12">   
    {{-- Modal de contactos --}}
        @include('contacts.create')
    {{-- Modal de contactos --}}
    
    {{-- Index de contactos --}}
        @include('contacts.index')
    {{-- Index de contactos --}}    
    </div>
    <div class="col-lg-12 d-flex mt-5">
        <div class="col-lg-6 px-2 float-left">
            <h3><img src="{{ asset('images/bobina.svg') }}" class="iconoTitle"> Bobinas </h3>
        </div>
        {{--<div class="col-lg-6 px-2 mt-2 float-left">
            <a type="button" class="btn btn-success float-right mb-3" href="{{ route('coil.createFromProvider', $provider->id) }}">
                Añadir Bobina
            </a>
        </div>--}}
    </div>
    <div class="col-lg-12 d-flex">
        <table class="table table-striped mt-1 mb-5" >
            <thead class="bg-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nomenclatura</th>
                    <th scope="col">Fecha Adquisición</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coils as $coil)
                <tr>
                    <th scope="row" class="align-middle">{{$coil->id}}</th>
                    <td class="align-middle">{{$coil->nomenclatura}}</td>
                    <td class="align-middle">{{$coil->fArribo}}</td>
                    <td class="align-middle">{{$coil->coil_type_id}}</td>
                    <td class="align-middle">
                        <label class="btn btn-outline-{{ ($coil->status == 'DISPONIBLE') ? 'success' : 'danger' }} m-0">
                            {{$coil->status}}
                        </label>
                    </td>
                    <td><a href="{{route('coil.show', $coil)}}"><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas"></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    function formValidation()
    {
        var formBagMeasure = $("#formContact");
        var formData = formBagMeasure.serialize(); //variable con el valor de todos los input del formulario

        //Limpiamos el contenido de los div de errores
        cleanErrorsModal();

        $.ajax({
            url: "{{ route('provider.store') }}",
            type: 'POST',
            data: formData,
            success: function(response)
                     {
                        if (response)
                        {
                            $('#create').modal('toggle'); //cerramos modal #create
                            location.reload(); // recargamos la página
                        }
                     },
            error: function(response)
                   {
                        if(errorMessageTelefono = response.responseJSON.errors.telefono)
                        {
                            $(".telefono-error").html(
                                '<div class="alert alert-danger mt-2">' +
                                    '<small>'+ errorMessageTelefono +'</small>' +
                                '</div>');
                        }
                        if(errorMessageNombre = response.responseJSON.errors.nombre)
                        {
                            $(".nombre-error").html(
                                '<div class="alert alert-danger mt-2">' +
                                    '<small>'+ errorMessageNombre +'</small>' +
                                '</div>');
                        }
                        if(errorMessageApellidos = response.responseJSON.errors.apellidos)
                        {
                            $(".apellidos-error").html(
                                '<div class="alert alert-danger mt-2">' +
                                    '<small>'+ errorMessageApellidos +'</small>' +
                                '</div>');
                        }
                        if(errorMessageCorreoElectronico = response.responseJSON.errors.correoElectronico)
                        {
                            $(".correoElectronico-error").html(
                                '<div class="alert alert-danger mt-2">' +
                                    '<small>'+ errorMessageCorreoElectronico +'</small>' +
                                '</div>');
                        }
                   }
        });
    }
    function cleanModal()
    {
        cleanErrorsModal();
        cleanInputValueModal();
    }
    function cleanErrorsModal()
    {
        //Limpiamos el contenido de los div de errores del modal #create
        $(".telefono-error").html('');
        $(".nombre-error").html('');
        $(".apellidos-error").html('');
        $(".correoElectronico-error").html(''); 
    }
    function cleanInputValueModal()
    {
        //Limpiamos el contenido de los input del modal #create
        $('input[name=telefono]').val('');
        $('input[name=nombre]').val('');
        $('input[name=apellidos]').val('');
        $('input[name=correoElectronico]').val('');
    }

    //Funciones para el form modal de Edit

    function formValidationEdit(item)
    {
        var idContact = item.id;

        var formContactEdit = $('#formContactEdit' + idContact);
        var formData = formContactEdit.serialize(); //variable con el valor de todos los input del formulario

        //Limpiamos el contenido de los div de errores
        cleanErrorsModalEdit(idContact);

        //Aqui guardamos la ruta con un id temporal
        var url = "route('provider.update', ['id' => 'temp'])";
        //Aqui sustituimos la variable temp por el id de Contact
        url = url.replace('temp', idContact);
        
        $.ajax({
            url: "/provider/" + idContact,
            type: 'POST',
            data: formData,
            success: function(response)
                     {
                        if (response)
                        {
                            $('#edit'+ idContact).modal('toggle'); //cerramos modal #edit
                            location.reload(); // recargamos la página
                        }
                     },
            error: function(response)
                   {
                        if(errorMessageTelefono = response.responseJSON.errors.telefono)
                        {
                            $(".telefono-error"+ idContact).html(
                                '<div class="alert alert-danger mt-2">' +
                                    '<small>'+ errorMessageTelefono +'</small>' +
                                '</div>');
                        }
                        if(errorMessageNombre = response.responseJSON.errors.nombre)
                        {
                            $(".nombre-error"+ idContact).html(
                                '<div class="alert alert-danger mt-2">' +
                                    '<small>'+ errorMessageNombre +'</small>' +
                                '</div>');
                        }
                        if(errorMessageApellidos = response.responseJSON.errors.apellidos)
                        {
                            $(".apellidos-error"+ idContact).html(
                                '<div class="alert alert-danger mt-2">' +
                                    '<small>'+ errorMessageApellidos +'</small>' +
                                '</div>');
                        }
                        if(errorMessageCorreoElectronico = response.responseJSON.errors.correoElectronico)
                        {
                            $(".correoElectronico-error"+ idContact).html(
                                '<div class="alert alert-danger mt-2">' +
                                    '<small>'+ errorMessageCorreoElectronico +'</small>' +
                                '</div>');
                        }
                   }
        });
    }
    function cleanErrorsModalEdit(idContact)
    {
        //Limpiamos el contenido de los input del modal #editID
        $(".telefono-error"+ idContact).html('');
        $(".nombre-error"+ idContact).html('');
        $(".apellidos-error"+ idContact).html('');
        $(".correoElectronico-error"+ idContact).html(''); 
    }
</script>
@endsection

