<!DOCTYPE html>
<?php
    include ("functions.php");
    $bd = conectar();
    $msg = "";
    $cod = null;
    if(!$bd)
        $dis = "disabled";
    else
        $dis = "";
    //Seleccion de codigo
    if(isset($_POST['sel-prod']))
    {
        $cod = $_REQUEST['pro'];
    }
    else if(isset($_POST['sel-com']))
    {
        $cod = $_REQUEST['com'];
    }
    else if(isset($_POST['sel-ven']) || isset($_POST['mod-ven']))
    {
        $cod = explode(",", $_REQUEST['ven']);
    }
    //Modificación de una tupla, dependiendo de si se modifica un producto, un comercial o una venta
    if(isset($_POST['mod-prod']))
    {
        $cod = $_POST['cod'];
        $nombre = $_POST['nombre'];
        $descp = $_POST['descp'];
        $precio = $_POST['precio'];
        $desc = $_POST['desc'];
        if(!empty($cod) && !empty($nombre) && !empty($descp) && !empty($precio) && !empty($desc) && $precio >= 0 && $desc > 0)
        {
            $query = "UPDATE productos SET nombre = '$nombre', descripcion = '$descp', precio = '$precio', descuento = '$desc' WHERE referencia = '$cod'";
            $fin = updateTable($query);
            $msg = "Los datos de $cod fueron cambiados correctamente";
        }
        else
            $msg = "Rellena todos los campos del producto y comprueba que los campos numéricos sean positivos";
    }
    if(isset($_POST['mod-com']))
    {
        $cod = $_POST['cod'];
        $nombre = $_POST['nombre'];
        $nacimiento = $_POST['nacimiento'];
        $nHijos = $_POST['hijos'];
        $salario = $_POST['salario'];
        if(!empty($cod) && !empty($nombre) && !empty($nacimiento) && !empty($nHijos) && !empty($salario) && $nHijos >= 0 && $salario >= 0)
        {
            $query = "UPDATE comerciales SET nombre = '$nombre', fNacimiento = '$nacimiento', salario = '$salario', hijos = '$nHijos' WHERE codigo = '$cod'";
            $fin = updateTable($query);
            $msg = "Los datos de $cod fueron cambiados correctamente";
        }
        else
            $msg = "Rellena todos los campos del producto y comprueba que los campos numéricos sean positivos";
    }
    if(isset($_POST['mod-ven']))
    {
        $com = $_POST['com'];
        $refPr = $_POST['refPr'];
        $cant = $_POST['cant'];
        $fech = $_POST['fech'];
        if(!empty($com) && !empty($refPr) && !empty($cant) && !empty($fech) && $cant >= 0)
        {
            $query = "UPDATE ventas SET cantidad = '$cant' WHERE refProducto = '".$cod[1]."' and fecha = '".$cod[2]."' and codComercial = '".$cod[0]."'";
            $fin = updateTable($query);
            $msg = "Los datos de la venta fueron cambiados correctamente";
        }
        else
            $msg = "Rellena todos los campos del producto y comprueba que los campos numéricos sean positivos";
    }
