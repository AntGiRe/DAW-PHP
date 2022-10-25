<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ejercicio 2</title>
        <meta charset = "UTF-8">
        <link href="../style/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="titulo">
            <?php
              for($n = 20; $n <=30; $n++)
              {
                echo($n);
                if ($n != 30)
                  echo(",");
              }
            ?>
        </div>
    </body>
</html>