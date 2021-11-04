<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casino Royale</title>
</head>
<body>
    <?php
    var_dump($_SESSION);
    $dinero = $_SESSION['dinero'];
    ?>
    <form action="index.php" method="POST">
    Dispone de <?=$dinero?> para jugar
    Cantidad a apostar
    <input type="number" name="apuesta" id="apuesta"><br>
    Tipo de apuesta : <input type="radio" name="tipo" value="par"> Par <input type="radio" name="tipo" value="impar"> Impar <br>
    <input type="submit" value="Apostar" name="boton">
    <input type="submit" value="Terminar" name="boton">
    </form>
</body>
</html>