<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ejercicio 7</title>
        <meta charset = "UTF-8">
        <link href="../style/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="titulo">
            <?php
              $n = 0;
              $may = 0;
              $menr = 0;
              $counter = 0;
              echo ("Las notas: ");
              while($counter < 10)
              {
                $n = rand(0, 10);
                echo ($n." ");
                if ($n >= 7)
                  $may++;
                else
                  $menr++;
                $counter++;
              }
              echo("<br>Alumnos con nota mayor o igual a 7: ".$may." y menores: ".$menr);
            ?>
        </div>
    </body>
</html>