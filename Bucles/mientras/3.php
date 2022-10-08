<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ejercicio 3</title>
        <meta charset = "UTF-8">
        <link href="../style/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="titulo">
            <?php
              $n = -50;
              while($n <= 0)
              {
                echo ($n);
                if ($n != 0)
                  echo (",");
                $n++;
              }
            ?>
        </div>
    </body>
</html>