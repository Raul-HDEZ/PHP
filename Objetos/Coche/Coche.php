<?php

class Coche
{
    // Definir los atributos
    
    private $modelo;
    private $distancia_total;
    private $distancia_parcial;
    private $motor;
    private $velocidad;
    private $velocidadMax;
    
    // Completar los métodos
    
    function __construct ( String $modelo, int $velocidadMax){
        $this->modelo = $modelo;
        $this->velocidadMax = $velocidadMax;
        $this->distancia_total =0;
        $this->distancia_parcial=0;
        $this->motor=false;
        $this->velocidad =0;
    }
    
    public function  arrancar():bool{
        if ($this->motor) {
            $this->infoError("El coche ya esta arrancado");
            return false;
        }else{
            $this->motor = true;
            return true;
        }
    }
    
    public function parar():bool{
        if ($this->velocidad == 0) {
            $this->infoError("No se puede frenar la velocidad es 0");
            return false;
        }else {
            $this->motor = false;
            $this->distancia_parcial = 0;
            $this->velocidad = 0;
            return true;
        }
    }
    
    public function acelera( int $cantidad):bool{
        if (!$this->motor) {
            $this->infoError("El motor esta apagado");
            return false;
        }
        if ($this->velocidad + $cantidad > $this->velocidadMax) {
            $this->infoError("No se puede superar la velocidad maxima");
            return false;
        }else {
            $this->velocidad += $cantidad;
            return true;
        }
    }
    
    public function frena ( int $cantidad):bool{
        if (!$this->motor) {
            $this->infoError("El motor esta apagado");
            return false;
        }
        if ($this->velocidad == 0) {
            $this->infoError("No se puede frenar la velocidad es 0");
            return false;
        }else {
            $this->velocidad -= $cantidad;
            return true;
        }
    }
    
    public function recorre ():bool{
        if (!$this->motor) {
            $this->infoError("El motor esta apagado");
            return false;
        }
        $this->distancia_parcial += $this->velocidad;
        $this->distancia_total += $this->velocidad;
        return true;
    }
    
    public function info():string{
        return "Modelo: ".$this->modelo ." Velocidad: ".$this->velocidad ." KM-Parciales: ".$this->distancia_parcial . " KM-Total: " . $this->distancia_total;
    }
    
    public function getKilometros():int{
        return $this->distancia_parcial;
    }
    
    private function infoError( String $mensaje):void{
        echo "<br> [ERROR] $mensaje <br>";
    }	
}
