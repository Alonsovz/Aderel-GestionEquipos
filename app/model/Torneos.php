<?php 

class Torneos extends ModeloBase{
    private $idTorneo;
    private $nombreTorneo;
    private $numeroEquipos;
    private $disponibles;
    private $idCategoria;

    public function __construct() {

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