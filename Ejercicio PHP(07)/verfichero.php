<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Fichero</title>
</head>
<body>
    <form action="" method="get">
        Indica el fichero que quieres mostrar  
        <input type="text" name="fichero"> <br>
        <input type="submit" value="Enviar">
    </form>

    <?php 
    if (!empty($_GET['fichero'])) {
        $archivo = file($_GET['fichero']);
        if (!$archivo) {
            die('archivo no encontrado');
        }
        $lineas = 0;
        $caracteres = 0;
        foreach ($archivo as $value) {
            $lineas++;
            $caracteres += strlen($value);
            print($value);
            print("<br>");
        }
        print("Lineas del archivo ".$lineas."<br>");
        print("Caracteres del archivo ".$caracteres);
    }
    ?>
</body>
</html>