<?php
	//Se piden usuario y contraseña para verificarlo
	if (!isset($_SERVER['PHP_AUTH_USER'])){
		header('WWW-Authenticate: Basic Realm="Contenido restringido"');
		header('HTTP/1.0 401 Unauthorized');
		echo "¡Usuario no reconocido!";
		exit;
	}
	//Si ese usuario es dwes y contraseña dwes, creamos sesion. Si no, error.
	if ($_SERVER['PHP_AUTH_USER'] != 'dwes' || $_SERVER['PHP_AUTH_PW'] !='dwes') {
		header ('WWW-Authenticate: Basic Realm=”Contenido restringido”');
		header ('HTTP/1.0 401 Unauthorized');
		echo "¡Usuario no reconocido!";
		exit;
	}
	else
	{
		//Recupera la sesión
		session_start();
		if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != "")
		{
			$usr = explode(",", $_SESSION['usuario']);
			$_SESSION['usuario'] = "";
		}
		else
			$_SESSION['usuario'] = "";
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
		<h1>Formulario</h1>
		<?php
			if(isset($_COOKIE['error']))
			{
				echo "<span style='background-color:red';>".$_COOKIE['error']."</span>";
				setcookie("error", "", 1);
			}
		?>
		<form action="formulario2.php" method="get">
			<table>
				<tr>
					<td>
						<label for="name">Nombre y apellidos</label>
					</td>
					<td>
						<input type="text" id="name" name="name" value="<?php echo (isset($usr))?$usr[0]:''; ?>"required>
					</td>
				</tr>
				<tr>
					<td>
						<label for="email">Email</label>
					</td>
					<td>
						<input type="email" id="email" name="email" value="<?php echo (isset($usr))?$usr[1]:''; ?>" required>
					</td>
				</tr>
				<tr>
					<td>
						<label for="url">URL</label>
					</td>
					<td>
						<input type="text" id="url" name="url" value="<?php echo (isset($usr))?$usr[2]:''; ?>" required>
					</td>
				</tr>
				<tr>
					<td>
						<label>Sexo:</label>
					</td>
					<td>
						<label for="h">Hombre</label><input type="radio" id="h" name="sexo" value="Mujer" <?php echo (isset($usr) && $usr[3] == "h")?"checked":''; ?> required>
						<label for="m">Mujer</label><input type="radio" id="m" name="sexo" value="Hombre" <?php echo (isset($usr) && $usr[3] == "m")?"checked":''; ?> required>
					</td>
				</tr>
			</table>
			<button type="submit">Enviar</button>
		</form>
	</body>
</html>