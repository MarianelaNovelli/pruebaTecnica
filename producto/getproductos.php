<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Get Productos</title>
</head>
<body>
    
<?php
    require_once('producto.php');

    // Crear una instancia de la clase Producto y pasar la conexión a la base de datos
    $producto = new Producto($conexion);

    // Llamar al método mostrar() y obtener los productos
    $productos = $producto->mostrar();
?>

<div class="container">
    <!-- Botón "Atrás" -->
    <div class="py-3 mx-4">
        <a href="../index.php" class="btn btn-secondary mb-3">Volver atrás</a>
    </div>

    <h1 class="text-center py-3">Listado de productos</h1>   

        <div class="table-responsive mt-5">
            <table class="table table-striped table-light text-center">
                <thead>
                    <tr class="table-success">
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Fecha de vencimiento</th>
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
                                <td class="align-middle">'.$producto['inventario'].'</td>
                                <td class="align-middle">'.$producto['fecha_vencimiento'].'</td>
                                </tr>';
                        }
                    }                            
                    ?>
                </tbody>
            </table>
</body>
</html>