<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIF</title>
</head>
<body>
    <?php 

        function dameletra($DNI){
            $letra = ["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
            $res = $DNI%23;
            return $letra[$res];
        }

        $form=<<<EOS
        <form action="nif.php" method="post">
        <input type="number" name="DNI">
        <input type="submit" value="Enviar">
        <br><br>
        </form>
        EOS;
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            print($form);
        }else {
            print($form);
            $msg = ( is_numeric($_POST['DNI']) ) ? "La letra de tu DNI es: ".dameletra($_POST['DNI']) : "No has introducido un DNI valido" ;
            print($msg);
        }
    ?>
</body>
</html>