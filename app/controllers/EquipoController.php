

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


    public static function gestionM()
    {
        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmbM();

        $daoT = new DaoTorneos();
        $torneos = $daoT->cargarTorneosM();

        self::loadMain();
        require_once './app/view/GestionExp/GestionEquiposMasculinos.php';
    }


    public static function gestionF()
    {
        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmbF();

        $daoT = new DaoTorneos();
        $torneos = $daoT->cargarTorneosF();

        self::loadMain();

        require_once './app/view/GestionExp/GestionEquiposFemeninas.php';
    }

    public function inscribirEquipoM() {
        $idT = $_REQUEST["idT"];
        $idEquipo = $_REQUEST["idEquipo"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdTorneo($idT);
        $dao->objeto->setIdEquipo($idEquipo);

        

        $daoT = new DaoTorneos();
        $daoT->objeto->setIdTorneo($idT);

        echo $dao->inscribirM();
        echo $daoT->disponiblesM();
    }

public function registrarM() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoEquipos();

        $dao->objeto->setNombreEquipo($datos->nombreEquipo);
        $dao->objeto->setEncargado($datos->encargado);
        $dao->objeto->setTelefonoE($datos->telefonoE);
        $dao->objeto->setTelefonoAux($datos->telefonoAux);
        $dao->objeto->setEncargadoAux($datos->encargado);
        $dao->objeto->setIdCategoria($datos->selectCategoria);


        echo $dao->registrarM();

    }

    public function eliminarM() {
       // $datos = ;

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($_REQUEST["id"]);

        echo $dao->eliminarM();
    }

    public function enviarFondo() {
        // $datos = ;
 
         $dao = new DaoEquipos();
 
         $dao->objeto->setIdEquipo($_REQUEST["id"]);
 
         echo $dao->enviarFondo();
         echo $dao->enviarFondoEquipo();
     }

    public function cargarDatosEquipoM() {
        $id = $_REQUEST["id"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($id);

        echo $dao->cargarDatosEquipoM();
    }

    public function cargarEquiposInsM() {
        $id = $_REQUEST["id"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($id);

        echo $dao->cargarDatosEquipoInsM();
    }

    public function cargarTorneosM() {
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdCategoria($id);

        echo $dao->cargarTorneosM();
    }

    public function editarM() {
      //  $datos = $_REQUEST["datos"];

       // $datos = json_decode($datos);

        $dao = new DaoEquipos();

        $dao->objeto->setNombreEquipo($_REQUEST["nombre"]);
        $dao->objeto->setEncargado($_REQUEST["encargado"]);
        $dao->objeto->setEncargadoAux($_REQUEST["encargadoAux"]);
        $dao->objeto->setTelefonoE($_REQUEST["telefonoE"]);
        $dao->objeto->setTelefonoAux($_REQUEST["telefonoAux"]);
        $dao->objeto->setIdCategoria($_REQUEST["selectCategoria"]);
        $dao->objeto->setIdEquipo($_REQUEST["idDetalleE"]);

        echo $dao->editarM();
    }




    public function inscribirEquipoF() {
        $idT = $_REQUEST["idT"];
        $idEquipo = $_REQUEST["idEquipo"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdTorneo($idT);
        $dao->objeto->setIdEquipo($idEquipo);

        

        $daoT = new DaoTorneos();
        $daoT->objeto->setIdTorneo($idT);

        echo $dao->inscribirF();
        echo $daoT->disponiblesF();
    }

public function registrarF() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoEquipos();

        $dao->objeto->setNombreEquipo($datos->nombreEquipo);
        $dao->objeto->setEncargado($datos->encargado);
        $dao->objeto->setTelefonoE($datos->telefonoE);
        $dao->objeto->setTelefonoAux($datos->telefonoAux);
        $dao->objeto->setEncargadoAux($datos->encargado);
        $dao->objeto->setIdCategoria($datos->selectCategoria);


        echo $dao->registrarF();

    }

    public function eliminarF() {
       // $datos = ;

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($_REQUEST["id"]);

        echo $dao->eliminarF();
    }

    public function cargarDatosEquipoF() {
        $id = $_REQUEST["id"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($id);

        echo $dao->cargarDatosEquipoF();
    }

    public function cargarEquiposInsF() {
        $id = $_REQUEST["id"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($id);

        echo $dao->cargarDatosEquipoInsF();
    }

    public function cargarTorneosF() {
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdCategoria($id);

        echo $dao->cargarTorneosF();
    }

    public function editarF() {
      //  $datos = $_REQUEST["datos"];

       // $datos = json_decode($datos);

        $dao = new DaoEquipos();

        $dao->objeto->setNombreEquipo($_REQUEST["nombre"]);
        $dao->objeto->setEncargado($_REQUEST["encargado"]);
        $dao->objeto->setEncargadoAux($_REQUEST["encargadoAux"]);
        $dao->objeto->setTelefonoE($_REQUEST["telefonoE"]);
        $dao->objeto->setTelefonoAux($_REQUEST["telefonoAux"]);;
        $dao->objeto->setIdCategoria($_REQUEST["selectCategoria"]);
        $dao->objeto->setIdEquipo($_REQUEST["idDetalleE"]);

        echo $dao->editarF();
    }

    public function mostrarJugadoresInsM(){
        $id = $_REQUEST["id"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($id);

        $resultado =$dao->mostrarJugadoresInsM();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function mostrarJugadoresInsF(){
        $id = $_REQUEST["id"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($id);

        $resultado =$dao->mostrarJugadoresInsM();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function nomina() {
        $dao = new DaoEquipos();
        
        require_once './app/reportes/nomina.php';
        
       // $idA= $_REQUEST["area"];
        $id = $_REQUEST["id"];

        $reporte = new Reporte();

        //$dao->objeto->setCodigoArea($idA);
        $dao->objeto->setIdEquipo($id);

        $encargados = $dao->encargadosEquipo();
        $nombreEquipo = $dao->encargadosEquipo();
        $torneo = $dao->encargadosEquipo();
        
        $nomina = $dao->jugadoresEquipo();
        

        $reporte->nomina($encargados,$nomina,$nombreEquipo,$torneo );
    }

    public function validarInscripcion(){
    //$id = ;
       // $idE = $_REQUEST["idE"];
        

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($_REQUEST["idJu"]);
       // $dao->objeto->setIdEquipo($idE);
       

        echo $dao->validarInscripcion();
    }

   

}

?>