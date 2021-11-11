<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contar Programas</title>
</head>
<body>
<form action="" method="get">
        Indica el directorio que quieres mostrar  
        <input type="text" name="fichero"> <br>
        <input type="submit" value="Enviar">
    </form>

    <?php 
    if (!empty($_GET['fichero'])) {
        define('directorio', $_GET['fichero']);
        if (!is_dir(directorio)) {
            die('directorio no encontrado');
        }
        $dir_cursor = @opendir(directorio)or   die("Error al abrir el directorio");
        echo "<pre>\n";
        $lista=[];
        $entrada = readdir($dir_cursor);
        $total = 0;
        while ($entrada  !== false ){
            if (strpos($entrada,'.php')!== false) {
                $tamano = count(file($entrada));
                $total += $tamano;
                $lista[$entrada]=$tamano;
            }
            $entrada = readdir($dir_cursor);
        }
        closedir($dir_cursor);
        foreach ($lista as $key => $value) {
            print($key ." - ".$value."<br>");
        }
        print("<br> Total de lineas ".$total);
    }
    ?>
</body>
</html>