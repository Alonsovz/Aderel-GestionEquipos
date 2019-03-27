<?php 

class Gimnasio extends ModeloBase{
    private $idUsuario;
    private $nombre;
    private $apellido;
    private $edad;
    private $dui;
    private $fechaNacimento;
    private $fechaInscripcion;
    private $pagoMeses;
    private $fechaFinal;
    private $img;
    private $idPago;

    public function __construct() {

    }

    public function getIdPago()
    {
        return $this->idPago;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setIdPago($idPago)
    {
        $this->idPago = $idPago;

        return $this;
    }

    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
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

    public function getPagoMeses()
    {
        return $this->pagoMeses;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setPagoMeses($pagoMeses)
    {
        $this->pagoMeses = $pagoMeses;

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

}

?>