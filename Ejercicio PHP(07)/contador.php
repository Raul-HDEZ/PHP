<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador</title>
</head>

<?php 
session_start();
$navegador = 0;
    if (isset($_COOKIE['nave'])) {
        $navegador = $_COOKIE["nave"];
    }
    $navegador++;
    setcookie("nave",$navegador, time()+7889400);
    $total = file_get_contents('./accesos.txt');
    $total++;
    file_put_contents('./accesos.txt',$total);
    session_destroy();
    ?>

<body>

    Se ha accedido a la pagina <?=$total?><br>
    Desde este navegador se ha accedido <?=$navegador?> veces
</body>
</html>