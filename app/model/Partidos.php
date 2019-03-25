<?php 

class Partidos extends ModeloBase{
    private $id;
    private $jornada_id;
    private $partido_N;
    private $cancha;
    private $equipo1_id;
    private $equipo2_id;
    private $fecha;
    private $hora;


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
     * Get the value of jornada_id
     */ 
    public function getJornada_id()
    {
        return $this->jornada_id;
    }

    /**
     * Set the value of jornada_id
     *
     * @return  self
     */ 
    public function setJornada_id($jornada_id)
    {
        $this->jornada_id = $jornada_id;

        return $this;
    }

    /**
     * Get the value of partido_N
     */ 
    public function getPartido_N()
    {
        return $this->partido_N;
    }

    /**
     * Set the value of partido_N
     *
     * @return  self
     */ 
    public function setPartido_N($partido_N)
    {
        $this->partido_N = $partido_N;

        return $this;
    }

    /**
     * Get the value of cancha
     */ 
    public function getCancha()
    {
        return $this->cancha;
    }

    /**
     * Set the value of cancha
     *
     * @return  self
     */ 
    public function setCancha($cancha)
    {
        $this->cancha = $cancha;

        return $this;
    }

    /**
     * Get the value of equipo1_id
     */ 
    public function getEquipo1_id()
    {
        return $this->equipo1_id;
    }

    /**
     * Set the value of equipo1_id
     *
     * @return  self
     */ 
    public function setEquipo1_id($equipo1_id)
    {
        $this->equipo1_id = $equipo1_id;

        return $this;
    }

    /**
     * Get the value of equipo2_id
     */ 
    public function getEquipo2_id()
    {
        return $this->equipo2_id;
    }

    /**
     * Set the value of equipo2_id
     *
     * @return  self
     */ 
    public function setEquipo2_id($equipo2_id)
    {
        $this->equipo2_id = $equipo2_id;

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
}