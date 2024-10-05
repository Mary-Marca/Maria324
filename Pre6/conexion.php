
<?php
$host = 'localhost'; // Cambia esto si es necesario
$dbname = 'bdmaria'; // Cambia esto al nombre de tu base de datos
$username = 'usuario'; // Cambia esto a tu usuario de la base de datos
$password = 'YES'; // Cambia esto a tu contraseña de la base de datos

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit; // Salir si hay un error de conexión
}
?>
    

