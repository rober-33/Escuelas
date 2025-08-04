<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alumnos</title>
    <link rel="stylesheet" href="estilos.css">
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estás seguro? Se eliminarán los datos');
        }
    </script>
</head>
<body>

<?php
include("conexion.php");

$sql = "SELECT * FROM alumnos";
$resultado = mysqli_query($conexion, $sql);
?>

<h1>Lista de Alumnos</h1>
<a href="agregar.php" class="boton">Agregar Alumno</a><br><br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>No. Control</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($filas = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?php echo $filas['id_alumno']; ?></td>
                <td><?php echo $filas['nom_alumno']; ?></td>
                <td><?php echo $filas['ncon_alumno']; ?></td>
                <td>
                    <a href="editar.php?id_alumno=<?php echo $filas['id_alumno']; ?>">Editar</a> -
                    <a href="eliminar.php?id_alumno=<?php echo $filas['id_alumno']; ?>" onclick="return confirmar()">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php mysqli_close($conexion); ?>

</body>
</html>