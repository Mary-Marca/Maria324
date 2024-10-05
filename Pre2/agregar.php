<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'administrativo') {
    header('Location: login.php');
    exit;
}

include 'conexion.php'; // Incluir archivo de conexión

// Obtener el CI de la URL
$ci = $_GET['ci'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Manejo de la acción de añadir
    $zona = $_POST['zona'];
    $ubicacion = $_POST['ubicacion'];
    $superficie = $_POST['superficie'];
    $distrito = $_POST['distrito'];
    $fecha_registro = $_POST['fecha_registro'];
    $codigo_catastral = $_POST['codigo_catastral'];

    $stmt = $pdo->prepare("INSERT INTO Catastro (zona, ubicacion, superficie, ci, distrito, fecha_registro, codigo_catastral) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$zona, $ubicacion, $superficie, $ci, $distrito, $fecha_registro, $codigo_catastral]);

    header("Location: detalles_catastro.php?ci=$ci");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Catastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Añadir Catastro para CI: <?php echo htmlspecialchars($ci); ?></h2>
    <form method="POST">
        <div class="form-group">
            <label for="zona">Zona:</label>
            <input type="text" name="zona" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ubicacion">Ubicación:</label>
            <input type="text" name="ubicacion" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="superficie">Superficie:</label>
            <input type="number" name="superficie" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="distrito">Distrito:</label>
            <input type="text" name="distrito" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha_registro">Fecha de Registro:</label>
            <input type="date" name="fecha_registro" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="codigo_catastral">Código Catastral:</label>
            <input type="text" name="codigo_catastral" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Añadir</button>
        <a href="detalles_catastro.php?ci=<?php echo urlencode($ci); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>