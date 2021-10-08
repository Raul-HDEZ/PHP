<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php 
    if (isset($_POST['num1'])) {
        procesar();
    }else formulario();

    // crea el formulario
    function formulario (){
        echo <<<EOS
        <form action="02.php" method="post">
        NUMERO 1 : <input type="number" name="num1"> <br>
        NUMERO 2 : <input type="number" name="num2"> <br>
        <input type="submit" value="+" name="operacion">
        <input type="submit" value="-" name="operacion">
        <input type="submit" value="*" name="operacion">
        <input type="submit" value="/" name="operacion">
        <br>
        Como quieres que se indique el resultado?
        <br>
        Decimal : <input type="radio" name="resultado" value="decimal" checked> <br>
        Binario : <input type="radio" name="resultado" value="binario" ><br>
        Hexadecimal : <input type="radio" name="resultado" value="hexadecimal" >
        </form>
        EOS;
    }

    //procesa el formulario
    function procesar(){
        function Error($str){
            echo "<p style='color:red';>$str</p>";
        }
        function calcular($arr){
            switch ($arr['operacion']) {
                case "+":
                    return $arr['num1'] + $arr['num2'];        
                case "-":
                    return $arr['num1'] - $arr['num2'];
                case "*":
                    return $arr['num1'] * $arr['num2'];        
                case "/":
                    return $arr['num1'] / $arr['num2'];
            }
        }

        function convertir($arr){
            switch ($arr['resultado']) {
                case "decimal":
                    return calcular($arr);
                case "binario":
                    return decbin(calcular($arr));
                case "hexadecimal":
                    return dechex(calcular($arr));
                default:
                    return calcular($arr);
            }
        }

        function checkear($arr){
            if (empty($arr['num1']) || empty($arr['num2'])) {
                Error("Falta un operador");
            }
            if ($arr['num2'] == 0 && $arr['operacion'] == "/") {
                Error("No se puede dividir entre 0");
            }
        }
        checkear($_POST);
        formulario();
        echo "El resultado es : ". convertir($_POST). "<br>";
        echo "<input type='button' value='Volver a intentarlo' onClick='history.go(-1);'>";
        
    }
    ?>
</body>
</html>