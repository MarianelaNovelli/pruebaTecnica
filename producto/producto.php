<?php 

require_once('../conexion/conexion.php');

class Producto {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function mostrar() {
        try {
            $sql = "SELECT p.*, (SELECT nombre FROM categoria_producto WHERE id_categoria = p.id_categoria) AS nombre_categoria FROM producto p;";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            $productos = $stmt->fetchAll();
            return $productos;
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        }
    }

    public function insertar($nombre, $descripcion, $categoriaId, $fecha_vencimiento, $inventario) {
        try {
            $sql = "INSERT INTO `producto`(`nombre`, `descripcion`, `fecha_vencimiento`, `inventario`, `id_categoria`) VALUES (:nombre, :descripcion, :fecha_vencimiento, :inventario, :categoriaId)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':categoriaId', $categoriaId);
            $stmt->bindParam(':fecha_vencimiento', $fecha_vencimiento);
            $stmt->bindParam(':inventario', $inventario);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error en la inserción: " . $e->getMessage();
            return false;
        }
    }

    public function eliminar($id) {
        try {
            $sql = "DELETE FROM producto WHERE id_producto = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error al eliminar el producto: " . $e->getMessage();
            return false;
        }
    }
}

?>