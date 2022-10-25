<?php
    include "../common/funciones.php";
    #Control de errores del formulario
    if($_POST)
        if(!empty($_POST['money']) && is_numeric($_POST['money']))
            $validated = TRUE;
        else
            $validated = FALSE;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/styles/style.css" type="text/css">
    <title>Ejercicio 3</title>
</head>
<body>
    <h1>Ejercicio 3</h1>
    <p>A partir de una cantidad de dinero, mostrar su descomposición en billetes (500, 200, 100, 50, 20, 10, 5) y monedas (2, 1), para que el número de elementos sea mínimo.</p>
    <form action="" method="post" class="billetes">
        <input type="text" name="money">
        <input type="submit">
    </form>
    <?php
        #Si se ha mandado el formulario y ha pasado el control de errores, realizamos la descomposicion y mostramos resultado. Si no, error.
        if($_POST && $validated == TRUE)
        {
            echo("<div class='ok'>Descomposición realizada correctamente.</div>");
            $array = moneyDesco($_POST['money']);
            printResult($array);
        }
        else if($_POST)
            echo("<div class='error'>Campo obligatorio y solo númerico.</div>");
    ?>
</body>
</html>