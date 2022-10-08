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
        if (isset($_REQUEST['n1']) && is_numeric($_REQUEST['n1']))
        {
          $i = 2;
          while ($i <= $_REQUEST['n1'])
          {
            echo($i."-");
            $i += 2;
          }
        }
      ?>
    </div>
  </body>
</html>