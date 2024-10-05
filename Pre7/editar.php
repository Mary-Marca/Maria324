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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Manejo de la acción de editar
    $zona = $_POST['zona'];
    $ubicacion = $_POST['ubicacion'];
    $superficie = $_POST['superficie'];
    $distrito = $_POST['distrito'];
    $fecha_registro = $_POST['fecha_registro'];
    $codigo_catastral = $_POST['codigo_catastral'];

    $stmt = $pdo->prepare("UPDATE Catastro SET zona = ?, ubicacion = ?, superficie = ?, distrito = ?, fecha_registro = ?, codigo_catastral = ? WHERE ci = ?");
    $stmt->execute([$zona, $ubicacion, $superficie, $distrito, $fecha_registro, $codigo_catastral, $ci]);

    header("Location: detalles_catastro.php?ci=$ci");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Catastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Catastro para CI: <?php echo htmlspecialchars($ci); ?></h2>
    <form method="POST">
        <div class="form-group">
            <label for="zona">Zona:</label>
            <input type="text" name="zona" class="form-control" value="<?php echo htmlspecialchars($catastro['zona']); ?>" required>
        </div>
        <div class="form-group">
            <label for="ubicacion">Ubicación:</label>
            <input type="text" name="ubicacion" class="form-control" value="<?php echo htmlspecialchars($catastro['ubicacion']); ?>" required>
        </div>
        <div class="form-group">
            <label for="superficie">Superficie:</label>
            <input type="number" name="superficie" class="form-control" value="<?php echo htmlspecialchars($catastro['superficie']); ?>" required>
        </div>
        <div class="form-group">
            <label for="distrito">Distrito:</label>
            <input type="text" name="distrito" class="form-control" value="<?php echo htmlspecialchars($catastro['distrito']); ?>" required>
        </div>
        <div class="form-group">
            <label for="fecha_registro">Fecha de Registro:</label>
            <input type="date" name="fecha_registro" class="form-control" value="<?php echo htmlspecialchars($catastro['fecha_registro']); ?>" required>
        </div>
        <div class="form-group">
            <label for="codigo_catastral">Código Catastral:</label>
            <input type="text" name="codigo_catastral" class="form-control" value="<?php echo htmlspecialchars($catastro['codigo_catastral']); ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="detalles_catastro.php?ci=<?php echo urlencode($ci); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>