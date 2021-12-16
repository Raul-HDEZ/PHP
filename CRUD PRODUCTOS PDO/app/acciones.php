<?php
include_once "Producto.php";

function accionBorrar ($pro){    
    $db = AccesoDatos::getModelo();
    $tproduct = $db->borrarProducto($pro);
}

function accionTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
}
 
function accionAlta(){
    $product = new Producto();
    $product->PRODUCTO_NO  = "";
    $product->DESCRIPCION  = "";
    $product->STOCK_DISPONIBLE  = "";
    $product->PRECIO_ACTUAL = "";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
}

function accionDetalles($pro){
    $db = AccesoDatos::getModelo();
    $product = $db->getProducto($pro);
    $orden = "Detalles";
    include_once "layout/formulario.php";
}


function accionModificar($pro){
    $db = AccesoDatos::getModelo();
    $product = $db->getProducto($pro);
    $orden="Modificar";
    include_once "layout/formulario.php";
}

function accionPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $product = new Producto();
    $product->PRODUCTO_NO  = $_POST['PRODUCTO_NO'];
    $product->DESCRIPCION   = $_POST['DESCRIPCION'];
    $product->PRECIO_ACTUAL  = $_POST['PRECIO_ACTUAL'];
    $product->STOCK_DISPONIBLE = $_POST['STOCK_DISPONIBLE'];
    $db = AccesoDatos::getModelo();
    $db->addProducto($product);
    
}

function accionPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $product = new Producto();
    $product->PRODUCTO_NO  = $_POST['PRODUCTO_NO'];
    $product->DESCRIPCION   = $_POST['DESCRIPCION'];
    $product->PRECIO_ACTUAL  = $_POST['PRECIO_ACTUAL'];
    $product->STOCK_DISPONIBLE = $_POST['STOCK_DISPONIBLE'];
    $db = AccesoDatos::getModelo();
    $db->modProducto($product);
    
}