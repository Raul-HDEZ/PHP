<h3>3-   Obtener un número al azar entre 1 y 9 y generar una pirámide con ese número de peldaños.
Utilizar la marca code para que la visualización no se deforme por el tamaño de los espacio o una estilo con tipo de letra monospace.
Número generado 5</h3>

<?php 

$filas = random_int(1,9);
for($altura = 1; $altura<=$filas; $altura++){
    //Espacios en blanco
    for($blancos = 1; $blancos<=$filas-$altura; $blancos++){
        echo "&nbsp";
    }
    //Asteriscos
    for($asteriscos=1; $asteriscos<=($altura*2)-1; $asteriscos++){
        echo "*";
    }
     echo "<br>";
}


?>