<?php

class Reloj
{
    private $segundos;
    private $formato24;
    private $horaalarma;
    private $alarma;
    
    public function __construct ( int $hora, int $minutos, int $segundos){

        $this->segundos = $hora * 3600 + $minutos * 60 + $segundos;
        $this->formato24 = true;
        $this->alarma = false;
        
    }
    
    // Mostrar la hora: genera un String con el  formado de hora  22:30:23
    // o 10:30:23 pm si el atributos Formato24 es falso
    
    public function mostrar(){
        $horas = round($this->segundos/3600,0,PHP_ROUND_HALF_DOWN);
        $minutos = round(($this->segundos%3600)/60,0,PHP_ROUND_HALF_DOWN);
        $segundos = round(($this->segundos%3600)%60,0,PHP_ROUND_HALF_DOWN);
        if (!$this->formato24) {
            $horas -= 12;
        }
        return "$horas:$minutos:$segundos";
    }
    
    // Cambiar formato24, recibe un valor true si quiero formato de
    // 24 o falso si quiero de 12
    public function  cambiarFormato24( bool $formato24){
        $this->formato24 = $formato24;
        return $formato24;
    }
    
    // Incrementa en un segundo el valor de reloj
    public function tictac (){
        $this->segundos +=1;
        if ($this->alarma && $this->horaalarma == $this->segundos) {
            echo "<br> La alarma esta sonando";
        }
    }
    
    // Comparar Hora, recibe como parámetro otro objeto Reloj
    // y me devuelve el número de segundos que tienen de diferencia
    
    public function comparar ( Reloj $otroreloj){
        
        return $this->segundos - $otroreloj->segundos;
    }

    public function fijarAlarma(int $hora, int $minutos){
        $this->horaalarma = $hora * 3600 + $minutos * 60 ;
    }

    public function Alarma(bool $alarma){
        $this->alarma = $alarma;
    }
}
