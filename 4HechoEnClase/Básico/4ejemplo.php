<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ejercicio 4</title>
        <meta charset = "UTF-8">
        <link href="style/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="text">
            <?php
                $dia = date('d');
                $control = "El servidor no está activo";
                if ($dia > 10)
                $control = "El servidor está activo";
                echo("<h1>$control</h1>")
            ?>
        </div>
    </body>
</html>