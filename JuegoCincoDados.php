<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de dados</title>
</head>
<body>
    <? // 2 arrays 1 por cada jugador
        // funcion para tirar los dados
        // funcion para pintar los dados
        //funcion para sumar los dados

        function tiraDados(){
            $arr = [5];
            for ($i=0; $i < 5; $i++) { 
                $arr[$i] = random_int(1,6);
            }
            return $arr;
        }

        function printDado($dado){
            switch ($dado) {
                case '1': return "&#9856";
                case '2': return "&#9857";
                case '3': return "&#9858";
                case '4': return "&#9859";
                case '5': return "&#9860";
                case '6': return "&#9861";
            }
        }

        function printTiradas($arr){
            $str = "";
            foreach ($arr as $dado) {
                $str = $str + printDado($dado);
            }
            return $str;
        }

        function sumadados($arr){
            $suma = 0;
            foreach ($arr as $num) {
                $suma += $num;
            }
            $suma -= min($arr);
            $suma -= max($arr);
            return $suma;
        }

        function getGanador($j1, $j2){
            $res = ($j1>$j2) ? 'Jugador 1' : 'Jugador 2';
            return $res;
        }
    
    ?>
</body>
</html>