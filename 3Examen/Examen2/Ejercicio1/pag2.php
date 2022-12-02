<!-- Antonio Jesus Gil Reyes - Ejercicio 2-->
<?php

	//Si existe la cookie, se realizan las diferentes operaciones. Si no, se crea.
	if(isset($_COOKIE['numero']))
	{
		if (isset($_GET['default']))
			setcookie("numero", 0);
		elseif (isset($_GET['sumar']))
			setcookie("numero", $_COOKIE['numero'] + 1);
		elseif (isset($_GET['restar']))
			setcookie("numero", $_COOKIE['numero'] - 1);
	}

	// Volvemos al index
	header("Location: index.php");
?>