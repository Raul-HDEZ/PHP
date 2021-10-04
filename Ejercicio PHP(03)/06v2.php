<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6v2</title>

    <?php
    // Forma antigua de definir Array en PHP
    $paises = array(
    'Francia' => array("Capital" => "París", "Poblacion" => "50000000"),
    'España' => array("Capital" => "Madrid", "Poblacion" => "42000000"),
    'Italia' => array("Capital" => "Roma", "Poblacion"   => "46000000"),
    'Argentina' => array("Capital" => "Buenos Aires", "Poblacion" => "40000000"),
    'Colombia' => array("Capital" => "Bogotá", "Poblacion"  => "36000000"),
    'Chile' => array("Capital" => "Santiago", "Poblacion"   => "36000000"),
    'Suecia' => array("Capital" => "Estocolmo", "Poblacion" => "25000000"),
);
    // Forma moderna, mas compacta
    $ciudades = [
    'Francia' =>    ["París","Burdeos","Niza","Lille","Nantes"],
    'España' =>     ["Madrid", "Barcelona","León","Sevilla", "Valencia", "Málaga"],
    'Italia' =>     ["Roma", "Venecia","Florencia","Pisa", "Génova", "Milán", "Turín", "Nápoles"],
    'Argentina' =>  ["Buenos Aires", "Córdoba","Parana","Rosario"],
    'Colombia' =>   ["Bogotá", "Medellín","Cali","Barranquilla", "Bucaramanga"],
    'Chile' =>      ["Santiago", "Arica","Iquique","Osorno", "Viña del Mar"],
    'Suecia' =>   ["Estocolmo", "Upsala","Gotemburgo","Lund"],
  ];
    // Ejemplo de uso 
   //echo $paises["España"]["Capital"]; // Muestra Madrid
?>
</head>
<body>
    <?php 
        foreach ($paises as $clave => $fila) {
            $poblacion[$clave] = $fila['Poblacion'];
        }
        array_multisort($poblacion, SORT_ASC, $paises);
        $ult = end($paises);
        print("el maximo de poblacion es ".end($ult));

        /* OTRA FORMA DE HACERLO

        function ordeapais($pais1, $pais2){
            return ( $pais1['Poblacion'] - $pais2['Poblacion']);
        }

        y ordenas usando la funcion

        uasort($pais,'ordenapais');
        
        
        */
    ?>

</body>
</html>