<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver mes</title>
</head>
<body>
    <form action="vermes.php" method="post">
        Fecha : <input type="month" name="fecha"><br><br>
        <input type="submit" value="Enviar"><br><br>
    </form>

    <?php 
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        include_once "vermes.php";
    }else {
        include_once "vermes.php";
        var_dump($_POST);
        print(date($_POST['fecha']));
        echo("<br>");
        print(strtotime($_POST['fecha']));
        echo("<br>");
        print(date("w",strtotime($_POST['fecha'])));
    }
        
    ?>
</body>
</html>