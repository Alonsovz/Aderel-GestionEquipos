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

        $dao->objeto->setIdTorneo($id);

        $resultado =$dao->posiciones();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
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

    public function registrarGoleador(){
        $detalles = json_decode($_REQUEST["detalles"]);
        //$idTor = $_REQUEST["idTor"];

        $contador = 0;

        $dao = new DaoTorneos();

        foreach($detalles as $detalle) {
            $dao->objeto->setIdJugador($detalle->goleadores);
            $dao->objeto->setGoles($detalle->goles);
           // $dao->objeto->setIdTorneo($idTor);

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


    public function guardarResultado(){
        $golesLocal = $_REQUEST["goles1"];
        $golesVisita = $_REQUEST["goles2"];
        $equipo1 = $_REQUEST["equipo1"];
        $equipo2 = $_REQUEST["equipo2"];
        $idTorneo = $_REQUEST["idTorneo"];

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

        }

    }

}



?>