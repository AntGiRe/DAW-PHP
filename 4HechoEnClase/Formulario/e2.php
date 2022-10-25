<html>
  <head>
    <link rel="stylesheet" href="style/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style/styles.css" type="text/css">
  </head>
  <body>
    <div class="container">
      <h1>Dibujar astericos.</h1>
      <form method="post" action="">
        <div class="form-group">
          <label for="num1">Número: </label>
          <input type="text" name="n1" id="num1" class="form-control">
        </div>

        <div class="radio"> 
          <label>
            <input type="radio" name="tipo" value="ast">Astericos ascendentes
          </label> 
        </div>

        <div class="radio"> 
          <label>
            <input type="radio" name="tipo" value="num">Numeros ascendentes
          </label> 
        </div>

        <button type="submit" name = "envio" class="btn btn-primary">
          Mostrar
        </button>
      </form>
      <?php
        if(isset($_REQUEST['envio']))
          if (isset($_REQUEST['n1']) && is_numeric($_REQUEST['n1']) && isset($_REQUEST['tipo']) && $_REQUEST['n1'] > 0)
            if ($_REQUEST['tipo'] == "ast")
            {
              $i = 1;
              while ($i <= (int)$_REQUEST['n1'])
              {
                for ($j = 0; $j < $i; $j++)
                {
                  echo("* ");
                }
                echo("<br>");
                $i++;
              }
            }
            else
            {
              $i = 1;
              while ($i <= (int)$_REQUEST['n1'])
              {
                for ($j = 1; $j <= $i; $j++)
                {
                  echo($j." ");
                }
                echo("<br>");
                $i++;
              }
            }
          else
            echo("Introduce un número válido");
      ?>
    </div>
  </body>
</html>