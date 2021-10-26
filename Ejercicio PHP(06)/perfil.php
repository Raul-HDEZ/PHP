<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    

    <?php
        
        function aaaformRelleno(){
            echo<<<ROOBEN
            <form method="POST">
            ROOBEN;
            print("Edad <input type='number' name='edad' value='".$_COOKIE['edad']."'><br><br>");
            echo<<<EAS
            Genero <br>
            Mujer 
            EAS;
            if ($_COOKIE['genero']=="m") {
                echo("<input type='radio' name='genero' value='f'> Hombre <input type='radio' name='genero' value='m' checked><br>");
            }else echo("<input type='radio' name='genero' value='f' checked> Hombre <input type='radio' name='genero' value='m' ><br>");
            echo<<<EEP
            Deportes <br>
            <select name="deportes[]" multiple>
            EEP;
            echo("panda");
           
            $dep = ["futbol", "tenis", "ciclismo", "otro"];
            $arr = implode(",",$_COOKIE['deportes']);
            echo("asd");
            var_dump($arr);
            echo("asd");
            foreach ($dep as $value) {
                if (is_array($value,$arr)) {
                    echo("<option value='$value' selected>$value</option>");
                } else echo("<option value='$value'>$value</option>");
            }
            echo<<<POEEE
            <br><br><br>
            <input type="submit" value="Almacenar valores">
            <a href=""><button>Eliminar valores</button></a>
            </select>
            </form>
            POEEE;
        }

        function formVacio(){
            echo<<<JOOLIA
            <form method="POST">
            Edad <input type="number" name="edad"><br><br>
            Genero <br>
            Mujer <input type="radio" name="genero" value="f"> Hombre <input type="radio" name="genero" value="m"><br>
            Deportes <br>
            <select name="deportes[]" multiple>
            <option value="futbol">futbol</option>
            <option value="tenis">tenis</option>
            <option value="ciclismo">ciclismo</option>
            <option value="otro">otro</option>
            <br><br><br>
            <input type="submit" value="Almacenar valores">
            <a href=""><button>Eliminar valores</button></a>
            </select>
            </form>
            JOOLIA;
        }


        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            setcookie("edad", $_POST['edad']);
            setcookie("genero", $_POST['genero']);
            $deportes = implode(",",$_POST['deportes']);
            setcookie("deportes", $deportes);
        }

        if(isset($_COOKIE['edad'])){
            //formRelleno();
        } else {
            formVacio();
        }

        var_dump($_COOKIE);
    ?>
</body>
</html>