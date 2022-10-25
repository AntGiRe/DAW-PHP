<?php

    #Muestra tabla con la informacion del array del primer ejercicio y los input correspondientes
    function showTable4Cols($array)
    {
        #Primera linea de la tabla
        $table = "<table class='agenda'><tr><td>Id</td><td>Nombre</td><td>Apellido</td><td>Dirección</td></tr>";
        $id = 1;
        #Recorremos de tres en tres, mostrando en cada linea la informacion correspondiente
        for($i = 0; $i < sizeof($array); $i += 3)
        {
            $table .= "<tr><td>$id</td></td><td>$array[$i]</td><td>".$array[$i+1]."</td><td>".$array[$i+2]."</td></tr>";
            $id++;
        }
        #Muestra los input correspondientes que el usuario usa para almacenar informacion
        $table .= "<tr><td></td><td><input type='text' name='name'></td><td><input type='text' name='ape'></td><td><input type='text' name='dir'></td><td><input type='submit' value='Insertar'></td></tr></table>";
        echo($table);
    }

    #Crea tabla dinamica a la que se le pasa columnas y filas e introduce en cada el producto de estas 
    function createDinamicTable($row, $col)
    {
        $table = "<table class='dinamic'><tr><th>x</th>";
        #En la primera fila añadimos numero de cada columna
        for($j = 0; $j <= $col; $j++)
        {
            $table .= "<td>".$j."</td>";
        }
        $table .= "</tr>";
        #Recorremos las filas
        for($i = 0; $i <= $row; $i++)
        {
            #En la primera columna de cada fila añadimos el numero de fila
            $table .= "<tr><td>$i</td>";
            #Realiza el producto de fila * columna
            for($j = 0; $j <= $col; $j++)
            {
                $table .= "<td>".$i * $j."</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</table>";
        echo($table);
    }

    #Devuelve el array asociativo con el numero de billetes necesarios para tener la cantidad pasada como parametro
    function moneyDesco($money)
    {
        $billetes = [500,200,100,50,20,10,5,2,1];
        $array = array();

        #Se va revisando si la division da igual o mas de 1, en ese caso guardamos division en array y nos quedamos con el resto. Asi descendiendo hasta el 1
        foreach($billetes as $billete)
            if($money / $billete >= 1)
            {
                $array[$billete] = intdiv($money, $billete);
                $money = $money % $billete;
            }
        return($array);
    }

    #Imprime el resultado del array asociativo
    function printResult($array)
    {
        foreach($array as $billete => $cantidad)
        {
            #Se muestra mensaje dependiendo de si es billete o moneda
            if($billete > 2)
                echo("<p class='resbi'>$cantidad billete de $billete</p>");
            else
                echo("<p class='resbi'>$cantidad moneda de $billete</p>");
        }
    }
?>