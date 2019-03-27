<?php

class IngresosController extends ControladorBase {

    public static function Ingresos()
    {
        self::loadMain();
        $daoD = new DaoIngresos();
        $titleCMB = $daoD->mostrarIngresosCmb();        
        $total=$daoD->mostrarTotal();
        
        require_once './app/view/Ingresos/Ingresos.php';
    }

    public static function nuevoIngreso()
    {
        self::loadMain();
        require_once './app/view/Ingresos/nuevoIngreso.php';
    }

    public static function IngresosBD()
    {
        require_once './app/view/Ingresos/IngresosBD.php';
    }

    public function mostrarIngresos() {
        $dao = new DaoIngresos();

        echo $dao->mostrarIngresos();
    }

    public function mostrarIngresosTabla() {
        $dao = new DaoIngresos();

        echo $dao->mostrarIngresosTabla();
    }

    public function verPorMes() {
        $dao = new DaoIngresos();
      
        $anioE = $_REQUEST["anio"];
        $mesE = $_REQUEST["mes"];
       $dao->objeto->setMes($mesE);
        $dao->objeto->setAnio($anioE);

        echo $dao->mostrarTotal();        
    }

    public static function IngresosBDIngresar()
    {
        require_once './app/view/Ingresos/IngresosBD.php?accion';
    }
    public function llamaReporte()
    {
        $dao = new DaoIngresos();
        
        
        require_once './app/reportes/reporteDiarioIngreso.php';

        $reporte = new Reporte();
        $total = $dao->totaldia();
        $resultado1 = $dao->reporteDiarioIngresos();
        $mostrar = $dao->reporteDiarioIngresos();

        $reporte->reporteDiario($total,$resultado1,$mostrar);
    }

    public function reportePorFechas() {
        $dao = new DaoIngresos();
        
        require_once './app/reportes/ReporteIngresos.php';
        
       // $idA= $_REQUEST["area"];
        $fecha1 = $_REQUEST["fecha"];
        $fecha2 = $_REQUEST["fecha2"];

        $reporte = new Reporte();

        //$dao->objeto->setCodigoArea($idA);
        $dao->objeto->setFecha($fecha1);
       $dao->objeto->setFecha2($fecha2);
        $resultado = $dao->reporteIngresosPorFechas();
        $resultado1 = $dao->reporteIngresosPorFechas();
        $total = $dao->total();

        $reporte->reporteIngresosPorFechas($fecha1,$fecha2, $resultado, $resultado1,$total);
    }


    public function reportePorMes() {
        $dao = new DaoIngresos();
        
        require_once './app/reportes/ReporteIngresosPorMes.php';
        
       // $idA= $_REQUEST["area"];
        $mes = $_REQUEST["mes"];
        $anio = $_REQUEST["anio"];

        $reporte = new Reporte();

        //$dao->objeto->setCodigoArea($idA);
        $dao->objeto->setMes($mes);
       $dao->objeto->setAnio($anio);
        $resultado = $dao->reporteIngresosPorMes();
        $resultado1 = $dao->reporteIngresosPorMes();
        $total = $dao->totalMes();
        $reporte->reporteIngresosPorMes($mes,$anio, $resultado, $resultado1,$total);
    }

   


 }

?>   