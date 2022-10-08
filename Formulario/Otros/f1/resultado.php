<!-- isnumeric se utiliza para los input texto porque realmente nunca estan vacios, tienen NONE.-->
<?php
  include "funciones.php";

  $n1 = (int)$_REQUEST['n1'];
  $n2 = (int)$_REQUEST['n2'];
  $mayMenor = $_REQUEST['mayMenor'];

  if (isset($_REQUEST['operacion']))
  {
    $ope = $_REQUEST['operacion'];
    if ($ope == "sum"):
      echo "La suma de ".$n1." y de ".$n2." es de ".suma($n1,$n2)."<br>";
    else:
      echo "La resta de ".$n1." y de ".$n2." es de ".resta($n1,$n2)."<br>";
    endif;
  }

  if (isset($_REQUEST['factorial']))
  {
    echo "Factorial del primer numero ".$n1." es: ".factorial($n1)."<br>";
  }

  if (isset($_REQUEST['multiplica']))
  {
    multTab($n2);
  }

  if ($mayMenor == "mayor")
    echo "El mayor es: ".mayor($n1, $n2);
  else
    echo "El menor es: ".mayor($n1, $n2);
?>