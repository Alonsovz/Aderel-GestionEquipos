

<?php

class EquipoController extends ControladorBase {

    public static function gestion()
    {
        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmb();

        $daoT = new DaoTorneos();
        $torneos = $daoT->cargarTorneos();
        require_once './app/view/GestionExp/GestionEquipos.php';
    }

    public function inscribirEquipo() {
        $idT = $_REQUEST["idT"];
        $idEquipo = $_REQUEST["idEquipo"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdTorneo($idT);
        $dao->objeto->setIdEquipo($idEquipo);

        

        $daoT = new DaoTorneos();
        $daoT->objeto->setIdTorneo($idT);

        echo $dao->inscribir();
        echo $daoT->disponibles();
    }

public function registrar() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoEquipos();

        $dao->objeto->setNombreEquipo($datos->nombreEquipo);
        $dao->objeto->setEncargado($datos->encargado);
        $dao->objeto->setIdCategoria($datos->selectCategoria);


        echo $dao->registrar();

    }

    public function eliminar() {
        $datos = $_REQUEST["id"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($datos);

        echo $dao->eliminar();
    }

    public function cargarDatosEquipo() {
        $id = $_REQUEST["id"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($id);

        echo $dao->cargarDatosEquipo();
    }

    public function cargarEquiposIns() {
        $id = $_REQUEST["id"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($id);

        echo $dao->cargarDatosEquipoIns();
    }

    public function cargarTorneos() {
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdCategoria($id);

        echo $dao->cargarTorneos();
    }

    public function editar() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoEquipos();

        $dao->objeto->setNombreEquipo($datos->nombre);
        $dao->objeto->setEncargado($datos->encargado);
        $dao->objeto->setIdCategoria($datos->selectCategoria);
        $dao->objeto->setIdEquipo($datos->idDetalleE);

        echo $dao->editar();
    }


}

?>