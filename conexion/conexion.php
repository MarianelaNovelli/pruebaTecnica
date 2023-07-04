<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermercado";

try {
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    
} catch(PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

?>