


<!DOCTYPE html>
<html>
    
<head>
    <title>Agregar Alumno</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conexion.php");

    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $nocontrol = mysqli_real_escape_string($conexion, $_POST['nocontrol']);

    $sql = "INSERT INTO alumnos (nom_alumno, ncon_alumno) VALUES ('$nombre', '$nocontrol')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script>alert('Datos ingresados correctamente'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error al ingresar los datos: " . mysqli_error($conexion) . "'); window.location.href = 'agregar.php';</script>";
    }

    mysqli_close($conexion);
} else {
?>

<h1>Agregar Nuevo Alumno</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>
    <label>No. Control:</label><br>
    <input type="text" name="nocontrol" required><br><br>
    <input type="submit" value="Agregar">
    <a href="index.php">Regresar</a>
</form>

<?php } ?>

</body>
</html>