<!DOCTYPE html>
<?php
    include "functions.php";
    $db = conectar();
    $codigo = null;
    //Si hemos pulsado el boton de consultar ventas, generamos el query y guardamos el codigo de empleado en $codigo
    if (isset($_REQUEST['btn-emp']))
    {
        $codigo = $_REQUEST['emp'];
        $query = "SELECT v.fecha, v.cantidad, p.nombre, p.precio, p.descuento FROM comerciales c INNER JOIN ventas v ON c.codigo = v.codComercial INNER JOIN productos p ON p.referencia = v.refProducto WHERE c.codigo = '".$codigo."'";
    }
?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shara - Consulta ventas</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body style="margin-right: 0px;">
    <nav class="navbar navbar-light navbar-expand-md fixed-top bg-white py-3" style="background: var(--bs-white);border-bottom: 3px solid rgb(59,70,81); box-shadow: 0px 10px 10px rgb(112, 112, 112, 0.2);">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.html"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-cart-dash">
                        <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"></path>
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                    </svg></span><span>SHARA</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Consulta Ventas</a></li>
                    <li class="nav-item"><a class="nav-link" href="consulta.php">Consulta Tablas</a></li>
                    <li class="nav-item"><a class="nav-link" href="insertar.php">Insertar Datos</a></li>
                    <li class="nav-item"><a class="nav-link" href="modificar.php">Modificar Datos</a></li>
                    <li class="nav-item"><a class="nav-link" href="eliminar.php">Eliminar Datos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <form method="post" action="" style="margin: 100px;margin-left: 125px;margin-bottom: 0px;margin-right: 125px;padding-right: 125px;padding-left: 125px;padding-top: 10px;padding-bottom: 10px;">
            <h1 style="text-align: center;">Ventas de un empleado</h1>
            <label class="form-label" for="select">Empleado</label>
            <select class="form-select" style="padding-left: 14px;" name="emp">
                <optgroup label="Empleados">
                    <?php selectEmpleados($codigo); ?>
                </optgroup>
            </select>
            <button class="btn btn-primary" type="submit" style="margin-top: 10px;" name="btn-emp" <?php if(!$db) echo "disabled"; ?>>Buscar</button>
        </form>
        <?php
            //Si la BD no esta disponible, mensaje de error. Si no, mostramos la tabla
            if ($db == NULL)
                echo "<div class='alert alert-danger' style='text-align: center;'>La base de datos no está operativa</div>";
            else if(isset($_REQUEST['btn-emp']))
            {
                $cabecera = ["Fecha", "Cantidad", "Producto", "Precio", "Descuento"];
                imprimirTabla($cabecera, $query);
            }
            unset($db);
        ?>
        
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
</body>

</html>