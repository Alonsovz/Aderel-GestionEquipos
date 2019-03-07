<?php

class EgresosController extends ControladorBase {

    public static function Egresos()
    {
        self::loadMain();
        require_once './app/view/Egresos/Egresos.php';
    }

    public function mostrarEgresos() {
        $dao = new DaoEgresos();

        echo $dao->mostrarEgresos();
    }

    public function cargarDatosEgresos() {
        $id = $_REQUEST["id"];

        $dao = new DaoEgresos();

        $dao->objeto->setIdEgreso($id);

        echo $dao->cargarDatosEgresos();
    }
    public function verPorMes() {
        $dao = new DaoEgresos();
      
        $anioE = $_REQUEST["anio"];
        $mesE = $_REQUEST["mes"];
       $dao->objeto->setMes($mesE);
        $dao->objeto->setAnio($anioE);

        echo $dao->mostrarTotal();        
    }

   

    public function registrarEgreso()
    {
        $dao = new DaoEgresos();

        $chequeP = $_REQUEST["cheque"];
        $conceptoEgresoP = $_REQUEST["conceptoEgreso"];
        $cantidadP = $_REQUEST["cantidad"];
        $retencionP = $_REQUEST["retencionMonto"];
        $pagadoP = $_REQUEST["pagado"];
        $meses = $_REQUEST["mes"];
        $anios = $_REQUEST["anio"];
        
        
        $dao->objeto->setChNo($chequeP);
        $dao->objeto->setConceptoEgreso($conceptoEgresoP);
        $dao->objeto->setCantidad($cantidadP);
        $dao->objeto->setRetencion($retencionP);
        $dao->objeto->setPagado($pagadoP);
        $dao->objeto->setMes($meses);
        $dao->objeto->setAnio($anios);


        echo $dao->registrar();
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
    public function getChNo()
    {
        $dao=new DaoEgresos();
        $cheque=$_REQUEST['cheque'];
        $dao->objeto->setChNo($cheque);

        echo $dao->getCheque();
    }

    public function llamaReporte()
    {
        $dao = new DaoEgresos();
        
        
        require_once './app/reportes/reporteDiarioEgreso.php';

        $reporte = new Reporte();
        $total = $dao->totaldia();
        $resultado1 = $dao->reporteDiarioEgresos();
        $mostrar = $dao->reporteDiarioEgresos();
        $cantidad = $dao->totalCantidadDia();
        $retencion = $dao->totalRetencionDia();
        $pagado = $dao->totalPagadoDia();

        $reporte->reporteDiario($total,$resultado1,$mostrar,$cantidad,$pagado,$retencion);
    }

    public function reportePorFechas() {
        $dao = new DaoEgresos();
        
        require_once './app/reportes/ReporteEgresos.php';
        
       // $idA= $_REQUEST["area"];
        $fecha1 = $_REQUEST["fecha"];
        $fecha2 = $_REQUEST["fecha2"];

        $reporte = new Reporte();

        //$dao->objeto->setCodigoArea($idA);
        $dao->objeto->setFecha($fecha1);
       $dao->objeto->setFecha2($fecha2);
        $resultado = $dao->reporteEgresoPorFechas();
        $resultado1 = $dao->reporteEgresoPorFechas();
        $cantidad = $dao->totalCantidadFechas();
        $retencion = $dao->totalRetencionFechas();
        $pagado = $dao->totalPagadoFechas();

        $reporte->reporteEgresoPorFechas($fecha1,$fecha2, $resultado, $resultado1,$cantidad,$retencion,$pagado);
    }

    public function reportePorMes() {
        $dao = new DaoEgresos();
        
        require_once './app/reportes/ReporteEgresosPorMes.php';
        
       // $idA= $_REQUEST["area"];
        $mes = $_REQUEST["mes"];
        $anio = $_REQUEST["anio"];

        $reporte = new Reporte();

        //$dao->objeto->setCodigoArea($idA);
        $dao->objeto->setMes($mes);
       $dao->objeto->setAnio($anio);
        $resultado = $dao->reporteEgresosPorMes();
        $resultado1 = $dao->reporteEgresosPorMes();
        $cantidad = $dao->totalCantidad();
        $retencion = $dao->totalRetencion();
        $pagado = $dao->totalPagado();

        $reporte->reporteEgresosPorMes($mes,$anio, $resultado, $resultado1,$cantidad,$retencion,$pagado);
    }
 }
