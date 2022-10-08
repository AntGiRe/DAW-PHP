<html>
  <head>
    <link rel="stylesheet" href="style/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style/styles.css" type="text/css">
  </head>
  <body>
    <div class="container">
      <h1>Ejercicio con formulario</h1>
      <form method="post" action="">
        <div class="form-group">
          <label for="num1">Número: </label>
          <input type="text" name="n1" id="num1" class="form-control" placeholder="Ingrese un numero">
        </div>

        <button type="submit" name = "envio" class="btn btn-primary">
          Ingresar
        </button>
      </form>
      <?php
        if (isset($_REQUEST['n1']) && is_numeric($_REQUEST['n1']) && $_REQUEST['n1'] > 0)
        {
          $table = "<div class=\"container\"><table class=\"table table-striped\"><tr><td>Numero</td><td>Cuadrado</td><td>Cubo</td></tr>";
          $i = 1;
          while ($i < (int)$_REQUEST['n1'])
          {
            $table .= "<tr><td>".$i."</td><td>".pow($i,2)."</td><td>".pow($i,3)."</td></tr>";
            $i++;
          }
          $table .= "</table></div>";
          echo ($table);
        }
      ?>
    </div>
  </body>
</html>