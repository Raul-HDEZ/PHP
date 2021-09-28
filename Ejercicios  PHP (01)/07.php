<h3>7. Elegir tres valores entre 100 y 500 y pintar tres barras de color rojo, verde y azul del tamaño indicado.
Pista: Utilizar  3 tablas con una fila del tamaño generado.</h3>
<?php 
    $n1 = random_int(100,500);
    $n2 = random_int(100,500);
    $n3 = random_int(100,500);
    header("Refresh: 5; URL='http://localhost/alumnoa/Ejercicios%20%20PHP%20%20(01)/07.php'");
?>
<table>
    <td class="rojo"><?php echo "Rojo($n1)"?></td>
</table>
<table>
    <td class="verde"><?php echo "Verde($n2)"?></td>
</table>
<table>
    <td class="azul"><?php echo "Azul($n3)"?></td>
</table>
<style>
    .rojo {
        background-color: red;
        width:<?php echo "$n1"?>
    }
    .verde {
        background-color: green;
        width:<?php echo "$n2"?>;
    }
    .azul {
        background-color: blue;
        width:<?php echo "$n3"?>;
    }
    table {
        height: 40px;
        border: 0px;
    }
</style>