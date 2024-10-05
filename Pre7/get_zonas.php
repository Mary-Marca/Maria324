<?php
$con = mysqli_connect("localhost", "usuario", "YES", "bdmaria");

if (isset($_POST['distrito_id'])) {
    $distrito_id = $_POST['distrito_id'];
    $zonas = mysqli_query($con, "SELECT * FROM Zona WHERE distrito_id = '$distrito_id'");

    $options = "<option value=''>Seleccione una zona</option>";
    while ($row = mysqli_fetch_assoc($zonas)) {
        $options .= "<option value='{$row['id']}'>{$row['nombre']}</option>";
    }

    echo $options;
}
?>

