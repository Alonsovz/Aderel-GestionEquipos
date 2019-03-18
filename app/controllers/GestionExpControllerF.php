<?php

class GestionExpControllerF extends ControladorBase {

    public static function gestionF()
    {
        self::loadMain();
        require_once './app/view/GestionExp/GestionExpedienteF.php';
    }

    

    public function mostrarCategoriasF() {
        $dao = new DaoCategorias();

        echo $dao->mostrarCategoriasF();
    }

    public function mostrarTorneosF() {
        $dao = new DaoTorneos();

        echo $dao->mostrarTorneosF();
    }


    public function mostrarEquiposF() {
        $dao = new DaoEquipos();

        echo $dao->mostrarEquiposF();
    }

    public function mostrarJugadoresF() {
        $dao = new DaoJugadores();

        echo $dao->mostrarJugadoresF();
    }

   

    

}


?>