<!DOCTYPE html>
<?php
    //Conectamos con la BD y añadimos las funciones
    include ("functions.php");
    $bd = conectar();
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shara - Consulta tablas</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top bg-white py-3" style="background: var(--bs-white);border-bottom: 3px solid rgb(59,70,81); box-shadow: 0px 10px 10px rgb(112, 112, 112, 0.2);">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.html"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-cart-dash">
                        <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"></path>
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                    </svg></span><span>SHARA</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="venta.php">Consulta Ventas</a></li>
                    <li class="nav-item"><a class="nav-link active" href="consulta.php">Consulta Tablas</a></li>
                    <li class="nav-item"><a class="nav-link" href="insertar.php">Insertar Datos</a></li>
                    <li class="nav-item"><a class="nav-link" href="modificar.php">Modificar Datos</a></li>
                    <li class="nav-item"><a class="nav-link" href="eliminar.php">Eliminar Datos</a></li>
                </ul>
            </div>
        </div>
    </nav>
	<div class="container" style="margin-top: 100px; margin-bottom: 10px;">
		<form method="post" action="">
            <div class="text-white bg-primary border rounded border-0 p-4 py-5">
                <div class="row h-100">
                    <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                        <div>
                            <h1 class="text-uppercase fw-bold text-white mb-3">Consulta el contenido de las tablas</h1>
                            <p class="mb-4">Pulsa uno de los botones para poder ver el contenido de las tablas almacenadas en la base de datos</p><button class="btn btn-light fs-5 py-2 px-4" type="submit" style="margin-right: 10px;" name="ventas" <?php if (!$bd) echo "disabled"; ?>>Ventas</button><button class="btn btn-light fs-5 py-2 px-4" type="submit" style="margin-right: 10px;" name="comerciales" <?php if (!$bd) echo "disabled"; ?>>Comerciales</button><button class="btn btn-light fs-5 py-2 px-4" type="submit" name="productos" <?php if (!$bd) echo "disabled"; ?>>Productos</button>
                        </div>
                    </div>
                </div>
            </div>
		</form>
    </div>
	<?php
        //Si no se pudo conectar con la BD, error. Si no, muestra la tabla usando la funcion imprimirTabla
		if ($bd == NULL)
			echo "<div class='alert alert-danger' style='text-align: center; width: 80%; margin: 0 auto;'>La base de datos no está operativa</div>";
		else if(isset($_REQUEST['ventas']) || isset($_REQUEST['comerciales']) || isset($_REQUEST['productos']))
		{
			if(isset($_REQUEST['ventas']))
            {
                $tabla = "ventas";
                echo "<h1 style='text-align: center;'>Ventas</h1>";
            }
			else if(isset($_REQUEST['comerciales']))
            {
                echo "<h1 style='text-align: center;'>Comerciales</h1>";
                $tabla = "comerciales";
            }
			else
            {
                echo "<h1 style='text-align: center;'>Productos</h1>";
                $tabla = "productos";
            }
			$query = "SELECT * FROM $tabla";
			imprimirTabla(null, $query);
            unset($db);
		}
        ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
</body>

</html>