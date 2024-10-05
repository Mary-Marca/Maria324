<?php
// Conexión a la base de datos
$con = mysqli_connect("localhost", "usuario", "YES", "bdmaria");

// Verificar conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Manejar el registro de la persona
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $distrito = $_POST['distrito'];
    $zona = $_POST['zona'];

    // Insertar persona
    $sql = "INSERT INTO Persona (ci, nombre, paterno) VALUES ('$ci', '$nombre', '$paterno')";
    if (mysqli_query($con, $sql)) {
        echo "Registro exitoso.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Persona</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <h1>Registrar Persona</h1>
    <form method="POST" action="">
        <input type="text" name="ci" placeholder="CI" required>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="paterno" placeholder="Apellido Paterno" required>
        
        <label for="distrito">Distrito:</label>
        <select id="distrito" name="distrito">
            <option value="">Seleccione un distrito</option>
            <?php
            $distritos = mysqli_query($con, "SELECT * FROM Distrito");
            while ($row = mysqli_fetch_assoc($distritos)) {
                echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
            }
            ?>
        </select>

        <label for="zona">Zona:</label>
        <select id="zona" name="zona">
            <option value="">Seleccione una zona</option>
        </select>

        <button type="submit">Registrar</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#distrito').change(function() {
                var distritoId = $(this).val();
                $.ajax({
                    url: 'get_zonas.php',
                    type: 'POST',
                    data: { distrito_id: distritoId },
                    success: function(data) {
                        $('#zona').html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>
