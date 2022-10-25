<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Ejercicio 5</title>
    <meta charset = "UTF-8">
    <link href="style/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="text">
      <?php
        $var1 = 34;
        $var2 = 1.23;
        $var3 = "hola";
        $var4 = true;
        printf("Varialble entera: %d<br>Variable double: %.2f<br>Varialble string: %s<br>Varialble boolean: %b", $var1, $var2, $var3, $var4);
      ?>
    </div>
  </body>
</html>