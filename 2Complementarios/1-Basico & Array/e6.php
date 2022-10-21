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
			<label for="nu">Numero: </label>
			<input type="number" name="nu" id="nu" class="form-control" placeholder="Ingrese un numero">
		</div>

		<?php
		if(isset($_POST['aleatorio']))
			echo '<input type="hidden" name="aleatorio" value="'.$_POST['aleatorio']. '">';
		else
			echo '<input type="hidden" name="aleatorio" value="'.rand(1,100). '">';
		?>

		<button type="submit" name = "envio" class="btn btn-primary">
			Envia numero
		</button>
	</form>
	<?php
	if($_POST)
	{
		if(isset($_POST['nu']) && !empty($_POST['nu']))
		{
			if($_POST['nu'] == $_POST['aleatorio'])
				echo("<br><br><span class='alert alert-success'>Has acertado!!</span>");
			else
				echo("<br><br><span class='alert alert-secondary'>Casi, pero no...</span>");
		}
		else
			echo("<br><br><span class='alert alert-danger'>No has introducido el numero</span>");
	}
	?>
</body>
</html>