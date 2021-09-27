<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <?php
    function generarHTMLTable ( $filas, $columnas, $borde,$contenido){
        echo "<table border='$borde'>";
        for ($i=0; $i < $filas; $i++) { 
            echo"<tr>";
            for ($d=0; $d < $columnas; $d++) { 
                echo "<td>$contenido</td>";
            }
            echo"</tr>";
        }
        // <tr> para las filas
        // <td> para las columnas
        // Crear un for que cree filas y dentro un for que haga columnas
        echo "<table>";
    }
    ?>
</head>
<body>
<h3>5. Realizar y probar una  función que genere el código HTML de tablas con un borde determinado, incluyendo en cada casilla el mismo texto. </h3>

    <?php
    generarHTMLTable(3,5,2,"HOLA"); ?>
</body>
</html>