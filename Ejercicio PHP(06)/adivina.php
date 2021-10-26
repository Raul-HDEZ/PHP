<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina</title>
</head>
<body>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == "GET" && !isset($_SESSION)) {
        session_start();
        $_SESSION['adivina'] = random_int(1,20);
        $_SESSION['intentos'] = 5;
    } else {
        session_start();
    }
    ?>
    <form method="POST">
        <input type="number" name="num"><br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if ($_SESSION['intentos']==0) {
            session_unset();
            header("Location: ./adivina.php");;
        }

        if ($_POST['num'] == $_SESSION['adivina']) {
            print("Acertaste <br>");
            session_unset();
            print("<a href="."><button>Volver</button></a>");
        } else {
            print("Fallastes <br>");
            $_SESSION['intentos'] -= 1;
            if ($_SESSION['intentos']==0) {
                print("No te quedan intentos");
                session_unset();
                print("<br><a href="."><button>Volver</button></a>");
            } else print("Intentos restantes:". $_SESSION['intentos']);
        }
    }
    ?>
</body>
</html>