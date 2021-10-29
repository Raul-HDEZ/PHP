<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruteria</title>
</head>
<body>
    <?php 
    $nombre = $_SESSION['nombre'];
    ?>
    <h1>La Fruteria del siglo XXI</h1>
    <br>
    <h3>Realice su compra <?=$nombre?></h3>
    <form method="post">
        Selecciona la fruta
        <select name="fruta" required>
            <option value="naranjas">Naranjas</option>
            <option value="limones">Limones</option>
            <option value="platanos">Platanos</option>
            <option value="manzanas">Manzanas</option>
        </select>
        Cantidad
        <input type="number" min="0" name="cantidad" value="1" required>
        <input type="submit" value="Anotar" name="boton">
        <input type="submit" value="Terminar" name="boton">
    </form>
</body>
</html>