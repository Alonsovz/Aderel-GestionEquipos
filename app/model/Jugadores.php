<?php 

class Jugadores extends ModeloBase{
    private $idJugador;
    private $nombre;
    private $apellido;
    private $edad;
    private $dui;
    private $fechaNacimento;
    private $idEquipo;
    private $idCategoria;
    private $img;
    private $idTorneo;
    private $telefono;
    private $descripcion;

    public function __construct() {

    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

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

    public function getIdEquipo()
    {
        return $this->idEquipo;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setIdEquipo($idEquipo)
    {
        $this->idEquipo = $idEquipo;

        return $this;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

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

}

?>