<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Gestión de supermercado</title>
</head>

<body>
<div class="container p-5 text-center">
    <h1 class="text-center">Ejercicio de programación: resolución</h2>
    <h5 class="text-center fw-lighter">Sistema de gestión de un supermercado</h5>

    <div class="m-5 d-flex align-items-center justify-content-center">
        <div class="dropdown px-5">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Productos
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/producto/getproductos.php">Mostrar producto</a>
            <a class="dropdown-item" href="/producto/agregarproductos.php">Cargar producto</a>
            <a class="dropdown-item" href="/producto/eliminarproductos.php">Eliminar producto</a>
        </div>
        </div>

        <div class="dropdown px-5">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Ventas
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/venta/getventas.php">Mostrar venta</a>
            <a class="dropdown-item" href="/venta/agregarventas.php">Cargar venta</a>
        </div>
        </div>

        <div class="dropdown px-5">
        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Clientes
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/cliente/getclientes.php">Mostrar cliente</a>
            <a class="dropdown-item" href="/cliente/agregarclientes.php">Cargar cliente</a>
            <a class="dropdown-item" href="/cliente/eliminarclientes.php">Eliminar cliente</a>
        </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>