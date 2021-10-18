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
            
        }

        $form=<<<EOS
        <form action="nif.php" method="post">
        <input type="text" name="DNI">
        <input type="submit" value="Enviar">
        </form>
        EOS;
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            print($form);
        }else {
            print("hola");
        }
    ?>
</body>
</html>