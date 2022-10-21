<?php
	//Esta funcion muestra una tabla, teniendo como parametros dos arrays, uno con titulos y otro con contenido.
	function showTableOneRow($headers, $info)
	{
		$table = "<table class='table table-bordered'><tr>";
		foreach ($headers as $i)
		{
			$table .= "<td>$i</td>";
		}
		$table .= "</tr><tr>";
		foreach ($info as $i)
		{
			$table .= "<td>$i</td>";
		}
		$table .= "</tr></table>";
		echo($table);
	}
?>