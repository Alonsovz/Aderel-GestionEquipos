<?php

class TorneosController extends ControladorBase {

    public static function gestion()
    {
       
        require_once './app/view/GestionExp/GestionTorneos.php';
    }

    public static function gestionM()
    {
        self::loadMain();
        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmbM();

        $daoJ = new DaoTorneos();
        $goleadoresCmb = $daoJ->mostrarGoleadoresCmb();


        require_once './app/view/GestionExp/GestionTorneosMasculinos.php';
    }

    public function sorteo()
    {
        self::loadMain();
        require_once './app/view/GestionExp/funciones_liga.php';
    }

    public function sorteoF()
    {
        self::loadMain();
        require_once './app/view/GestionExp/funciones_ligaF.php';
    }

    public static function gestionF()
    {
        self::loadMain();
        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasCmbF();

        $daoJ = new DaoTorneos();
        $goleadoresCmb = $daoJ->mostrarGoleadorasCmb();
        require_once './app/view/GestionExp/GestionTorneosFemeninas.php';
    }


    public function registrarM() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoTorneos();

        $dao->objeto->setNombreTorneo($datos->nombreTorneo);
        $dao->objeto->setNumeroEquipos($datos->numeroEquipos);
        $dao->objeto->setDisponibles($datos->numeroEquipos);
        $dao->objeto->setIdCategoria($datos->selectCategoria);


