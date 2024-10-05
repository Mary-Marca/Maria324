<?php
include 'conexion.php';

$personas = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST['ci'];

    $sql = "SELECT * FROM Persona WHERE ci='$ci'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $personas[] = $row;
        }
    } else {
        echo "No se encontraron resultados.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Persona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Buscar Persona</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="ci">Carnet de Identidad:</label>
            <input type="text" class="form-control" id="ci" name="ci" required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <?php if (!empty($personas)) : ?>
        <h3>Resultados:</h3>
        <ul>
            <?php foreach ($personas as $persona) : ?>
                <li><?php echo $persona['nombre'] . ' ' . $persona['paterno'] . ' (CI: ' . $persona['ci'] . ')'; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>