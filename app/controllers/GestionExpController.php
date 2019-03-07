<?php

class GestionExpController extends ControladorBase {

    public static function gestion()
    {
        self::loadMain();
        require_once './app/view/GestionExp/GestionExpediente.php';
    }

    public function mostrarEquipos() {
        $dao = new DaoEquipos();

        echo $dao->mostrarEquipos();
    }

    public function mostrarCategorias() {
        $dao = new DaoCategorias();

        echo $dao->mostrarCategorias();
    }

    public function mostrarJugadores() {
        $dao = new DaoJugadores();

        echo $dao->mostrarJugadores();
    }

    public function guardarJugador() {
        $nombre = $_REQUEST["nombre"];
        $apellido = $_REQUEST["apellido"];
        $foto = $_REQUEST["foto"];
        $dui = $_REQUEST["dui"];
        $fechaNac = $_REQUEST["fecha"];
        $equipo = $_REQUEST["equipo"];
        $categoria = $_REQUEST["categoria"];

        $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
        

        $dao = new DaoJugadores();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setFoto($foto);
        $dao->objeto->setDui($dui);
        $dao->objeto->setFechaNacimiento($fechaNac);
        $dao->objeto->setIdEquipo($equipo);
        $dao->objeto->setIdCategoria($categoria);


        echo $dao->registrarJugador();

    }

}


?>