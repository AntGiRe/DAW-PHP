<?php
	include "../functions.php";

	$con = getCon("amigos");

	//Recupera la sesión
	session_start();
	header("Cache-Control: no-cache, must-revalidate");

	//En caso de que no se haya pasado por la autentificación
	if(!isset($_SESSION['usuario']))
		die("Tienes que pasar por la autentificación HTTP - Pincha <a href='formulario1.php'>aquí</a>");

	//Si viene del formulario 2 se añaden los ultimos campos en la sesion
	if(isset($_GET['enviar']))
	{
		$conv = $_GET['conv'];
		$aficiones = $_GET['aficiones'];
		$aficiones = implode("-", $aficiones);
		$fav = $_GET['fav'];
		$_SESSION['usuario'] .= ",".$conv.",".$aficiones.",".$fav;
		header("Location: formulario3.php");
	}

	$usr = explode(",", $_SESSION['usuario']);

	//Si pulso CSV o JSON se generan los documentos. Si pulso BD se inserta en la BD
	if(isset($_POST['csv']))
		toCSV("Nombre y apellidos, Email, URL, Sexo, Numero de convivientes, Aficiones, Favorito", $usr);
	else if(isset($_POST['json']))
		toJSON($usr);
	else if(isset($_POST['insertar']))
	{
		//Me ha faltado insertar las aficiones
		if(insertAmigo($con, $usr) && insertarAfic($con, $usr))
			$disabled = "";
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ejercicio 3 - PHP</title>
	</head>
	<body>
		<table border="all">
			<thead>
				<tr>
					<td><strong>Nombre y apellidos</strong></td>
					<td><strong>Email</strong></td>
					<td><strong>URL</strong></td>
					<td><strong>Sexo</strong></td>
					<td><strong>Numero de convivientes</strong></td>
					<td><strong>Aficiones</strong></td>
					<td><strong>Favorito</strong></td>
				</tr>
			</thead>
			<tr style="background-color:aquamarine;">
				<td>
					<?php echo $usr[0]; ?>
				</td>
				<td>
					<?php echo $usr[1]; ?>
				</td>
				<td>
					<?php echo $usr[2]; ?>
				</td>
				<td>
					<?php echo $usr[3]; ?>
				</td>
				<td>
					<?php echo $usr[4]; ?>
				</td>
				<td>
					<?php echo $usr[5]; ?>
				</td>
				<td>
					<?php echo $usr[6]; ?>
				</td>
			</tr>
			<?php
				$resultado = getRows($con, "tb_amigos");
				while($filas = $resultado->fetch())
				{
					echo "<tr>";
					echo "<td>".$filas[0]."</td>";
					echo "<td>".$filas[1]."</td>";
					echo "<td>".$filas[2]."</td>";
					echo "<td>".$filas[3]."</td>";
					echo "<td>".$filas[4]."</td>";
					echo "<td>".getAficiones($con, $filas[0])."</td>";
					echo "<td>".$filas[5]."</td>";
					echo "</tr>";
				}
			?>
		</table>
		<form method="post">
			<button type="submit" name="csv">Crear CSV</button>
			<button type="submit" name="json">Crear JSON</button>
			<button type="submit" name="insertar" <?php echo (isset($disabled))?"disabled":''; ?>>Insertar BD</button>
		</form>
	</body>
</html>