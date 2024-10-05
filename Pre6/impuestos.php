<?php
$con = mysqli_connect("localhost", "usuario", "YES", "bdmaria");

$sql = "SELECT 
    GROUP_CONCAT(CASE WHEN LEFT(c.codigo_catastral, 1) = '1' THEN CONCAT(u.nombre, ' ', u.paterno) END) AS Alto,
    GROUP_CONCAT(CASE WHEN LEFT(c.codigo_catastral, 1) = '2' THEN CONCAT(u.nombre, ' ', u.paterno) END) AS Medio,
    GROUP_CONCAT(CASE WHEN LEFT(c.codigo_catastral, 1) = '3' THEN CONCAT(u.nombre, ' ', u.paterno) END) AS Bajo
FROM 
    catastro c
JOIN 
    persona u ON c.ci = u.ci
WHERE 
    LEFT(c.codigo_catastral, 1) IN ('1', '2', '3');";

$res = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Impuestos</title>
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h3 class="display-6">Impuestos</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <td scope="col">Alto</td>
                <td scope="col">Medio</td>
                <td scope="col">Bajo</td>
            </tr>
        </thead>    
        <tbody>
            <?php
                while($fila1 = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td>" . $fila1['Alto'] . "</td>";
                    echo "<td>" . $fila1['Medio'] . "</td>";
                    echo "<td>" . $fila1['Bajo'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>