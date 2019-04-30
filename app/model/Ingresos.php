<?php 

class Ingresos extends ModeloBase{
    private $id;
    private $title;
    private $descripcion;
    private $start;
    private $cantidad;
    private $color;
    private $textColor;
    private $anio;
    private $mes;
    private $fecha;
    private $fecha2;
    private $idTorneo;
    private $categoria;

    public function __construct() {

    }
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

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

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
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

    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    public function getTextColor()
    {
        return $this->textColor;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;

        return $this;
    }

    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setAnio($anio)
    {
        $this->anio = $anio;

        return $this;
    }
    
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

    public function getFecha2()
    {
        return $this->fecha2;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha2($fecha2)
    {
        $this->fecha2 = $fecha2;

        return $this;
    }
}