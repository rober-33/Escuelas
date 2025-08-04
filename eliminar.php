<?php
if (isset($_GET['id_alumno'])) {
    $id = $_GET['id_alumno'];

    include("conexion.php");

    $sql = "DELETE FROM alumnos WHERE id_alumno = $id";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script>alert('Registro eliminado correctamente'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar'); window.location.href = 'index.php';</script>";
    }

    mysqli_close($conexion);
} else {
    echo "<script>alert('ID inválido'); window.location.href = 'index.php';</script>";
}
?>