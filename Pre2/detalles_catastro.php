<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'administrativo') {
    header('Location: login.php');
    exit;
}

include 'conexion.php'; // Incluir archivo de conexión

// Obtener el CI de la URL
$ci = $_GET['ci'] ?? null;

if ($ci) {
    // Consultar los datos del catastro de la persona por CI
    $stmt = $pdo->prepare("SELECT * FROM Catastro WHERE ci = ?");
    $stmt->execute([$ci]);
    $catastro = $stmt->fetch();
} else {
    // Redirigir si no se proporciona el CI
    header('Location: admin.php');
    exit;
}

// Manejo de la acción de eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM Catastro WHERE ci = ?");
    $stmt->execute([$ci]);

    header("Location: admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Catastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Detalles del Catastro</h2>
    <a href="admin.php" class="btn btn-secondary">Volver</a>

    <?php if ($catastro): ?>
        <h4>Información del Catastro para CI: <?php echo htmlspecialchars($ci); ?></h4>
        <ul class="list-group mt-3">
            <li class="list-group-item"><strong>Zona:</strong> <?php echo htmlspecialchars($catastro['zona']); ?></li>
            <li class="list-group-item"><strong>Ubicación:</strong> <?php echo htmlspecialchars($catastro['ubicacion']); ?></li>
            <li class="list-group-item"><strong>Superficie:</strong> <?php echo htmlspecialchars($catastro['superficie']); ?> m²</li>
            <li class="list-group-item"><strong>Distrito:</strong> <?php echo htmlspecialchars($catastro['distrito']); ?></li>
            <li class="list-group-item"><strong>Fecha de Registro:</strong> <?php echo htmlspecialchars($catastro['fecha_registro']); ?></li>
            <li class="list-group-item"><strong>Código Catastral:</strong> <?php echo htmlspecialchars($catastro['codigo_catastral']); ?></li>
        </ul>

        <!-- Botones para acciones -->
        <div class="mt-4">
            <a href="editar.php?ci=<?php echo urlencode($ci); ?>" class="btn btn-warning">Editar</a>
            <form method="POST" action="" style="display:inline;">
                <input type="hidden" name="ci" value="<?php echo htmlspecialchars($ci); ?>">
                <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">Eliminar</button>
            </form>
            <a href="agregar.php?ci=<?php echo urlencode($ci); ?>" class="btn btn-success">Añadir</a>
        </div>

    <?php else: ?>
        <p>No se encontraron detalles de catastro para este CI.</p>
    <?php endif; ?>
</div>
</body>
</html>