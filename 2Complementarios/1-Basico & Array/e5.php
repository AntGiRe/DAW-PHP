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
	<?php
		$valores = array();
		
		//Se rellena el array 'valores' con valores aleatorios del 0 al 99
		while(sizeof($valores) <= 50)
			$valores[] = rand(0, 99);
		
		//Se ordena el array 'valores' y se imprime
		sort($valores);
		print_r($valores);
	?>
</body>
</html>