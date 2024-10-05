<?php
session_start();

// Conectar a la base de datos
$host = 'localhost';
$usuario = 'usuario'; // Cambia esto a tu usuario de MySQL
$contraseña = 'YES'; // Cambia esto a tu contraseña de MySQL
$bd = 'bdmaria'; // Nombre de tu base de datos

$conn = new mysqli($host, $usuario, $contraseña, $bd);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Simulación de credenciales (manteniendo el admin)
$users = [
    'admin' => ['password' => 'adminpass', 'role' => 'administrativo'],
];

// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Verificar si el usuario es admin
if (isset($users[$username]) && $users[$username]['password'] === $password) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $users[$username]['role'];

    // Redirigir según el tipo de usuario
    header('Location: admin.php'); // Cambiar a la página de administración
    exit;
}

// Si no es admin, verificar en la base de datos
$sql = "SELECT ci, nombre, paterno FROM Persona WHERE ci = ? AND nombre = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $username, $password); // Cambia esto si necesitas otra forma de autenticar
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['ci']; // Guardar el CI como nombre de usuario
    $_SESSION['role'] = 'usuario'; // Asignar rol de usuario

    // Redirigir a la página de usuario
    header('Location: usuario.php');
    exit;
} else {
    // Redirigir de vuelta al login con un mensaje de error
    header('Location: login.php?error=1');
    exit;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
