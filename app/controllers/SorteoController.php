<?php

class SorteoController extends ControladorBase {
    

    public function getRegistrar()
    {
        $datos=$_REQUEST['datos'];
        print_r($datos);
        return;
        $jornada = new Jornadas();
        $jornada->setIdTorneo(1);
        $jornada->setDescansa_id_Equipo(1);
        $jornada->setVuelta_N(2);
        $jornada->setOrden(1);

        $daoJornada = new DaoJornada();
        $idJornada = $daoJornada->registrar($jornada);
        

        $partido = new Partidos();
        $partido->setJornada_id($idJornada);
        $partido->setCancha(1);
        $partido->setPartido_N(1);
        $partido->setEquipo1_id(1);
        $partido->setEquipo2_id(2);
        $partido->setFecha('12-05-2019');
        $partido->setHora('15:15');

        $daoPartidos = new DaoPartidos();
        $daoPartidos->registrar($partido);
    }


}