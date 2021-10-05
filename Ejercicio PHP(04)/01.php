<code>
    <?php 
    $contraseñas = ["admin" => "admin", "user01" => "user01", "user02" => "user02"];
    // Meterlo en una funcion y llamarla al cargar
    foreach ($contraseñas as $key => $value) {
        if ($_POST['user'] == $key) {
            if ($_POST['passwd' == $value]) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }
    
    ?>
</code>