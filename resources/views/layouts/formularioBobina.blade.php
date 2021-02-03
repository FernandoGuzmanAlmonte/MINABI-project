<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>

<div class="container">
    <img src="@yield('imgUrl')">
    <h1>@yield('namePage')</h1>

    <div class="row">
        <h3>Información General</h3>
        <form action="{{route('coil.store')}}" method="POST">
            @csrf
            <div class="col-lg-12 d-flex mt-2">
                <div class="col-lg-4 px-2">
                    <label>Nomenclatura</label>
                    <input type="text" class="form-control" name="Nomenclatura">
                </div>
                <div class="col-lg-4 px-2">
                    <label>Fecha llegada</label>
                    <input type="datetime" class="form-control" >
                </div>
                <div class="col-lg-4 px-2">
                    <label>Tipo bobina</label>
                    <input type="text" class="form-control" >
                </div>
            </div>

            <div class="col-lg-12 d-flex mt-3">
                <div class="col-lg-4 px-2">
                    <label>Proveedor</label>
                    <input type="text" class="form-control" >
                </div>
                <div class="col-lg-4 px-2">
                    <label>Status</label>
                    <input type="datetime" class="form-control" >
                </div>
                <div class="col-lg-4 px-2">
                    <label>Largo (metros)</label>
                    <input type="text" class="form-control" >
                </div>
            </div>

            <div class="col-lg-12 d-flex mt-3">
                <div class="col-lg-4 px-2">
                    <label>Peso Bruto (Kg)</label>
                    <input type="text" class="form-control" >
                </div>
                <div class="col-lg-4 px-2">
                    <label>Peso Neto (Kg)</label>
                    <input type="datetime" class="form-control" >
                </div>
                <div class="col-lg-4 px-2">
                    <label>Peso Utilizado (Kg)</label>
                    <input type="text" class="form-control" >
                </div>
            </div>

            <div class="col-lg-12 d-flex mt-3">
                <div class="col-lg-4 px-2">
                    <label>Diametro Exterior</label>
                    <input type="text" class="form-control" >
                </div>
                <div class="col-lg-4 px-2">
                    <label>Diametro Bobina</label>
                    <input type="datetime" class="form-control" >
                </div>
                <div class="col-lg-4 px-2">
                    <label>Diametro Interior</label>
                    <input type="text" class="form-control" >
                </div>
            </div>

            <div class="col-lg-12 d-flex mt-3">
                <div class="col-lg-4 px-2">
                    <label>Usuario que dio de alta</label>
                    <input type="text" class="form-control" >
                </div>
            </div>

            <div class="col-lg-12 d-flex mt-3">
                <div class="col-lg-4 px-2">
                    <label>Observaciones</label>
                    <input type="text" class="form-control" >
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-danger mx-3">Cancelar</button>
                <button type="submit" class="btn btn-success mx-3">Guardar</button>
            </div>
        </form>
    </div>

 
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>