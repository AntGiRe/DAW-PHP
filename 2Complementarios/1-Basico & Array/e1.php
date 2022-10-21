<?php
	include 'funciones.php';
	if($_POST)
	{
		$name = $_POST['name'];
		$ap1 = $_POST['ap1'];
		$ap2 = $_POST['ap2'];
		$mail = $_POST['mail'];
		$anyo = $_POST['anyo'];
		$tlf = $_POST['tlf'];
		$validated = FALSE;
		if(!empty($name) && !empty($ap1) && !empty($ap2) && !empty($mail) && !empty($anyo) && !empty($tlf))
		{
			$validated = TRUE;
			echo("<br><br><span class='alert alert-success'>Campos añadidos correctamente</span>");
		}
		else
			echo("<br><br><span class='alert alert-danger'>Todos los campos son obligatorios</span>");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="style/style.css" type="text/css">
	<title>Document</title>
</head>
<body>
	<form method="post" action="">
		<div class="form-group">
			<label for="name">Nombre: </label>
			<input type="text" name="name" id="name" class="form-control" placeholder="Ingrese un nombre" value="<?php echo (isset($name) && $validated == FALSE)?$name:'';?>">
		</div>

		<div class="form-group">
			<label for="ap1">Primer apellido: </label>
			<input type="text" name="ap1" id="ap1" class="form-control" placeholder="Ingrese el primer apellido"  value="<?php echo (isset($ap1) && $validated == FALSE)?$ap1:'';?>">
		</div>

		<div class="form-group">
			<label for="ap2">Segundo apellido: </label>
			<input type="text" name="ap2" id="ap2" class="form-control" placeholder="Ingrese el segundo apellido"  value="<?php echo (isset($ap2) && $validated == FALSE)?$ap2:'';?>">
		</div>

		<div class="form-group">
			<label for="mail">Email: </label>
			<input type="mail" name="mail" id="mail" class="form-control" placeholder="Ingrese un correo electronico"  value="<?php echo (isset($mail) && $validated == FALSE)?$mail:'';?>">
		</div>

		<div class="form-group">
			<label for="anyo">Año de nacimiento: </label>
			<input type="number" name="anyo" id="anyo" class="form-control" placeholder="Ingrese un año de nacimiento"  value="<?php echo (isset($anyo) && $validated == FALSE)?$anyo:'';?>">
		</div>

		<div class="form-group">
			<label for="tlf">Telefono: </label>
			<input type="text" name="tlf" id="tlf" class="form-control" placeholder="Ingrese un telefono"  value="<?php echo (isset($tlf) && $validated == FALSE)?$tlf:'';?>">
		</div>

		<button type="submit" name = "envio" class="btn btn-primary">
			Ingresar
		</button>
	</form>
	<?php
		if(isset($validated) && $validated == TRUE)
			showTableOneRow(["Nombre","Primer apellido","Segundo apellido","Email","Año de nacimiento","Telefono"], [$name, $ap1, $ap2, $mail, $anyo, $tlf]);
	?>
</body>
</html>