<h3>2.-  Obtener un número al azar entre 1 y 9 y generar una la escalera numérica del tamaño indicado alternando colores entre rojo y azul.</h3>
 <?php 
    $n1 = random_int(1,9);
    echo "numero generado " .$n1."<br><br>";
    
    for ($i=1; $i <= $n1; $i++) { 
        echo "<p class=\"clase$i\">";

        for ($d=1; $d <= $i ; $d++) { 
            echo $i;
        }
        echo "</p>";
    }

    echo <<< EOS
        <style>
        .clase1 {color:blue;}
        .clase2 {color:red;}
        .clase3 {color:blue;}
        .clase4 {color:red;}
        .clase5 {color:blue;}
        .clase6 {color:red;}
        .clase7 {color:blue;}
        .clase8 {color:red;}
        .clase9 {color:blue;}
    EOS;
 
 
 
 ?>