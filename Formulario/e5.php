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
          <label for="nombre">Nombre: </label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>

        <div class="form-group">
          <label for="apellidos">Apellidos: </label>
          <input type="text" name="apellidos" id="apellidos" class="form-control">
        </div>

        <div class="form-group">
          <label for="ciudad">Ciudad: </label>
          <input type="text" name="ciudad" id="ciudad" class="form-control">
        </div>

        <button type="submit" name = "envio" class="btn btn-primary">
          Ingresar
        </button>
      </form>
      <?php
        if(isset($_REQUEST['envio']))
        {
          if (isset($_REQUEST['nombre']) && isset($_REQUEST['apellidos']) && isset($_REQUEST['ciudad']))
          {
            echo($_REQUEST['nombre']." ".$_REQUEST['apellidos']." vive en".$_REQUEST['ciudad']);
          }
          else
            echo("Introduce los datos correctamente.");
        }
      ?>
    </div>
  </body>
</html>