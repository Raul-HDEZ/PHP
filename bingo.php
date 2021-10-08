<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carton de bingo</title>
</head>
<body>
    <?php
    
    function damearray($min, $max, $num){
    //Genera un array de 3 entre $min y $max y deja $num huecos   
        $rand = range($min, $max);
        shuffle($rand);
        for ($i=0; $i < 3 ; $i++) { 
            $arr[] = $rand[$i];
        }
        sort($arr);
        $hueco = range(0,2);
        shuffle($hueco);
        for ($i=0; $i < $num; $i++) { 
            $arr[$hueco[$i]] = null;
        }
        return $arr;
    }

    function imprimircarton ($matriz){
    // imprime la matriz del carton de bingo
        echo "<table border='1px'>";

        for ($d=0; $d <3 ; $d++) { 
            echo "<tr>";
            for ($i=0; $i < 9; $i++) { 
                echo "<td>";
                echo $matriz[$i][$d];
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";


    }
    
    function checkcolumna($matriz, $carton){
    // Checkeo que dos columnas consecutivas no tengan coincidencias en el mismo sitio
    // y si es asi creo una columna nueva con los parametros de la que sustituye
        for ($i=0; $i < 8 ; $i++) { 
            $coincidencias = 0;
            // Deteccion de coincidencias
            for ($d=0; $d < 3 ; $d++) { 
                if ($matriz[$i][$d] != null && $matriz[$i+1][$d] != null) {
                    $coincidencias++;
                }
                if ($matriz[$i][$d] == null && $matriz[$i+1][$d] == null) {
                    $coincidencias++;
                }
            }
            // Si hay 2 o mas coincidencias creo una nueva columna con la funcion damearray()
            // con los parametros que tenia la columna anterior
            if ($coincidencias >= 2) {
                switch ($i+1) {
                    case 0:
                        $matriz[$i+1] = damearray(1,9,$carton[0]);
                        break;
                    case 1:
                        $matriz[$i+1] = damearray(10,19,$carton[1]);
                        break;
                    case 2:
                        $matriz[$i+1] = damearray(20,29,$carton[2]);
                        break;
                    case 3:
                        $matriz[$i+1] = damearray(30,39,$carton[3]);
                        break;
                    case 4:
                        $matriz[$i+1] = damearray(40,49,$carton[4]);
                        break;
                    case 5:
                        $matriz[$i+1] = damearray(50,59,$carton[5]);
                        break;
                    case 6:
                        $matriz[$i+1] = damearray(60,69,$carton[6]);
                        break;
                    case 7:
                        $matriz[$i+1] = damearray(70,79,$carton[7]);
                        break;
                    case 8:
                        $matriz[$i+1] = damearray(80,90,$carton[8]);
                        break;
                }
            }
            
        }
        return $matriz;
    }

    function checkfilas($matriz,$carton){
    // Checkeo que en las filas del carton de bingo no haya mas de 4 huecos
    // si es asi genero un carton nuevo con generacarton()
        for ($i=0; $i < 3 ; $i++) { 
            $huecos = 0;
            for ($d=0; $d < 9 ; $d++) { 
                if ($matriz[$d][$i] == null) {
                   $huecos++;
                }
            }
            if ($huecos > 4) {
                generacarton($carton);
                exit;
            }
        }
        return $matriz;
    }
        //
        //              CREO UN ARRAY QUE ESPECIFICA EL NUMERO DE HUECOS
        //                      QUE TIENE QUE TENER CADA COLUMNA
        //
        //crea un array que indica el numero de huecos de cada columna
        $carton = array_fill(0, 9, 1);
        $rand = range(0,8);
        shuffle($rand);
        //elegimos 3 columnas que tendran 2 huecos
        for ($i=0; $i < 3 ; $i++) { 
            $arr[] = $rand[$i];
        }
        //ponemos a 2 las columnas elegidas
        foreach ($arr as $value) {
            $carton[$value] = 2;
        }
    
    function generacarton($carton){
        //var_dump($carton);
        // generamos los arrays con esos huecos
        $matriz[] = damearray(1,9,$carton[0]);
        $matriz[] = damearray(10,19,$carton[1]);
        $matriz[] = damearray(20,29,$carton[2]);
        $matriz[] = damearray(30,39,$carton[3]);
        $matriz[] = damearray(40,49,$carton[4]);
        $matriz[] = damearray(50,59,$carton[5]);
        $matriz[] = damearray(60,69,$carton[6]);
        $matriz[] = damearray(70,79,$carton[7]);
        $matriz[] = damearray(80,90,$carton[8]);

        // Checkeo que el carton generado es valido
        $matriz = checkcolumna($matriz, $carton);
        $matriz = checkfilas($matriz, $carton);
        //ultimorecurso($matriz);
        imprimircarton($matriz);

    }
    generacarton($carton);
    ?>
</body>
</html>