<?php

class TorneosController extends ControladorBase {

    public static function gestion()
    {
        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmb();
        require_once './app/view/GestionExp/GestionTorneos.php';
    }


    public function registrar() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoTorneos();

        $dao->objeto->setNombreTorneo($datos->nombreTorneo);
        $dao->objeto->setNumeroEquipos($datos->numeroEquipos);
        $dao->objeto->setDisponibles($datos->numeroEquipos);
        $dao->objeto->setIdCategoria($datos->selectCategoria);


        echo $dao->registrar();

    }

    public function cargarDatosTorneo() {
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        echo $dao->cargarDatosTorneo();
    }

    public function editar(){
       // $datos = $_REQUEST["datos"];

       // $datos = json_decode($datos);

        $dao = new DaoTorneos();

        $dao->objeto->setNombreTorneo($_REQUEST['nombreTorneo']);
        $dao->objeto->setNumeroEquipos($_REQUEST['numeroEquipos']);
        $dao->objeto->setIdCategoria($_REQUEST['selectCategoria']);
        $dao->objeto->setIdTorneo($_REQUEST['idDetalleE']);


        echo $dao->editar();
    }

    public function eliminar() {
        $datos = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($datos);

        echo $dao->eliminar();
    }

}



?>