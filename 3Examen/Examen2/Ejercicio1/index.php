<!-- Antonio Jesus Gil Reyes - Ejercicio 1-->
<?php

  //Si no existe una cookie 'numero' se crea con valor a cero, sin tiempo (se elimina cuando se cierra el nav.)
  if (!isset($_COOKIE['numero']))
  {
    setcookie("numero", 0);
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - PHP</title>
  </head>
  <body>
    <h1>INCREMENTAR Y DECREMENTAR</h1>
    <h2>Haga clic en los botones para modificar el valor:</h2>

    <form action="pag2.php" method="get">
    <p>
      <button type="submit" name="restar" style="font-size: 3em">-</button>
      <?php
        // Mostramos el número de la cookie
        echo "<span style='font-size: 3em'>".$_COOKIE["numero"]."</span>";
      ?>
      <button type="submit" name="sumar" style="font-size: 3em">+</button>
    </p>

    <button type="submit" name="default">Poner a cero</button>
    </form>
  </body>
</html>