<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];

    $sql = "INSERT INTO persona (ci, nombre, paterno) VALUES ('$ci', '$nombre', '$paterno')";

    if ($con->query($sql) === TRUE) {
        echo "Persona agregada exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Persona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Agregar Persona</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="ci">Carnet de Identidad:</label>
            <input type="text" class="form-control" id="ci" name="ci" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="paterno">Apellido Paterno:</label>
            <input type="text" class="form-control" id="paterno" name="paterno" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>