?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shara - Modificar</title>
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
                    <li class="nav-item"><a class="nav-link" href="insertar.php">Insertar Datos</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Modificar Datos</a></li>
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
                            <h1 class="text-uppercase fw-bold text-white mb-3">Modificar filas en las tablas</h1>
                            <p class="mb-4">Pulsa uno de los botones para modificar datos en las tablas almacenadas en la base de datos</p><button class="btn btn-light fs-5 py-2 px-4" type="submit" style="margin-right: 10px;" name="ventas" <?php if (!$bd) echo "disabled"; ?>>Ventas</button><button class="btn btn-light fs-5 py-2 px-4" type="submit" style="margin-right: 10px;" name="comerciales" <?php if (!$bd) echo "disabled"; ?>>Comerciales</button><button class="btn btn-light fs-5 py-2 px-4" type="submit" name="productos" <?php if (!$bd) echo "disabled"; ?>>Productos</button>
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
                    if(isset($fin))
                        echo "<div class='alert alert-success' style='text-align: center;'>$msg</div>";
                    else if (!empty($msg))
                        echo "<div class='alert alert-danger' style='text-align: center;'>$msg</div>";
                    else if (!$bd)
                        echo "<div class='alert alert-danger' style='text-align: center;'>La base de datos no está operativa</div>";
                    if(isset($_POST['ventas']) || isset($_POST['sel-ven']) || isset($_POST['mod-ven']) && !isset($fin))
                    {
                        echo ("<h1>Modificar Venta</h1>");
                        echo ("<form method='post'>");
                        if (!isset($_POST['sel-ven']) && !isset($_POST['mod-ven']))
                        {
                            echo("<label class='form-label' for='cod'>Elige una venta a modificar:</label>
                            <select class='form-select' style='padding-left: 14px;' name='ven'>
                            <optgroup label='Ventas'>");
                            selectVentas($cod);
                            echo ("</optgroup></select>");
                            echo ("<button class='btn btn-primary' type='submit' style='margin-top: 10px; margin-bottom: 10px;' name='sel-ven'".$dis.">Seleccionar</button></form>");
                        }
                        if(isset($_POST['ven']) || isset($_POST['mod-ven']))
                        {
                            echo("<input name='ven' type='hidden' value='".implode(",",$cod)."'><label class='form-label' for='com'>Comercial</label><input class='form-control' type='text' style='width: 303px;' name='com' id='com' readonly value='".getColFromTabla("comerciales","nombre",$cod[0])."'><label class='form-label' for='refPr'>Producto</label><input class='form-control' type='text' style='width: 655px;' name='refPr' id='refPr' value='".getColFromTabla("productos","nombre",$cod[1])."' readonly><label class='form-label' for='fech'>Fecha</label><input class='form-control' type='date' style='width: 655px;' name='fech' id='fech' value='".$cod[2]."' readonly><label class='form-label' for='cant'>Cantidad</label><input class='form-control' type='number' style='width: 303px;' name='cant' id='cant' value='".getColFromVenta("cantidad",$cod[0],$cod[1],$cod[2])."'>");
                            echo ("<button class='btn btn-primary' type='submit' style='margin-top: 10px; margin-bottom: 10px;' name='mod-ven'".$dis.">Modificar</button></form>");
                        }
                    }
                    else if(isset($_POST['comerciales']) || isset($_POST['sel-com']) || isset($_POST['mod-com']) && !isset($fin))
                    {
                        echo("<h1>Modificar Comercial</h1>");
                        echo("<form method='post'>");
                        if (!isset($_POST['sel-com'])  && !isset($_POST['mod-com']))
                        {
                            echo("<label class='form-label' for='cod'>Elige un comercial a modificar:</label>
                            <select class='form-select' style='padding-left: 14px;' name='com'>
                            <optgroup label='Comerciales'>");
                            selectEmpleados($cod);
                            echo ("</optgroup></select>");
                            echo ("<button class='btn btn-primary' type='submit' style='margin-top: 10px; margin-bottom: 10px;' name='sel-com'".$dis.">Seleccionar</button></form>");
                        }
                        if(isset($_POST['com']) || isset($_POST['mod-com']))
                        {
                            echo("<label class='form-label' for='cod'>Codigo</label><input class='form-control' type='text' style='width: 303px;' name='cod' id='cod' readonly value='".$cod."'><label class='form-label' for='nombre'>Nombre</label><input class='form-control' type='text' style='width: 655px;' name='nombre' id='nombre' value='".getColFromTabla("comerciales","nombre",$cod)."'><label class='form-label' for='salario'>Salario</label><input class='form-control' type='number' step='any' style='width: 655px;' name='salario' id='salario' value='".getColFromTabla("comerciales","salario",$cod)."'><label class='form-label' for='numHijos'>Numero de hijos</label><input class='form-control' type='number' style='width: 303px;' name='hijos' id='hijos' value='".getColFromTabla("comerciales","hijos",$cod)."'><label class='form-label' for='nacimiento'>Fecha nacimiento</label><input class='form-control' type='date' style='width: 161px;' name='nacimiento' id='nacimiento' value='".getColFromTabla("comerciales","fNacimiento",$cod)."'>");
                            echo ("<button class='btn btn-primary' type='submit' style='margin-top: 10px; margin-bottom: 10px;' name='mod-com'".$dis.">Modificar</button></form>");
                        }
                    }
                    else if(isset($_POST['productos']) || isset($_POST['sel-prod']) || isset($_POST['mod-prod']) && !isset($fin))
                    {
                        echo("<h1>Modificar Producto</h1>");
                        echo("<form method='post'>");
                        if (!isset($_POST['sel-prod']) && !isset($_POST['mod-prod']))
                        {
                            echo("<label class='form-label' for='cod'>Elige un producto a modificar:</label>
                            <select class='form-select' style='padding-left: 14px;' name='pro'>
                            <optgroup label='Productos'>");
                            selectProductos($cod);
                            echo ("</optgroup></select>");
                            echo ("<button class='btn btn-primary' type='submit' style='margin-top: 10px; margin-bottom: 10px;' name='sel-prod'".$dis.">Seleccionar</button></form>");
                        }
                        if(isset($_POST['pro']) || isset($_POST['mod-prod']))
                        {
                            echo("<label class='form-label' for='cod'>Referencia</label><input class='form-control' type='text' style='width: 303px;' name='cod' id='cod' readonly value='".$cod."'><label class='form-label' for='nombre'>Nombre</label><input class='form-control' type='text' style='width: 655px;' name='nombre' id='nombre' value='".getColFromTabla("productos","nombre",$cod)."'><label class='form-label' for='descp'>Descripción</label><input class='form-control' type='text' style='width: 655px;' name='descp' id='descp' value='".getColFromTabla("productos","descripcion",$cod)."'><label class='form-label' for='precio'>Precio</label><input class='form-control' type='number' step='any' style='width: 303px;' name='precio' id='precio' value='".getColFromTabla("productos","precio",$cod)."'><label class='form-label' for='desc'>Descuento</label><input class='form-control' type='number' style='width: 161px;' name='desc' id='desc' value='".getColFromTabla("productos","descuento",$cod)."'>");
                            echo ("<button class='btn btn-primary' type='submit' style='margin-top: 10px; margin-bottom: 10px;' name='mod-prod'".$dis.">Modificar</button></form>");
                        }
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