<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <code>
    <?php 
    $almena = "**** ";
    $linea = "*****";
    $num = random_int(1,10);
    echo"<p>";
    for ($i=0; $i < $num; $i++) { 
        echo $almena;
    }
    echo"</p>";
    echo"<p>";
    for ($i=0; $i < $num; $i++) { 
        echo $almena;
    }
    echo"</p>";
    for ($i=0; $i < $num-1; $i++) { 
        echo $linea;
    }
    echo"****</p>";
    ?>
    </code>
</body>
</html>