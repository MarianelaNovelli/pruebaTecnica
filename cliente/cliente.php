<?php 

require_once('../conexion/conexion.php');

class Cliente {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function mostrar() {
        try {
            $sql = "SELECT * FROM `cliente`";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            $clientes = $stmt->fetchAll();
            return $clientes;
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        }
    }

    public function insertar($apellido, $nombre, $direccion, $telefono, $correo) {
        try {
            $sql = "INSERT INTO `cliente`(`apellido`, `nombre`, `direccion`, `telefono`, `correo`) VALUES (:apellido, :nombre, :direccion, :telefono, :correo)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error en la inserción: " . $e->getMessage();
            return false;
        }
    }

    public function eliminar($id) {
        try {
            $sql = "DELETE FROM cliente WHERE id_cliente = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error al eliminar el cliente: " . $e->getMessage();
            return false;
        }
    }
}

?>