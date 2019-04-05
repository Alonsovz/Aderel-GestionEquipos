<?php

class CajaChicaController extends ControladorBase {


    public function mostrarGeneral() {
        $dao = new DaoCajaChica();

        echo $dao->mostrarGeneral();
    }

    public function mostrarAderel() {
        $dao = new DaoCajaChica();

        echo $dao->mostrarAderel();
    }

    public function cargarDatosCaja() {
        $id = $_REQUEST["id"];

        $dao = new DaoCajaChica();

        $dao->objeto->setIdVale($id);

        echo $dao->cargarDatosCaja();
    }
    

   

    public function registrarGeneral()
    {
        $dao = new DaoCajaChica();

        $cantidadLetras = $_REQUEST["cantidadLetras"];
        $concepto = $_REQUEST["concepto"];
        $cantidad = $_REQUEST["cantidad"];
        $recibido = $_REQUEST["recibido"];
        
        
        
        $dao->objeto->setCantidad($cantidad);
        $dao->objeto->setCantidadLetras($cantidadLetras);
        $dao->objeto->setRecibido($recibido);
        $dao->objeto->setConcepto($concepto);


        echo $dao->registrarGeneral();
        echo $dao-> nuevoMontoG();
    }


    public function gestionCajaAderel()
    {
        $dao = new DaoCajaChica();

        $cantidad = $_REQUEST["cantidadActualizar"];
        
        $dao->objeto->setCantidad($cantidad);


        echo $dao->gestionCajaAderel();
    }

    public function gestionCajaGeneral()
    {
        $dao = new DaoCajaChica();

        $cantidad = $_REQUEST["cantidadActualizar"];
        
        $dao->objeto->setCantidad($cantidad);


        echo $dao->gestionCajaGeneral();
    }

    public function registrarAderel()
    {
        $dao = new DaoCajaChica();

        $cantidadLetras = $_REQUEST["cantidadLetras"];
        $concepto = $_REQUEST["concepto"];
        $cantidad = $_REQUEST["cantidad"];
        $recibido = $_REQUEST["recibido"];
        
        
        
        $dao->objeto->setCantidad($cantidad);
        $dao->objeto->setCantidadLetras($cantidadLetras);
        $dao->objeto->setRecibido($recibido);
        $dao->objeto->setConcepto($concepto);


        echo $dao->registrarAderel();
        echo $dao-> nuevoMontoA();
    }


    public function editar() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoEgresos();

        $dao->objeto->setChNo($datos->chNo);
        $dao->objeto->setConceptoEgreso($datos->conceptoEgreso);
        $dao->objeto->setCantidad($datos->cantidad);
        $dao->objeto->setRetencion($datos->retencion);
        $dao->objeto->setPagado($datos->pagado);
       // $dao->objeto->setFechaEgreso($datos->fechaEgreso);
        $dao->objeto->setIdEgreso($datos->idDetalle);

        echo $dao->editar();
    }

    public function eliminar() {
        $datos = $_REQUEST["id"];

        $dao = new DaoEgresos();

        $dao->objeto->setIdEgreso($datos);

        echo $dao->eliminar();
    }
   

    public function cargarDatosCajaA() {
        $id = $_REQUEST["id"];

        $dao = new DaoCajaChica();

        $dao->objeto->setIdVale($id);

        echo $dao->cargarDatosCajaA();
    }

    
 }
