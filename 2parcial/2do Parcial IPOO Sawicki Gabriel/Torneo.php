<?php

include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasket.php");
include_once("Equipo.php");

class Torneo{
    private $colPartidos = array();
    private $importePremio;

    public function __construct($importePremio, $colPartidos){
        $this->importePremio = $importePremio;
        $this->colPartidos = $colPartidos;
    }
    public function getImportePremio(){
        return $this->importePremio;
    }
    public function getColPartidos(){
        return $this->colPartidos;
    }
    public function setColPartidos($colPartidos){
        $this->colPartidos = $colPartidos;
    }
    public function setImportePremio($importePremio){
        $this->importePremio = $importePremio;
    }

    public function getIdTorneo(){
        $id = count($this->getColPartidos());
        return $id;
    }

    public function getPremio(){
        $premio = $this->getImportePremio();
        return $premio;
    }

    public function __toString()
    {
        return "Torneo: " . $this->getIdTorneo() .
        "\nPremio: $" . $this->getPremio() .
        "\n----------PARTIDOS----------\n" . $this->colToString();
        "Localidad: " . $this->getLocalidad();
    }

    public function darCantidadEquipos(){
        $coleccion = $this->getColPartidos();
        $equipos = array();
        $cantidad = 0;

        foreach ($coleccion as $objPartido) {
            $equipo1 = $objPartido->getObjEquipo1();
            $equipo2 = $objPartido->getObjEquipo2();
            $equipos[] = $equipo1;
            $equipos[] = $equipo2;
        }
        $cantidad = count($equipos);
        return $cantidad;
    }

    public function colToString()
    {
        $coleccion = $this->getColPartidos();
        $string = "";

        foreach ($coleccion as $objPartido) {
            $string .= $objPartido . "\n--------------------\n";
        }
        return $string;
    }

    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido){
        $exito = false;
        $categoria1 = $OBJEquipo1->getObjCategoria();
        $categoria2 = $OBJEquipo2->getObjCategoria();
        $cantJugadores1 = $OBJEquipo1->getCantJugadores();
        $cantJugadores2 = $OBJEquipo2->getCantJugadores();
        $idPartido = count($this->getColPartidos()) + 1;

        if($categoria1 == $categoria2 && $cantJugadores1 == $cantJugadores2){
            if($tipoPartido == "Futbol"){
                $objPartido = new PartidoFutbol($idPartido, $fecha, $OBJEquipo1, 0, $OBJEquipo2);
            }else{               
                $objPartido = new PartidoBasket($idPartido, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0, 0);
            }
            $this->colPartidos[] = $objPartido;
            $exito = true;
        }
        return $exito;
    }
    
    public function darEquiposGanadores($deporte){
        $partidos = $this->getColPartidos();
        $equiposGanadoresFutbol = array();
        $equiposGanadoresBasket = array();
        $equiposGanadores = array();

        foreach($partidos as $partido){
            $partidos = $this->getColPartidos();
            if($deporte == "Futbol"){
                $ganador = $partido->darEquipoGanador();
                $equiposGanadoresFutbol[] = $ganador;
            }else{
                $ganador = $partido->darEquipoGanador();
                $equiposGanadoresBasket[] = $ganador;
            }
            if($deporte == "Futbol"){
                $equiposGanadores = $equiposGanadoresFutbol;
            }else{
                $equiposGanadores = $equiposGanadoresBasket;
            }   
        }
        return $equiposGanadores;   
    }

    public function calcularPremioPartido($partido){
        $coefPartido = $partido->coeficientePartido();
        $premioPartido = $coefPartido * $this->getImportePremio();
        $equipoGanador = $partido->darEquipoGanador();
        $arreglo = array("equipoGanador" => $equipoGanador, "premioPartido" => $premioPartido);
        return $arreglo;
    }




}