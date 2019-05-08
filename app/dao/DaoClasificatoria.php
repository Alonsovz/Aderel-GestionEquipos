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

    public function guardaGanador($idClasificatoria, $idEquipo, $tipoGane)
    {
        try {
            $_query = "UPDATE `clasificatoria` SET `idEquipoGanador`=".$idEquipo.", `tipo_gane`='".$tipoGane."' where `idClasificatoria`=".$idClasificatoria;
            $this->con->ejecutar($_query);
            
            $_query = "SELECT * FROM `clasificatoria` where `idClasificatoria` = ".$idClasificatoria;
            $res    = $this->con->ejecutar($_query);
            $res    = $res->fetch_assoc();

            if($res['etapa']=='final')
                $this->historiaTorneo($res['idTorneo']);
            
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function historiaTorneo($idTorneo)
    {
        $_query = 'UPDATE `torneos` SET `idEliminado`=3 WHERE `idTorneo`='.$idTorneo;
        $clasi=$this->con->ejecutar($_query);

        $_query='UPDATE `equipos` SET `idEliminado`=3 WHERE `idTorneo`='.$idTorneo;
        $this->con->ejecutar($_query);

        $_query='update inscriJugador set estado=3 where idEquipo IN (select idEquipo from equipos where idTorneo='.$idTorneo.')';
        $this->con->ejecutar($_query);
    }

}