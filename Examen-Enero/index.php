<?php
session_start();

include_once 'app/funciones.php';
include_once 'app/acciones.php';

// Div con contenido
$contenido="";
if ($_SERVER['REQUEST_METHOD'] == "GET" ){
    if ( isset($_GET['orden'])){
        switch ($_GET['orden']) {
            case "Nuevo"    : accionAlta(); break;
            case "Borrar"   : accionBorrar   ($_GET['id']); break;
            case "Modificar": accionModificar($_GET['id']); break;
            case "Detalles" : accionDetalles ($_GET['id']);break;
            case "Terminar" : accionTerminar(); break;
            case "Incrementar" : 
                // Si no selecciono nada no hago nada
                if (isset($_GET['users'])) {
                    accionIncrementar($_GET['users']); 
                } 
                break;
            case "Bloqueo" :
                // Si no selecciono nada pongo todo a 0
                if (isset($_GET['users'])) {
                    accionBloqueo($_GET['users']);
                }else todocero();
                break;
        }
    }
}
// POST Formulario de alta o de modificación
else {
    if (  isset($_POST['orden'])){
         switch($_POST['orden']) {
             case "Nuevo"    : accionPostAlta(); break;
             case "Modificar": accionPostModificar(); break;
             case "Detalles":; // No hago nada
         }
    }
}
$contenido .= mostrarDatos();
// Compruebo si esta logeado
if (!isset($_SESSION['login'])) {
    login();
}else {
    // Compruebo si la sesion no a expirado
    if (time() > $_SESSION['login'] + 300) {
        accionTerminar();
    }else {
        // Muestro la página principal
        include_once "app/layout/principal.php";  
    }
}





