<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
    <?php 
    $temperaturas =  [ 6, 10, 12, 14,16 ,20 ,25 , 30, 18, 15, 14, 8];
    $meses = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
   //El array a crear de forma automática tendrá los valores
   //$mestemperatura = [ 'enero' => 6, 'febrero' => 10 ...
    function newArray($array1, $array2){
        $vuelta = [];
        for ($i=0; $i < 12 ; $i++) { 
            $vuelta[$array1[$i]] = $array2[$i];
        }
        return $vuelta;
    }
   ?>
   <table>
       <thead>
           <th>Mes</th>
           <th>Temperatura</th>
       </thead>
       <?php
       $mestemp = newArray($meses, $temperaturas);
       foreach ($mestemp as $key => $value) {
           echo "<tr>";
           echo "<td>$key</td>";
           echo "<td>";
           for ($i=0; $i < $value ; $i++) { 
               echo "<img src='pixel.png' height='20px'>";
           }
           echo $value." ºC</td>";
           echo "</tr>";
       }
       ?>
   </table>
</body>
</html>