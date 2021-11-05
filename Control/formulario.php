<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palabra Oculta</title>
</head>
<body>

    <?php
    $palabra = generaPalabraconHuecos($_SESSION['letrasusuario'], $_SESSION['palabrasecreta']);
    ?>
    <form action="index.php" method="GET">
        Palabra: <?=$palabra?> <br>
        Has cometido <?=$_SESSION['fallos'] ?> errores <br>
        introduzca una letra <input type="text" name="letra"  >
    </form>
</body>
</html>