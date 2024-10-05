<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'usuario') {
    header('Location: login.php');
    exit;
}

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

// Obtener datos del usuario desde la base de datos
$ci = $_SESSION['username']; // Se asume que username es el CI
$sqlPersona = "SELECT * FROM Persona WHERE ci = ?";
$stmtPersona = $conn->prepare($sqlPersona);
$stmtPersona->bind_param('s', $ci);
$stmtPersona->execute();
$resultPersona = $stmtPersona->get_result();

// Verificar si se encontró el usuario
if ($resultPersona->num_rows === 1) {
    $usuario = $resultPersona->fetch_assoc();
} else {
    die("Usuario no encontrado.");
}

// Obtener datos de Catastro para este usuario
$sqlCatastro = "SELECT * FROM Catastro WHERE ci = ?";
$stmtCatastro = $conn->prepare($sqlCatastro);
$stmtCatastro->bind_param('s', $ci);
$stmtCatastro->execute();
$resultCatastro = $stmtCatastro->get_result();

// Cerrar la conexión
$stmtPersona->close();
$stmtCatastro->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Bienvenido al Dashboard de Usuario, <?php echo htmlspecialchars($usuario['nombre']) . ' ' . htmlspecialchars($usuario['paterno']); ?>!</h2>
    <p>Aquí puedes acceder a tus trámites.</p>

    <h4>Datos Personales</h4>
    <p><strong>CI:</strong> <?php echo htmlspecialchars($usuario['ci']); ?></p>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario['nombre']); ?></p>
    <p><strong>Apellido Paterno:</strong> <?php echo htmlspecialchars($usuario['paterno']); ?></p>

    <h4>Datos de Catastro</h4>
    <?php if ($resultCatastro->num_rows > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Zona</th>
                    <th>Ubicación</th>
                    <th>Superficie</th>
                    <th>Distrito</th>
                    <th>Fecha de Registro</th>
                    <th>Código Catastral</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($catastro = $resultCatastro->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($catastro['id']); ?></td>
                        <td><?php echo htmlspecialchars($catastro['zona']); ?></td>
                        <td><?php echo htmlspecialchars($catastro['ubicacion']); ?></td>
                        <td><?php echo htmlspecialchars($catastro['superficie']); ?></td>
                        <td><?php echo htmlspecialchars($catastro['distrito']); ?></td>
                        <td><?php echo htmlspecialchars($catastro['fecha_registro']); ?></td>
                        <td><?php echo htmlspecialchars($catastro['codigo_catastral']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay datos de catastro para este usuario.</p>
    <?php endif; ?>

    <a href="login.php" class="btn btn-danger">Cerrar Sesión</a>
</div>
</body>
</html>
