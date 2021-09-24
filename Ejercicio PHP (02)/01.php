<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
     <?php 
    function elMayor($a,$b,&$c){
        if ($a == $b) {
            $c = 0;
        } elseif ($a > $b) {
            $c = $a;
        } else {
            $c = $b;
        }
    }
    ?>   
</head>
<body>
    <h3>1. Realizar y probar una función en PHP  llamada elMayor  que reciba tres números: A,B y C. La función almacenará en C el valor que sea mayor A o B. En el caso sean iguales almacenará el valor 0 en C ¿Qué parámetros se deberían pasar por valor o copia y cuales por referencia?</h3>

    <?php 
    $n1 = 1;
    $n2 = 2;
    $n3 = 0;
    elMayor($n1,$n2,$n3);
    ?>

    <h3>Valor de C = <?=$n3?></h3>

</body>
</html>