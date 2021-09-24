<h3>6.- Generar la  tabla de multiplicar de un número elegido al azar entre 1 y 10 con la siguiente apariencia </h3>
<?php 
$n = random_int(1,10);
?>
<h1>Tabla de multiplicar</h1>
<table border=1px>
    <tr>
        <th> Tabla del <?php echo "$n"; ?></th>
    </tr>
    <?php 
        for ($i=0; $i <= 10; $i++) { 
            $res = $n * $i;
            echo <<< EOS
            <tr>
            <td>$n * $i =</td>
            <td>$res</td>
            </tr>
            EOS;
        }
    ?>

</table>

<style>
        table {
            border-collapse: collapse;
            text-align: left;
        }
        h1 {
            background-color: blue;
            color: white;
        }
</style>