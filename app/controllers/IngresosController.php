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

    public static function cierreMes()
    {
        self::loadMain();
        require_once './app/view/Ingresos/cierreMes.php';
    }

    public static function nuevo()
    {
        self::loadMain();
        require_once './app/view/Ingresos/nuevoI.php';
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

    public function mostrarIngresosTablaE() {
        $dao = new DaoIngresos();

        echo $dao->mostrarIngresosTablaE();
    }

    public function verPorMes() {
        $dao = new DaoIngresos();
      
        $anioE = $_REQUEST["anio"];
        $mesE = $_REQUEST["mes"];
       $dao->objeto->setMes($mesE);
        $dao->objeto->setAnio($anioE);

        echo $dao->mostrarTotal();        
    }

    public function reestablecerI() {
        $dao = new DaoIngresos();
      
        $id = $_REQUEST["id"];

        $dao->objeto->setId($id);
        
        echo $dao->reestablecer();        
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


    public function rptCategorias() {
        $dao = new DaoIngresos();
        
        require_once './app/reportes/ingresosCategoria.php';
        
        $cat = $_REQUEST["cate"];

        $reporte = new Reporte();

       
       $dao->objeto->setCategoria($cat);

        $resultado = $dao->reporteIngresosPorCategorias();
        $resultado1 = $dao->reporteIngresosPorCategorias();
       
        $reporte->ingresosCategoria($resultado, $resultado1);
    }

    public function rptTorneos() {
        $dao = new DaoIngresos();
        
        require_once './app/reportes/ingresosTorneos.php';
        
        $id = $_REQUEST["torneos"];

        $reporte = new Reporte();

       
       $dao->objeto->setIdTorneo($id);

        $resultado = $dao->reporteIngresosPorTorneos ();
        $resultado1 = $dao->reporteIngresosPorTorneos();
       
        $reporte->ingresosTorneos($resultado, $resultado1);
    }


    public function registrarOtro(){
        $nombre = $_REQUEST["txtTitulo"];
        $cantidad = $_REQUEST["cantidad"];

        $dao = new DaoIngresos();
        $dao->objeto->setTitle($nombre);
        $dao->objeto->setCantidad($cantidad);
        $dao->objeto->setDescripcion("Ingreso de ".$nombre);
        $dao->objeto->setIdTorneo(0);
        $dao->objeto->setCategoria('Ninguna');
        echo $dao->guardarOtro();
    }


    public function quitarFondo(){
        $id = $_REQUEST["id"];
        $cantidad = $_REQUEST["cantidadF"];
        $nombre = $_REQUEST["nombre"];
        $apellido = $_REQUEST["apellido"];

        $dao = new DaoJugadores();
        $dao->objeto->setIdJugador($id);
       
        $daoI = new DaoIngresos();

        $daoI->objeto->setTitle("Pago de ".$nombre." ".$apellido." a Fondo Común");
        $daoI->objeto->setDescripcion("Ingreso de Fondo Común");
        $daoI->objeto->setCantidad($cantidad);
        $daoI->objeto->setIdTorneo(0);
        $daoI->objeto->setCategoria('Ninguna');

        echo $dao->quitarFondo();
        echo $daoI->guardarOtro();
    }

   


 }

?>   