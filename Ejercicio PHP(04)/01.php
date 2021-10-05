<code>
    <?php 
    $contraseñas = ["admin" => "admin", "user01" => "user01", "user02" => "user02"];

    foreach ($contraseñas as $key => $value) {
        if ($_POST['user'] == $key) {
            # code...
        }
    }
    
    ?>
</code>