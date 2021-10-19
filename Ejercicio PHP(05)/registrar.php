<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrar</title>
</head>
<body>
    <form action="registrar.php" method="post">
        Nombre <input type="text" name="name" id="name" onblur="checkname(); checkall()"><h7 id="errornombre" style="color:red"></h7><br><br>
        E-mail <input type="email" name="email" id="email" onblur="checkemail(); checkall()"><h7 id="erroremail" style="color:red"></h7><br><br>
        Contraseña <input type="password" name="pass" id="pass"><h7 id="errorpass" style="color:red"></h7><br><br> 
        Repite la contraseña <input type="password" name="pass-repetida" id="pass2" oninput="check(); checkall()"><br><br>
        <input type="submit" value="Enviar" id="enviar" disabled>

        <script>
            function check(){
                var error = document.getElementById("errorpass")
                var pass = document.getElementById("pass").value;
                var pass2 = document.getElementById("pass2").value;
                if (pass != pass2) {
                    error.innerHTML = " Las contraseñas no coinciden";
                    apaga();
                    return false;
                } else {
                    error.innerHTML = "";
                    enciende();
                    return true;
                }
            }

            function checkname(){
                var error = document.getElementById("errornombre");
                var name = document.getElementById("name").value;
                name = name.toUpperCase();
                if (name!="") {
                    error.innerHTML = "";
                    return true;
                } else {
                    error.innerHTML = " No puede estar vacio";
                    apaga();
                    return false;
                }
            }

            function checkemail(){
                var error = document.getElementById("erroremail");
                var email = document.getElementById("email").value;
                if (email!="") {
                    error.innerHTML = "";
                    return true;
                } else {
                    error.innerHTML = " No puede estar vacio";
                    apaga();
                    return false;
                }
            }

            function checkall(){
                if (check() == true || checkname() == true || checkemail()== true ) {
                    enciende();
                } else {
                }
            }

            function apaga(){
                btn = document.getElementById("enviar");
                btn.disabled = false;
            }

            function enciende(){
                btn = document.getElementById("enviar");
                btn.disabled = true;
            }
        </script>

        <?php
            function validar_clave($clave){
                if(strlen($clave) < 6){
                   $error_clave = "La clave debe tener al menos 6 caracteres";
                   return $error_clave;
                }
                if(strlen($clave) > 8){
                   $error_clave = "La clave no puede tener más de 8 caracteres";
                   return $error_clave;
                }
                if (!preg_match('`[a-z]`',$clave)){
                   $error_clave = "La clave debe tener al menos una letra minúscula";
                   return $error_clave;
                }
                if (!preg_match('`[A-Z]`',$clave)){
                   $error_clave = "La clave debe tener al menos una letra mayúscula";
                   return $error_clave;
                }
                if (!preg_match('`[0-9]`',$clave)){
                   $error_clave = "La clave debe tener al menos un caracter numérico";
                   return $error_clave;
                }
                $error_clave = "";
                return true;
             } 
        ?>
    </form>
</body>
</html>