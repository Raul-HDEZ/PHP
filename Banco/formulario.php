<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Ruben</title>
</head>
<body>
    <?php
    $dinero = $_SESSION['dinero'];
    ?>
    <form action="index.php" method="POST">
    Dispone de <?=$dinero?> en su cuenta
    Cantidad con la que operar
    <input type="number" name="cantidad" id="cantidad"><br>
    <input type="submit" value="Depositar" name="boton">
    <input type="submit" value="Retirar" name="boton">
    <input type="submit" value="Terminar" name="boton">
    </form>
</body>
</html>