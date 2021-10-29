<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruteria</title>
</head>
<body>
    <h2>Este es un pedido</h2>
    <table border="1px" style="border-collapse: collapse">
    <?php 
    foreach ($_SESSION['pedido'] as $key => $value) {
        print("<tr>");
        print("<td>$key  $value</td>");
        print("</tr>");
    }?>
    </table>
    <br>
    <h3>Muchas gracias por su pedido</h3>
    <input type="button" value=" NUEVO CLIENTE " 
       onclick="location.href='<?=$_SERVER['PHP_SELF'];?>'">
</body>
</html>