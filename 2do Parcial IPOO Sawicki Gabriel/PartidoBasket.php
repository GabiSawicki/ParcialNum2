<?php

include_once("Partido.php");

class PartidoBasket extends Partido{
    private $cantInfracciones;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $cantInfracciones){
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->cantInfracciones = $cantInfracciones;
    }

    public function getCantInfracciones(){
        return $this->cantInfracciones;
    }

    public function setCantInfracciones($cantInfracciones){
        $this->cantInfracciones = $cantInfracciones;
    }


    public function __toString(){
        $cadena = parent::__toString();
        $cadena .= "Cantidad de Infracciones: ".$this->getCantInfracciones();
        return $cadena;
    }
} 