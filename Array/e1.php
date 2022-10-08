<html>
  <head>
    <link rel="stylesheet" href="style/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style/styles.css" type="text/css">
  </head>
  <body>
    <div class="container">
      <form method="post" action="">
        <?php
          //Muestra el array si ya hay bolas
          function mostrarBolas($bolas)
          {
            if (!empty($bolas))
            {
              echo("Listado de bolas actual: ");
              foreach($bolas as $bola)
                print $bola. "  ";
            }
          }
          
          //Crea array bolas dependiendo de la situación
          if (isset($_POST['bolas']))
            $bolas = $_POST['bolas'];
          else
            $bolas = [];

          //Se guarda valor único en el array
          if(!empty($_REQUEST['n1']) && is_numeric($_REQUEST['n1']))
          {
            if (!in_array($_REQUEST['n1'], $bolas))
              array_push($bolas, $_REQUEST['n1']);
          }

          mostrarBolas($bolas);

          //En input type hidden pasamos las bolas de nuevo
          foreach($bolas as $value)
          {
            echo '<input type="hidden" name="bolas[]" value="'. $value. '">';
          }
          //reset current next prev end
          //Al recorrer el array con una variable x, si salimos de el nos devuelve false, ya que hemos entrado a una zona de memoria ajena al array
          //unset($array[0]) elimina el primer elemento luego se puede usar reset($array) para empezar desde el comienzo del array
        ?>
        <div class="form-group">
          <label for="num1">Introduce el número de la bola: </label>
          <input type="text" name="n1" id="num1" class="form-control">
        </div>

        <button type="submit" name = "envio" class="btn btn-primary">
          Sacar bola
        </button>
      </form>
    </div>
  </body>
</html>