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

    public function registrar() {

        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);
        
        $dao = new DaoNatacion();

        $dao->objeto->setNombre($datos->nombre);
        $dao->objeto->setApellido($datos->apellido);
        $dao->objeto->setEdad($datos->edad);
        $dao->objeto->setDui($datos->dui);
        $dao->objeto->setFechaNacimiento($datos->fechaNac);
        if($datos->edad < 18){
            $dao->objeto->setEncargado($datos->encargado);
            $dao->objeto->setDuiEncargado($datos->duiEncargado);

        }else{
        $dao->objeto->setEncargado('');
        $dao->objeto->setDuiEncargado('');

        }
        echo $dao->registrar();
    }

    public function eliminar() {
 
        $dao = new DaoNatacion();

        $dao->objeto->setIdUsuario($_REQUEST["id"]);

        echo $dao->eliminar();
    }

    public function reinscribir() {
 
        $dao = new DaoNatacion();

        $dao->objeto->setIdUsuario($_REQUEST["id"]);

        echo $dao->reinscribir();
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
 

}


?>