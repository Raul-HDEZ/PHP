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

            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                include_once "./Formulario.html";
            } else {
                $mensaje = '';
            if (count($_POST) == 0 ){
                   $mensaje= "  Error: se supera el tamaño máximo de un petición POST ";   
                }
            }

            function checkSize($array){
                $suma = 0;
                for ($i=0; $i < count($array['archivos']['size']); $i++) { 
                    $suma += $array['archivos']['size'][$i];
                }
                if ($suma > 300000) {
                    return false;
                }
                return true;
            }

            function checkImage($tipo){
                if ($tipo == "image/jpeg" || $tipo == "image/png") {
                    return true;               
                }
                return false;
            }

            function checkEnvio($array){
                if ($array['archivos']['size'][0] != 0 ) {
                    return true;                  
                }
                return false;
            }
            
            function checkFile($nombre){
                $path = "/home/alumnoa/imgusers/".$nombre;
                if (file_exists($path)) {
                    return true;                  
                }
                return false;
            }

            function checkAll($array, $errorarray){
                $error = "";
                $añadir = (checkSize($array)) ? "" : "Los archivos superan el limete de tamaño <br>";
                $error = $error . $añadir;
                $añadir = "";
                if (checkEnvio($array)) {
                    for ($i=0; $i < count($array['archivos']['name']); $i++) { 
                        $añadir = (checkImage($array['archivos']['type'][$i])) ? "" : "El archivo ". $array['archivos']['name'][$i] ." no es una imagen <br>" ;
                        $error = $error . $añadir;
                        $añadir = "";
                        $añadir = (checkFile($array['archivos']['name'][$i])) ? "El archivo ". $array['archivos']['name'][$i] ." ya existe en el servidor <br>" : "" ;
                        $error = $error . $añadir;
                        $añadir = "";
                        $añadir = ($array['archivos']['error'][$i]>0) ? $errorarray[$array['archivos']['error'][$i]]."<br>" : "" ;
                        $error = $error . $añadir;
                        $añadir = "";
                    }
                } else {
                    $error = "No se ha enviado nada";
                }
                return $error;
            }

            function checkSave($array,$elemento){
                $msg = "";
                if (checkImage($array['archivos']['type'][$elemento]) == true && checkFile($array['archivos']['name'][$elemento]) == false  && checkSize($array)) {
                    $msg = "El archivo ". $array['archivos']['name'][$elemento] . " se ha subido al servidor <br>";
                }
                return $msg;
            }
            function checkSaveboolean($array,$elemento){
                if (checkImage($array['archivos']['type'][$elemento]) == true && checkFile($array['archivos']['name'][$elemento]) == false && checkSize($array)) {
                    return true;
                }
                return false;
            }

            function saveFile($array,$elemento){
                move_uploaded_file($array['archivos']['tmp_name'][$elemento], "/home/alumnoa/imgusers/". $array['archivos']['name'][$elemento] );
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST") {        
                print(checkAll($_FILES, $codigosErrorSubida));       
                for ($i=0; $i < count($_FILES['archivos']['name']); $i++) { 
                    print(checkSave($_FILES,$i));
                    if (checkSaveboolean($_FILES,$i)) {
                        saveFile($_FILES,$i);
                    }
                }
            }
    ?>
</body>
</html>