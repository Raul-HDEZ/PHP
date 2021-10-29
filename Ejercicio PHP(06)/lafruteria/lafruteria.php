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
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == "GET" && empty($_GET['nombre'])) {
            include 'entrada.html';
        }
        if (($_SERVER['REQUEST_METHOD'] == "GET" && !empty($_GET['nombre']))) {
            $_SESSION['nombre'] = $_GET['nombre'];
            include 'formulario.php';
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_POST['boton']== "Anotar") {
                $_SESSION['pedido'][$_POST['fruta']] = $_POST['cantidad'] ;
                include 'formulario.php';
            }else {
                include 'terminado.php';
            }
        }
    ?>
</body>
</html>