<?php
//Esta función nos permite conectar con la BD usando como usuarios dwes y contraseña dwes
	function conectar()
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=ventas_comerciales', 'dwes', 'dwes');
			return ($db);
		} catch (PDOException $e)
		{
			return (NULL);
		}
	}

//Devuelve un select con todos los empleados
	function selectEmpleados($codigo)
	{
		if(($db = conectar()) == NULL)
			echo("<option value='null' selected=''>No hay empleados</option>");
		else
		{
			$resultado = $db->query('SELECT * FROM comerciales');
			while ($comerciales = $resultado->fetch())
			{
				echo ("<option value='".$comerciales['codigo']."'");
				if($codigo == $comerciales['codigo'])
					echo(" selected>");
				else
					echo(">");
				echo($comerciales['nombre']."</option>");
			}
		}
		$db = null;
	}

//Devuelve un select con todas las ventas, se muestra el comercial, el producto y la fecha, las cuales son claves primarias en la tabla ventas
	function selectVentas($codigo)
	{
		if(($db = conectar()) == NULL)
			echo("<option value='null' selected=''>No hay ventas</option>");
		else
		{
			$resultado = $db->query('SELECT * FROM ventas');
			while ($ventas = $resultado->fetch())
			{
				$pro = $db->query("SELECT nombre FROM productos WHERE referencia = '".$ventas['refProducto']."'");
				$com = $db->query("SELECT nombre FROM comerciales WHERE codigo = '".$ventas['codComercial']."'");
				$proR = $pro->fetch();
				$comR = $com->fetch();
				echo ("<option value='".$ventas['codComercial'].",".$ventas['refProducto'].",".$ventas['fecha']."'");
				if($codigo == $ventas['codComercial'].",".$ventas['refProducto'])
					echo(" selected>");
				else
					echo(">");
				echo("Comercial: ".$comR[0]." - Producto: ".$proR[0]." - Fecha: ".$ventas['fecha']."</option>");
			}
		}
		$db = null;
	}

//Devuelve un select con todos los productos
	function selectProductos($codigo)
	{
		if(($db = conectar()) == NULL)
			echo("<option value='null' selected=''>No hay productos</option>");
		else
		{
			$resultado = $db->query('SELECT * FROM productos');
			while ($productos = $resultado->fetch())
			{
				echo ("<option value='".$productos['referencia']."'");
				if($codigo == $productos['referencia'])
					echo(" selected>");
				else
					echo(">");
				echo($productos['nombre']." - ".$productos['descripcion']."</option>");
			}
		}
		$db = null;
	}

//Imprime una tabla 
	function imprimirTabla($cabecera, $query)
	{
		$db = conectar();
		$resultado = $db->query($query);;
		if($resultado->rowCount() == 0)
		{
			echo "<div class='alert alert-danger' style='text-align: center;'>La tabla que intenta visualizar esta vacia</div>";
		}
		else
		{
			$numberCols = $resultado->columnCount();
			echo("<div class='table-responsive' style='padding-right: 60px;padding-left: 60px; margin-bottom: 10px;'>
			<table class='contenedor'><thead><tr>");
			if ($cabecera != null)
				foreach($cabecera as $titulo)
					echo("<th>$titulo</th>");
			else
				for($i = 0; $i < $numberCols; $i++)
				{
					$meta = $resultado ->getColumnMeta($i);
					echo("<th>".$meta['name']."</th>");
				}
			echo("</tr></thead><tbody>");
			while ($row = $resultado->fetch()){
				echo("<tr>");
				for($j = 0; $j < $numberCols; $j++)
					echo("<td>".$row[$j]."</td>");
				echo("</tr>");
			}
			echo("</tbody></table></div>");
		}
		$db = null;
	}

//Funcion que actualiza una tabla teniendo como parametro una query
	function updateTable($query)
	{
		$db = conectar();
		$registros = $db->exec($query);
		unset($db);
		if ($registros){
    		return TRUE;
		}
		return FALSE;
	}

//Funcion que revisa si existe el codigo en la tabla pasada como parametro
	function existeCodigo($codigo, $tabla)
	{
		$db = conectar();
		$select = $db->query("SELECT * FROM $tabla");
		$meta = $select->getColumnMeta(0);
		$query = "SELECT Count(".$meta['name'].") FROM $tabla WHERE ".$meta['name']."='$codigo'";
		$registros = $db->query($query);
		$row = $registros->fetch();
		unset($db);
		if ($row[0] != 0){
			echo $query;
    		return TRUE;
		}
		return FALSE;
	}

//Funcion que devuelve una columna de una tabla pasada como parametro
	function getColFromTabla($tabla, $columna, $cod)
	{
		if ($tabla == "productos")
			$primaria = "referencia";
		else if($tabla == "comerciales")
			$primaria = "codigo";
		$db = conectar();
		$query = "SELECT $columna FROM $tabla WHERE $primaria = '$cod'";
		$registros = $db->query($query);
		$row = $registros->fetch();
		unset($db);
		return $row[0];
	}

//Funcion que devielve una columna de la tabla venta
	function getColFromVenta($columna, $comercial, $producto, $fecha)
	{
		$db = conectar();
		$query = "SELECT $columna FROM ventas WHERE codComercial = '$comercial' and refProducto = '$producto' and fecha = '$fecha'";
		$registros = $db->query($query);
		$row = $registros->fetch();
		unset($db);
		return $row[0];
	}
?>