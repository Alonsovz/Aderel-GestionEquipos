<?php 

class Categorias extends ModeloBase{
    private $idCategoria;
    private $nombreCategoria;
    private $rango;


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


    public function getRango()
    {
        return $this->rango;
    }

    /**
     * Set the value of
     *
     * @return  self
     */ 
    public function setRango($rango)
    {
        $this->rango = $rango;

        return $this;
    }

}


?>