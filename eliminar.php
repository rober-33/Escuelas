<?php
include("conexion.php");

if (isset($_GET['id_alumno'])) {
    $id = $_GET['id_alumno'];

    $sql = "DELETE FROM alumnos WHERE id_alumno = $id";
    mysqli_query($conexion, $sql);
}

header("Location: index.php");
?>
