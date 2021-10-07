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
    //Genera un array de 3 entre $min y $max y deja $num huecos
    function damearray($min, $max, $num){
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
        //for ($i=0; $i <$num ; $i++) { 
        //    unset($arr[array_rand($arr,1)]);
        //}
        return $arr;
    }

    function imprimircarton ($matriz){
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
    //checkeo que dos columnas consecutivas no tengas los huecos en el mismo sitio
    // por alguna razon no funciona correctamente
    function checkma($matriz){
        for ($i=0; $i < 8 ; $i++) { 
            $coincidencias = 0;
            for ($d=0; $d < 3 ; $d++) { 
                if ($matriz[$i][$d] != null && $matriz[$i+1][$d] != null) {
                    $coincidencias++;
                }
                if ($matriz[$i][$d] == null && $matriz[$i+1][$d] == null) {
                    $coincidencias++;
                }
            }
            if ($coincidencias >= 2) {
                $carton = generahuecos();
                switch ($i) {
                    case 0:
                        $matriz[$i] = damearray(1,9,$carton[0]);
                        break;
                    case 1:
                        $matriz[$i] = damearray(10,19,$carton[1]);
                        break;
                    case 2:
                        $matriz[$i] = damearray(20,29,$carton[2]);
                        break;
                    case 3:
                        $matriz[$i] = damearray(30,39,$carton[3]);
                        break;
                    case 4:
                        $matriz[$i] = damearray(40,49,$carton[4]);
                        break;
                    case 5:
                        $matriz[$i] = damearray(50,59,$carton[5]);
                        break;
                    case 6:
                        $matriz[$i] = damearray(60,69,$carton[6]);
                        break;
                    case 7:
                        $matriz[$i] = damearray(70,79,$carton[7]);
                        break;
                    case 8:
                        $matriz[$i] = damearray(80,90,$carton[8]);
                        break;
                }
            }
            
        }
        return $matriz;
    }

    function ultimorecurso($matriz){
        for ($i=0; $i < 8 ; $i++) { 
            $coincidencias = 0;
            for ($d=0; $d < 3 ; $d++) { 
                if ($matriz[$i][$d] != null && $matriz[$i+1][$d] != null) {
                    $coincidencias++;
                }
                if ($matriz[$i][$d] == null && $matriz[$i+1][$d] == null) {
                    $coincidencias++;
                }
            }
            if ($coincidencias >= 2) {
                generacarton();
                exit;
            }
            
        }

        //for ($i=0; $i < 3 ; $i++) { 
        //    $huecos = 0;
        //    for ($d=0; $d < 9 ; $d++) { 
        //        if ($matriz[$d][$i]) {
        //            $huecos++;
        //        }
        //    }
        //    if ($huecos >4) {
        //        generacarton();
        //        exit;
        //    }
        //}
        return $matriz;
    }
    
    function generahuecos(){
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
        return $carton;
    }
    function generacarton(){
        $carton = generahuecos();
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

        //$matriz = checkma($matriz);
        ultimorecurso($matriz);
        imprimircarton($matriz);

    }
    generacarton();
    ?>
</body>
</html>