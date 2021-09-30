<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
        // 2.- Crear un array que almacene 5 cadenas con el nombre de periódicos 
        // y sus enlaces para acceder. El array será asociativo con el nombre del 
        // periódico como clave y su URL como valor.
        $medios =  [ "El Pais" => "https://www.elpais.com",
                     "El Mundo" => "https://www.elmundo.es",
                     "Marca" => "https://www.marca.com", 
                     "Antena3" => "https://www.antena3.com", 
                     "La Razón" => "https://www.larazon.es"
            
                    ];
        
        echo "<h1>Lista de Medios: </h1><ul>";
        foreach ($medios as $clave => $valor){
            echo "<li> <a href=\"$valor\">$clave</a></li>";
        }
        echo "</ul>";
    ?>
</body>
</html>