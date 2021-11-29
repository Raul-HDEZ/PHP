<?php
include_once 'BiciElectrica.php';
// Programa principal
$tabla = cargabicis();
if (!empty($_GET['coordx']) && !empty($_GET['coordy'])) {
$biciRecomendada = bicimascercana($_GET['coordx'], $_GET['coordy'], $tabla);
}

function cargabicis(){
    $tabla= [];
    $fich = @fopen('Bicis.csv','r');
    while ($linea = fgetcsv($fich, ',')) {
        $bici = new Bicicleta($linea[0],$linea[1],$linea[2],$linea[3],$linea[4]);
        $tabla[] = $bici;
     }
    fclose($fich);
    return $tabla;
}

function mostrartablabicis($tabla){
    echo "<table><th>ID</th><th>CoordxX</th><th>CoordY</th><th>Bateria</th>";
    foreach ($tabla as $value) {
        if ($value->__get('operativa')==1) {
            echo "<tr>";
            echo "<td>".$value->id."</td>";
            echo "<td>".$value->coordx."</td>";
            echo "<td>".$value->coordy."</td>";
            echo "<td>".$value->bateria."%</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
}

function bicimascercana($x,$y,$tabla){
    $menor = 999999999999999999999999999999999999999999999999999999999999999;
    $res = "";
    foreach ($tabla as $bici) {
        if ($bici->distancia($x,$y)< $menor && $bici->operativa==1) {
            $menor = $bici->distancia($x,$y);
            $res = $bici;
        }
    }
    return $res;
}

?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>MOSTRAR BICIS OPERATIVAS</title>
<style>
table, th, td {
border: 1px solid black;
}
</style>

</head>

<body>
<h1> Listado de bicicletas operativas </h1>
<?= mostrartablabicis($tabla); ?>
<?php if (isset($biciRecomendada)) : ?>
<h2> Bicicleta disponible más cercana es <?= $biciRecomendada ?> </h2>
<button onclick="history.back()"> Volver </button>
<?php else : ?>
<h2> Indicar su ubicación: <h2>
<form>
Coordenada X: <input type="number" name="coordx"><br>
Coordenada Y: <input type="number" name="coordy"><br>
<input type="submit" value=" Consultar ">
</form>
<?php endif ?>
</body>

</html>
