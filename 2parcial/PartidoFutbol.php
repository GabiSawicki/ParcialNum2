<?php

include_once("Partido.php");

class PartidoFutbol extends Partido{


    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
    }

    public function __toString(){
        return parent::__toString();
    }





}