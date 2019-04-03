<?php

class NatacionController extends ControladorBase {

    public static function gestion()
    {
        self::loadMain();
        require_once './app/view/GestionEscuelaNa/GestionEscuelaNa.php';
    }


    public function mostrarNatacion() {
        $dao = new DaoNatacion();

        echo $dao->mostrarNatacion();
    }

    public function mostrarNatacionPagos() {
        $dao = new DaoNatacion();

        echo $dao->mostrarNatacionPagos();
    }

    public function registrar() {

        $nombre = $_REQUEST["nombreJ"];
        $apellido = $_REQUEST["apellidoJ"];
        $dui = $_REQUEST["duiJ"];
        $fechaNac = $_REQUEST["fechaNac"];
        $img= $_REQUEST["img"];
        $edad= $_REQUEST["edad"];
        $encargado =$_REQUEST["encargado"];
        $duiE = $_REQUEST["duiE"];
        $telefono = $_REQUEST["telefono"];


        $dao = new DaoNatacion();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setDui($dui);
        $dao->objeto->setFechaNacimiento($fechaNac);
        $dao->objeto->setImg($img);

        if($edad < 18){
            $dao->objeto->setEncargado($encargado);
            $dao->objeto->setDuiEncargado($duiE);
            $dao->objeto->setTelefono($telefono);
        }else{
        $dao->objeto->setEncargado('');
        $dao->objeto->setDuiEncargado('');
        $dao->objeto->setTelefono('');
        }
        echo $dao->registrar();
    }

    public function eliminar() {
 
        $dao = new DaoNatacion();

        $dao->objeto->setIdUsuario($_REQUEST["id"]);

        echo $dao->eliminar();
    }



    public function cargarDatosNatacion() {
        $id = $_REQUEST["id"];

        $dao = new DaoNatacion();

        $dao->objeto->setIdUsuario($id);

        echo $dao->cargarDatosNatacion();
    }

    public function editar(){

        
        
        $dao = new DaoNatacion();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setApellido($_REQUEST["apellido"]);
        $dao->objeto->setEdad($_REQUEST["edad"]);
        $dao->objeto->setImg($_REQUEST['imagenNueva']);
        if($_REQUEST["edad"] < 18){
            $dao->objeto->setEncargado($_REQUEST["encargado"]);
            $dao->objeto->setDuiEncargado($_REQUEST["duiEncargado"]);
            $dao->objeto->setTelefono($_REQUEST["telefono"]);

        }else{
        $dao->objeto->setEncargado('');
        $dao->objeto->setDuiEncargado('');
        $dao->objeto->setTelefono('');

        }
        $dao->objeto->setDui($_REQUEST["dui"]);
        $dao->objeto->setFechaNacimiento($_REQUEST["fechaNac"]);
        $dao->objeto->setIdUsuario($_REQUEST["idDetalle"]);


        echo $dao->editar();

    }

    public function fichaN() {
        $dao = new DaoNatacion();
        
        require_once './app/reportes/escuelaNatacion.php';
        
       // $idA= $_REQUEST["area"];
        $id = $_REQUEST["id"];

        $reporte = new Reporte();

        //$dao->objeto->setCodigoArea($idA);
        $dao->objeto->setIdUsuario($id);
        $resultado = $dao->fichaN();
        $resultado1 = $dao->fichaN();

        $reporte->escuelaNatacion($id, $resultado, $resultado1);
    }


    public function reinscribir() {
 
        $dao = new DaoNatacion();

        $dao->objeto->setIdUsuario($_REQUEST["id"]);

        echo $dao->reinscribir();
        echo $dao->primerPago();
        echo $dao->segundoPago();
        echo $dao->tercerPago();
        echo $dao->cuartoPago();
        echo $dao->quintoPago();
        echo $dao->sextoPago();
        echo $dao->septimoPago();
        echo $dao->octavoPago();
        echo $dao->novenoPago();
        echo $dao->decimoPago();
        echo $dao->oncePago();
        echo $dao->docePago();
    }

    public function pagos(){
        $id = $_REQUEST["id"];

        $dao = new DaoNatacion();

        $dao->objeto->setIdUsuario($id);

        $resultado =$dao->pagos();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function cobrar(){
        $id = $_REQUEST["idCobroN"];
        $cantidad = $_REQUEST["cantidadN"];

        $dao = new DaoNatacion();

        $dao->objeto->setIdPago($id);

        echo $dao->cobrar();

        $daoI = new DaoIngresos();

        $daoI->objeto->setTitle("Escuela de Natación");
        $daoI->objeto->setCantidad($cantidad);

        
        echo $daoI->guardarOtro();

    }


    public function exonerar(){
        $id = $_REQUEST["idCobroNa"];
        //$cantidad = $_REQUEST["cantidadN"];

        $dao = new DaoNatacion();

        $dao->objeto->setIdPago($id);

        echo $dao->exonerar();

    

    }
 

}


?>