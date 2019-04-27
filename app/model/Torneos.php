<?php 

class Torneos extends ModeloBase{
    private $idTorneo;
    private $nombreTorneo;
    private $numeroEquipos;
    private $disponibles;
    private $idCategoria;
    private $goles;
    private $idJugador;
    private $goles1;
    private $goles2;
    private $equipo1;
    private $equipo2;

    private $golesContra1;
    private $golesContra2;

    private $partidosEmpatados1;
    private $partidosEmpatados2;

    private $partidosGanados1;
    private $partidosGanados2;

    private $partidosPerdidos1;
    private $partidosPerdidos2;

    private $puntaje1;
    private $puntaje2;

    private $tarjeta;
    private $observacion;
    private $partidos;
    private $tarjetas;

    private $hora;
    private $fecha;
    private $jornada;
    private $vuelta;
    private $idPartido;


    public function __construct() {

    }

    public function getIdPartido()
    {
        return $this->idPartido;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setIdPartido($idPartido)
    {
        $this->idPartido = $idPartido;

        return $this;
    }

    public function getVuelta()
    {
        return $this->vuelta;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setVuelta($vuelta)
    {
        $this->vuelta = $vuelta;

        return $this;
    }

    public function getJornada()
    {
        return $this->jornada;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setJornada($jornada)
    {
        $this->jornada = $jornada;

        return $this;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }


    public function getTarjetas()
    {
        return $this->tarjetas;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setTarjetas($tarjetas)
    {
        $this->tarjetas = $tarjetas;

        return $this;
    }

    public function getPartidos()
    {
        return $this->partidos;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setPartidos($partidos)
    {
        $this->partidos = $partidos;

        return $this;
    }

    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    public function getTarjeta()
    {
        return $this->tarjeta;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setTarjeta($tarjeta)
    {
        $this->tarjeta = $tarjeta;

        return $this;
    }

    public function getPuntaje2()
    {
        return $this->puntaje2;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setPuntaje2($puntaje2)
    {
        $this->puntaje2 = $puntaje2;

        return $this;
    }

    public function getPuntaje1()
    {
        return $this->puntaje1;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setPuntaje1($puntaje1)
    {
        $this->puntaje1 = $puntaje1;

        return $this;
    }

    public function getPartidosPerdidos2()
    {
        return $this->partidosPerdidos2;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setPartidosPerdidos2($partidosPerdidos2)
    {
        $this->partidosPerdidos2 = $partidosPerdidos2;

        return $this;
    }

    public function getPartidosPerdidos1()
    {
        return $this->partidosPerdidos1;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setPartidosPerdidos1($partidosPerdidos1)
    {
        $this->partidosPerdidos1 = $partidosPerdidos1;

        return $this;
    }

    public function getPartidosGanados2()
    {
        return $this->partidosGanados2;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setPartidosGanados2($partidosGanados2)
    {
        $this->partidosGanados2 = $partidosGanados2;

        return $this;
    }

    public function getPartidosGanados1()
    {
        return $this->partidosGanados1;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setPartidosGanados1($partidosGanados1)
    {
        $this->partidosGanados1 = $partidosGanados1;

        return $this;
    }

    public function getPartidosEmpatados2()
    {
        return $this->partidosEmpatados2;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setPartidosEmpatados2($partidosEmpatados2)
    {
        $this->partidosEmpatados2 = $partidosEmpatados2;

        return $this;
    }

    public function getPartidosEmpatados1()
    {
        return $this->partidosEmpatados1;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setPartidosEmpatados1($partidosEmpatados1)
    {
        $this->partidosEmpatados1 = $partidosEmpatados1;

        return $this;
    }

    public function getGolesContra2()
    {
        return $this->golesContra2;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setGolesContra2($golesContra2)
    {
        $this->golesContra2 = $golesContra2;

        return $this;
    }

    public function getGolesContra1()
    {
        return $this->golesContra1;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setGolesContra1($golesContra1)
    {
        $this->golesContra1 = $golesContra1;

        return $this;
    }



    public function getIdJugador()
    {
        return $this->idJugador;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setIdJugador($idJugador)
    {
        $this->idJugador = $idJugador;

        return $this;
    }

    public function getGoles()
    {
        return $this->goles;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setGoles($goles)
    {
        $this->goles = $goles;

        return $this;
    }


    public function getGoles1()
    {
        return $this->goles1;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setGoles1($goles1)
    {
        $this->goles1 = $goles1;

        return $this;
    }

    public function getGoles2()
    {
        return $this->goles2;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setGoles2($goles2)
    {
        $this->goles2 = $goles2;

        return $this;
    }

    public function getEquipo1()
    {
        return $this->equipo1;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setEquipo1($equipo1)
    {
        $this->equipo1 = $equipo1;

        return $this;
    }

    public function getEquipo2()
    {
        return $this->equipo2;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setEquipo2($equipo2)
    {
        $this->equipo2 = $equipo2;

        return $this;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }

    public function getIdTorneo()
    {
        return $this->idTorneo;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setIdTorneo($idTorneo)
    {
        $this->idTorneo = $idTorneo;

        return $this;
    }

    public function getNombreTorneo()
    {
        return $this->nombreTorneo;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setNombreTorneo($nombreTorneo)
    {
        $this->nombreTorneo = $nombreTorneo;

        return $this;
    }

    public function getNumeroEquipos()
    {
        return $this->numeroEquipos;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setNumeroEquipos($numeroEquipos)
    {
        $this->numeroEquipos = $numeroEquipos;

        return $this;
    }

    public function getDisponibles()
    {
        return $this->disponibles;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setDisponibles($disponibles)
    {
        $this->disponibles = $disponibles;

        return $this;
    }



}


?>