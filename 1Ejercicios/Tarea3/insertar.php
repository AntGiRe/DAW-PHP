<!DOCTYPE html>
<?php
    include ("functions.php");
    $msg = "";
    $bd = conectar();
    $dis = "";
    //Se revisa si ningún campo es vacio y que los campos numericos sean positivos, además de que el codigo no exista ya, en el caso de que todo sea correcto, se añade.
    if (isset($_POST['insert-comer']))
    {
        $cod = $_POST['cod'];
        $nombre = $_POST['nombre'];
        $salario = $_POST['salario'];
        $numHijos = $_POST['numHijos'];
        $nacimiento = $_POST['nacimiento'];
        if(!empty($cod) && !empty($nombre) && !empty($salario) && !empty($numHijos) && !empty($nacimiento) && $salario >= 0 && $_POST['numHijos'] >= 0 && strlen($cod) <= 3)
        {
            $query = "INSERT INTO comerciales VALUES ('$cod', '$nombre', '$salario', '$numHijos', '$nacimiento')";
            if (!existeCodigo($cod, "comerciales") && ($fin = updateTable($query)))
                $msg = "Los datos del comercial fueron insertados correctamente";
            else
            {
                $msg = "Se ha producido un fallo al insertar el comercial, revisa que no uses un codigo ya existente";
            }
        }
        else
            $msg = "Rellena todos los campos del comercial y comprueba que los campos numéricos sean positivos";
    }
    if (isset($_POST['insert-prod']))
    {
        $cod = $_POST['cod'];
        $nombre = $_POST['nombre'];
        $descp = $_POST['descp'];
        $precio = $_POST['precio'];
        $desc = $_POST['desc'];
        if(!empty($cod) && !empty($nombre) && !empty($descp) && !empty($precio) && !empty($desc) && $precio >= 0 && $desc >= 0)
        {
            $query = "INSERT INTO productos VALUES ('$cod', '$nombre', '$descp', '$precio', '$desc')";
            if (!existeCodigo($cod, "productos") && ($fin = updateTable($query)))
                $msg = "Los datos del producto fueron insertados correctamente";
            else
            {
                $msg = "Se ha producido un fallo al insertar el producto, revisa que no uses un codigo ya existente";
            }
        }
        else
            $msg = "Rellena todos los campos del producto y comprueba que los campos numéricos sean positivos";
    }
    if (isset($_POST['insert-vent']))
    {
        $emp = $_POST['emp'];
        $pro = $_POST['pro'];
        $cant = $_POST['cant'];
        $fech = $_POST['fech'];
        if (!empty($cant) && !empty($fech) && $cant > 0)
        {
            $query = "INSERT INTO ventas VALUES ('$emp', '$pro', '$cant', '$fech')";
            if (($fin = updateTable($query)))
                $msg = "Los datos de la venta fueron insertados correctamente";
            else
                $msg = "Se ha producido un fallo inesperado al insertar la venta";
        }
        else
            $msg = "Rellena todos los campos de la venta y comprueba que los campos numéricos sean positivos";
    }
