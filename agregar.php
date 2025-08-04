<!DOCTYPE html>
<html>
<head>
    <title>Agregar Alumno</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<?php
if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $nocontrol = $_POST['nocontrol'];

    include("conexion.php");

    $sql = "INSERT INTO alumnos (nom_alumno, ncon_alumno) VALUES ('$nombre', '$nocontrol')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script>alert('Datos ingresados correctamente'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error al ingresar los datos'); window.location.href = 'index.php';</script>";
    }

    mysqli_close($conexion);
} else {
?>

<h1>Agregar Nuevo Alumno</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>
    <label>No. Control:</label>
    <input type="text" name="nocontrol" required><br>
    <input type="submit" name="enviar" value="Agregar">
    <a href="index.php">Regresar</a>
</form>

<?php } ?>

</body>
</html>