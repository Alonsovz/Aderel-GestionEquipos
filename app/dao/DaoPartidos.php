<?php 

class DaoPartidos extends DaoBase {

    public function __construct() {
        parent::__construct();
    }

    public function registrar($partido)
    {
        try {
            $_query = "INSERT INTO `partidos` (`jornada_id`, `partido_N`, `cancha`, `equipo1_id`, `equipo2_id`, `fecha`, `hora`) 
            VALUES ($partido->getJornada_id(), $partido->getPartido_N(),$partido->getCancha(), $partido->getEquipo1_id(),$partido->getEquipo2_id(),'$partido->getFecha()','$partido->getHora()')";
            $this->con->ejecutar($_query);
            
        } catch (\Throwable $th) {
            echo $th;
        }
    }

}