<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
<?php
    $medios =  [ "El Pais" => "https://www.elpais.com",
        "El Mundo" => "https://www.elmundo.es",
        "Marca" => "https://www.marca.com",
        "Antena3" => "https://www.antena3.com",
        "La Razón" => "https://www.larazon.es"
        
    ];
    // Obtengo una clave de forma aleatoria
    $clavemedio = array_rand($medios);
    echo "<p>El Medio recomendado es: <a href=\"". $medios[$clavemedio]. "\">$clavemedio</a></p>";
    ?> 
</body>
</html>