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

        // FALTA encluir cada formulario e un html distinto y llamarlos con el include
        // FALTA añadir el boton de terminar sesion con
        /*
        <input type="button" value=" NUEVO CLIENTE " 
       onclick="location.href='<?=$_SERVER['PHP_SELF'];?>'">

       en el html
        */
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == "GET" && empty($_GET['nombre'])) {
            include 'entrada.html';
        }
        if (($_SERVER['REQUEST_METHOD'] == "GET" && !empty($_GET['nombre']))) {
            $_SESSION['nombre'] = $_GET['nombre'];
            formPedir();
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_POST['boton']== "Anotar") {
                $_SESSION['pedido'][$_POST['fruta']] = $_POST['cantidad'] ;
                var_dump($_SESSION);
                formPedir();
            }else {
                var_dump($_SESSION);
                suPedido();
                formPedir();
            }

        }

        function formPedir(){
            $nombre = $_SESSION['nombre'];
            echo<<<PERA
            <h1>La Fruteria del siglo XXI</h1>
            <br>
            <h3>Realice su compra $nombre</h3>
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
            PERA;
        }

        function suPedido(){
            echo<<<EEO
            <h2>Este es un pedido</h2>
            <table border="1px" style="border-collapse: collapse">
            EEO;
            foreach ($_SESSION['pedido'] as $key => $value) {
                print("<tr>");
                print("<td>$key  $value</td>");
                print("</tr>");
            }
            echo("</table>");
            echo("<br> <h3>Muchas gracias por su pedido</h3>");
        }
    ?>
</body>
</html>