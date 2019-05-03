<?php 

class Clasificatoria extends ModeloBase{
    private $idClasificatoria;
    private $partidoN;
    private $etapa;
    private $idEquipo1;
    private $idEquipo2;
    private $idTorneo;
    private $fecha;
    private $hora;
    private $idEquipoGanador;

    public function __construct() {

    }

    

    /**
     * Get the value of idClasificatoria
     */ 
    public function getIdClasificatoria()
    {
        return $this->idClasificatoria;
    }

    /**
     * Set the value of idClasificatoria
     *
     * @return  self
     */ 
    public function setIdClasificatoria($idClasificatoria)
    {
        $this->idClasificatoria = $idClasificatoria;

        return $this;
    }

    /**
     * Get the value of partidoN
     */ 
    public function getPartidoN()
    {
        return $this->partidoN;
    }

    /**
     * Set the value of partidoN
     *
     * @return  self
     */ 
    public function setPartidoN($partidoN)
    {
        $this->partidoN = $partidoN;

        return $this;
    }

    /**
     * Get the value of etapa
     */ 
    public function getEtapa()
    {
        return $this->etapa;
    }

    /**
     * Set the value of etapa
     *
     * @return  self
     */ 
    public function setEtapa($etapa)
    {
        $this->etapa = $etapa;

        return $this;
    }

    /**
     * Get the value of idEquipo1
     */ 
    public function getIdEquipo1()
    {
        return $this->idEquipo1;
    }

    /**
     * Set the value of idEquipo1
     *
     * @return  self
     */ 
    public function setIdEquipo1($idEquipo1)
    {
        $this->idEquipo1 = $idEquipo1;

        return $this;
    }

    /**
     * Get the value of idEquipo2
     */ 
    public function getIdEquipo2()
    {
        return $this->idEquipo2;
    }

    /**
     * Set the value of idEquipo2
     *
     * @return  self
     */ 
    public function setIdEquipo2($idEquipo2)
    {
        $this->idEquipo2 = $idEquipo2;

        return $this;
    }

    /**
     * Get the value of idTorneo
     */ 
    public function getIdTorneo()
    {
        return $this->idTorneo;
    }

    /**
     * Set the value of idTorneo
     *
     * @return  self
     */ 
    public function setIdTorneo($idTorneo)
    {
        $this->idTorneo = $idTorneo;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get the value of idEquipoGanador
     */ 
    public function getIdEquipoGanador()
    {
        return $this->idEquipoGanador;
    }

    /**
     * Set the value of idEquipoGanador
     *
     * @return  self
     */ 
    public function setIdEquipoGanador($idEquipoGanador)
    {
        $this->idEquipoGanador = $idEquipoGanador;

        return $this;
    }
}