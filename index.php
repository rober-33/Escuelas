<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alumnos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #003366;
        }

        table {
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #003366;
            color: white;
        }

        a {
            margin: 0 5px;
            text-decoration: none;
            color: #0066cc;
        }

        a:hover {
            text-decoration: underline;
        }

        .add-link {
            display: inline-block;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>

    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estás seguro? Se eliminarán los datos.');
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
<a class="add-link" href="agregar.php">➕ Agregar Alumno</a>

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
        <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $fila['id_alumno']; ?></td>
            <td><?php echo $fila['nom_alumno']; ?></td>
            <td><?php echo $fila['ncon_alumno']; ?></td>
            <td>
                <a href="editar.php?id_alumno=<?php echo $fila['id_alumno']; ?>">✏️ Editar</a> |
                <a href="eliminar.php?id_alumno=<?php echo $fila['id_alumno']; ?>" onclick="return confirmar()">🗑️ Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php mysqli_close($conexion); ?>

</body>
</html>