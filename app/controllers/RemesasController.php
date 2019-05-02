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
}



