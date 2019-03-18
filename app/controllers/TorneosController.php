<?php

class TorneosController extends ControladorBase {

    public static function gestion()
    {
       
        require_once './app/view/GestionExp/GestionTorneos.php';
    }

    public static function gestionM()
    {
        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmbM();
        require_once './app/view/GestionExp/GestionTorneosMasculinos.php';
    }

    public static function gestionF()
    {
        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmbF();
        require_once './app/view/GestionExp/GestionTorneosFemeninas.php';
    }


    public function registrarM() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoTorneos();

        $dao->objeto->setNombreTorneo($datos->nombreTorneo);
        $dao->objeto->setNumeroEquipos($datos->numeroEquipos);
        $dao->objeto->setDisponibles($datos->numeroEquipos);
        $dao->objeto->setIdCategoria($datos->selectCategoria);


        echo $dao->registrarM();

    }

    public function cargarDatosTorneoM() {
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        echo $dao->cargarDatosTorneoM();
    }

    public function editarM(){
       // $datos = $_REQUEST["datos"];

       // $datos = json_decode($datos);

        $dao = new DaoTorneos();

        $dao->objeto->setNombreTorneo($_REQUEST['nombreTorneo']);
        $dao->objeto->setNumeroEquipos($_REQUEST['numeroEquipos']);
        $dao->objeto->setIdCategoria($_REQUEST['selectCategoria']);
        $dao->objeto->setIdTorneo($_REQUEST['idDetalleE']);


        echo $dao->editarM();
    }

    public function eliminarM() {
        $datos = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($datos);

        echo $dao->eliminarM();
    }



    public function registrarF() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoTorneos();

        $dao->objeto->setNombreTorneo($datos->nombreTorneo);
        $dao->objeto->setNumeroEquipos($datos->numeroEquipos);
        $dao->objeto->setDisponibles($datos->numeroEquipos);
        $dao->objeto->setIdCategoria($datos->selectCategoria);


        echo $dao->registrarF();

    }

    public function cargarDatosTorneoF() {
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        echo $dao->cargarDatosTorneoF();
    }

    public function editarF(){
       // $datos = $_REQUEST["datos"];

       // $datos = json_decode($datos);

        $dao = new DaoTorneos();

        $dao->objeto->setNombreTorneo($_REQUEST['nombreTorneo']);
        $dao->objeto->setNumeroEquipos($_REQUEST['numeroEquipos']);
        $dao->objeto->setIdCategoria($_REQUEST['selectCategoria']);
        $dao->objeto->setIdTorneo($_REQUEST['idDetalleE']);


        echo $dao->editarF();
    }

    public function eliminarF() {
        $datos = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($datos);

        echo $dao->eliminarF();
    }

}



?>