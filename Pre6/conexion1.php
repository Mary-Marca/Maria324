<?php
$host = 'localhost';  // Cambia si es necesario
$user = 'usuario';       // Cambia si es necesario
$password = 'Yes';       // Cambia si es necesario
$dbname = 'bdmaria';  // Nombre de la base de datos

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>