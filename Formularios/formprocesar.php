<code>
    <?php 
    var_dump($_POST);
    echo "<hr> <hr> <hr>";
    echo "<h3>";
    echo $_POST['nombre'];
    echo " tienes ";
    echo $_POST['valor'];
    echo " años ";
    echo "</h3>";

    if (isset($_POST['casilla'])) {
        echo "has marcado casilla";
    }
    ?>
</code>