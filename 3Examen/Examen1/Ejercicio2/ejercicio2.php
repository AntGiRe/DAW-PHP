<?php
    include "../common/funciones.php";
    #Control de errores del formulario
    if($_POST)
    {
        $row = $_POST['row'];
        $col = $_POST['col'];
        if(!empty($row) && !empty($col) && is_numeric($row) && is_numeric($col))
            $validated = TRUE;
        else
            $validated = FALSE;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/styles/style.css" type="text/css">
    <title>Ejercicio 2</title>
</head>
<body>
    <h1>Ejercicio 2</h1>
    <p>A partir de un número de filas y columnas, crear una tabla con ese tamaño. Las celdas deben estar rellenadas con el producto de las filas y columnas</p>
    <form action="" method="post">
        <table class="input">
            <tr>
                <td><label for="row">Filas: </label></td>
                <td><input type="text" name="row" id="row"></td>
            </tr>
            <tr>
                <td><label for="col">Columnas: </label></td>
                <td><input type="text" name="col" id="col"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit"></td>
            </tr>
    </form>
    <?php
        #Si se ha mandado el formulario y ha pasado el control de errores, se muestra la tabla dinamica de tamaño. Si no, error
        if($_POST && $validated == TRUE)
        {
            echo("<div class='ok'>Tabla creada correctamente</div>");
            createDinamicTable($row, $col);
        }
        else if($_POST)
            echo("<div class='error'>Los campos son obligatorios y solo númericos</div>");
    ?>
</body>
</html>