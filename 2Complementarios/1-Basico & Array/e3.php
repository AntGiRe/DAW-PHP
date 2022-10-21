<!DOCTYPE html>
<?php
	if($_POST)
	{
		$base = $_POST['base'];
		$exponente = $_POST['exp'];
		$validated = FALSE;
		if(!empty($base) && !empty($exponente))
			$validated = TRUE;
		else
			echo("<br><br><span class='alert alert-danger'>Todos los campos son obligatorios</span>");
	}
?>
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
			<label for="base">Base: </label>
			<input type="number" name="base" id="base" class="form-control" placeholder="Ingrese una base" value="<?php echo (isset($base) && $validated == FALSE)?$base:'';?>">
		</div>

		<div class="form-group">
			<label for="exp">Exponente: </label>
			<input type="number" name="exp" id="exp" class="form-control" placeholder="Ingrese un exponente"  value="<?php echo (isset($exponente) && $validated == FALSE)?$exponente:'';?>">
		</div>

		<button type="submit" name = "envio" class="btn btn-primary">
			Calcular
		</button>
	</form>
	<?php
		if(isset($validated) && $validated == TRUE)
		{
			$res = 1;
			for ($i = 0; $i < $exponente; $i++)
				$res *= $base;
			echo("El resultado es: $res");
		}
	?>
</body>
</html>