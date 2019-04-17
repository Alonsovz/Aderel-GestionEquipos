<?php 

class DaoPosiciones extends DaoBase {

    public function __construct() {
        parent::__construct();
    }

    public function registrar($posicion)
    {
        try {
            $_query = "INSERT INTO `posiciones`(`idEquipo`, `idTorneo`, `golesFavor`, `golesContra`, `puntaje`, `partidosJugados`, `partidosEmpatados`, `partidosPerdidos`,`partidosGanados`) VALUES (".
                $posicion->getIdEquipo().",".
                $posicion->getIdTorneo().",0,0,0,0,0,0,0)";

                $this->con->ejecutar($_query);
                return 1;
                
            
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}