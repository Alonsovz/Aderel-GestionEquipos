
<?php

class CategoriaController extends ControladorBase {

    public static function gestion()
    {
        
        require_once './app/view/GestionExp/GestionCategorias.php';
    }

public function registrarC() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoCategorias();

        $dao->objeto->setNombreCategoria($datos->nombreCategoria);
        $dao->objeto->setEdadMaxima($datos->edadMaxima);
        $dao->objeto->setEdadMinima($datos->edadMinima);


        echo $dao->registrar();

    }


    public function eliminar() {
        $datos = $_REQUEST["id"];

        $dao = new DaoCategorias();

        $dao->objeto->setIdCategoria($datos);

        echo $dao->eliminar();
    }

    public function cargarDatosCategoria() {
        $id = $_REQUEST["id"];

        $dao = new DaoCategorias();

        $dao->objeto->setIdCategoria($id);

        echo $dao->cargarDatosCategoria();
    }

    public function editar() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoCategorias();

        $dao->objeto->setNombreCategoria($datos->nombreCategoria);
        $dao->objeto->setEdadMaxima($datos->edadMaxima);
        $dao->objeto->setEdadMinima($datos->edadMinima);
        $dao->objeto->setIdCategoria($datos->idDetalleC);

        echo $dao->editar();
    }


}

?>