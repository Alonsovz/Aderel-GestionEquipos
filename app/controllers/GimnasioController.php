
<?php

class GimnasioController extends ControladorBase {

    public static function gestion()
    {
        self::loadMain();
        require_once './app/view/GestionGimnasio/GestionGimnasio.php';
    }

    public function mostrarGimnasio() {
        $dao = new DaoGimnasio();

        echo $dao->mostrarGimnasio();
    }

    public function registrar() {

        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);
        
        $dao = new DaoGimnasio();

        $dao->objeto->setNombre($datos->nombre);
        $dao->objeto->setApellido($datos->apellido);
        $dao->objeto->setEdad($datos->edad);
        $dao->objeto->setDui($datos->dui);
        $dao->objeto->setFechaNacimiento($datos->fechaNac);


        echo $dao->registrarGim();

    }

    public function editar(){

        
        
        $dao = new DaoGimnasio();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setApellido($_REQUEST["apellido"]);
        $dao->objeto->setEdad($_REQUEST["edad"]);
        $dao->objeto->setDui($_REQUEST["dui"]);
        $dao->objeto->setFechaNacimiento($_REQUEST["fechaNac"]);
        $dao->objeto->setIdUsuario($_REQUEST["idDetalle"]);


        echo $dao->editar();

    }

    public function getDui()
    {
        $dao=new DaoGimnasio();
        $dui=$_REQUEST["dui"];
        $dao->objeto->setDui($dui);

        echo $dao->getDdi();
    }


    public function eliminar() {
 
         $dao = new DaoGimnasio();
 
         $dao->objeto->setIdUsuario($_REQUEST["id"]);
 
         echo $dao->eliminar();
     }

     public function reinscribir() {
 
        $dao = new DaoGimnasio();

        $dao->objeto->setIdUsuario($_REQUEST["id"]);

        echo $dao->reinscribir();
    }

     public function cargarDatosGimnasio() {
        $id = $_REQUEST["id"];

        $dao = new DaoGimnasio();

        $dao->objeto->setIdUsuario($id);

        echo $dao->cargarDatosGimnasio();
    }


    



    


}

?>