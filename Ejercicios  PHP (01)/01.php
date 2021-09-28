<h3>1.- Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10 y mostrar su suma, su resta, su división, su multiplicación, módulo y potencia (ciclo for)</h3>
<?php 
$n1 = random_int(1,10);
$n2 =  random_int(1,10);

echo "$n1 + $n2 = ", $n1 + $n2."<br>";
echo "$n1 - $n2 = ",$n1 - $n2."<br>";
echo "$n1 * $n2 = ".$n1 * $n2."<br>";
echo "$n1 / $n2 = ".$n1 / $n2."<br>";
echo "$n1 % $n2 = ".$n1 % $n2."<br>";
echo "$n1 ** $n2 = ".$n1 ** $n2."<br>";

?>