?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shara - Insertar</title>
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
                    <li class="nav-item"><a class="nav-link" href="consulta.php">Consulta Tablas</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Insertar Datos</a></li>
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
                            <h1 class="text-uppercase fw-bold text-white mb-3">Inserta nuevas filas en las tablas</h1>
                            <p class="mb-4">Pulsa uno de los botones para poder insertar datos en las tablas almacenadas en la base de datos</p><button class="btn btn-light fs-5 py-2 px-4" type="submit" style="margin-right: 10px;" name="ventas" <?php if (!$bd) echo "disabled"; ?>>Ventas</button><button class="btn btn-light fs-5 py-2 px-4" type="submit" style="margin-right: 10px;" name="comerciales" <?php if (!$bd) echo "disabled"; ?>>Comerciales</button><button class="btn btn-light fs-5 py-2 px-4" type="submit" name="productos" <?php if (!$bd) echo "disabled"; ?>>Productos</button>
                        </div>
                    </div>
                </div>
            </div>
		</form>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    //Mensajes de error o confirmación
                    if (!$bd)
                        $dis = "disabled";
                    if(isset($fin))
                        echo "<div class='alert alert-success' style='text-align: center;'>$msg</div>";
                    else if (!empty($msg))
                        echo "<div class='alert alert-danger' style='text-align: center;'>$msg</div>";
                    else if (!$bd)
                        echo "<div class='alert alert-danger' style='text-align: center;'>La base de datos no está operativa</div>";
                    //Si se ha pulsado un boton de insertar y revisando que no se haya insertado correctamente, se muestra el formulario
                    if(isset($_POST['ventas']) && !isset($fin))
                    {
                        echo ("<h1>Insertar Venta</h1>
                        <form method='post'>
                            <input type='hidden' name='ventas'>
                            <label class='form-label' for='emp'>Empleado</label>
                            <select class='form-select' style='padding-left: 14px; width: 603px;' name='emp' id='emp'>
                                <optgroup label='Empleados'>");
                        echo selectEmpleados($emp);
                        echo ("</optgroup>
                            </select>
                            <label class='form-label' for='pro'>Producto</label>
                            <select class='form-select' style='padding-left: 14px; width: 603px;' name='pro' id='pro'>
                                <optgroup label='Productos'>");
                        echo selectProductos($pro);
                        echo ("</optgroup>
                            </select>
                            <label class='form-label' for='cant'>Cantidad</label><input class='form-control' type='number' style='width: 303px;' name='cant' id='cant' value='".((isset($cant))?$cant:"")."'><label class='form-label' for='fech'>Fecha</label><input class='form-control' type='date' style='width: 200px;' name='fech' id='fech' value='".((isset($fech))?$fech:"")."'><button class='btn btn-primary' type='submit' style='margin-top: 10px; margin-bottom: 10px;' name='insert-vent'".$dis.">Insertar</button>
                        </form>");
                    }
                    else if(isset($_POST['comerciales']) && !isset($fin))
                    {
                        echo("<h1>Insertar Comercial</h1>
                        <form method='post'><input type='hidden' name='comerciales'><label class='form-label' for='cod'>Código</label><input class='form-control' type='number' style='width: 303px;' name='cod' id='cod' value='".((isset($cod))?$cod:"")."'><label class='form-label' for='nombre'>Nombre</label><input class='form-control' type='text' style='width: 655px;' name='nombre' id='nombre' value='".((isset($nombre))?$nombre:"")."'><label class='form-label' for='salario'>Salario</label><input class='form-control' type='number' step='any' style='width: 303px;' name='salario' id='salario' value='".((isset($salario))?$salario:"")."'><label class='form-label' for='numHijos'>Numero de hijos</label><input class='form-control' type='number' style='width: 303px;' name='numHijos' id='numHijos' value='".((isset($numHijos))?$numHijos:"")."'><label class='form-label' for='nacimiento'>Fecha de nacimiento</label><input class='form-control' type='date' style='width: 161px;' name='nacimiento' id='nacimiento' value='".((isset($nacimiento))?$nacimiento:"")."'><button class='btn btn-primary' type='submit' style='margin-top: 10px; margin-bottom: 10px;' name='insert-comer'".$dis.">Insertar</button></form>");
                    }
                    else if(isset($_POST['productos']) && !isset($fin))
                    {
                        echo("<h1>Insertar Producto</h1>
                        <form method='post'><input type='hidden' name='productos'><label class='form-label' for='cod'>Referencia</label><input class='form-control' type='text' style='width: 303px;' name='cod' id='cod' value='".((isset($cod))?$cod:"")."'><label class='form-label' for='nombre'>Nombre</label><input class='form-control' type='text' style='width: 655px;' name='nombre' id='nombre' value='".((isset($nombre))?$nombre:"")."'><label class='form-label' for='descp'>Descripción</label><input class='form-control' type='text' style='width: 655px;' name='descp' id='descp' value='".((isset($descp))?$descp:"")."'><label class='form-label' for='precio'>Precio</label><input class='form-control' type='number' step='any' style='width: 303px;' name='precio' id='precio' value='".((isset($precio))?$precio:"")."'><label class='form-label' for='desc'>Descuento</label><input class='form-control' type='number' style='width: 161px;' name='desc' id='desc' value='".((isset($desc))?$desc:"")."'><button class='btn btn-primary' type='submit' style='margin-top: 10px; margin-bottom: 10px;' name='insert-prod'".$dis.">Insertar</button></form>");
                    }
                    unset($db);
                ?>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
</body>

</html>