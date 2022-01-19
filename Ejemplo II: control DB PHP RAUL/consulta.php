<?php
include_once "AccesoDatos.php";
include_once "Producto.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    get();
}else {
    post();
}


function get(){
    $conexdb = AccesoDatos::getModelo();
    $productos = $conexdb->getPedidos();
    include_once "vista.php";
}

function post(){

}
?>