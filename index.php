<html>
<head>
	<title>Lista de Alumnos</title>
	
	<!--Funcion de control, que permite solicitar al usuario que confirme si desea realmente eliminar el registro-->

	<script type="text/javascript"> 
		function confirmar(){
			return confirm ('Estas seguro? Se eliminaran los datos');
		}
		</script>

</head>
<body>

<?php

	include("conexion.php"); //conectar con la BD



	$sql="Select * from alumnos"; 	//Para Hacer Consultas, recuperar, traer los datos de la tabla alumno
	
	$resultado=mysqli_query($conexion, $sql); // Variable que contiene la consulta a la base datos (tanto conexion como registros de la tabla)
?>

	<h1>Lista de Alumnos</h1>
	<a href="Agregar.php">Agregar Alumno</a><br><br>
	<table>
		<thead>
			<tr>
			
				<th>Id</th>  <!--Definir las columnas que necesito de acuerdo a la cantidad de campos que quiera utilizar (encabezados)-->
				<th>Nombre</th>
				<th>No. Control</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>

			<?php
				while ($filas=mysqli_fetch_assoc($resultado)) { //el while es una sentencia de repeticion que me permite capturar la cantidad de filas que existe en la tabla, y mysq mysqli_fetch_assoc extrae una fila del resultado como un array o vector.
					?>
			<tr>

			<!--Definir columnas para mostrar los registos de los campos definidos en la etiquete <th></th>	(despues del encabezados) y traer los datos de la BD a mostrar-->

				<td>	<?php  echo $filas ['id_alumno']  ?>	</td> <!-- echo muestra la información que esta en la variables filas obtenida por el while -->
				<td>	<?php  echo $filas ['nom_alumno']  ?>	</td>
				<td>	<?php  echo $filas ['ncon_alumno']  ?>	</td>
			
			
			<!--en la ultima columna se definen dos vinculos editar y eliminar-->
			
				<td>

<!--   Esto sirve para saber qué alumno se va a editar -->
<!--  $filas['id_alumno'] obtiene el ID del alumno actual desde el array $filas -->

<?php echo "<a href='editar.php?id_alumno=".$filas['id_alumno']."'>EDITAR</a>";  ?>
					-
<?php echo "<a href='eliminar.php?id_alumno=".$filas['id_alumno']."' onclick='return confirmar()'>ELIMINAR</a>"; ?>
				</td>
			</tr>
<?php
			}
?>

		</tbody>

	</table>
<?php
		mysqli_close($conexion);
?>


</body>



</html>
