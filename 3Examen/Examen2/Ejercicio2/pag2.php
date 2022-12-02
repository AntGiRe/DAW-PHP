<!-- Antonio Jesus Gil Reyes - Ejercicio 2-->
<?php
	// Accedemos a la sesión
	session_start();

	// Si no existe alguna de las sesiones, volvemos al index
	if (!isset($_SESSION["azul"]) || !isset($_SESSION["naranja"]))
		header("Location:index.php");

	//Dependiendo del boton pulsado se realiza una actividad o otra.
	if (isset($_GET['azul'])) {
		$_SESSION["azul"] += 1;
	} elseif (isset($_GET['naranja'])) {
		$_SESSION["naranja"] += 1;
	} elseif (isset($_GET['default'])) {
		$_SESSION["azul"] = $_SESSION["naranja"] = 0;
	}

	// Volvemos al formulario
	header("Location:index.php");
?>