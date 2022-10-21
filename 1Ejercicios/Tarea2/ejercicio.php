<!DOCTYPE html>
<!-- Nombre: Antonio Jesús Gil Reyes ||Fecha: 12/10-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/styles.css" type="text/css">
	<title>Lista de la compra</title>
</head>
<body>
	<form method="post" action="">
		<div class="container">
			<?php
				include "funciones.php";
				//Declaramos una variable 'lista' que es un array vacio, en caso de que exista una enviada por 'post', la cambiamos por la vacia usando explode.
				$lista = array();
				if (isset($_POST['lista']))
					$lista = explode(',', $_POST['lista']);
				
				//Mostramos el menú principal si es la primera vez en el formulario o si se ha pulsado el botón volver
				if(isset($_POST['volver']) || !$_POST)
				{
					echo("<h1>¿Que quiere usted hacer?</h1>");
					echo("<button type='submit' name = 'mostrar'>
						Mostrar lista
					</button>");

					echo("<button type='submit' name = 'insertar'>
					Insertar
					</button>");

					echo("<button type='submit' name = 'modificar'>
					Modificar
					</button>");

					echo("<button type='submit' name = 'eliminar'>
					Eliminar
					</button>");
				}
				elseif(isset($_POST['mostrar']))
				{
					//Mostramos la lista si se dió al botón mostrar y la lista no esta vacia. Si no, mensaje.
					echo("<h1>Lista de la compra</h1>");
					
					if (empty($lista))
						msgInfo("Aún no hay productos");
					else
						MostrarTabla($lista);
					//Boton volver
					echo("<button type='submit' name = 'volver' class='btn btn-primary'>
						Volver
					</button>");
				}
				elseif(isset($_POST['insertar']) || isset($_POST['introducido']))
				{
					//Mostramos el menú de inserción si se dió al boton insertar o si se inserto un producto
					echo("<h1>Inserta productos</h1>");

					echo("<div class='form-group'>
					<label for='nombre'>Nombre </label><br>
					<input type='text' name='nombre' id='nombre' class='form-control'>
					</div>");

					requestPriceAmount();

					echo("<button type='submit' name = 'introducido' class='btn btn-primary'>
					Insertar
					</button>");

					echo("<button type='submit' name = 'volver' class='btn btn-primary'>
							Volver
						</button>");

					if(isset($_POST['introducido']))
					{
						//En caso de que el nombre este vacio o ya exista en la lista, enviamos mensaje
						if (!empty($_POST['nombre']) && !in_array($_POST['nombre'], $lista))
						{
							//Si el precio o cantidad estan vacios, igualamos a 0. Si no, igualamos al contenido del input
							$precio = ifEmptyChangeTo0($_POST['precio']);

							$cantidad = ifEmptyChangeTo0($_POST['cantidad']);
							//Si lo introducido no es númerico, enviamos mensaje de error
							if (is_numeric($cantidad) && is_numeric($precio))
							{
								//Se introduce datos en el array 'lista'. Mostramos tabla sin el total final
								array_push($lista, $_POST['nombre'], $cantidad, $precio);
								msgOk("Datos correctamente añadidos");
								MostrarTabla($lista, FALSE);
							}
							else
								msgError("Datos erróneos introducidos.");
						}
						else
							msgError("Revisa que el producto no exista ya o si algún campo esta vacio");
					}
				}
				elseif(isset($_POST['modificar']) || isset($_POST['modificado']))
				{
					//Si se ha pulsado el botón modificar del menú principal o el boton modificar del propio menu, mostramos el menu.
					echo ("<h1>Modifica tu lista</h1>");
					//Si la lista esta vacia, mostramos mensaje.
					if(!empty($lista))
					{
						//Entramos en el if, una vez pulsado el boton modificar del menú modificar
						if(isset($_POST['modificado']))
						{
							//Si el precio o cantidad estan vacios, igualamos a 0. Si no, igualamos al contenido del input
							$precio = ifEmptyChangeTo0($_POST['precio']);

							$cantidad = ifEmptyChangeTo0($_POST['cantidad']);
							//Si el contenido no es numerico, se envia mensaje.
							if (is_numeric($precio) && is_numeric($cantidad) && !in_array($_POST['nombre'], $lista))
							{
								//Se cambian los datos de la lista y se muestra la tabla modificada
								for ($i=0 ; $i < count($lista) ; $i+=3)
									if ($lista[$i] == $_POST['pr'])
									{
										if (!empty($_POST['nombre']))
											$lista[$i] = $_POST['nombre'];
										if (!empty($_POST['cantidad']))
											$lista[$i+1] = $_POST['cantidad'];
										if (!empty($_POST['precio']))
											$lista[$i+2] = $_POST['precio'];
									}
							}
						}
						MostrarSelect($lista);

						echo("<div class='form-group'>
						<label for='nombre'>Nuevo nombre: </label><br>
						<input type='text' name='nombre' id='nombre' class='form-control'>
						</div>");

						requestPriceAmount();

						echo("<button type='submit' name = 'modificado' class='btn btn-primary'>
							Modificar
						</button>");

						if (isset($_POST['modificado']))
							if (is_numeric($precio) && is_numeric($cantidad) && (!empty($precio) || !empty($cantidad) || !empty($_POST['nombre'])))
							{
								msgOk("Modificado correctamente");
								MostrarTabla($lista, FALSE);
							}
							else
								msgError("Datos erróneos introducidos o campos vacios.");
					}
					else
						msgInfo("No hay productos que modificar");
					echo("<button type='submit' name = 'volver' class='btn btn-primary'>
					Volver
					</button>");
				}
				else
				{
					//Entramos si hemos pulsado el boton eliminar del principal o 'eliminar' del propio menú
					echo ("<h1>Elimina de tu lista</h1>");
					//Si dentro del menú eliminar se pulsó el boton, se eliminan los datos del producto
					if (isset($_POST['eliminado']))
					{
						msgOk("Eliminado correctamente");
						for ($i=0 ; $i < count($lista) ; $i+=3)
							if ($lista[$i] == $_POST['pr'])
							{
								unset($lista[$i]);
								unset($lista[$i + 1]);
								unset($lista[$i + 2]);
								$lista = array_values($lista);
							}
					}
					//Si la lista esta vacia, se muestra mensaje.
					if(!empty($lista))
					{
						MostrarSelect($lista);
						
						echo("<br><button type='submit' name = 'eliminado' class='btn btn-primary'>
							Eliminar
						</button>");
					}
					else
						msgInfo("No hay productos que eliminar");

					echo("<button type='submit' name = 'volver' class='btn btn-primary'>
						Volver
					</button>");
					//Si se ha pulsado el boton de eliminar, se muestra la tabla con los cambios
					if (isset($_POST['eliminado']))
						MostrarTabla($lista, FALSE);
				}
				//Si la lista no esta vacia, se envia por input hidden con la funcion implode
				if(!empty($lista))
						echo "<input type='hidden' name='lista' value='". implode(',', $lista) . "'>";
			?>
		</div>
	</form>
</body>
</html>