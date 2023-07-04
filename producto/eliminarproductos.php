<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Eliminar productos</title>
</head>
<body>

<?php
    require_once('../conexion/conexion.php');
    require_once('producto.php');

    // Crear una instancia de la clase Producto y pasar la conexión a la base de datos
    $producto = new Producto($conexion);

    // Llamar al método mostrar() y obtener los productos
    $productos = $producto->mostrar();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminarProducto'])) {
        $idEliminar = $_POST['idEliminar'];

        $producto = new Producto($conexion);
        
        // Llamar al método eliminar() con el ID proporcionado por el usuario
        $resultado = $producto->eliminar($idEliminar);

        if ($resultado) {
            echo "Producto eliminado correctamente.";
        } else {
            echo "Error al eliminar el producto.";
        }
    }
?>

<div class="container">
    <!-- Botón "Atrás" -->
    <div class="py-3 mx-4">
        <a href="../index.php" class="btn btn-secondary mb-3">Volver atrás</a>
    </div>

    <h1 class="text-center py-3">Eliminar productos</h1>

        <div class="table-responsive mt-5">
            <table class="table table-striped table-light text-center">
                <thead>
                    <tr class="table-success">
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($productos) {
                            foreach ($productos as $producto) {
                                echo '
                                <tr>
                                <td class="align-middle">'.$producto['nombre'].'</td>
                                <td class="align-middle">'.$producto['descripcion'].'</td>
                                <td class="align-middle">'.$producto['nombre_categoria'].'</td>
                                <td class="align-middle">'.$producto['id_producto'].'</td>
                                </tr>';
                        }
                    }                            
                    ?>
                </tbody>
            </table>
    </div> 
<div class="container">
    <div class="mb-3">
        <br>
        <form method="POST" action="eliminarproductos.php">
            <label for="idEliminar">ID del producto a eliminar:</label>
            <input type="number" name="idEliminar" id="idEliminar" required><br>
                 
            <button type="submit" name="eliminarProducto" class="btn btn-danger mt-2">Eliminar producto</button>
        </form>
    </div>
</div>
</body>
</html>