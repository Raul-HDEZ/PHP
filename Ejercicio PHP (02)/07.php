<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <h3>7. Realizar un programa que genere una tabla html de 10x10 con casillas de 30x30 px donde cada casilla tenga un color aleatorio obtenido mediante una función que genera un color diferente en cada casilla.
1º Versión  elegir entre 5 posibles valores: rojo,verde, azul, blanco y negro. </h3>

<?php 
$array = array("red", "green", "blue", "white", "black");
echo "<table width='500px' height='500px'border='2px'>";
for ($i=0; $i < 10; $i++) { 
    echo"<tr>";
    for ($d=0; $d < 10; $d++) { 
        $color = random_int(0,4);
        echo "<td BGCOLOR='$array[$color]'></td>";
    }
    echo"</tr>";
}
echo "</table>";
?>
</body>
</html>