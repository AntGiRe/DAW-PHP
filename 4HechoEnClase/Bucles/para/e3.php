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
            $number = rand(0,10);
            echo("Tabla de multiplicar del ".$number."<br>");
              for($n = 0; $n <= 10; $n++)
              {
                echo($number."x".$n." = ".($number*$n)."<br>");
              }
            ?>
        </div>
    </body>
</html>