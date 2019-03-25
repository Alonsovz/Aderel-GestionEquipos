<?php

class EscFutbolController extends ControladorBase {

    public static function primer()
    {
        self::loadMain();
        require_once './app/view/GestionEscFut/primer.php';
    }

    public static function segundo()
    {
        self::loadMain();
        require_once './app/view/GestionEscFut/segundo.php';
    }

    public static function tercer()
    {
        self::loadMain();
        require_once './app/view/GestionEscFut/tercer.php';
    }

    public static function cuarto()
    {
        self::loadMain();
        require_once './app/view/GestionEscFut/cuarto.php';
    }

    public static function quinto()
    {
        self::loadMain();
        require_once './app/view/GestionEscFut/quinto.php';
    }

    public static function sexto()
    {
        self::loadMain();
        require_once './app/view/GestionEscFut/sexto.php';
    }

    public function mostrarPrimer() {
        $dao = new DaoEscuela();

        echo $dao->mostrarPrimer();
    }

    public function mostrarSegundo() {
        $dao = new DaoEscuela();

        echo $dao->mostrarSegundo();
    }

    public function mostrarTercero() {
        $dao = new DaoEscuela();

        echo $dao->mostrarTercero();
    }

    public function mostrarCuarto() {
        $dao = new DaoEscuela();

        echo $dao->mostrarCuarto();
    }

    public function mostrarQuinto() {
        $dao = new DaoEscuela();

        echo $dao->mostrarQuinto();
    }

    public function mostrarSexto() {
        $dao = new DaoEscuela();

        echo $dao->mostrarSexto();
    }

    public function guardarPrimer(){
        $nombre = $_REQUEST["nombreJ"];
        $apellido = $_REQUEST["apellidoJ"];
        $fechaNac = $_REQUEST["fechaNac"];
        $edad= $_REQUEST["edad"];
        $carnet = $_REQUEST["carnet"];
        $encargado = $_REQUEST["encargado"];
        $dui = $_REQUEST["duiJ"];
        $telefono = $_REQUEST["telefono"];

        

        $dao = new DaoEscuela();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setEdad($edad);
        $dao->objeto->setFechaNacimiento($fechaNac);
        $dao->objeto->setCarnet($carnet);
        $dao->objeto->setEncargado($encargado);
        $dao->objeto->setTelefono($telefono);
        $dao->objeto->setDui($dui);


        echo $dao->registrarPrimer();
    }

    public function guardarSegundo(){
        $nombre = $_REQUEST["nombreJ"];
        $apellido = $_REQUEST["apellidoJ"];
        $fechaNac = $_REQUEST["fechaNac"];
        $edad= $_REQUEST["edad"];
        $carnet = $_REQUEST["carnet"];
        $encargado = $_REQUEST["encargado"];
        $dui = $_REQUEST["duiJ"];
        $telefono = $_REQUEST["telefono"];

        

        $dao = new DaoEscuela();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setEdad($edad);
        $dao->objeto->setFechaNacimiento($fechaNac);
        $dao->objeto->setCarnet($carnet);
        $dao->objeto->setEncargado($encargado);
        $dao->objeto->setTelefono($telefono);
        $dao->objeto->setDui($dui);


        echo $dao->registrarSegundo();
    }

    public function guardarTercero(){
        $nombre = $_REQUEST["nombreJ"];
        $apellido = $_REQUEST["apellidoJ"];
        $fechaNac = $_REQUEST["fechaNac"];
        $edad= $_REQUEST["edad"];
        $carnet = $_REQUEST["carnet"];
        $encargado = $_REQUEST["encargado"];
        $dui = $_REQUEST["duiJ"];
        $telefono = $_REQUEST["telefono"];

        

        $dao = new DaoEscuela();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setEdad($edad);
        $dao->objeto->setFechaNacimiento($fechaNac);
        $dao->objeto->setCarnet($carnet);
        $dao->objeto->setEncargado($encargado);
        $dao->objeto->setTelefono($telefono);
        $dao->objeto->setDui($dui);


        echo $dao->registrarTercero();
    }

