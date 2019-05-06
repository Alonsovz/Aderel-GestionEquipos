<?php

class RemesasController extends ControladorBase {

    public static function remesas()
    {
        self::loadMain();
        $dao = new DaoEgresos();
        $chequeras = $dao->mostrarChequeraCmb();
        require_once './app/view/Egresos/remesas.php';
    }


    public static function cargoBancario()
    {
        self::loadMain();
        $dao = new DaoEgresos();
        $chequeras = $dao->mostrarChequeraCmb();
        require_once './app/view/Egresos/cargoBancario.php';
    }

    public function mostrarCargos() {
        $dao = new DaoRemesasCargos();

        echo $dao->mostrarCargos();
    }

    public function mostrarRemesas() {
        $dao = new DaoRemesasCargos();

        echo $dao->mostrarRemesas();
    }

    public function registrarRemesa() {

        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoRemesasCargos();

        //$chequera = $_REQUEST["chequera"];
     
        
        
        $dao->objeto->setConcepto($datos->conceptoRe);
        $dao->objeto->setIdCheque($datos->selectChequera);
        $dao->objeto->setCantidad($datos->monto);



        echo $dao->registrarRemesa();
        echo $dao->sumarRemesa();
       
    }

    public function registrarCargo() {

        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoRemesasCargos();

        //$chequera = $_REQUEST["chequera"];
     
        
        
        $dao->objeto->setConcepto($datos->conceptoRe);
        $dao->objeto->setIdCheque($datos->selectChequera);
        $dao->objeto->setCantidad($datos->monto);



        echo $dao->registrarCargo();
        echo $dao->restarCargo();
       
    }

    public function editarCargo() {
        $dao = new DaoRemesasCargos();
        $dao->objeto->setConcepto($_REQUEST["conceptoRe"]);
        $dao->objeto->setIdCheque($_REQUEST["selectChequera"]);
        $dao->objeto->setCantidad($_REQUEST["monto"]);
        $dao->objeto->setId($_REQUEST["idDetalle"]);



        echo $dao->editarCargo();
        echo $dao->restarCargo();
       
    }

    public function eliminarCargo() {
        $dao = new DaoRemesasCargos();

        $dao->objeto->setCantidad($_REQUEST["montoE"]);
        $dao->objeto->setIdCheque($_REQUEST["idCheque"]);
        $dao->objeto->setId($_REQUEST["idEliminar"]);



        echo $dao->eliminarCargo();
        echo $dao->sumarRemesa();
       
    }

    public function eliminarRemesa() {
        $dao = new DaoRemesasCargos();

        $dao->objeto->setCantidad($_REQUEST["montoE"]);
        $dao->objeto->setIdCheque($_REQUEST["idCheque"]);
        $dao->objeto->setId($_REQUEST["idEliminar"]);



        echo $dao->restarRemesa();
        echo $dao->eliminarRemesa();
       
    }
}



