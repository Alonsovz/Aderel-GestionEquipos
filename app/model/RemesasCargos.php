<?php 

class RemesasCargos extends ModeloBase{
    private $concepto;
    private $cantidad;
    private $idCheque;
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


    public function getIdCheque()
    {
        return $this->idCheque;
    }

    /**
     * Set the value of idEgreso
     *
     * @return  self
     */ 
    public function setIdCheque($idCheque)
    {
        $this->idCheque = $idCheque;

        return $this;
    }

    


    /**
     * Get the value of conceptoIngreso
     */ 
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set the value of conceptoIngreso
     *
     * @return  self
     */ 
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

     /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }


    


}
 
