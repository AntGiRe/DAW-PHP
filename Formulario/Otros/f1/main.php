<html>
  <head>
    <link rel="stylesheet" href="style/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style/styles.css" type="text/css">
  </head>
  <body>
    <div class="container">
      <form method="post" action="">
        <div class="form-group">
          <label for="num1">Ingrese un número: </label>
          <input type="text" name="n1" id="num1" class="form-control">
        </div>

        <div class="form-group">
          <label for="num2">Ingrese otro número: </label>
          <input type="text" name="n2" id="num2" class="form-control">
        </div>

        <div class="radio">
          <label for="sum">
            Sumar<input type="radio" name="operacion" id="sum" value="sum">
          </label>
        </div>

        <div class="radio">
          <label for="res">
            Restar<input type="radio" name="operacion" id="res" value="res">
          </label>
        </div>

          <label for="fact" class="checkbox-inline">
            Factorial del primero<input type="checkbox" name="factorial" id="fact">
          </label>

          <label for="mult" class="checkbox-inline">
            Tabla de multiplicar del segundo<input type="checkbox" name="multiplica" id="mult">
          </label>

        <select name="mayMenor" class="form-control">
          <option value="mayor">Mayor</option>
          <option value="menor">Menor</option>
        </select>
        <br>

        <button type="submit" name = "envio" class="btn btn-primary">
          Calcular
        </button>
      </form>
      <?php
        if (isset($_REQUEST['envio']))
          if (is_numeric($_REQUEST['n1']) && is_numeric($_REQUEST['n2']))
            {
              include "funciones.php";

              $n1 = (int)$_REQUEST['n1'];
              $n2 = (int)$_REQUEST['n2'];
              $fila1 = "<div class=\"container\"><table class=\"table \"><tr><td>Numero 1</td><td>Numero 2</td>";
              $fila2 = "<tr><td>".$n1."</td><td>".$n2."</td>";
              $mayMenor = $_REQUEST['mayMenor'];

              if (isset($_REQUEST['operacion']))
              {
                $ope = $_REQUEST['operacion'];
                if ($ope == "sum"):
                  $fila1 .= "<td>Suma</td>";
                  $fila2 .= "<td>".suma($n1,$n2)."</td>";
                else:
                  $fila1 .= "<td>Resta</td>";
                  $fila2 .= "<td>".resta($n1,$n2)."</td>";
                endif;
              }

              if (isset($_REQUEST['factorial']))
              {
                $fila1 .= "<td>Factorial</td>";
                $fila2 .= "<td>".factorial($n1)."</td>";
              }

              if (isset($_REQUEST['multiplica']))
              {
                $fila1 .= "<td>Tabla de multiplicar</td>";
                $fila2 .= "<td>".multTab($n2)."</td>";
              }

              if ($mayMenor == "mayor")
              {
                $fila1 .= "<td>Mayor</td>";
                $fila2 .= "<td>".mayor($n1,$n2)."</td>";
              }
              else
              {
                $fila1 .= "<td>Menor</td></tr>";
                $fila2 .= "<td>".menor($n1,$n2)."</td></tr></table></div>";
              }

              echo($fila1.$fila2);
            }
      ?>
    </div>
  </body>
</html>