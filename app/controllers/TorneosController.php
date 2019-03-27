<?php

class TorneosController extends ControladorBase {

    public static function gestion()
    {
       
        require_once './app/view/GestionExp/GestionTorneos.php';
    }

    public static function gestionM()
    {
        self::loadMain();
        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmbM();
        require_once './app/view/GestionExp/GestionTorneosMasculinos.php';
    }

    public function sorteo()
    {
        self::loadMain();
        require_once './app/view/GestionExp/funciones_liga.php';
    }

    public function sorteoF()
    {
        self::loadMain();
        require_once './app/view/GestionExp/funciones_ligaF.php';
    }

    public static function gestionF()
    {
        self::loadMain();
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

    public function mostrarEquiposCM() {
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        $resultado =$dao->mostrarEquiposCM();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function mostrarEquiposCF() {
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        $resultado =$dao->mostrarEquiposCF();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }
        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

}



?>