<?php
	if($_POST)
		$n = $_POST['n'];
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
			<label for="n">Numero: </label>
			<input type="number" name="n" id="n" class="form-control" placeholder="Ingrese un numero">
		</div>

		<button type="submit" name = "envio" class="btn btn-primary">
			Magic
		</button>
	</form>
	<?php
		if(isset($n) && !empty($n))
			for($i = 1; $i <= $n; $i++)
			{
				for($j = 0; $j < $n-$i; $j++)
					echo("0 ");
				for($j = 1; $j <= $i; $j++)
					echo("$j ");
				echo("<br>");
			}

	?>
</body>
</html>