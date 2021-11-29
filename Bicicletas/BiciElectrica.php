<?php

class Bicicleta{
    private $id; // Identificador de la bicicleta (entero)
    private $coordx; // Coordenada X (entero)
    private $coordy; // Coordenada Y (entero)
    private $bateria; // Carga de la batería en tanto por ciento (entero)
    private $operativa; // Estado de la bicleta ( true operativa- false no disponible)

    public function __construct($a,$b,$c,$d,$e){
        $this->id = $a;
        $this->coordx = $b;
        $this->coordy = $c;
        $this->bateria = $d;
        $this->operativa = $e;
    }


    public function __get($attribute){
        if(isset($this->$attribute)){
            return $this->$attribute;
        } else{
            return false;
        }
    }

    public function __set($attribute,$val){
        $this->$attribute = $val;
    }

    public function __toString()
    {
        return "id: ". $this->__get('id') ." Bateria: ".$this->__get('bateria');
    }

    public  function distancia($x,$y){
        return sqrt(pow($x - $this->__get('coordx'),2)+pow($y - $this->__get('coordy'),2));
    }
}
?>