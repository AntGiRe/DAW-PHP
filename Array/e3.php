<html>
  <head>
    <link rel="stylesheet" href="style/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style/styles.css" type="text/css">
  </head>
  <body>
    <div class="container">
      <h1>Recibir varios nombres de frutas</h1>
      <form method="post" action="">
        <?php
          if(!isset($_REQUEST['btn1']) && !isset($_REQUEST['btn2']))
          {
            echo("<div class=\"form-group\">
            <label for=\"n1\">¿Cuantas frutas deseas ingresar: </label>
            <input type=\"text\" name=\"n1\" id=\"n1\" class=\"form-control\">
            </div>
            
            <button type=\"submit\" name = \"btn1\" class=\"btn btn-primary\">
            Enviar
            </button>
            ");
          }
          else if(!isset($_REQUEST['btn2']))
          {
            foreach (range(0, (int)$_REQUEST['n1'] - 1) as $i)
            {
              echo("<div class=\"form-group\">
              <label for=\"n1\">Fruta $i: </label>
              <input type=\"text\" name=\"f$i\" id=\"n1\" class=\"form-control\">
              </div>");
            }

            echo '<input type="hidden" name="number" value="'. (int)$_REQUEST['n1']. '">';
            
            echo("<button type=\"submit\" name = \"btn2\" class=\"btn btn-primary\">
            Enviar
            </button>
            ");
          }
          else
          {
            foreach (range(0, $_REQUEST['number'] - 1) as $i)
            {
              $fruta = "f$i";
              echo "<p>Fruta recibida: $_REQUEST[$fruta]</p>";
            }
          }
        ?>
      </form>
    </div>
  </body>
</html>