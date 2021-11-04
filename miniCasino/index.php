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
        include 'formulario.php';    
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($_POST['boton']== "Apostar") {
            apuesta();
            include 'formulario.php'; 
        }else {
            session_destroy();
            include 'entrada.html';
        }
    }

    function apuesta(){
        if (empty($_POST['apuesta']) || empty($_POST['tipo'])) {
            print('No has seleccionado nada');
        }else {
            if ($_POST['apuesta'] > $_SESSION['dinero']) {
                print('No tienes suficiente dinero');
            }else {
                $apuesta = $_POST['apuesta'];
                $tipo = $_POST['tipo'];
                $aleatorio = (rand(0,31)%2 == 0) ? "par" : "impar" ;
                print("Elegistes $tipo <br>");
                print("Salio $aleatorio <br>");
                if ($aleatorio == $tipo) {
                    $_SESSION['dinero'] += $apuesta;
                    print("ganas $apuesta");
                }else {
                    $_SESSION['dinero'] -= $apuesta;
                    print("pierdes $apuesta");
                }
            }
        }
    }
    ?>
</body>
</html>