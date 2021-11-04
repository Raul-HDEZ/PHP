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
        switch ($_POST['boton']) {
            case 'Depositar':
                depositar();
                include 'formulario.php';
                break;
            case 'Retirar';
                if (check()) {
                    retirar();
                }
                include 'formulario.php';
                break;
            case 'Terminar';
                session_destroy();
                include 'entrada.html';
                break;
        }
    }

    function depositar(){
        $_SESSION['dinero'] += $_POST['cantidad'];
        print("Deposito de "  .$_POST['cantidad'] ."€ realizado correctamente");
    }

    function retirar(){
        $_SESSION['dinero'] -= $_POST['cantidad'];
        print("Retirada de "  .$_POST['cantidad'] ."€ realizada correctamente");
    }

    function check(){
        if (empty($_POST['cantidad'])) {
            print('No has indicado la cantidad con la que operar');
            return false;
        }else {
            if ($_POST['cantidad'] > $_SESSION['dinero']) {
                print('No tienes suficiente dinero en la cuenta');
                return false;
            }else {
                return true;
            }
        }
    }
    ?>
</body>
</html>