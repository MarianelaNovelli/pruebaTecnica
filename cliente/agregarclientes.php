<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Agregar clientes</title>
</head>
<body>

<?php
    require_once('../conexion/conexion.php');
    require_once('cliente.php');

    $cliente = new Cliente($conexion);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los valores del formulario
        $apellido = $_POST['apellido'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];

        // Insertar cliente
        $resultado = $cliente->insertar($apellido, $nombre, $direccion, $telefono, $correo);

        if ($resultado) {
            echo "Cliente agregado correctamente.";
        } else {
            echo "Error al agregar el cliente.";
        }
    }
?>

<div class="container">
    <!-- Botón "Atrás" -->
    <div class="py-3 mx-4">
        <a href="../index.php" class="btn btn-secondary mb-3">Volver atrás</a>
    </div>
    
    <h1 class="text-center py-3 mb-5">Agregar clientes</h1>
    
    <!-- Formulario para insertar un cliente -->
    <form method="POST" action="agregarclientes.php">
        <div class="mb-3">
        <label for="apellido">Apellido:</label>
        <input style="width: 400px;" type="text" name="apellido" id="apellido" required><br>
        </div>

        <div class="mb-3">
        <label for="nombre">Nombre:</label>
        <input style="width: 400px;" type="text" name="nombre" id="nombre" required><br>
        </div>

        <div class="mb-3">
        <label for="direccion">Dirección:</label>
        <input style="width: 400px;" type="text" name="direccion" id="direccion" required><br>
        </div>

        <div class="mb-3">
        <label for="telefono">Teléfono:</label>
        <input style="width: 300px;" type="text" name="telefono" id="telefono" required><br>
        </div>

        <div class="mb-3">
        <label for="correo">Correo electrónico:</label>
        <input style="width: 400px;" type="text" name="correo" id="correo" required><br>
        </div>

        <button type="submit" class="btn btn-success">Agregar cliente</button>
    </form>
    
</div>    
</body>
</html>