<?php 

class Natacion extends ModeloBase{
    private $idUsuario;
    private $nombre;
    private $apellido;
    private $edad;
    private $dui;
    private $encargado;
    private $duiEncargado;
    private $fechaNacimento;
    private $fechaInscripcion;
    private $fechaFinal;
    

    public function __construct() {

    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }


    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getDui()
    {
        return $this->dui;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setDui($dui)
    {
        $this->dui = $dui;

        return $this;
    }


    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getFechaInscripcion()
    {
        return $this->fechaInscripcion;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setFechaInscripcion($fechaInscripcion)
    {
        $this->fechaInscripcion = $fechaInscripcion;

        return $this;
    }

    public function getFechaFinal()
    {
        return $this->fechaFinal;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setFechaFinal($fechaFinal)
    {
        $this->fechaFinal = $fechaFinal;

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

    public function getDuiEncargado()
    {
        return $this->duiEncargado;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setDuiEncargado($duiEncargado)
    {
        $this->duiEncargado = $duiEncargado;

        return $this;
    }

}

?>