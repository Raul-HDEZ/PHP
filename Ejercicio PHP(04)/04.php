<code>
    <?php 
    if (empty($_POST['publi'])) {
        $_POST['publi']= "No";
    }
    $idiomas = $_POST['idioma'];
    echo <<<EOS
    Nombre : $_POST[nombre] <br>
    Clave : $_POST[contraseña] <br>
    Semaforo $_POST[semaforo] <br>
    Publicidad : $_POST[publi] publicidad <br>
    Idiomas : 
    EOS;
    foreach ($idiomas as $value) {
       echo $value . ", ";
    }
    echo "<br>";
    
    echo <<< EEP
    Año de fin de estudios : $_POST[ano] <br>
    Lista de los codigos postales de provincias :
    EEP;
    $postal = $_POST['ciudades'];
    foreach ($postal as $value) {
        echo $value . ", ";
    }
    echo<<<EEO
    <br>
    Comentarios : $_POST[textarea]
    EEO;
    ?>
</code>