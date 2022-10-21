<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		$valores = array();

		//Rellena el array 'valores' con caracteres M y F de manera aleatoria gracias al rand()
		while(sizeof($valores) <= 100)
			if (rand(0,1))		//Si es 1 - true, M. Si no, false - F
				$valores[] = 'M';
			else
				$valores[] = 'F';
				
		//Se guarda en un array la cuenta de todos los caracteres en un array asociativo
		$result = array_count_values($valores);
		print_r($result);
	?>
</body>
</html>