<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver mes</title>
</head>
<body>
    <form action="vermes.php" method="post">
        Fecha : <input type="month" name="fecha"><br><br>
        <input type="submit" value="Enviar"><br><br>
    </form>

    <?php

    function arraytabla(){
        $fecha = ($_SERVER['REQUEST_METHOD'] == "GET") ? getdate() : $_POST['fecha'] ;
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $fecha = date("Y-m");
        }else {
            $fecha=$_POST['fecha'];
        }
        $mes = date("F",strtotime($fecha));
        $año = date('Y', strtotime( $fecha ) );
        $primerdia = date("w",strtotime($fecha));
        $ndias = date( 't', strtotime( $fecha ) );
        
        $arr = [];
        for ($i=0; $i < $primerdia; $i++) { 
            $arr[] = "";
        }
        $arr[$primerdia] = 1;
        for ($i=2; $i <= $ndias ; $i++) { 
            $arr[] = $i;
        }
        $celda = $primerdia+$ndias;
        printtable($arr,$mes,$año,$celda);
        
    }

    function printtable($arr,$mes,$año,$celda){
        switch ($mes) {
            case 'January': $mes = "Enero"; break;
            case 'February': $mes = "Febrero"; break;
            case 'March': $mes = "Marzo"; break;
            case 'April': $mes = "Abril"; break;
            case 'May': $mes = "Mayo"; break;
            case 'June': $mes = "Junio"; break;
            case 'July': $mes = "Julio"; break;
            case 'August': $mes = "Agosto"; break;
            case 'September': $mes = "Septiembre"; break;
            case 'October': $mes = "Octubre"; break;
            case 'November': $mes = "Noviembre"; break;
            case 'December': $mes = "Diciembre"; break;
        };
        echo("<table border='1'>");
        echo("<tr class='azul'><th colspan='5'>MES: $mes </th> <th colspan='2'>$año</th></tr>");
        echo("<tr><td>L</td><td>M</td><td>X</td><td>J</td><td>V</td><td>S</td><td>D</td></tr>");
        $sum = 0;
        for ($i=0; $i <= 5; $i++) {
            echo("<tr>");
            for ($d=1; $d <= 7 ; $d++) { 
                if ($d+$sum>=$celda) {
                    break;
                }
                if ($d==6 || $d==7) {
                    echo("<td class='rojo'>");
                } else echo("<td>");
                echo($arr[$d+$sum]."</td>");
            }
            echo("</tr>");
            $sum+=7;
        }
        echo("</table>");
    }

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        include_once "vermes.php";
        arraytabla();
    }else {
        include_once "vermes.php";
        echo("<br>");
        arraytabla();
    }   
    ?>
    <style>
        .rojo {
            color: red;
        }
        table{
            border-collapse: collapse;
        }
        .azul{
            color: blue;
        }
    </style>
</body>
</html>