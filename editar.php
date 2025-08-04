<!DOCTYPE html>
<html>
<head>
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<?php
include("conexion.php");

if (isset($_GET['id_alumno'])) {
    $id = $_GET['id_alumno'];

    $sql = "SELECT * FROM alumnos WHERE id_alumno = $id";
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);
}

if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $nocontrol = $_POST['nocontrol'];
    $id = $_POST['id'];

    $sql = "UPDATE alumnos SET nom_alumno = '$nombre', ncon_alumno = '$nocontrol' WHERE id_alumno = $id";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script>alert('Datos actualizados'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar'); window.location.href = 'index.php';</script>";
    }

    mysqli_close($conexion);
} else {
?>

<h1>Editar Alumno</h1>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $fila['id_alumno']; ?>">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $fila['nom_alumno']; ?>" required><br>
    <label>No. Control:</label>
    <input type="text" name="nocontrol" value="<?php echo $fila['ncon_alumno']; ?>" required><br>
    <input type="submit" name="actualizar" value="Actualizar">
    <a href="index.php">Regresar</a>
</form>

<?php } ?>

</body>
</html>
