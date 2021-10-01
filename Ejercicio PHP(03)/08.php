<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>

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
    <table border="1">
        <thead>
            <th>Pais</th>
            <th>Capital</th>
            <th>Poblacion</th>
            <th>Ciudades</th>
        </thead>
    
<body>
    <?php 
        //$nombrepais = array_rand($paises, 2);
        //$datospais = [];
        //foreach ($nombrepais as $valor){
        //    $datospais[] = $paises[$valor];
        //}
        
        foreach ($paises as $nombre => $datos) {
            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>".$datos["Capital"]."</td>";
            echo "<td>".$datos["Poblacion"]."</td>";
            echo "<td>";
            foreach ($ciudades[$nombre] as $ciudad) {
                echo $ciudad. ", ";
            }
            echo "</tr>";
        }

    ?>
    </table>
</body>
</html>