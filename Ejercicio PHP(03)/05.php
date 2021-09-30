<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>

    <?php
// Relleno una tabla con valores de 1 a 49
$valores = [];
for ($i = 1; $i <= 49; $i ++) {
    $valores[] = $i;
}
// OBTENGO 5+1 INDICES ALEATORIOS ordenados de la tabla (OJO NO VALORES )
$indices = array_rand($valores, 6);

// Me quedo con los valores
$vbonoloto = [];
foreach ($indices as $i ) {
    $vbonoloto[] = $valores[$i];
}
// Obtengo el número complementario y lo elimino de la tabla
$icomplementario = random_int(0, 5);
$complementario = $vbonoloto[$icomplementario];
unset($vbonoloto[$icomplementario]);

?>
</head>
<body>
<b>Sorteo del Bonoloto</b>
    <table border=1>
        <tr>
    <?php
    foreach ($vbonoloto as $num) {
        ?>
    <td><?php echo $num ?></td>
    <?php
    }
    ?>
    <td><?php echo "Complementario $complementario " ?></td>
        </tr>
    </table>
</body>
</html>