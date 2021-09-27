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
    $almena = "<img src='ladrillo.jpg' width='50' height='50'>";
    $blanco = "<img src='blanco.jpg' width='50' height='50'>";
    $num = random_int(1,10);
    echo"<div>";
    for ($i=0; $i < $num; $i++) { 
        echo $almena;
        echo $blanco;
    }
    echo"</div>";
    echo"<div>";
    for ($i=0; $i < $num; $i++) { 
        echo $almena;
        echo $blanco;
    }
    echo"</div>";
    for ($i=0; $i < $num-1; $i++) { 
        echo $almena;
        echo $almena;
    }
    echo $almena;
    ?>
    </code>
</body>
</html>