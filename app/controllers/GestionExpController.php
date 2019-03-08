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
        // var_dump($_REQUEST);
        $nombre = $_REQUEST["nombreJ"];
        $apellido = $_REQUEST["apellidoJ"];
        $dui = $_REQUEST["dui"];
        $fechaNac = $_REQUEST["fechaNac"];
        $equipo = $_REQUEST["equipo"];
        $categoria = $_REQUEST["categoria"];
        $img= $_REQUEST["img"];

        // $foto = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
        

        $dao = new DaoJugadores();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        // $dao->objeto->setFoto($foto);
        $dao->objeto->setDui($dui);
        $dao->objeto->setFechaNacimiento($fechaNac);
        $dao->objeto->setIdEquipo($equipo);
        $dao->objeto->setIdCategoria($categoria);
        $dao->objeto->setImg($img);


        echo $dao->registrarJugador();

    }

}


?>