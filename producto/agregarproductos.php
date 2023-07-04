<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Agregar productos</title>
</head>
<body>

<?php
    require_once('../conexion/conexion.php');
    require_once('producto.php');

    // Crear una instancia de la clase Producto y pasar la conexión a la base de datos
    $producto = new Producto($conexion);

    // Verificar si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los valores del formulario
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $categoriaId = $_POST['categoriaId'];
        $fecha_vencimiento = $_POST['fecha_vencimiento'];
        $inventario = $_POST['inventario'];

        // Insertar el producto
        $resultado = $producto->insertar($nombre, $descripcion, $categoriaId, $fecha_vencimiento, $inventario);

        if ($resultado) {
            echo "Producto agregado correctamente.";
        } else {
            echo "Error al agregar el producto.";
        }
    }
?>

<div class="container">
    <!-- Botón "Atrás" -->
    <div class="py-3 mx-4">
        <a href="../index.php" class="btn btn-secondary mb-3">Volver atrás</a>
    </div>
    
    <h1 class="text-center py-3 mb-5">Agregar productos</h1>
    
    <!-- Formulario para insertar un producto -->
    <form method="POST" action="agregarproductos.php" class="row">
        <div class="mb-3 col-12">
            <label for="nombre">Nombre:</label>
            <input style="width: 400px;" type="text" name="nombre" id="nombre" required><br>
        </div>

        <div class="mb-3 col-12">
            <label for="descripcion">Descripción:</label>
            <input style="width: 400px;" type="text" name="descripcion" id="descripcion" required><br>
        </div>

        <div class="mb-3 col-12">
            <label for="categoriaId">ID de Categoría:</label>
            <input style="width: 100px;" type="text" name="categoriaId" id="categoriaId" required><br>
        </div>

        <div class="mb-3 col-12">
            <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" required><br>
        </div>

        <div class="mb-3 col-12">
            <label for="inventario">Inventario:</label>
            <input style="width: 100px;" type="text" name="inventario" id="inventario" required><br>
        </div>
    </form>

    <button type="submit" class="btn btn-success">Agregar producto</button>
</div>    
</body>
</html>