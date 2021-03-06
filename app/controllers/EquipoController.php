

<?php

class EquipoController extends ControladorBase {

    public static function gestion()
    {
        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmb();

        $daoT = new DaoTorneos();
        $torneos = $daoT->cargarTorneosM();
        require_once './app/view/GestionExp/GestionEquipos.php';
    }


    public static function gestionM()
    {
        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmbM();

        $daoT = new DaoTorneos();
        $torneos = $daoT->cargarTorneosM();

        $daoE = new DaoEquipos();
        $equipos = $daoE->mostrarEquiposTraM();

        self::loadMain();
        require_once './app/view/GestionExp/GestionEquiposMasculinos.php';
    }


    public static function gestionF()
    {
        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmbF();

        $daoT = new DaoTorneos();
        $torneos = $daoT->cargarTorneosF();

        $daoE = new DaoEquipos();
        $equipos = $daoE->mostrarEquiposTraF();

        self::loadMain();

        require_once './app/view/GestionExp/GestionEquiposFemeninas.php';
    }

    public function inscribirEquipoM() {
        $idT = $_REQUEST["idT"];
        $idEquipo = $_REQUEST["idEquipo"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdTorneo($idT);
        $dao->objeto->setIdEquipo($idEquipo);

        

    

        echo $dao->inscribirM();

       
    }

public function registrarM() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoEquipos();

        $dao->objeto->setNombreEquipo($datos->nombreEquipo);
        $dao->objeto->setEncargado($datos->encargado);
        $dao->objeto->setTelefonoE($datos->telefonoE);
        $dao->objeto->setTelefonoAux($datos->telefonoAux);
        $dao->objeto->setEncargadoAux($datos->encargadoAux);
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


    public function traspaso() {
        $id = $_REQUEST["idJugador"];
        $idEquipo = $_REQUEST["idEquipo"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdJugador($id);
        $dao->objeto->setIdEquipo($idEquipo);

        echo $dao->traspaso();
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

        

        //$daoT = new DaoTorneos();
        //$daoT->objeto->setIdTorneo($idT);
        //echo $daoT->disponiblesF();

        echo $dao->inscribirF();
        
    }

public function registrarF() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoEquipos();

        $dao->objeto->setNombreEquipo($datos->nombreEquipo);
        $dao->objeto->setEncargado($datos->encargado);
        $dao->objeto->setTelefonoE($datos->telefonoE);
        $dao->objeto->setTelefonoAux($datos->telefonoAux);
        $dao->objeto->setEncargadoAux($datos->encargadoAux);
        $dao->objeto->setIdCategoria($datos->selectCategoria);


        echo $dao->registrarF();

    }

    public function eliminarF() {
       // $datos = ;

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($_REQUEST["id"]);

        echo $dao->eliminarF();
    }

    public function reestablecerE() {
        // $datos = ;
 
         $dao = new DaoEquipos();
 
         $dao->objeto->setIdEquipo($_REQUEST["id"]);
 
         echo $dao->reestablecerE();
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
        $idFondo = $dao->encargadosEquipo();
        
        $nomina = $dao->jugadoresEquipo();

        $nominaMayores = $dao->jugadoresEquipoMayores(); 

        

        $reporte->nomina($encargados,$nomina,$nombreEquipo,$torneo,$idFondo,$nominaMayores);
    }

    public function validarInscripcion(){
    //$id = ;
       // $idE = $_REQUEST["idE"];
        

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($_REQUEST["idJu"]);
       // $dao->objeto->setIdEquipo($idE);
       

        echo $dao->validarInscripcion();
    }

    public function cobrarEquipo(){
        $dao = new DaoEquipos();

        echo $dao->cobrarEquipo();
    }


    public function cobrar(){

        $id = $_REQUEST["idEquipoCobro"];
        $cantidad = $_REQUEST["cantidadCobroE"];
        $idT = $_REQUEST["idTorneoEq"];
        $cupos = $_REQUEST["cupos"];

        $nombreE = $_REQUEST["nombreEquipo"];
        $cat = $_REQUEST["categoriaEquipo"];

        $dao = new DaoEquipos();

        $dao->objeto->setIdEquipo($id);
        $dao->objeto->setCarnets($cupos);

        echo $dao->cobrarInscripcion();
        echo $dao->carnetsGratis();


        $daoI = new DaoIngresos();

        $daoI->objeto->setTitle("Inscripción de Equipo: ".$nombreE);
        $daoI->objeto->setDescripcion("Inscripción de Equipo");
        $daoI->objeto->setIdTorneo($idT);
        $daoI->objeto->setCategoria($cat);
        $daoI->objeto->setCantidad($cantidad);

        
        echo $daoI->guardarOtro();

        $daoT = new DaoTorneos();
       $daoT->objeto->setIdTorneo($idT);
       echo $daoT->disponiblesM();
    }

    public function historial(){
        $idT = $_REQUEST["idTorneo"];
        $equipo = $_REQUEST["nombre"];

        $dao = new DaoEquipos();

        $dao->objeto->setNombreEquipo($equipo);
        $dao->objeto->setIdTorneo($idT);

        require_once './app/reportes/historial.php';
        $reporte = new Reporte();

        $resultado = $dao->historial();
        $resultado1 = $dao->historial();

        $reporte->historial($resultado,$resultado1,$equipo);
    }

   

}

?>