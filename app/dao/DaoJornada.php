<?php 

class DaoJornada extends DaoBase {

    public function __construct() {
        parent::__construct();
    }

    public function registrar($jornada)
    {
        try {
            $_query = "INSERT INTO `jornadas` (`idTorneo`, `vuelta_N`, `descansa_id_Equipo`,`orden`) VALUES (".
                $jornada->getIdTorneo().", ".
                $jornada->getVuelta_N().", ".
                $jornada->getDescansa_id_Equipo().", ".
                $jornada->getOrden().");";

                $this->con->ejecutar($_query);
                return $this->con->ejecutar('SELECT id FROM jornadas ORDER BY id DESC LIMIT 1')->fetch_assoc()['id'];
                
            
        } catch (\Throwable $th) {
            echo $th;
        }
    }

}