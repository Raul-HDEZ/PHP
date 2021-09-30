<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <?php 
    $mitabla = array(
        "karate" => "https://i0.wp.com/karateyalgomas.com/wp-content/uploads/2017/03/kiokushinkai.jpg?fit=1000%2C1077&ssl=1",
        "tenis" => "https://www.hipotels.com/content/imgsxml/panel_menufotos/bahiagrande-tenis264.jpg",
        "futbol" => "https://ca-times.brightspotcdn.com/dims4/default/9bef5fa/2147483647/strip/true/crop/1185x722+0+0/resize/840x512!/quality/90/?url=https%3A%2F%2Fcalifornia-times-brightspot.s3.amazonaws.com%2F88%2F84%2Fdb989c2d478f8187f4051d25fc11%2Fscreen-shot-2021-08-29-at-11.33.38%20AM.png",
        "baloncesto" => "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Luka_Don%C4%8Di%C4%87_2021.jpg/1200px-Luka_Don%C4%8Di%C4%87_2021.jpg",
        "balonmano" => "https://estaticos-cdn.prensaiberica.es/clip/5370ab2f-dd5f-43ed-a87c-23a6634ec0a0_16-9-discover-aspect-ratio_default_0.jpg",
    );

    ?>
</head>
<body>
    <table  >
    <?php 
    foreach ($mitabla as $key => $value) {
        echo "<tr>";
        echo "<td>$key</td>";
        echo "<td ><img src='$value' WIDTH='100' height='100'></td>";
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>