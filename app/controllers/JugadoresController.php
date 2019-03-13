<?php

class JugadoresController extends ControladorBase {


    public static function gestion()
    {
        
        $daoU = new DaoEquipos();
        $equiposCMB = $daoU->mostrarEquiposCmb();

        $equipoCMB = $daoU->mostrarEquipoCmb();

        require_once './app/view/GestionExp/GestionJugadores.php';
    }

    public function eliminar() {
        $datos = $_REQUEST["id"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($datos);

        echo $dao->eliminar();
    }


    public function guardarJugador() {
        // var_dump($_REQUEST);
        $nombre = $_REQUEST["nombreJ"];
        $apellido = $_REQUEST["apellidoJ"];
        $dui = $_REQUEST["dui"];
        $fechaNac = $_REQUEST["fechaNac"];
        $equipo = $_REQUEST["equipo"];
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
        $dao->objeto->setIdEquipo($equipo);
       // $dao->objeto->setIdCategoria($categoria);
        $dao->objeto->setImg($img);


        echo $dao->registrarJugador();

    }

    public function cargarDatosJugadores() {
        $id = $_REQUEST["id"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($id);

        echo $dao->cargarDatosJugador();
    }

    public function editar() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoJugadores();

        $dao->objeto->setNombre($datos->nombre);
        $dao->objeto->setApellido($datos->apellido);
        $dao->objeto->setDui($datos->dui);
        $dao->objeto->setFechaNacimiento($datos->fechaNacimiento);
        $dao->objeto->setEdad($datos->edad);
        $dao->objeto->setIdEquipo($datos->equipo);
        $dao->objeto->setImg($datos->imagenNueva);
        $dao->objeto->setIdJugador($datos->idDetalleE);

        echo $dao->editar();
    }

}


?>