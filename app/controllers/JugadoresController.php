<?php

class JugadoresController extends ControladorBase {


    public static function gestion()
    {
        require_once './app/view/GestionExp/GestionJugadores.php';
    }

    public static function gestionM(){

        $daoU = new DaoEquipos();
        $equiposCMB = $daoU->mostrarEquiposCmbM();

        $equipoCMB = $daoU->mostrarEquipoCmbM();

        require_once './app/view/GestionExp/GestionJugadoresMasculinos.php';

    }


    public static function gestionF(){

        $daoU = new DaoEquipos();
        $equiposCMB = $daoU->mostrarEquiposCmbF();

        $equipoCMB = $daoU->mostrarEquipoCmbF();

        require_once './app/view/GestionExp/GestionJugadoresFemeninas.php';

    }

    public function eliminarF() {
        $datos = $_REQUEST["id"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($datos);

        echo $dao->eliminarF();
    }

    public function inscribirJugadorF() {
        $idJ = $_REQUEST["idJ"];
        $idEquipo = $_REQUEST["idEquipo"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($idJ);
        $dao->objeto->setIdEquipo($idEquipo);

        echo $dao->inscribirF();
    }


    public function guardarJugadorF() {
        // var_dump($_REQUEST);
        $nombre = $_REQUEST["nombreJ"];
        $apellido = $_REQUEST["apellidoJ"];
        $dui = $_REQUEST["duiJ"];
        $fechaNac = $_REQUEST["fechaNac"];
       // $equipo = $_REQUEST["equipo"];
       // $categoria = $_REQUEST["categoria"];
        $img= $_REQUEST["img"];
        $edad= $_REQUEST["edad"];

        // $foto = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
        

        $dao = new DaoJugadores();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setEdad($edad);
        $dao->objeto->setDui($dui);
        $dao->objeto->setFechaNacimiento($fechaNac);
        //$dao->objeto->setIdEquipo($equipo);
       // $dao->objeto->setIdCategoria($categoria);
        $dao->objeto->setImg($img);


        echo $dao->registrarJugadorF();

    }

    public function cargarDatosJugadoresF() {
        $id = $_REQUEST["id"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($id);

        echo $dao->cargarDatosJugadorF();
    }

    public function editarF() {

        // $datos = json_decode($datos);

        $dao = new DaoJugadores();

        $dao->objeto->setNombre($_REQUEST['nombre']);
        $dao->objeto->setApellido($_REQUEST['apellido']);
        $dao->objeto->setDui($_REQUEST['dui']);
        $dao->objeto->setFechaNacimiento($_REQUEST['fechaNacimiento']);
        $dao->objeto->setEdad($_REQUEST['edad']);
        //$dao->objeto->setIdEquipo($_REQUEST['equipo']);
        $dao->objeto->setImg($_REQUEST['imagenNueva']);
        $dao->objeto->setIdJugador($_REQUEST['idDetalleE']);

        echo $dao->editarF();
    }


    public function eliminarM() {
        $datos = $_REQUEST["id"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($datos);

        echo $dao->eliminarM();
    }

    public function inscribirJugadorM() {
        $idJ = $_REQUEST["idJ"];
        $idEquipo = $_REQUEST["idEquipo"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($idJ);
        $dao->objeto->setIdEquipo($idEquipo);

        echo $dao->inscribirM();
    }


    public function guardarJugadorM() {
        // var_dump($_REQUEST);
        $nombre = $_REQUEST["nombreJ"];
        $apellido = $_REQUEST["apellidoJ"];
        $dui = $_REQUEST["duiJ"];
        $fechaNac = $_REQUEST["fechaNac"];
       // $equipo = $_REQUEST["equipo"];
       // $categoria = $_REQUEST["categoria"];
        $img= $_REQUEST["img"];
        $edad= $_REQUEST["edad"];

        // $foto = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
        

        $dao = new DaoJugadores();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setEdad($edad);
        $dao->objeto->setDui($dui);
        $dao->objeto->setFechaNacimiento($fechaNac);
        //$dao->objeto->setIdEquipo($equipo);
       // $dao->objeto->setIdCategoria($categoria);
        $dao->objeto->setImg($img);


        echo $dao->registrarJugadorM();

    }

    public function cargarDatosJugadoresM() {
        $id = $_REQUEST["id"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($id);

        echo $dao->cargarDatosJugadorM();
    }

    public function editarM() {

        // $datos = json_decode($datos);

        $dao = new DaoJugadores();

        $dao->objeto->setNombre($_REQUEST['nombre']);
        $dao->objeto->setApellido($_REQUEST['apellido']);
        $dao->objeto->setDui($_REQUEST['dui']);
        $dao->objeto->setFechaNacimiento($_REQUEST['fechaNacimiento']);
        $dao->objeto->setEdad($_REQUEST['edad']);
        //$dao->objeto->setIdEquipo($_REQUEST['equipo']);
        $dao->objeto->setImg($_REQUEST['imagenNueva']);
        $dao->objeto->setIdJugador($_REQUEST['idDetalleE']);

        echo $dao->editarM();
    }

}


?>