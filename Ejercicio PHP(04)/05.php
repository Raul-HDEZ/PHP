<code>
    <?php

    function recoge($var, $m = "")
    {
        if (!isset($_REQUEST[$var])) {
            $tmp = (is_array($m)) ? [] : "";
        } elseif (!is_array($_REQUEST[$var])) {
            $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
        } else {
            $tmp = $_REQUEST[$var];
            array_walk_recursive($tmp, function (&$valor) {
                $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
            });
        }
        return $tmp;
    }

    function damehobies($arr){
        switch (count($arr['hobbies'])) {
            case 0:
                echo "no tiene aficiones de nuestra lista";
                exit;
            case 1:
                echo "su unica aficion es " . $arr['hobbies'][0];
                exit;
        }
            echo "sus aficiones son ";
        foreach ($arr['hobbies'] as $value) {
            echo $value . ", ";
        }
    }

    function damebienvenida($arr){
        if ($arr['sexo'] == "hombre") {
            if ($arr['edad'] == "+") {
                return "Bienvenido D ";
            } else return "Bienvenido ";
        }elseif ($arr['edad'] == "+") {
            return "Bienvenido Dña ";
        }else return "Bienvenida ";
    }
    var_dump($_POST);
    echo "<br>";
    echo damebienvenida($_POST) . recoge('nombre') . " " . recoge('apellidos') ." ";
    damehobies($_POST);

    ?>

</code>