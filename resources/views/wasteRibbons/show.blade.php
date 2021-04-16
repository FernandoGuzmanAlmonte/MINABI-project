@extends('layouts.formulario')

@section('title', 'Merma de Rollo')

@section('imgUrl',  asset('images/rollo-de-papel.svg'))

@section('namePage', 'Merma Rollo')

@section('retornar')
<a href="{{route('coilProduct.index')}}" ><img src="{{ asset('images/flecha-derecha.svg') }}" class="iconosFlechas mirror"></a>
@endsection
    
@section('form')
    <div class="row">
     
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-2">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="nomenclatura" value="{{$wasteRibbon->nomenclatura}}" disabled>
              
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-2">
                <label>Status</label>
                <input type="text" class="form-control" name="status" value="N/A" disabled>      
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-2">
                <label>Peso (KG)</label>
                <input type="number" class="form-control" name="peso" value="{{$wasteRibbon->peso}}" disabled>
               
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
                <label>Largo (metros)</label>
                <input type="number" class="form-control" name="largo" value="{{$wasteRibbon->largo}}" disabled>
              
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
                <label>Fecha Incio Trabajo</label>
                <input type="date" class="form-control" name="fechaInicioTrabajo" value="{{$wasteRibbon->fechaInicioTrabajo}}" disabled>
           
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
                <label>Hora Inicio Trabajo</label>
                <input type="time" class="form-control" name="horaIncioTrabajo" value="{{$wasteRibbon->horaInicioTrabajo}}" disabled>
             
            </div>
    
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
                <label>Temperatura</label>
                <input type="text" class="form-control" name="temperatura" value="{{$wasteRibbon->temperatura}}" disabled>
                
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
                <label>Fecha Fin Trabajo</label>
                <input type="date" class="form-control" name="fechaFinTrabajo" value="{{$wasteRibbon->fechaFinTrabajo}}" disabled>
             
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
                <label>Hora Fin Trabajo</label>
                <input type="time" class="form-control" name="horaFinTrabajo" value="{{$wasteRibbon->horaFinTrabajo}}" disabled>
              
            </div>
                      
   
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
                <label>Velocidad</label>
                <input type="number" class="form-control" name="velocidad" value="{{$wasteRibbon->velocidad}}" disabled>
            </div>
    
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 px-2 mt-3">
                <label>Observaciones</label>
                <textarea rows="3" class="form-control" name="observaciones" disabled>{{$wasteRibbon->observaciones}}</textarea>
            </div>

        <div class="col-lg-12 mt-4 mb-2">
            <h3><img src="{{ asset('images/empleado.svg') }}" class="iconoTitle"> Empleados</h3>
            <div class="table-responsive">
            <table class="table table-striped my-4" >
                <thead class="bg-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Satus</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($wasteRibbon->employees as $employee)
                        <tr>
                            <th scope="row" class="align-middle">{{$employee->id}}</th>
                            <td class="align-middle">{{$employee->nombre}}</td>
                            <td class="align-middle">{{$employee->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        @can('wasteRibbon.edit')
        <div class="col-12 mt-3 text-center">
            <a class="btn btn-warning mx-3" href="{{route('wasteRibbon.edit', $wasteRibbon->id)}}">Editar</a>
        </div>
        @endcan
        <div class="col-lg-12 d-flex mt-5">
            <h3><img src="{{ asset('images/bobina.svg') }}" class="iconoTitle"> Bobina <a href="{{route('coil.show', $coil->id)}}"><small>Ver Bobina</small></a> </h3>
        </div>
            
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
                <label>Nomenclatura</label>
                <input type="text" class="form-control" name="coilNomenclatura" value="{{$coil->nomenclatura}}" disabled>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
                <label>Fecha Adquisición</label>
                <input type="datetime" class="form-control" name="coilfArribo" value="{{$coil->fArribo}}" disabled>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 px-2 mt-3">
                <label>Status</label>
                <input type="text" class="form-control" name="coilStatus" value="{{$coil->status}}" disabled>
            </div>
</div>

@endsection