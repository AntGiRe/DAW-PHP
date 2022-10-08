<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ejercicio 5</title>
        <meta charset = "UTF-8">
        <link href="../style/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="titulo">
            <?php
              $range = rand(0, 1000);
              echo("El número es: ".$range."<br>");
              $n = 1;
              while($n <= $range)
              {
                echo ($n);
                if ($n != $range)
                  echo (",");
                $n++;
              }
            ?>
        </div>
    </body>
</html>