<html>
  <head>
    <link rel="stylesheet" href="style/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style/styles.css" type="text/css">
  </head>
  <body>
    <div class="container">
      <h1>Repetir palabras.</h1>
      <form method="post" action="">
        <div class="form-group">
          <label for="pr">Frase: </label>
          <input type="text" name="frase" id="pr" class="form-control">
        </div>

        <div class="form-group">
          <label for="seg">Caracter: </label>
          <input type="text" name="car" id="seg" class="form-control">
        </div>

        <div class="form-group">
          <label for="ter">Repeticiones: </label>
          <input type="text" name="rep" id="ter" class="form-control">
        </div>

        <button type="submit" name = "envio" class="btn btn-primary">
          Enviar
        </button>
      </form>
      <?php
        if(isset($_REQUEST['envio']))
          if (isset($_REQUEST['frase']) && isset($_REQUEST['car']) && is_numeric($_REQUEST['rep']))
          {
            $i = 0;
            $palabra = "";
            for ($i; $i < strlen($_REQUEST['frase']); $i++)
            {
              $j = 1;
              if ($_REQUEST['frase'][$i] == $_REQUEST['car'])
                while ($j < (int)$_REQUEST['rep'])
                {
                  $palabra .= $_REQUEST['car'];
                  $j++;
                }
              $palabra .= $_REQUEST['frase'][$i];
            }
            echo($palabra);
          }
          else
            echo("Introduce los datos correctamente.");
      ?>
    </div>
  </body>
</html>