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
            $mayor = 0;
            $menor = 10;
            echo("Los números son: ");
              for($i = 0; $i < 10; $i++)
              {
                $nota = rand(0,10);
                echo($nota." ");
                if ($nota > $mayor)
                  $mayor = $nota;
                if ($nota < $menor)
                  $menor = $nota;
              }
              echo("<br>La nota mayor es ".$mayor." y la menor es ".$menor);
            ?>
        </div>
    </body>
</html>