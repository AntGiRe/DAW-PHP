<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ejercicio 6</title>
        <meta charset = "UTF-8">
        <link href="../style/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="titulo">
            <?php
              $n = 0;
              $suma = 0;
              $counter = 0;
              echo ("Los números: ");
              while($counter < 10)
              {
                $n = rand(0, 1000);
                echo ($n." ");
                $suma += $n;
                $counter++;
              }
              echo("<br>La suma es de: ".$suma." y el promedio de: ".($suma/10));
            ?>
        </div>
    </body>
</html>