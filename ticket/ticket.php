<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="ticket.css">
</head>
<body>
<?php

    require_once('../conexion/conexion.php');
    require_once('../venta/venta.php');

    $ticket = new Venta($conexion);

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_venta'])) {
        $idVenta = $_GET['id_venta'];

        $ticket = new Venta($conexion);

        $resultado = $ticket->getticket($idVenta);
        
    }
?>
</body>

<body>
    <div class="control-bar">
    <div class="container">
        <div class="row">
        <div class="col-2-4">
            <div class="slogan">Ticket</div>         
        </div>
        <div class="col-4 text-right">
            <a class="boton-servicios" href="javascript:window.print()">Imprimir</a>
        </div>
        </div>
    </div>
    </div>

    <header class="row">

        <div class="encabezadoFactura">
            <div class="info">
                <p><b>Nombre sucursal: </b><?php echo $resultado[0]['sucursal']; ?></p>
                <p><b>Direccion: </b><?php echo $resultado[0]['direccion_sucursal']; ?></p>
            </div>
        </div>
    </header>

    <div class="row section">
            <div class="col-2">
                <h1>TICKET DE COMPRA</h1>
            </div>

        <div class="col-2 text-right details">
            <p >
            <b>Fecha:</b> <p><?php echo $resultado[0]['fecha']; ?></p><br>
            <b>Ticket N°:</b> <p> <?php echo time(); ?></p><br>
            </p>
        </div>
        
        <div class="col-2 p-3">
            <p class="client">
            <h1>Datos del cliente</h1>
            <b>Apellido: </b><?php echo $resultado[0]['apellido']; ?><br>
            <b>Nombre: </b><?php echo $resultado[0]['nombre']; ?><br>
            </p>
        </div>
    </div>

<div class="row section" style="margin-top:-1rem">
    <div class="col-1">
        <table style='width:100%'>
        <thead>
        <tr class="invoice_detail">
            <th width="25%">Medio de pago</th>
            <th width="25%">Tipo de moneda</th>
        </tr> 
        </thead>
        <tbody>
        <tr class="invoice_detail">
            <td width="25%"><?php echo $resultado[0]['forma_pago']; ?></td>
            <td width="30%"><?php echo $resultado[0]['tipo_moneda']; ?></td>
        </tr>
        </tbody>
        </table>
    </div>
</div>

<div class="invoicelist-body" style="margin-top:3rem">
    <table>
        <thead>
            <th width="20%" class="text-center">Producto</th>
            <th width="25%" class="text-center">Cantidad</th>
            <th width="45%" class="text-center">Subtotal</th>
        </thead>
        <tbody>
            
        <tr>
        <?php
                    if ($resultado) {
                        foreach ($resultado as $resultados) {
                            echo '
                            <tr>
                            <td width="20%" class="text-center">'.$resultados['producto'].'</td>
                            <td width="25%" class="text-center">'.$resultados['cantidad'].'</td>
                            <td width="20%" class="text-center">'.$resultados['subtotal'].'</td>
                            </tr>';
                    }
                }                            
        ?>
        </tr>
    </table>
</div>

<div class="invoicelist-footer">
    <table>
        <tr>
        <td><b>TOTAL: </b></td>
        <td class="totalFactura" id="total_price"><b><?php echo $resultado[0]['monto_total']; ?></b></td>
        </tr>
    </table>
    </div>

<footer class="row">
    <div class="col-1 text-center">
        <p class="notaxrelated">NO VÁLIDO COMO FACTURA</p>
    </div>
</footer> 

</body>
</html>