    public function guardarCuarto(){
        $nombre = $_REQUEST["nombreJ"];
        $apellido = $_REQUEST["apellidoJ"];
        $fechaNac = $_REQUEST["fechaNac"];
        $edad= $_REQUEST["edad"];
        $carnet = $_REQUEST["carnet"];
        $encargado = $_REQUEST["encargado"];
        $dui = $_REQUEST["duiJ"];
        $telefono = $_REQUEST["telefono"];

        

        $dao = new DaoEscuela();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setEdad($edad);
        $dao->objeto->setFechaNacimiento($fechaNac);
        $dao->objeto->setCarnet($carnet);
        $dao->objeto->setEncargado($encargado);
        $dao->objeto->setTelefono($telefono);
        $dao->objeto->setDui($dui);


        echo $dao->registrarCuarto();
    }

    public function guardarQuinto(){
        $nombre = $_REQUEST["nombreJ"];
        $apellido = $_REQUEST["apellidoJ"];
        $fechaNac = $_REQUEST["fechaNac"];
        $edad= $_REQUEST["edad"];
        $carnet = $_REQUEST["carnet"];
        $encargado = $_REQUEST["encargado"];
        $dui = $_REQUEST["duiJ"];
        $telefono = $_REQUEST["telefono"];

        

        $dao = new DaoEscuela();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setEdad($edad);
        $dao->objeto->setFechaNacimiento($fechaNac);
        $dao->objeto->setCarnet($carnet);
        $dao->objeto->setEncargado($encargado);
        $dao->objeto->setTelefono($telefono);
        $dao->objeto->setDui($dui);


        echo $dao->registrarQuinto();
    }

    public function guardarSexto(){
        $nombre = $_REQUEST["nombreJ"];
        $apellido = $_REQUEST["apellidoJ"];
        $fechaNac = $_REQUEST["fechaNac"];
        $edad= $_REQUEST["edad"];
        $carnet = $_REQUEST["carnet"];
        $encargado = $_REQUEST["encargado"];
        $dui = $_REQUEST["duiJ"];
        $telefono = $_REQUEST["telefono"];

        

        $dao = new DaoEscuela();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setEdad($edad);
        $dao->objeto->setFechaNacimiento($fechaNac);
        $dao->objeto->setCarnet($carnet);
        $dao->objeto->setEncargado($encargado);
        $dao->objeto->setTelefono($telefono);
        $dao->objeto->setDui($dui);


        echo $dao->registrarSexto();
    }


    public function cargarDatosPrimerN() {
        $id = $_REQUEST["id"];

        $dao = new DaoEscuela();

        $dao->objeto->setIdJugador($id);

        echo $dao->cargarDatosPrimerN();
    }

    public function editarPrimerN(){  

        $dao = new DaoEscuela();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setApellido($_REQUEST["apellido"]);
        $dao->objeto->setEdad($_REQUEST["edad"]);
        $dao->objeto->setFechaNacimiento($_REQUEST["fechaNac"]);
        $dao->objeto->setCarnet($_REQUEST["carnet"]);
        $dao->objeto->setEncargado($_REQUEST["encargado"]);
        $dao->objeto->setTelefono($_REQUEST["telefono"]);
        $dao->objeto->setDui($_REQUEST["dui"]);
        $dao->objeto->setIdJugador($_REQUEST['idDetalleC']);

        echo $dao->editarPrimerN();

    }

    public function eliminarPrimerN() {
        $datos = $_REQUEST["id"];

        $dao = new DaoEscuela();

        $dao->objeto->setIdJugador($datos);

        echo $dao->eliminarPrimerN();
    }


    public function moverPrimerN() {
        $datos = $_REQUEST["id"];

        $dao = new DaoEscuela();

        $dao->objeto->setIdJugador($datos);

        echo $dao->moverPrimerN();
    }


    public function ficha() {
        $dao = new DaoEscuela();
        
        require_once './app/reportes/fichaEscuela.php';
        
       // $idA= $_REQUEST["area"];
        $id = $_REQUEST["id"];

        $reporte = new Reporte();

        //$dao->objeto->setCodigoArea($idA);
        $dao->objeto->setIdJugador($id);
        $resultado = $dao->ficha();
        $resultado1 = $dao->ficha();

        $reporte->fichaEscuela($id, $resultado, $resultado1);
    }


}


?>