<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ejercicio 4</title>
        <meta charset = "UTF-8">
        <link href="../style/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="titulo">
            <?php
              $pos = 0;
              $neg = 0;
              $mul15 = 0;
              $valPares = 0;
              echo("Los números son: ");
              for ($i = 0; $i < 10; $i++)
              {
                $valor = rand(-1000,1000);
                echo($valor." ");
                if ($valor < 0)
                  $neg++;
                else
                  $pos++;
                
                if ($valor % 15 == 0)
                  $mul15++;
                
                if ($valor % 2 == 0)
                  $valPares += $valor;
              }
              echo("<br>Positivos: ".$pos." Negativos: ".$neg." Múltiplos: ".$mul15." Suma pares: ".$valPares);
            ?>
        </div>
    </body>
</html>