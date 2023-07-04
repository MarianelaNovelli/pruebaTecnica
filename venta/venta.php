<?php 

require_once('../conexion/conexion.php');

class Venta {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function mostrar() {
        try {
            $sql = ("SELECT v.id_venta, v.fecha, dv.cantidad, p.nombre as producto, dv.subtotal, (SELECT SUM(dv2.subtotal) FROM detalle_venta dv2 WHERE dv2.id_venta = v.id_venta) as total_venta 
            FROM venta v 
            INNER JOIN detalle_venta dv ON v.id_venta = dv.id_venta 
            INNER JOIN producto p ON p.id_producto = dv.id_producto;");
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            $ventas = $stmt->fetchAll();
            return $ventas;
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        }
    }

    public function getticket($idVenta){
        try {
            $sql = "SELECT venta.fecha, venta.monto_total, venta.forma_pago, venta.tipo_moneda, detalle_venta.cantidad, detalle_venta.subtotal, cliente.apellido, cliente.nombre, cliente.direccion, cliente.telefono, (SELECT sucursal.nombre FROM sucursal WHERE sucursal.id_sucursal = venta.id_sucursal) as sucursal, (SELECT sucursal.direccion FROM sucursal WHERE sucursal.id_sucursal = venta.id_sucursal) as direccion_sucursal, (SELECT producto.nombre FROM producto WHERE producto.id_producto = detalle_venta.id_producto) as producto FROM venta INNER JOIN detalle_venta ON detalle_venta.id_venta = venta.id_venta INNER JOIN cliente ON cliente.id_cliente = venta.id_cliente WHERE venta.id_venta = :id;";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $idVenta);
            $stmt->execute();
            $ticket = $stmt->fetchAll();
            return $ticket;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function insertar($fecha, $monto_total, $forma_pago, $tipo_moneda, $id_cliente, $id_sucursal, $cantidad, $precio_unitario, $subtotal, $id_producto) {
        try {
            $sql = "INSERT INTO `venta`(`fecha`, `monto_total`, `forma_pago`, `tipo_moneda`, `id_cliente`, `id_sucursal`) VALUES (:fecha, :monto_total, :forma_pago, :tipo_moneda, :id_cliente, :id_sucursal)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':monto_total', $monto_total);
            $stmt->bindParam(':forma_pago', $forma_pago);
            $stmt->bindParam(':tipo_moneda', $tipo_moneda);
            $stmt->bindParam(':id_cliente', $id_cliente);
            $stmt->bindParam(':id_sucursal', $id_sucursal);
            
            $stmt->execute();
            
            // Capturar el ID de la venta recién insertada
            $id_venta = $this->conexion->lastInsertId();
            
            // Insertar en la tabla "detalle_venta"
            $sql_detalle = "INSERT INTO `detalle_venta`(`cantidad`, `precio_unitario`, `subtotal`, `id_venta`,`id_producto`) VALUES (:cantidad, :precio_unitario, :subtotal, :id_venta, :id_producto)";      
            $stmt_detalle = $this->conexion->prepare($sql_detalle);
            $stmt_detalle->bindParam(':cantidad', $cantidad);
            $stmt_detalle->bindParam(':precio_unitario', $precio_unitario);
            $stmt_detalle->bindParam(':subtotal', $subtotal);
            $stmt_detalle->bindParam(':id_venta', $id_venta);
            $stmt_detalle->bindParam(':id_producto', $id_producto);

            $stmt_detalle->execute();
            return true;
        } catch (Exception $e) {
            echo "Ha ocurrido un error durante la inserción de datos: " . $e->getMessage();
            return false;
    }
    }

}

?>