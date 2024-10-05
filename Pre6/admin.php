<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'administrativo') {
    header('Location: login.php');
    exit;
}

include 'conexion.php'; // Incluir archivo de conexión

// Consultar personas y sus catastros
$stmt = $pdo->prepare("
    SELECT p.ci, p.nombre, p.paterno
    FROM persona p 
    LEFT JOIN catastro c ON p.ci= c.ci
");
$stmt->execute();
$personas = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrativo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Bienvenido Administrativo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Aquí puedes gestionar la información del catastro.</p>
    <a href="login.php" class="btn btn-danger">Cerrar Sesión</a>

    <h3 class="mt-5">Personas Registradas y su Catastro</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Detalles Catastro</th> <!-- Nueva columna para el botón -->
            </tr>
        </thead>
        <tbody>
            <?php if ($personas): ?>
                <?php foreach ($personas as $persona): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($persona['ci']); ?></td>
                        <td><?php echo htmlspecialchars($persona['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($persona['paterno']); ?></td>
                        <td>
                            <a href="detalles_catastro.php?ci=<?php echo urlencode($persona['ci']); ?>" class="btn btn-info">Ver Detalles</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No hay personas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>