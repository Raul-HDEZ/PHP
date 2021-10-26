<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago con Tarjeta</title>
    <?php 
    
        if ($_SERVER['REQUEST_METHOD'] == "GET" && empty($_GET['nuevatarjeta'])) {
            session_start();
            SalidaA();
            
        }else{
            session_start();
            SalidaB();
        }

        function SalidaA(){
            echo<<<EEO
            <H2> NO TIENE FORMA DE PAGO ASIGNADA</H2> </br> 
            <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br> 
            <a href='pagosesion.php?nuevatarjeta=cashu'><img  src='imagenes/cashu.gif' /></a>&ensp; 
            <a href='pagosesion.php?nuevatarjeta=cirrus1'><img  src='imagenes/cirrus1.gif' /></a>&ensp; 
            <a href='pagosesion.php?nuevatarjeta=dinersclub'><img  src='imagenes/dinersclub.gif' /></a>&ensp; 
            <a href='pagosesion.php?nuevatarjeta=mastercard1'><img  src='imagenes/mastercard1.gif'/></a>&ensp; 
            <a href='pagosesion.php?nuevatarjeta=paypal'><img  src='imagenes/paypal.gif' /></a>&ensp; 
            <a href='pagosesion.php?nuevatarjeta=visa1'><img  src='imagenes/visa1.gif' /></a>&ensp; 
            <a href='pagosesion.php?nuevatarjeta=visa_electron'><img  src='imagenes/visa_electron.gif'/></a>  
            EEO;
        }

        function SalidaB(){
            $_SESSION['nuevatarjeta'] = $_GET['nuevatarjeta'];
            $pago = $_SESSION['nuevatarjeta'];

            echo<<<EEO
            <H2> SU FORMA DE PAGO ACTUAL ES</H2> </br> 
            <img src='imagenes/$pago.gif' /></a>   
            <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br> 
            <a href='pagosesion.php?nuevatarjeta=cashu'><img  src='imagenes/cashu.gif' /></a>&ensp; 
            <a href='pagosesion.php?nuevatarjeta=cirrus1'><img  src='imagenes/cirrus1.gif' /></a>&ensp; 
            <a href='pagosesion.php?nuevatarjeta=dinersclub'><img  src='imagenes/dinersclub.gif' /></a>&ensp; 
            <a href='pagosesion.php?nuevatarjeta=mastercard1'><img  src='imagenes/mastercard1.gif'/></a>&ensp; 
            <a href='pagosesion.php?nuevatarjeta=paypal'><img  src='imagenes/paypal.gif' /></a>&ensp; 
            <a href='pagosesion.php?nuevatarjeta=visa1'><img  src='imagenes/visa1.gif' /></a>&ensp; 
            <a href='pagosesion.php?nuevatarjeta=visa_electron'><img  src='imagenes/visa_electron.gif'/></a> 
            EEO;

        }
    ?>
</head>
<body> 

    </body> 
</html>