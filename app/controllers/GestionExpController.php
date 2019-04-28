<?php

class GestionExpController extends ControladorBase {

    public static function gestion()
    {
        self::loadMain();
        
        require_once './app/view/GestionExp/GestionExpediente.php';
    }

    public static function sancionesM()
    {
        self::loadMain();
        require_once './app/view/GestionExp/sancionesM.php';
    }

    public function mostrarEquiposM() {
        $dao = new DaoEquipos();

        echo $dao->mostrarEquiposM();
    }


    public function mostrarEquiposE() {
        $dao = new DaoEquipos();

        echo $dao->mostrarEquiposE();
    }

    public function mostrarCategoriasM() {
        $dao = new DaoCategorias();

        echo $dao->mostrarCategoriasM();
    }

    public function mostrarJugadoresE() {
        $dao = new DaoJugadores();

        echo $dao->mostrarJugadoresE();
    }
    

    public function mostrarJugadoresM() {
        $dao = new DaoJugadores();

        echo $dao->mostrarJugadoresM();
    }

    public function mostrarTorneosM() {
        $dao = new DaoTorneos();

        echo $dao->mostrarTorneosM();
    }

    

    

}


?>