<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Ejercicio 6</title>
    <meta charset = "UTF-8">
    <link href="style/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="tableServ">
      <table>
        <tr>
          <td>Ruta</td>
          <td>
            <?php
              echo($_SERVER['PHP_SELF']);
            ?>
          </td>
        </tr>
        <tr>
          <td><p>Servidor:</p></td>
          <td>
            <?php
              echo($_SERVER['SERVER_NAME']);
            ?>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>