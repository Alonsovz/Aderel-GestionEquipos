<?php 

class escuelaFutbol extends ModeloBase{
    private $idJugador;
    private $nombre;
    private $apellido;
    private $edad;
    private $fechaNacimento;
    private $carnet;
    private $encargado;
    private $dui;
    private $telefono;
    private $idEscuela;
    private $img;
    private $idPago;
    private $id;
   

    public function __construct() {

    }


    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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

    public function getCarnet()
    {
        return $this->carnet;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setCarnet($carnet)
    {
        $this->carnet = $carnet;

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

    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    } 

    

}

?>