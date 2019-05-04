<?php 

class DaoClasificatoria extends DaoBase {

    public function __construct() {
        parent::__construct();
    }

    public function registrar($clasificatoria)
    {
        try {
            
            $_query = "INSERT INTO `clasificatoria`(`partidoN`, `etapa`, `idEquipo1`, `idEquipo2`, `idTorneo`, `fecha`, `hora`, `cancha`) VALUES (".
            $clasificatoria->getPartidoN().", '".
            $clasificatoria->getEtapa()."', '".
            $clasificatoria->getIdEquipo1()."', '".
            $clasificatoria->getIdEquipo2()."', '".
            $clasificatoria->getIdTorneo()."', '".
            $clasificatoria->getFecha()."', '".
            $clasificatoria->getHora()."', '". 
            $clasificatoria->getCancha()."');";

            $this->con->ejecutar($_query);
            
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function guardaGanador($idClasificatoria, $idEquipo)
    {
        try {
            $_query = "UPDATE `clasificatoria` SET `idEquipoGanador`=".$idEquipo." where `idClasificatoria`=".$idClasificatoria;

            return $this->con->ejecutar($_query);
            
        } catch (\Throwable $th) {
            echo $th;
        }
    }

}