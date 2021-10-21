<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>
    <form action="registrar.php" method="post">
        Nombre <input type="text" name="name" id="name" require onblur="checkname(); checkall()"><h7 id="errornombre" style="color:red"></h7><br><br>
        E-mail <input type="email" name="email" id="email" require onblur="checkemail(); checkall()"><h7 id="erroremail" style="color:red"></h7><br><br>
        Contraseña <input type="password" name="pass" id="pass" require><h7 id="errorpass" style="color:red"></h7><br><br> 
        Repite la contraseña <input type="password" name="pass2" id="pass2" require oninput="check(); checkall()"><br><br>
        <input type="submit" value="Enviar" id="enviar" disabled>
        <br><br>

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
                    if (checkname() == false || checkemail() == false) {
                        apaga();
                    } else{
                        enciende();
                    }
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

            function apaga(){
                btn = document.getElementById("enviar");
                btn.disabled = true;
            }

            function enciende(){
                btn = document.getElementById("enviar");
                btn.disabled = false;
            }
        </script>

        <?php
            function validar_clave($clave){
                $error_clave = "";
                if(strlen($clave) < 8){
                   $error_clave .= "La clave debe tener al menos 8 caracteres ";
                }
                if (!preg_match('`[a-z]`',$clave)){
                   $error_clave .= "La clave debe tener al menos una letra minúscula ";
                }
                if (!preg_match('`[A-Z]`',$clave)){
                   $error_clave .= "La clave debe tener al menos una letra mayúscula ";
                }
                if (!preg_match('`[0-9]`',$clave)){
                   $error_clave .= "La clave debe tener al menos un caracter numérico ";
                }
                if (!preg_match('@[^\w]@', $clave)) {
                    $error_clave .= "La clave debe tener al menos un caracter especial ";
                }
                return $error_clave;
             }

             function hayform(){
                 if ( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['pass2']) ) {
                     return false;
                 }else return true;
             }

             function samepass($pass1, $pass2){
                if ($pass1 == $pass2) {
                    return true;
                }else return false;
             }

             if ($_SERVER['REQUEST_METHOD'] == "GET") {
                include_once "registrar.php";
             } else {
                include_once "registrar.php";
                $error = (hayform()) ? "" : "El formulario no se ha enviado correctamente " ;
                $error .= validar_clave($_POST['pass']);
                $error .= (samepass($_POST['pass'], $_POST['pass2'])) ? "" : "Las contraseñas no coinciden " ;
                if ($error == "") {
                    $msg = "Usuario registrado correctamente";
                    print($msg);
                }else print($error);
             }
        ?>
    </form>
</body>
</html>