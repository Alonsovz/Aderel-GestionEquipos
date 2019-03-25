<?php 

class Jornadas extends ModeloBase{
    private $id;
    private $idTorneo;
    private $vuelta_N;
    private $orden;
    private $descansa_id_Equipo;
    


    public function __construct() {

    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

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
     * Get the value of vuelta_N
     */ 
    public function getVuelta_N()
    {
        return $this->vuelta_N;
    }

    /**
     * Set the value of vuelta_N
     *
     * @return  self
     */ 
    public function setVuelta_N($vuelta_N)
    {
        $this->vuelta_N = $vuelta_N;

        return $this;
    }

    /**
     * Get the value of descansa_id_Equipo
     */ 
    public function getDescansa_id_Equipo()
    {
        return $this->descansa_id_Equipo;
    }

    /**
     * Set the value of descansa_id_Equipo
     *
     * @return  self
     */ 
    public function setDescansa_id_Equipo($descansa_id_Equipo)
    {
        $this->descansa_id_Equipo = $descansa_id_Equipo;

        return $this;
    }

    /**
     * Get the value of orden
     */ 
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set the value of orden
     *
     * @return  self
     */ 
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }
}