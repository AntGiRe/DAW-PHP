<?php
	//Función que conectar con el servidor. Usuario = dwes || Pass = dwes
	function getCon($base)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname='.$base, 'daw', 'daw');
			return ($db);
		}
		catch (PDOException $e)
		{
			return (NULL);
		}
	}

	//Función que devuelve todas las filas de una tabla
	function getRows($con, $table)
	{
		try
		{
			$resultado = $con->query("SELECT * FROM ".$table);
			return $resultado;
		}
		catch (PDOException $e)
		{
			return (NULL);
		}
	}

	function getAficiones($con, $amigo)
	{
		try
		{
			$resultado = $con->query("SELECT aficiones.nombreAficion FROM aficiones INNER JOIN aficionesamigos ON aficiones.idAficion = aficionesamigos.aficion WHERE aficionesamigos.nombreAmigo = '".$amigo."'");
			$aficiones = "";
			while ($reg = $resultado->fetch())
			{
				$aficiones .= $reg[0]."-";
			}
			$aficiones = substr($aficiones, 0, -1);
			return $aficiones;
		}
		catch (PDOException $e)
		{
			return (NULL);
		}
	}

	//Genera CSV para descargar
	function toCSV($cabeceras, $valores)
	{
		$csv = $cabeceras;
		$csv .= "\n\"".$valores[0]."\",\"".$valores[1]."\",\"".$valores[2]."\",\"".$valores[3]."\",".$valores[4].",\"".$valores[5]."\",\"".$valores[6]."\"";

		unset($db);
		header("Content-type: text/csv");
		header("Content-Disposition: attachment; filename=amigo_".date('Y-m-d').".csv");
		print $csv;
		exit;
	}

	//Genera JSON en el directorio
	function toJSON($valores)
	{
		$data ="[]";
		$data = json_decode($data, true);

		$add_arr = array(
			'Nombre y apellidos'=> $valores[0],
			'Email'=> $valores[1],
			'URL'=> $valores[2],
			'Sexo'=> $valores[3],
			'Numero de convivientes'=> $valores[4],
			'Aficiones'=> $valores[5],
			'Favorito'=> $valores[6]
		);
		$data[] = $add_arr;
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents('amigo.json', $data);
	}

	function insertAmigo($con, $valores)
	{
		try
		{
			$con->exec("INSERT INTO tb_amigos VALUES('".$valores[0]."','".$valores[1]."','".$valores[2]."','".$valores[3]."','".$valores[4]."','".$valores[6]."')");
			return true;
		}
		catch (PDOException $e)
		{
			return (NULL);
		}
	}

	function insertarAfic($con, $valores)
	{
		$arr = explode("-", $valores[5]);
		try
		{
			for ($i = 0; $i < count($arr); $i++)
			{
				$resultado = $con->query("SELECT idAficion FROM aficiones WHERE nombreAficion = '".$arr[$i]."'");
				$registro = $resultado->fetch();
				$con->exec("INSERT INTO aficionesamigos VALUES('".$valores[0]."','".$registro[0]."')");
			}
			return true;
		}
		catch (PDOException $e)
		{
			return (NULL);
		}
	}
?>