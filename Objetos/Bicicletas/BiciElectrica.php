<?php

class Bicicleta{
    private $id; // Identificador de la bicicleta (entero)
    private $coordx; // Coordenada X (entero)
    private $coordy; // Coordenada Y (entero)
    private $bateria; // Carga de la batería en tanto por ciento (entero)
    private $operativa; // Estado de la bicleta ( true operativa- false no disponible)

    public function __construct($id,$coordx,$coordy,$bateria,$operativa){
        $this->id = $id;
        $this->coordx = $coordx;
        $this->coordy = $coordy;
        $this->bateria = $bateria;
        $this->operativa = $operativa;
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
        return "id: ". $this->id ." Bateria: ".$this->bateria;
    }

    public  function distancia($x,$y){
        return sqrt(pow($x - $this->coordx,2)+pow($y - $this->coordy,2));
    }
}
?>