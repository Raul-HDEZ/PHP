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
function randomColor(){
    $str = "#";
    for($i = 0 ; $i < 6 ; $i++){
    $randNum = rand(0, 15);
    switch ($randNum) {
    case 10: $randNum = "A"; 
    break;
    case 11: $randNum = "B"; 
    break;
    case 12: $randNum = "C"; 
    break;
    case 13: $randNum = "D"; 
    break;
    case 14: $randNum = "E"; 
    break;
    case 15: $randNum = "F"; 
    break; 
    }
    $str .= $randNum;
    }
    return $str;
   }
echo "<table width='500px' height='500px'border='2px'>";
$color = randomColor();
list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
for ($i=1; $i <= 10; $i++) { 
    $t = 10 - $i;
    echo"<tr style='background-color: rgba($r,$g,$b,0.$t)' >";
    for ($d=0; $d < 10; $d++) { 
        
        echo "<td></td>";
    }
    echo"</tr>";
}
echo "</table>";
?>
</body>
</html>