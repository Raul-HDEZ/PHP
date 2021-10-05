<code>
    <?php 
    $contraseñas = ["admin" => "admin", "user01" => "user01", "user02" => "user02"];

    // Muestra el mensaje de bienvenida al usuario
    function Bienvenida() {
        echo "Bienvenido usuario: " .$_POST['user'];
        exit;
    }

    // Muestra un mensaje de error al usuario y crea un boton para volver a intentarlo
    function Error(){
        echo "usuario o contraseña invalidos <br>";
        echo "<input type='button' value='Volver a intentarlo' onClick='history.go(-1);'>";

    }
    //Comprueba que el usuario y la contraseña introducidos esten en el array de contraseñas
    foreach ($contraseñas as $key => $value) {
        if (strcmp($_POST['user'], $key) == 0 && strcmp($_POST['passwd'], $value)  == 0) {
            Bienvenida();   
        }
    }
    Error();
    ?>
</code>