<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Agregar ventas</title>
</head>
<body>

<?php
    require_once('../conexion/conexion.php');
    require_once('venta.php');

    $venta = new Venta($conexion);

    // Verificar si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los valores del formulario
        $fecha = $_POST['fecha'];
        $monto_total = $_POST['monto_total'];
        $forma_pago = $_POST['forma_pago'];
        $tipo_moneda = $_POST['tipo_moneda'];
        $id_cliente = $_POST['id_cliente'];
        $id_sucursal = $_POST['id_sucursal'];
        $cantidad = $_POST['cantidad'];
        $precio_unitario = $_POST['precio_unitario'];
        $subtotal = $_POST['subtotal'];
        $id_producto = $_POST['id_producto'];

        // Insertar venta
        $resultado = $venta->insertar($fecha, $monto_total, $forma_pago, $tipo_moneda, $id_cliente, $id_sucursal, $cantidad, $precio_unitario, $subtotal, $id_producto);

        if($resultado){
            echo "Venta cargada con éxito.";
        }else{
            echo "Error al insertar la carga.";
        }
    }
?>

<div class="container">
    <!-- Botón "Atrás" -->
    <div class="py-3 mx-4">
        <a href="../index.php" class="btn btn-secondary mb-3">Volver atrás</a>
    </div>

    <h1 class="text-center py-3 mb-5">Agregar ventas</h1>
    
    <!-- Formulario para insertar una venta -->
    <form method="POST" action="agregarventas.php" class="row">
        <div class="mb-3">
        <label for="fecha">Fecha de la venta:</label>
        <input type="date" name="fecha" id="fecha" required><br>
        </div>
        
        <div class="mb-3">
        <label for="monto_total">Total:</label>
        <input style="width: 100px;" type="text" name="monto_total" id="monto_total" required><br>
        </div>

        <div class="mb-3">
        <label for="forma_pago">Medio de pago:</label>
        <input style="width: 400px;" type="text" name="forma_pago" id="forma_pago" required><br>
        </div>

        <div class="mb-3">
        <label for="tipo_moneda">Moneda:</label>
        <input style="width: 400px;" type="text" name="tipo_moneda" id="tipo_moneda" required><br>
        </div>

        <div class="mb-3">
        <label for="id_cliente">ID del cliente:</label>
        <input style="width: 100px;" type="text" name="id_cliente" id="id_cliente" required><br>
        </div>

        <div class="mb-3">
        <label for="id_sucursal">ID de la sucursal:</label>
        <input style="width: 100px;" type="text" name="id_sucursal" id="id_sucursal" required><br>
        </div>
        
        <div class="mb-3">
        <label for="cantidad">Cantidad:</label>
        <input style="width: 100px;" type="text" name="cantidad" id="cantidad" required><br>
        </div>

        <div class="mb-3">
        <label for="precio_unitario">Precio por unidad:</label>
        <input style="width: 100px;" type="text" name="precio_unitario" id="precio_unitario" required><br>
        </div>

        <div class="mb-3">
        <label for="subtotal">Subtotal:</label>
        <input style="width: 100px;" type="text" name="subtotal" id="subtotal" required><br>
        </div>

        <div class="mb-3">
        <label for="id_producto">ID del producto:</label>
        <input style="width: 100px;" type="text" name="id_producto" id="id_producto" required><br>
        </div>
    </form>

        <button type="submit" class="btn btn-success">Agregar venta</button>
</div>    
</body>
</html>