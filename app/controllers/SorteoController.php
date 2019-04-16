<?php

class SorteoController extends ControladorBase {
    

    public function getRegistrar()
    {
        $datos=$_REQUEST['datos'];
        $datos = json_decode($datos,true);

        $daoJornada  = new DaoJornada();
        $daoPartidos = new DaoPartidos();
        $daoTorneo = new DaoTorneos();

        foreach ($datos as $datosJornada) {

            $idDescansa = (isset($datosJornada['idDescansa']))?$datosJornada['idDescansa']:0;

            $jornada = new Jornadas();
            $jornada->setIdTorneo($datosJornada['idTorneo']);
            $jornada->setDescansa_id_Equipo($idDescansa);
            $jornada->setVuelta_N($datosJornada['nvuelta']);
            $jornada->setOrden($datosJornada['jornada']);

            $daoTorneo->objeto->setIdTorneo($datosJornada['idTorneo']);

            $daoTorneo->paraSorteo();

            $idJornada = $daoJornada->registrar($jornada);
            foreach ($datosJornada['partidos'] as $partido) {
        
                $partidoGuardar = new Partidos();
                $partidoGuardar->setJornada_id($idJornada);
                $partidoGuardar->setCancha($partido['cancha']);
                $partidoGuardar->setPartido_N($partido['partido']);
                $partidoGuardar->setEquipo1_id($partido['equipo1']);
                $partidoGuardar->setEquipo2_id($partido['equipo2']);
                $partidoGuardar->setFecha($partido['fecha']);
                $partidoGuardar->setHora($partido['hora']);

                
                
                $daoPartidos->registrar($partidoGuardar);
                
            }

        }

        $posiciones=$_REQUEST['posiciones'];
        $posiciones = json_decode($posiciones,true);

        $daoPosiciones = new DaoPosiciones();

        for ($i=0; $i < count($posiciones['idEquipos']); $i++) { 
            $posicion = new Posiciones();
            $posicion->setIdTorneo($posiciones['idTorneo']);
            $posicion->setIdEquipo($posiciones['idEquipos'][$i]);

            $daoPosiciones->registrar($posicion);
        }
        
        echo 'ok';//xd

        
    }


}