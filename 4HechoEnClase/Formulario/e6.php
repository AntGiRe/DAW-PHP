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
          <label for="pr">Ingrese primer valor: </label>
          <input type="text" name="pr" id="pr" class="form-control">
        </div>

        <div class="form-group">
          <label for="seg">Ingrese segundo valor: </label>
          <input type="text" name="seg" id="seg" class="form-control">
        </div>

        <div class="form-group">
          <label for="ter">Ingrese tercer valor: </label>
          <input type="text" name="ter" id="ter" class="form-control">
        </div>

        <div class="form-group">
          <label for="cua">Ingrese cuarto valor: </label>
          <input type="text" name="cua" id="cua" class="form-control">
        </div>

        <div class="form-group">
          <label for="quin">Ingrese quinto valor: </label>
          <input type="text" name="quin" id="quin" class="form-control">
        </div>

        <button type="submit" name = "envio" class="btn btn-primary">
          Enviar
        </button>
      </form>
      <?php
        if(isset($_REQUEST['envio']))
          if (isset($_REQUEST['pr']) && isset($_REQUEST['seg']) && isset($_REQUEST['ter']) && isset($_REQUEST['cua']) && isset($_REQUEST['quin']))
          {
            $table = "<div class=\"container\"><table class=\"table table-striped\"><tr><td>Operación</td><td>Resultado</td></tr>";
            $table .= "<tr><td>SUMA</td><td>".((int)$_REQUEST['pr'] + (int)$_REQUEST['seg'] + (int)$_REQUEST['ter'] + (int)$_REQUEST['cua'] + (int)$_REQUEST['quin']."</td></tr>");
            $table .= "<tr><td>MULTIPLICACIÓN</td><td>".((int)$_REQUEST['pr'] * (int)$_REQUEST['seg'] * (int)$_REQUEST['ter'] * (int)$_REQUEST['cua'] * (int)$_REQUEST['quin']."</td></tr>");
            $table .= "<tr><td>MAYOR</td><td>".max((int)$_REQUEST['pr'], (int)$_REQUEST['seg'], (int)$_REQUEST['ter'], (int)$_REQUEST['cua'], (int)$_REQUEST['quin']."</td></tr>");
            $table .= "<tr><td>MENOR</td><td>".min((int)$_REQUEST['pr'], (int)$_REQUEST['seg'], (int)$_REQUEST['ter'], (int)$_REQUEST['cua'], (int)$_REQUEST['quin']."</td></tr>");
            $table .= "</table></div>";
            echo($table);
          }
          else
            echo("Introduce los datos correctamente.");
      ?>
    </div>
  </body>
</html>