<?php
	/*************************************
	 * Nombre: Antonio Jesús Gil Reyes	 *
	 * Fecha: 12/10											 *
	 * Documento que contiene funciones  *
	 *************************************/
	//Esta función calcula el precio total de producto, multiplicando el precio por la cantidad del mismo.
  function calcular_Precio_Total_Producto($precio, $cantidad)
  {
    return ($precio * $cantidad);
  }
	//Esta función calcula el precio total de la compra.
	function Calcular_Precio_Total_Compra($lista)
  {
		$sum = 0;
    for ($i=0 ; $i < count($lista) ; $i+=3)
			$sum += calcular_Precio_Total_Producto($lista[$i + 1], $lista[$i+2]);
		return ($sum);
  }
	
	//Esta función muestra la tabla, como argumentos hay que pasarle el array y si queremos que se muestre el total final (true en caso de no especificar nada)
	function MostrarTabla($array, $muestraTotal = True)
	{
		$table = "<div class='table'>
		<table class=\"table table-striped\">
		<thead class=\"thead-dark\">
			<th scope=\"col\">Producto</th>
			<th scope=\"col\">Cantidad</th>
			<th scope=\"col\">Precio</th>
			<th scope=\"col\">Total</th>
		</thead>";
		for ($i=0 ; $i < count($array) ; $i+=3)
		{
			$table .= "<tr>
			<td>".$array[$i]."</td>
			<td>".$array[$i+1]."</td>
			<td>".$array[$i+2]."</td>
			<td>".calcular_Precio_Total_Producto($array[$i+2], $array[$i+1])."€ </td>
			</tr>";
		}
		if ($muestraTotal)
			$table .= "<tr>
			<td colspan='3'><strong>Precio total</strong></td>
			<td><strong>". Calcular_Precio_Total_Compra($array) ."€ </strong></td>
			</tr>";
		$table .= "</table></div>";
		echo $table;
	}

	//Esta función muestra un select de todos los productos de la lista, como argumento hay que pasar el array
	function MostrarSelect($array)
	{
		$select = "<label for='control'>
		Seleccione un producto</label> 
		 <select class='form-control' id='control' name='pr'> ";
		for ($i=0 ; $i < count($array) ; $i+=3)
			$select .= "<option>".$array[$i]."</option>";
		$select .= "</select>";
		echo ($select);
	}
	
	//Esta función muestra dos input que piden cantidad y precio, ya que son usados varias veces.
	function requestPriceAmount()
	{
		echo("<div class='form-group'>
			<label for='cantidad'>Cantidad </label><br>
			<input type='text' name='cantidad' id='cantidad' class='form-control'>
		</div>");

		echo("<div class='form-group'>
			<label for='precio'>Precio </label><br>
			<input type='text' name='precio' id='precio' class='form-control'>
		</div>");
	}

	//Si la variable esta vacia, guardamos un 0.
	function ifEmptyChangeTo0($var)
	{
		if (empty($var))
			return "0";
		else
			return($var);
	}

	//Muestra mensajes de estado
	function msgError($msg)
	{
		echo "<div class='error'><br><p><img src='img/error.png' width='20em'><p>". $msg ."</p></div>";
	}

	function msgInfo($msg)
	{
		echo "<div class='info'><br><p><img src='img/informacion.png' width='20em'><p>". $msg ."</p></div>";
	}

	function msgOk($msg)
	{
		echo "<div class='ok'><br><p><img src='img/comprobado.png' width='20em'><p>". $msg ."</p></div>";
	}
?>