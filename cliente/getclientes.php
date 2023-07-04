<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Get Clientes</title>
</head>
<body>
<?php
    
    require_once('cliente.php');

    // Crear una instancia de la clase Cliente y pasar la conexión a la base de datos
    $cliente = new Cliente($conexion);

    // Llamar al método mostrar() y obtener los clientes
    $clientes = $cliente->mostrar();
?>

<div class="container">
    <!-- Botón "Atrás" -->
    <div class="py-3 mx-4">
        <a href="../index.php" class="btn btn-secondary mb-3">Volver atrás</a>
    </div>
    
    <h1 class="text-center py-3">Listado de clientes</h1>

        <div class="table-responsive mt-5">
            <table class="table table-striped table-ligh text-center">
                <thead>
                    <tr class="table-success">
                        <th scope="col">Apellido</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo electrónico</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($clientes) {
                            foreach ($clientes as $cliente) {
                                echo '
                                <tr>
                                <td class="align-middle">'.$cliente['apellido'].'</td>
                                <td class="align-middle">'.$cliente['nombre'].'</td>
                                <td class="align-middle">'.$cliente['direccion'].'</td>
                                <td class="align-middle">'.$cliente['telefono'].'</td>
                                <td class="align-middle">'.$cliente['correo'].'</td>
                                </tr>';
                        }
                    }                            
                    ?>
                </tbody>
            </table>
</body>
</html>