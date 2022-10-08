<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Ejercicio 7</title>
    <meta charset = "UTF-8">
    <link href="style/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="text">
      <?php
        $mes = date('M');
        $anyo = date('Y');
        $dia = date('d');
        printf("Fecha actual: %d-%s-%d", $dia, $mes, $anyo)
        //echo "Fecha actual: ".$dia."-".$mes."-".$anyo;
      ?>
    </div>
  </body>
</html>