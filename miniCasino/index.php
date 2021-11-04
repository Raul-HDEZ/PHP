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
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == "GET" && empty($_GET['dinero'])) {
        include 'entrada.html';
    }
    if (($_SERVER['REQUEST_METHOD'] == "GET" && !empty($_GET['dinero']))) {
        $_SESSION['dinero'] = $_GET['dinero'];
        var_dump($_SESSION);
        //include 'formulario.php';    
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($_POST['boton']== "Apostar") {
            apuesta();
            include 'formulario.php'; 
        }else {
            session_destroy();
            include 'index.php';
        }
    }

    function apuesta(){
        $apuesta = $_POST['apuesta'];
        $tipo = $_POST['tipo'];
        $aleatorio = (rand(0,31)%2 == 0) ? "par" : "impar" ;
        if ($aleatorio == $tipo) {
            $_SESSION['dinero'] += $apuesta;
        }else {
            $_SESSION['dinero'] += $apuesta;
        }
    }
    ?>
</body>
</html>