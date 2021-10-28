<?php
function usuarioOk($usuario, $contraseña) :bool {
   if ($contraseña == strrev($usuario) && strlen($contraseña) >= 8) {
      return true;
   }else return false;
    
}

function checkinyection($var){
   return trim(htmlspecialchars($var, ENT_QUOTES, "UTF-8"));
}

function letrarepetida($texto){
$rep = "a";
$max = 0;
$letras = "abcdefghijklmnopqrstuvwxyz";
$letras .= strtoupper($letras);
for ($i = 0; $i < strlen($letras); $i++) {
    $letra = $letras[$i];
    $contador = substr_count($texto, $letra);
    if ($contador > $max){
      $max = $contador;
      $rep = $letra;
    }
}
return $rep;
}

function palabrarepetida($texto){
$arr = explode(" ", $texto);
$arr = array_unique($arr);
$rep = "palabra";
$max = 0;

for ($i = 0; $i < count($arr); $i++) {
   $palabra = $arr[$i];
   $contador = substr_count($texto, $palabra);
   if ($contador > $max){
     $max = $contador;
     $rep = $palabra;
   }
}
return $rep;
}