<!-- Antonio Jesus Gil Reyes - Ejercicio 2-->
<?php
  //Se inicia o recupera la sesión
  session_start();

  // Si no existe la sesión a o b, las iniciamos a cero
  if (!isset($_SESSION["azul"]) || !isset($_SESSION["naranja"])) {
      $_SESSION["azul"] = $_SESSION["naranja"] = 0;
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - PHP</title>
  </head>
  <body>
    <h1>VOTAR UNA OPCIÓN</h1>

    <!-- Se muestran los contenidos de sesion azul y naranja -->
    <form action="pag2.php" method="get">
      <p>Haga clic en los botones para votar por una opción:</p>
      <p>
        <button type="submit" name="azul" style="color: blue; width: 130px; margin-right: 10px;">Partido Azul</button><?php echo $_SESSION['azul']; ?>
      </p>
      <p>
        <button type="submit" name="naranja" style="color: orange; width: 130px; margin-right: 10px">Partido Naranja</button><?php echo $_SESSION['naranja']; ?>
      </p>
      <button type="submit" name="default">Poner a cero</button>
    </form>
  </body>
</html>