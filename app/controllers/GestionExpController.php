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

    public static function sancionesTorneoM()
    {
        self::loadMain();
        require_once './app/view/GestionExp/sancionesPorTorneo.php';
    }
    public static function sancionesTorneoF()
    {
        self::loadMain();
        require_once './app/view/GestionExp/sancionesPorTorneoF.php';
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

    public function mostrarJugadoresSancionM() {
        $dao = new DaoJugadores();

        echo $dao->mostrarJugadoresSancionM();
    }

    public function mostrarJugadoresSancionF() {
        $dao = new DaoJugadores();

        echo $dao->mostrarJugadoresSancionF();
    }

    public function mostrarTorneosM() {
        $dao = new DaoTorneos();

        echo $dao->mostrarTorneosM();
    }


    public function mostrarTorneosSancionM() {
        $dao = new DaoTorneos();

        echo $dao->mostrarTorneosSancionM();
    }
    public function mostrarTorneosSancionF() {
        $dao = new DaoTorneos();

        echo $dao->mostrarTorneosSancionF();
    }

    public function mostrarTorneosHistorialM() {
        $dao = new DaoTorneos();

        echo $dao->mostrarTorneosHistorialM();
    }

    public function mostrarTorneosHistorialF() {
        $dao = new DaoTorneos();

        echo $dao->mostrarTorneosHistorialF();
    }

    

    

}


?>