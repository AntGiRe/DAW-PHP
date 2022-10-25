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
              $cifras = 0;
              $valor = rand(0,10000);
              echo("El número de cifras de ".$valor);
              if ($valor == 0)
                $cifras++;
              while ($valor >= 1)
              {
                $valor /= 10;
                $cifras++;
              }
              echo(" es de ".$cifras);
            ?>
        </div>
    </body>
</html>