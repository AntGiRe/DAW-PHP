<html>
  <head>
    <link rel="stylesheet" href="style/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style/styles.css" type="text/css">
  </head>
  <body>
    <div class="container">
      <form method="post" action="">
        <?php
          //Muestra la tabla clave-valor
          function MostrarTabla($valor)
          {
            $table = "<table class=\"table table-striped\">
            <thead class=\"thead-dark\">
            <tr>
              <th scope=\"col\">DNI</th>
              <th scope=\"col\">Nombre</th>
            </tr>
            </thead>";
            foreach($valor as $dni => $nombre)
            {
              $table .= "<tr>
              <td>$dni</td>
              <td>$nombre</td>
              </tr>";
            }
            $table .= "<table>";
            echo $table;
          }

          if (isset($_POST['conjunto']))
            $conjunto = $_POST['conjunto'];
          else
            $conjunto = array();

          if(isset($_REQUEST['envio']))
          {
            if(!empty($_REQUEST['nombre']) && !empty($_REQUEST['dni']))
              $conjunto[$_REQUEST['dni']] = $_REQUEST['nombre'];
            MostrarTabla($conjunto);
          }
          foreach($conjunto as $dni => $nombre)
          {
            echo '<input type="hidden" name="conjunto['. $dni. ']" value="'. $nombre. '">';
          }
        ?>
        <div class="form-group">
          <label for="n1">Introduce nombre: </label>
          <input type="text" name="nombre" id="n1" class="form-control">
        </div>

        <div class="form-group">
          <label for="n2">Introduce DNI: </label>
          <input type="text" name="dni" id="n2" class="form-control">
        </div>

        <button type="submit" name = "envio" class="btn btn-primary">
          Enviar
        </button>
      </form>
    </div>
  </body>
</html>