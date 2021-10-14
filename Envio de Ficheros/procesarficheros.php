<!DOCTYPE html>
<html lang="eS">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de ficheros</title>
</head>
<body>
    <?php
        // Procesar los archivos subidos en /imgusers
        $codigosErrorSubida= [
                0 => 'Subida correcta',
                1 => 'El tamaño del archivo excede el admitido por el servidor',  // directiva upload_max_filesize en php.ini    
                2 => 'El tamaño del archivo excede el admitido por el cliente',  // directiva MAX_FILE_SIZE en el formulario HTML    
                3 => 'El archivo no se pudo subir completamente',    
                4 => 'No se seleccionó ningún archivo para ser subido',    
                6 => 'No existe un directorio temporal donde subir el archivo',    
                7 => 'No se pudo guardar el archivo en disco',  // permisos    
                8 => 'Una extensión PHP evito la subida del archivo'  // extensión PHP
            ];

            $mensaje = '';// No se recibe nada, error al enviar el POST, se supera post_max_size
            if (count($_POST) == 0 ){
                   $mensaje= "  Error: se supera el tamaño máximo de un petición POST ";   
                }
            if (isset($_FILES['archivo1']['name']) || isset($_FILES['archivo2']['name'])) {
                # code...
            }
        // "image/jpg"  "image/png" para la estension
    ?>
</body>
</html>