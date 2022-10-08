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
        $anyo = date('Y');
        $dia = date('d');
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        printf("Hoy es %d de %s de %d", $dia, $meses[date('n')-1], $anyo)
      ?>
    </div>
  </body>
</html>