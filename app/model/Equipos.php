<?php 

class Equipos extends ModeloBase{
    private $idEquipo;
    private $nombreEquipo;
    private $encargado;
    


    public function __construct() {

    }

    public function getIdEquipo()
    {
        return $this->idEquipo;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setIdEquipo($idEquipo)
    {
        $this->idEquipo = $idEquipo;

        return $this;
    }

    public function getNombreEquipo()
    {
        return $this->nombreEquipo;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setNombreEquipo($nombreEquipo)
    {
        $this->nombreEquipo = $nombreEquipo;

        return $this;
    }

    public function getEncargado()
    {
        return $this->encargado;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setEncargado($encargado)
    {
        $this->encargado = $encargado;

        return $this;
    }
    


}
 
