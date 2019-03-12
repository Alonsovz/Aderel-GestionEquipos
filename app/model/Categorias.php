<?php 

class Categorias extends ModeloBase{
    private $idCategoria;
    private $nombreCategoria;
    private $edadMinima;
    private $edadMaxima;


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

    public function getNombreCategoria()
    {
        return $this->nombreCategoria;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setNombreCategoria($nombreCategoria)
    {
        $this->nombreCategoria = $nombreCategoria;

        return $this;
    }


    public function getEdadMinima()
    {
        return $this->edadMinima;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setEdadMinima($edadMinima)
    {
        $this->edadMinima = $edadMinima;

        return $this;
    }

    public function getEdadMaxima()
    {
        return $this->edadMaxima;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setEdadMaxima($edadMaxima)
    {
        $this->edadMaxima = $edadMaxima;

        return $this;
    }

}


?>