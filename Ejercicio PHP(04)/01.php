<code>
    <?php 
    $contraseñas = ["admin" => "admin", "user01" => "user01", "user02" => "user02"];

    function Login($log){
        foreach ($contraseñas as $key => $value) {
            if (strcmp($log['user'], $key) == 0 && strcmp($log['passwd'], $value)  == 0) {
                return true;   
            }
        }
        return false;
    }
    
    function Bienvenida() {
        echo "Bienvenido usuario: " .$_POST['user'];
        exit;
    }

    function Error(){
        echo "usuario o contraseña invalidos <br>";
        echo "<input type='button' value='Volver a intentarlo' onClick='history.go(-1);'>";

    }

    foreach ($contraseñas as $key => $value) {
        if (strcmp($_POST['user'], $key) == 0 && strcmp($_POST['passwd'], $value)  == 0) {
            Bienvenida();   
        }
    }
    Error();
    ?>
</code>