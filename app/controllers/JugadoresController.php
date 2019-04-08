<?php

class JugadoresController extends ControladorBase {


    public static function gestion()
    {
        require_once './app/view/GestionExp/GestionJugadores.php';
    }

    public static function gestionM(){

        self::loadMain();
        
        $daoU = new DaoEquipos();
        $equiposCMB = $daoU->mostrarEquiposCmbM();

        $equipoCMB = $daoU->mostrarEquipoCmbM();

        require_once './app/view/GestionExp/GestionJugadoresMasculinos.php';

    }


    public static function gestionF(){

        self::loadMain();

        $daoU = new DaoEquipos();
        $equiposCMB = $daoU->mostrarEquiposCmbF();

        $equipoCMB = $daoU->mostrarEquipoCmbF();

        require_once './app/view/GestionExp/GestionJugadoresFemeninas.php';

    }

    public function inscripcionM() {
        $dao = new DaoJugadores();

        echo $dao->inscripcionM();
    }

    public function mostrarJugPenPago() {
        $dao = new DaoJugadores();

        echo $dao->mostrarJugPendPago();
    }

    public function inscripcionF() {
        $dao = new DaoJugadores();

        echo $dao->inscripcionF();
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
        $idTorneo = $_REQUEST["idTorneo"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($idJ);
        $dao->objeto->setIdEquipo($idEquipo);
        $dao->objeto->setIdTorneo($idTorneo);

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
        $telefono= $_REQUEST["telefono"];

        // $foto = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
        

        $dao = new DaoJugadores();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setEdad($edad);
        $dao->objeto->setDui($dui);
        $dao->objeto->setFechaNacimiento($fechaNac);
        $dao->objeto->setTelefono($telefono);
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
        $dao->objeto->setTelefono($_REQUEST['telefono']);

        echo $dao->editarF();
    }


    public function eliminarM() {
        $datos = $_REQUEST["id"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($datos);

        echo $dao->eliminarM();
    }

    public function inscribirJugadorM() {
        $idJ = $_REQUEST["idJugador"];
        $idEquipo = $_REQUEST["idEquipo"];
        $idTorneo = $_REQUEST["idTorneo"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($idJ);
        $dao->objeto->setIdEquipo($idEquipo);
        $dao->objeto->setIdTorneo($idTorneo);

        echo $dao->inscribirJugadorM();
    }

    public function inscribirJugadorMayor() {
        $idJ = $_REQUEST["idJugador"];
        $idEquipo = $_REQUEST["idEquipo"];
        $idTorneo = $_REQUEST["idTorneo"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($idJ);
        $dao->objeto->setIdEquipo($idEquipo);
        $dao->objeto->setIdTorneo($idTorneo);

        echo $dao->inscribirJugadorMayor();

        $daoE = new DaoEquipos();
        $daoE->objeto->setIdEquipo($idEquipo);
        echo $daoE->actualizarCupos();
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
        $telefono= $_REQUEST["telefono"];

        // $foto = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
        

        $dao = new DaoJugadores();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setEdad($edad);
        $dao->objeto->setDui($dui);
        $dao->objeto->setFechaNacimiento($fechaNac);
        $dao->objeto->setTelefono($telefono);
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
         $dao->objeto->setTelefono($_REQUEST['telefono']);

        echo $dao->editarM();
    }

    public function verDetalles(){
        $id = $_REQUEST["id"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($id);

        $resultado =$dao->detalles();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function mostrarJugadoresFondoComun() {
        $dao = new DaoJugadores();

        echo $dao->mostrarJugadoresFondoComun();
    }


    public function cobrar(){

        $id = $_REQUEST["idJugador"];
        $cantidad = $_REQUEST["cantidadCobroJ"];

        $dao = new DaoJugadores();

        $dao->objeto->setIdJugador($id);

        echo $dao->cobrarInscripcion();


        $daoI = new DaoIngresos();

        $daoI->objeto->setTitle("Inscripción de Jugadores");
        $daoI->objeto->setCantidad($cantidad);

        
        echo $daoI->guardarOtro();
    }

}


?>