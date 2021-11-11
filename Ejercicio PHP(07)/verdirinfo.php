<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Directorio</title>
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
        while ($entrada  !== false ){
            $entrada = readdir($dir_cursor);
            $tamano = filesize($entrada) ;
            $clave = $entrada ." ".mime_content_type($entrada);
            $lista[$clave]=$tamano;
        }
        closedir($dir_cursor);
        asort($lista);
        foreach ($lista as $key => $value) {
            print($key ." - ".$value."<br>");
        }
    }
    ?>
</body>
</html>