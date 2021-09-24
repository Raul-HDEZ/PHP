<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php 
    @require_once("funcionesvar.php");
    $valor1 = random_int(1,10);
    $valor2 = random_int(1,10);
    ?>
</head>
<body>
    <h3>2. Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10, mostrar su suma, su resta, su división, su multiplicación, su módulo y su potencia (ciclo for), Crea un archivo llamado funcionesvar.php donde estén definidas las cinco operaciones: suma, resta, división, producto, módulo y potencia. Incluir ese fichero dentro de fichero principal (require_once) y llamar  a las funciones para obtener el resultado.</h3>
    <p><?=$valor1?> + <?=$valor2?> = <?=Suma($valor1,$valor2)?></p>
    <p><?=$valor1?> - <?=$valor2?> = <?=Resta($valor1,$valor2)?></p>
    <p><?=$valor1?> / <?=$valor2?> = <?=Division($valor1,$valor2)?></p>
    <p><?=$valor1?> * <?=$valor2?> = <?=Multiplicacion($valor1,$valor2)?></p>
    <p><?=$valor1?> % <?=$valor2?> = <?=Modulo($valor1,$valor2)?></p>
    <p><?=$valor1?> ** <?=$valor2?> = <?=Potencia($valor1,$valor2)?></p>
</body>
</html>