<?php

class GestionExpController extends ControladorBase {

    public static function gestion()
    {
        self::loadMain();
        $daoU = new DaoEquipos();
        $equiposCMB = $daoU->mostrarEquiposCmb();

        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmb();
        require_once './app/view/GestionExp/GestionExpediente.php';
    }

    public function mostrarEquipos() {
        $dao = new DaoEquipos();

        echo $dao->mostrarEquipos();
    }

    public function mostrarCategorias() {
        $dao = new DaoCategorias();

        echo $dao->mostrarCategorias();
    }

    public function mostrarJugadores() {
        $dao = new DaoJugadores();

        echo $dao->mostrarJugadores();
    }

    public function mostrarTorneos() {
        $dao = new DaoTorneos();

        echo $dao->mostrarTorneos();
    }

    

}


?>