        echo $dao->registrarM();

    }

    public function cargarDatosTorneoM() {
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        echo $dao->cargarDatosTorneoM();
    }

    public function editarM(){
       // $datos = $_REQUEST["datos"];

       // $datos = json_decode($datos);

        $dao = new DaoTorneos();

        $dao->objeto->setNombreTorneo($_REQUEST['nombreTorneo']);
        $dao->objeto->setNumeroEquipos($_REQUEST['numeroEquipos']);
        $dao->objeto->setIdCategoria($_REQUEST['selectCategoria']);
        $dao->objeto->setIdTorneo($_REQUEST['idDetalleE']);


        echo $dao->editarM();
    }

    public function eliminarM() {
        $datos = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($datos);

        echo $dao->eliminarM();
    }



    public function registrarF() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        $dao = new DaoTorneos();

        $dao->objeto->setNombreTorneo($datos->nombreTorneo);
        $dao->objeto->setNumeroEquipos($datos->numeroEquipos);
        $dao->objeto->setDisponibles($datos->numeroEquipos);
        $dao->objeto->setIdCategoria($datos->selectCategoria);


        echo $dao->registrarF();

    }

    public function cargarDatosTorneoF() {
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        echo $dao->cargarDatosTorneoF();
    }

    public function editarF(){
       // $datos = $_REQUEST["datos"];

       // $datos = json_decode($datos);

        $dao = new DaoTorneos();

        $dao->objeto->setNombreTorneo($_REQUEST['nombreTorneo']);
        $dao->objeto->setNumeroEquipos($_REQUEST['numeroEquipos']);
        $dao->objeto->setIdCategoria($_REQUEST['selectCategoria']);
        $dao->objeto->setIdTorneo($_REQUEST['idDetalleE']);


        echo $dao->editarF();
    }

    public function eliminarF() {
        $datos = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($datos);

        echo $dao->eliminarF();
    }

    public function mostrarEquiposCM() {
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        $resultado =$dao->mostrarEquiposCM();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function mostrarEquiposCF() {
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        $resultado =$dao->mostrarEquiposCF();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }
        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function calendario() {
        $dao = new DaoTorneos();
        
        require_once './app/reportes/calendario.php';
        
       // $idA= $_REQUEST["area"];
        $id = $_REQUEST["id"];

        $reporte = new Reporte();

        //$dao->objeto->setCodigoArea($idA);
        $dao->objeto->setIdTorneo($id);
        $resultado = $dao->calendarioVuelta1();
        
        $resultado1 = $dao->calendarioVuelta1();
        $validar1 = $dao->calendarioVuelta1();
        $validarDescanso1 = $dao->calendarioVuelta1();
        $cancha1 = $dao->calendarioVuelta1();

        $resultado2 = $dao->calendarioVuelta2();
        $validar2 = $dao->calendarioVuelta2();
        $validarDescanso2 = $dao->calendarioVuelta2();
        $cancha2 = $dao->calendarioVuelta1();

        $resultado3 = $dao->calendarioVuelta3();
        $validar3 = $dao->calendarioVuelta3();
        $validarDescanso3 = $dao->calendarioVuelta3();
        $cancha3 = $dao->calendarioVuelta1();

        $resultado4 = $dao->calendarioVuelta4();
        $validar4 = $dao->calendarioVuelta4();
        $validarDescanso4 = $dao->calendarioVuelta4();
        $cancha4 = $dao->calendarioVuelta1();

        $reporte->calendario($id, $resultado,$resultado1, $resultado2,$resultado3,$resultado4,$validar1,
        $validar2,$validar3,$validar4,$validarDescanso1,$validarDescanso2,$validarDescanso3,$validarDescanso4,
    $cancha1,$cancha2,$cancha3,$cancha4);
    }


    public function calendarioGestionT(){
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        $resultado =$dao->calendarioGestionT();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }


    public function posiciones(){
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        // $dao->objeto->setIdTorneo($id);

        $resultado =$dao->posiciones($id);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function posicionesRpt(){
        $id = $_REQUEST["id"];

        require_once './app/reportes/estadisticas.php';

        $dao = new DaoTorneos();

        $reporte = new Reporte();

        $dao->objeto->setIdTorneo($id);


        $resultado =$dao->posicionesRpt();
        $nombreTorneo =$dao->posicionesRpt();
        $goleadores =$dao->goleadores();
        $castigos =$dao->castigos();


        $reporte->estadisticas($resultado ,$nombreTorneo,$goleadores, $castigos);
    }

    public function calendarioFiltro(){
        $id = $_REQUEST["id"];
        $jornada = $_REQUEST["jornada"];
        $vuelta = $_REQUEST["vuelta"];

        require_once './app/reportes/calendarioFiltro.php';

        $dao = new DaoTorneos();

        $reporte = new Reporte();

        $dao->objeto->setIdTorneo($id);
        $dao->objeto->setVuelta($vuelta);
        $dao->objeto->setJornada($jornada);


        $resultado =$dao->calendarioFiltro();
        


        $reporte->calendarioFiltro($resultado);
    }

    

    public function goleadores(){
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        $resultado =$dao->goleadores();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function expulsados(){
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        $resultado =$dao->castigos();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function amonestados(){
        $id = $_REQUEST["id"];

        $dao = new DaoTorneos();

        $dao->objeto->setIdTorneo($id);

        $resultado =$dao->amonestados();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function registrarGoleador(){
        $detalles = json_decode($_REQUEST["goleos"]);
        $idTor = $_REQUEST["idTor"];

        $contador = 0;

        $dao = new DaoTorneos();

        foreach($detalles as $detalle) {
            $dao->objeto->setIdJugador($detalle->goleadores);
            $dao->objeto->setGoles($detalle->goles);
           $dao->objeto->setIdTorneo($idTor);

            if($dao->registrarGoleador()) {
                $contador++;
            } else {
                echo 'nell';
            }
        }

        if($contador == count($detalles)) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function registrarCastigo(){
        $detalles = json_decode($_REQUEST["castigo"]);
        $idTor = $_REQUEST["idTorn"];

        $contador = 0;

        $dao = new DaoTorneos();

        foreach($detalles as $detalle) {
            

            if($detalle->tarjeta=="Tarjeta Amarilla"){
                $dao->objeto->setIdTorneo($idTor);
                $dao->objeto->setIdJugador($detalle->goleadores);
                $dao->updateAmarilla();

            }else if($detalle->tarjeta=="Doble Amarilla"){
                $dao->objeto->setIdJugador($detalle->goleadores);
                $dao->objeto->setTarjeta($detalle->tarjeta);
                $dao->objeto->setObservacion($detalle->observacion);
                $dao->objeto->setIdTorneo($idTor);
                $dao->objeto->setPartidos(1);
                $dao->registrarDirecto();
            
                
            }else{
                $dao->objeto->setIdJugador($detalle->goleadores);
                $dao->objeto->setTarjeta($detalle->tarjeta);
                $dao->objeto->setObservacion($detalle->observacion);
                $dao->objeto->setIdTorneo($idTor);
                $dao->objeto->setPartidos(2);
                $dao->registrarDirecto();

            }

        }

        if($contador == count($detalles)) {
            echo 1;
        } else {
            echo 2;
        }
    }


    public function guardarResultado(){
        $golesLocal = $_REQUEST["goles1"];
        $golesVisita = $_REQUEST["goles2"];
        $equipo1 = $_REQUEST["equipo1"];
        $equipo2 = $_REQUEST["equipo2"];
        $idTorneo = $_REQUEST["idTorneo"];
        $hora = $_REQUEST["hora"];
        $fecha = $_REQUEST["fecha"];
        $partido = $_REQUEST["partido"];
        $jornada = $_REQUEST["jornada"];
        $vuelta = $_REQUEST["vuelta"];

        $dao = new DaoTorneos();


        if($golesLocal > $golesVisita){
            $dao->objeto->setEquipo1($equipo1);
            $dao->objeto->setPartidosPerdidos1(0);
            $dao->objeto->setPartidosGanados1(1);
            $dao->objeto->setPartidosEmpatados1(0);
            $dao->objeto->setPuntaje1(3);
            $dao->objeto->setGoles1($golesLocal);
            $dao->objeto->setGolesContra1($golesVisita);
            $dao->objeto->setIdTorneo($idTorneo);

            echo $dao->guardarEquipo1();

            $dao->objeto->setEquipo2($equipo2);
            $dao->objeto->setPartidosPerdidos2(1);
            $dao->objeto->setPartidosGanados2(0);
            $dao->objeto->setPartidosEmpatados2(0);
            $dao->objeto->setPuntaje2(0);
            $dao->objeto->setGoles2($golesVisita);
            $dao->objeto->setGolesContra2($golesLocal);
            $dao->objeto->setIdTorneo($idTorneo);

            echo $dao->guardarEquipo2();

            $dao->objeto->setHora($hora);
            $dao->objeto->setFecha($fecha);
            $dao->objeto->setIdPartido($partido);
            $dao->objeto->setJornada($jornada);
            $dao->objeto->setVuelta($vuelta);


            echo $dao->guardarDatos();
            echo $dao->guardarHistorial();

        }
        else if($golesLocal < $golesVisita){

            $dao->objeto->setEquipo1($equipo1);
            $dao->objeto->setPartidosPerdidos1(1);
            $dao->objeto->setPartidosGanados1(0);
            $dao->objeto->setPartidosEmpatados1(0);
            $dao->objeto->setPuntaje1(0);
            $dao->objeto->setGoles1($golesLocal);
            $dao->objeto->setGolesContra1($golesVisita);
            $dao->objeto->setIdTorneo($idTorneo);

            echo $dao->guardarEquipo1();

            $dao->objeto->setEquipo2($equipo2);
            $dao->objeto->setPartidosPerdidos2(0);
            $dao->objeto->setPartidosGanados2(1);
            $dao->objeto->setPartidosEmpatados2(0);
            $dao->objeto->setPuntaje2(3);
            $dao->objeto->setGoles2($golesVisita);
            $dao->objeto->setGolesContra2($golesLocal);
            $dao->objeto->setIdTorneo($idTorneo);

            echo $dao->guardarEquipo2();

            $dao->objeto->setHora($hora);
            $dao->objeto->setFecha($fecha);
            $dao->objeto->setIdPartido($partido);
            $dao->objeto->setJornada($jornada);
            $dao->objeto->setVuelta($vuelta);


            echo $dao->guardarDatos();
            echo $dao->guardarHistorial();

        }
        else if($golesLocal == $golesVisita){

            $dao->objeto->setEquipo1($equipo1);
            $dao->objeto->setPartidosPerdidos1(0);
            $dao->objeto->setPartidosGanados1(0);
            $dao->objeto->setPartidosEmpatados1(1);
            $dao->objeto->setPuntaje1(1);
            $dao->objeto->setGoles1($golesLocal);
            $dao->objeto->setGolesContra1($golesVisita);
            $dao->objeto->setIdTorneo($idTorneo);

            echo $dao->guardarEquipo1();

            $dao->objeto->setEquipo2($equipo2);
            $dao->objeto->setPartidosPerdidos2(0);
            $dao->objeto->setPartidosGanados2(0);
            $dao->objeto->setPartidosEmpatados2(1);
            $dao->objeto->setPuntaje2(1);
            $dao->objeto->setGoles2($golesVisita);
            $dao->objeto->setGolesContra2($golesLocal);
            $dao->objeto->setIdTorneo($idTorneo);

            echo $dao->guardarEquipo2();

            $dao->objeto->setHora($hora);
            $dao->objeto->setFecha($fecha);
            $dao->objeto->setIdPartido($partido);
            $dao->objeto->setJornada($jornada);
            $dao->objeto->setVuelta($vuelta);


            echo $dao->guardarDatos();
            echo $dao->guardarHistorial();

           

        }

    }

    public function guardarClasificatorias()
    {
        $clasificatorias = json_decode($_REQUEST['datos'],true);
    
        $daoClasi = new DaoClasificatoria();

        foreach ($clasificatorias as $clasi) {
            $clasificatoria = new Clasificatoria();
            $clasificatoria->setEtapa($_REQUEST['etapa']);
            $clasificatoria->setPartidoN($clasi['partido']);
            $clasificatoria->setIdEquipo1($clasi['equipo1']);
            $clasificatoria->setIdEquipo2($clasi['equipo2']);
            $clasificatoria->setIdTorneo($_REQUEST['idTorneo']);
            $clasificatoria->setFecha($clasi['fecha']);
            $clasificatoria->setHora($clasi['hora']);
            $clasificatoria->setCancha($clasi['cancha']);

            $daoClasi->registrar($clasificatoria);
        }

        echo 'ok';
    }

    public function guardarGanador()
    {
        $idClasificatoria = $_REQUEST['idClasificatoria'];
        $idEquipo = $_REQUEST['idEquipo'];
        $daoClasi = new DaoClasificatoria();

        $daoClasi->guardaGanador($idClasificatoria, $idEquipo);
        
        return 'ok';
    }

    public function getPreviewClasificatoria()
    {
        self::loadMain();
        require_once './app/view/GestionExp/GestionClasificatoria.php';
    }

    public function getPreviewClasificatoriaF()
    {
        self::loadMain();
        require_once './app/view/GestionExp/GestionClasificatoriaF.php';
    }

    public function getClasificatoria()
    {   
        $idTorneo=$_REQUEST['idTorneo'];
        $daoTorneo = new DaoTorneos();
        echo $daoTorneo->equiposClasificacion($idTorneo);
    }

}



?>