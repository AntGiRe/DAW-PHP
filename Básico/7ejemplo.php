<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Ejercicio 7</title>
    <meta charset = "UTF-8">
    <link href="style/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="titulo">
      Uso de printf
    </div>
    <div id="text">
      <?php
        $modulo = "DWES";
        $curso = 2;
        $grado = "DAW";
        printf("%s es un módulo de %d curso de %s", $modulo, $curso, $grado)
      ?>
    </div>
  </body>
</html>