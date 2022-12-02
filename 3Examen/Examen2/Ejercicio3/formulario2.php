<?php
	//Recupera la sesión
	session_start();

	//En caso de que no se haya pasado por la autentificación
	if(!isset($_SESSION['usuario']))
		die("Tienes que pasar por la autentificación HTTP - Pincha <a href='formulario1.php'>aquí</a>");
	
	$name = $_GET['name'];
	$email = $_GET['email'];
	$url = $_GET['url'];
	$sexo = $_GET['sexo'];

	$_SESSION['usuario'] = $name.",".$email.",".$url.",".$sexo;

	//Se controlan si estan vacios, aunque el form tiene 'required' puede el usuario haber puesto un enlace a mano
	if(empty($name) && empty($email) && empty($url) && empty($sexo))
	{
		setcookie("error", "No pueden haber campos vacios", time()+60);
		header("Location: formulario1.php");
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
		<h1>Formulario 2</h1>
		<form action="formulario3.php" method="get">
			<table>
				<tr>
					<td>
						<label for="conv">Numero de convivientes en el domicilio</label>
					</td>
					<td>
						<input type="number" id="conv" name="conv" required>
					</td>
				</tr>
				<tr>
					<td>
						<label>Aficiones:</label>
					</td>
					<td>
						<label for="f">Futbol</label><input type="checkbox" id="f" name="aficiones[]" value="futbol">
						<label for="t">Tenis</label><input type="checkbox" id="t" name="aficiones[]" value="tenis">
						<label for="b">Baloncesto</label><input type="checkbox" id="b" name="aficiones[]" value="baloncesto">
						<label for="s">Senderismo</label><input type="checkbox" id="s" name="aficiones[]" value="Senderismo">
					</td>
				</tr>
				<tr>
					<td>
						<label>Favorito:</label>
					</td>
					<td>
						<select name='fav' required>
							<optgroup>
								<option>Cine</option>
								<option>Musica</option>
								<option>Series</option>
								<option>Naturaleza</option>
							</optgroup>
                		</select>
					</td>
				</tr>
			</table>
			<button type="submit" name="enviar">Enviar</button>
		</form>
	</body>
</html>