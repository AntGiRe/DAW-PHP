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
              for($n = 0; $n <= 100; $n++)
              {
                echo($n);
                if ($n != 100)
                  echo(",");
              }
            ?>
        </div>
    </body>
</html>