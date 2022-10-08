<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ejercicio 1</title>
        <meta charset = "UTF-8">
        <link href="../style/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="titulo">
            <?php
              $n = 1;
              while($n <= 500)
              {
                echo ($n);
                if ($n != 500)
                  echo (",");
                $n++;
              }
            ?>
        </div>
    </body>
</html>