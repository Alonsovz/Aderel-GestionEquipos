
<?php

class CategoriaController extends ControladorBase {

    public static function gestion()
    {
        
        require_once './app/view/GestionExp/GestionCategorias.php';
    }


    public static function gestionM()
    {
        self::loadMain();
        require_once './app/view/GestionExp/GestionCategoriasMasculinas.php';
    }


    public static function gestionF()
    {
        self::loadMain();
        require_once './app/view/GestionExp/GestionCategoriasFemeninas.php';
    }

public function registrarCM() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoCategorias();

        $dao->objeto->setNombreCategoria($datos->nombreCategoria);
        //$dao->objeto->setEdadMaxima($datos->edadMaxima);
        $dao->objeto->setEdadMinima($datos->edadMinima);


        echo $dao->registrarM();

    }

    public function registrarCF() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoCategorias();

        $dao->objeto->setNombreCategoria($datos->nombreCategoria);
        //$dao->objeto->setEdadMaxima($datos->edadMaxima);
        $dao->objeto->setEdadMinima($datos->edadMinima);


        echo $dao->registrarF();

    }


    public function eliminarM() {
        $datos = $_REQUEST["id"];

        $dao = new DaoCategorias();

        $dao->objeto->setIdCategoria($datos);

        echo $dao->eliminarM();
    }

    public function cargarDatosCategoriaM() {
        $id = $_REQUEST["id"];

        $dao = new DaoCategorias();

        $dao->objeto->setIdCategoria($id);

        echo $dao->cargarDatosCategoriaM();
    }

    public function editarM() {
       // $datos = $_REQUEST["datos"];

       // $datos = json_decode($datos);

        $dao = new DaoCategorias();

        $dao->objeto->setNombreCategoria($_REQUEST["nombreCategoria"]);
       // $dao->objeto->setEdadMaxima($_REQUEST["edadMaxima"]);
        $dao->objeto->setEdadMinima($_REQUEST["edadMinima"]);
        $dao->objeto->setIdCategoria($_REQUEST["idDetalleC"]);

        echo $dao->editarM();
    }


    public function eliminarF() {
        $datos = $_REQUEST["id"];

        $dao = new DaoCategorias();

        $dao->objeto->setIdCategoria($datos);

        echo $dao->eliminarF();
    }

    public function cargarDatosCategoriaF() {
        $id = $_REQUEST["id"];

        $dao = new DaoCategorias();

        $dao->objeto->setIdCategoria($id);

        echo $dao->cargarDatosCategoriaF();
    }

    public function mostrarTorneosCM() {
        $id = $_REQUEST["id"];

        $dao = new DaoCategorias();

        $dao->objeto->setIdCategoria($id);

        $resultado =$dao->mostrarTorneosCM();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function mostrarTorneosCF() {
        $id = $_REQUEST["id"];

        $dao = new DaoCategorias();

        $dao->objeto->setIdCategoria($id);

        $resultado =$dao->mostrarTorneosCF();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function editarF() {
       // $datos = $_REQUEST["datos"];

       // $datos = json_decode($datos);

        $dao = new DaoCategorias();

        $dao->objeto->setNombreCategoria($_REQUEST["nombreCategoria"]);
       // $dao->objeto->setEdadMaxima($_REQUEST["edadMaxima"]);
        $dao->objeto->setEdadMinima($_REQUEST["edadMinima"]);
        $dao->objeto->setIdCategoria($_REQUEST["idDetalleC"]);

        echo $dao->editarF();
    }


}

?>