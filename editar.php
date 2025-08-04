<?php
include("conexion.php");

if (isset($_GET['id_alumno'])) {
    $id = $_GET['id_alumno'];

    // Obtener los datos actuales del alumno
    $sql = "SELECT * FROM alumnos WHERE id_alumno = $id";
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);
}

if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $ncontrol = $_POST['ncontrol'];

    $sql = "UPDATE alumnos SET nom_alumno='$nombre', ncon_alumno='$ncontrol' WHERE id_alumno=$id";
    mysqli_query($conexion, $sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
</head>
<body>
    <h1>Editar Alumno</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $fila['nom_alumno']; ?>" required><br><br>
        <label>No. Control:</label>
        <input type="text" name="ncontrol" value="<?php echo $fila['ncon_alumno']; ?>" required><br><br>
        <input type="submit" name="actualizar" value="Actualizar">
    </form>
</body>
</html>