<h1>La suma es:</h1>
<h2>
  <!-- Como si fuera un import en JAVA importamos todas las funciones que tenemos en el archivo funciones.php en la que tenemos la función suma-->
<?php
  include "funciones.php";
  $n1 = (int)$_REQUEST['n1'];
  $n2 = (int)$_REQUEST['n2'];
  $suma = $n1 + $n2;
  echo(suma($n1,$n2));
?>
<!-- Guardamos en $n1 el resultado de $_REQUEST['n1'], es decir esto nos da lo que el usuario coloco en el formulario en el input con name='n1'. Igual con 'n2'-->
<!-- Usamos la funcion suma e imprimos en pantalla con echo -->
</h2>