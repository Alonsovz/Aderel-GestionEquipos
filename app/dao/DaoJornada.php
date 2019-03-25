<?php 

class DaoJornada extends DaoBase {

    public function __construct() {
        parent::__construct();
    }

    public function registrar($jornada)
    {
        try {
            $_query = "INSERT INTO `jornadas` (`idTorneo`, `vuelta_N`, `descansa_id_Equipo`) VALUES ($jornada->getIdTorneo(), $jornada->getVuelta_N(),$jornada->getDescansa_id_Equipo())";
            $this->con->ejecutar($_query);
            
        } catch (\Throwable $th) {
            echo $th;
        }
    }

}