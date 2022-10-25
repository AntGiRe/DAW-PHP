<?php
    include "../common/funciones.php";
    #Control de errores al introducir datos
    if($_POST)
    {
        $name = $_POST['name'];
        $ape = $_POST['ape'];
        $dir = $_POST['dir'];
        if(!empty($name) && !empty($ape) && !empty($dir))
            $validated = "OK";
        else
            $validated = "Hay campos vacios, todos son obligatorios.";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/styles/style.css" type="text/css">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    <p>Tendremos una array donde almacenaremos los datos de una persona y cada vez que insertamos un nuevo registro aparecerá en la parte inferior de la tabla.</p>
    <form action="" method="post">
        <?php
            #Si existe una variable array, usamos explode para recuperar la informacion. Si no, creamos una nueva
            if(isset($_POST['array']))
                $array = explode(';', $_POST['array']);
            else
                $array = array();
            #Si todo esta validado y hemos enviado el formulario, guardamos info en el array
            if($_POST && $validated == "OK")
            {
                echo("<div class='ok'>Persona añadida correctamente.</div>");
                $array[] = $name;
                $array[] = $ape;
                $array[] = $dir;
            }
            else if ($_POST)
                echo("<div class='error'>$validated</div>");
            showTable4Cols($array);
            #Si el array no esta vacio, lo enviamos con input oculto mediante un implode para convertir de array a string
            if(sizeof($array)>0)
                echo("<input type='hidden' name='array' value='".implode(';', $array)."'>");
        ?>
    </form>
</body>
</html>