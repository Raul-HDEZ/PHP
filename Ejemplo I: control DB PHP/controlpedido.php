<?php
include_once 'AccesoDatos.php';

// CONTROLADOR
if (isset ($_GET['nombre']) && isset($_GET['passwd']) ){
    $mensaje = "";
} else {
    $mensaje = " Introduzca una clave o contraseña.";
    include_once 'vistapedidos.php';
    exit();
}

// Accedo al Modelo
$conexdb = AccesoDatos::getModelo();
if ($cliente = $conexdb->getLogin($_GET['nombre'], $_GET['passwd'])) {
    $total =0;
    $resultados = $conexdb->getPedidos($cliente->cod_cliente);
    foreach ($resultados as $pedido) {
        $total += $pedido->precio;
    }
    if ( count($resultados) == 0){
    $mensaje = "No se encuentran Pedidos.";
    unset($resultados);
}
}else {
    $mensaje="Usuario no encontrado";
}

// Cargo la vista 
include_once 'vistapedidos.php';
?>