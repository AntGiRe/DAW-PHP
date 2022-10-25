<html>
  <head>
    <link rel="stylesheet" href="style/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style/styles.css" type="text/css">
  </head>
  <body>
    <div class="container">
      <h1>Numero en Ingles</h1>
      <form method="post" action="">
        <div class="form-group">
          <label for="num1">Número: </label>
          <input type="text" name="n1" id="num1" class="form-control" placeholder="Ingrese un numero del 1 al 7">
        </div>

        <button type="submit" name = "envio" class="btn btn-primary">
          Mostrar
        </button>
      </form>
      <?php
        if (isset($_REQUEST['n1']) && is_numeric($_REQUEST['n1']))
          if ((int)$_REQUEST['n1'] <= 7 && (int)$_REQUEST['n1'] > 0)
          {
            $numeros = ["one","two","three","four","five","six","seven"];
            echo($numeros[(int)$_REQUEST['n1'] - 1]);
          }
          else
            echo("Introduce un número válido")
      ?>
    </div>
  </body>
</html>