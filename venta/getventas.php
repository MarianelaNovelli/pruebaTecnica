<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Get Ventas</title>
</head>
<body>
    
<?php
    require_once('venta.php');

    $venta = new Venta($conexion);

    // Llamar al método mostrar() y obtener las ventas
    $ventas = $venta->mostrar();
?>
    
<div class="container">
    <!-- Botón "Atrás" -->
    <div class="py-3 mx-4">
        <a href="../index.php" class="btn btn-secondary mb-3">Volver atrás</a>
    </div>
    
    <h1 class="text-center py-3">Listado de ventas</h1>

        <div class="table-responsive mt-5">
            <table class="table table-striped table-ligh text-center">
                <thead>
                    <tr class="table-success">
                        <th scope="col">N° venta</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Total a pagar</th>
                        <th scope="col">Ticket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($ventas) {
                            foreach ($ventas as $venta) {
                                echo '
                                <tr>
                                <td class="align-middle">'.$venta['id_venta'].'</td>
                                <td class="align-middle">'.$venta['fecha'].'</td>
                                <td class="align-middle">'.$venta['producto'].'</td>
                                <td class="align-middle">'.$venta['cantidad'].'</td>
                                <td class="align-middle">'.$venta['subtotal'].'</td>
                                <td class="align-middle">'.$venta['total_venta'].'</td>
                                <td class="align-middle"><a href="../ticket/ticket.php?id_venta='.$venta['id_venta'].'"><i class="fa-solid fa-eye"></i></a></td>
                                </tr>';
                        }
                    }                            
                    ?>
                </tbody>
            </table>
</body>
</html>