<h3>5.- Realizar un segunda versión del primer ejercicio donde la página de resultado tiene que mostrar una tabla con el siguiente  formato utilizando estilo.</h3>
<?php 
$n1 = random_int(1,10);
$n2 =  random_int(1,10);
echo "<br>";
echo "Numero 1: $n1 <br>";
echo "Numero 2: $n2 <br>  <br>";
?>
    <table border=1px>
        <tr>
          <th>Operacion</th>
          <th>Resultado</th>
        </tr>
        <tr>
          <td><?php echo "$n1 + $n2"; ?></td>
          <td><?php echo $n1 + $n2?></td>
        </tr>
        <tr>
          <td><?php echo "$n1 - $n2"; ?></td>
          <td><?php echo $n1 - $n2?></td>
        </tr>
        <tr>
          <td><?php echo "$n1 * $n2"; ?></td>
          <td><?php echo $n1 * $n2?></td>
        </tr>
        <tr>
          <td><?php echo "$n1 / $n2"; ?></td>
          <td><?php echo $n1 / $n2?></td>
        </tr>
        <tr>
          <td><?php echo "$n1 % $n2"; ?></td>
          <td><?php echo $n1 % $n2?></td>
        </tr>
        <tr>
          <td><?php echo "$n1 ** $n2"; ?></td>
          <td><?php echo $n1 ** $n2?></td>
        </tr>
      </table>
    <style>
        table {
            border-collapse: collapse;
            text-align: left;
        }
        th{
            background-color: darkgrey;
            color: blue;
        }
    </style>