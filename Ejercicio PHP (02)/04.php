<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <?php
    define("num", 50);
    define("nmax", 100);
    $min = 1021;
    $max = 0;
    $total = 0;

    for ($i=1; $i < nmax ; $i++) { 
        $n = random_int(1,nmax);
        $total += $n;
        if ($n < $min) {
            $min = $n;
        } elseif ($n > $max) {
            $max = $n;
        }
    }
    $med = $total/nmax;
    ?>
</head>
<body>
    <h3>. Realizar un programa en php que genere 50 números aleatorios en 1 y 100 y que muestre en una tabla  html el valor máximo, el mínimo y la media con el siguiente formato:
  Nota definir los valores 50 y 100 como constantes en PHP (define)</h3>
  <p>Minimo = <?=$min?></p>
  <p>Maximo = <?=$max?></p>
  <p>Media = <?=$med?></p>
</body>
</html>