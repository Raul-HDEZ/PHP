<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    
</head>
<body>
    <?php 
    
    function generarArray($num){
        $array = [];
        for ($i=0; $i < $num; $i++) { 
            $array[$i] = random_int(1,10);
        }
        return $array;
    }

    function imprimirArray($array){
        echo "<table border='1px'>";
        for ($i=0; $i < count($array); $i++) { 
            echo "<td>$array[$i]</td>";
        }
        echo "</table>";
    }

    function minimoArray($array){
        $min = 11;
        foreach ($array as $value) {
            if ($value < $min) {
                $min = $value;
            }
        }
        return $min;
    }

    function maximoArray($array){
        $max = 0;
        foreach ($array as $value) {
            if ($value > $max) {
                $max = $value;
            }
        }
        return $max;
    }
    
    function modaArray($array){
        $max = 0;
        $valores = array_count_values($array);
        foreach ($valores as $key => $value) {
            if($value < $max) {
                break; 
            } else {
                $max = $key;
            }
        }
        return $max;
        
    }

     // 1.- Rellenar un array con 20 números aleatorios entre 1 y 10 y mostrar el contenido 
     // del array  mediante una tabla de una fila en HMTL. Mostrar a continuación el valor máximo, 
     // el mínimo y el  valor que mas veces se repite. (Nota definir funciones para cada caso)
    $tabla = generarArray(20);
    imprimirArray($tabla);
    print "El minimo es: ". minimoArray($tabla);
    print "<br>";
    print "El maximo es: ". maximoArray($tabla);
    print "<br>";
    print "La moda es: ". modaArray($tabla);


     
    ?>
</body>
</html>