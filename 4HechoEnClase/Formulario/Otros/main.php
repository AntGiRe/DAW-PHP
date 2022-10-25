<html>
  <head>
  </head>
  <body>
    <form method="post" action="formulario.php"> <!--El atributo method tiene el valor "post" lo que hace que lo que el usuario mande en el formulario no es visible en la llamada, con action y el valor "formulario" estamos mandando la información del formulario a esa página donde ya haremos cosas con ellas-->
      <label for="num1">Numero 1 </label>
      <input type="text" name="n1" id="num1">
      <br>
      <label for="num2">Numero 2 </label>
      <input type="text" name="n2" id="num2">
      <br><br>
      <input type="submit" value = "Hazme la suma señora máquina"><!-- Envia el formulario-->
    </form>
  </body>
</html>