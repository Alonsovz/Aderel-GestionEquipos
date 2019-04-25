<?php 

class Equipos extends ModeloBase{
    private $idEquipo;
    private $nombreEquipo;
    private $encargado;
    private $encargadoAux;
    private $idCategoria;
    private $idTorneo;
    private $telefonoAux;
    private $telefonoE;
    private $carnets;
    private $idJugador;

    public function __construct() {

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


    public function getCarnets()
    {
        return $this->carnets;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setCarnets($carnets)
    {
        $this->carnets = $carnets;

        return $this;
    }

    public function getTelefonoAux()
    {
        return $this->telefonoAux;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setTelefonoAux($telefonoAux)
    {
        $this->telefonoAux = $telefonoAux;

        return $this;
    } 

    public function getTelefonoE()
    {
        return $this->telefonoE;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setTelefonoE($telefonoE)
    {
        $this->telefonoE = $telefonoE;

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

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

        return $this;
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


    public function getEncargadoAux()
    {
        return $this->encargadoAux;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setEncargadoAux($encargadoAux)
    {
        $this->encargadoAux = $encargadoAux;

        return $this;
    }
    


}
 
