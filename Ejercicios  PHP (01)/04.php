<h3>4.- Generar números al azar entre 1 y 10 hasta que se generen 3 veces el valor 6 de forma consecutiva en ese caso se mostrará cuantos número se han generado. </h3>
<?php
    $cont = 0;
    $nnum;
    for ($i=0; $cont < 3 ; $i++) { 
        $num = random_int(1,10);
        if ($num == 6) {
            $cont++;
        } else {
            $cont = 0;
        }
        $nnum=$i;
    }
    $milisegundos = microtime(true);
    echo "Han salido tres 6 seguidos tras genera $nnum números en $milisegundos milisegundos"


?>