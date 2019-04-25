<?php 

class cajaChica extends ModeloBase{
    
    private $cantidad;
    private $cantidadLetras;
    private $concepto;
    private $recibido;
    private $idVale;
    private $id;

    
    

    public function __construct() {

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


    /**
     * Get the value of 
     */ 
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set the value of 
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


    public function getCantidadLetras()
    {
        return $this->cantidadLetras;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidadLetras($cantidadLetras)
    {
        $this->cantidadLetras = $cantidadLetras;

        return $this;
    }



    public function getRecibido()
    {
        return $this->recibido;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setRecibido($recibido)
    {
        $this->recibido = $recibido;

        return $this;
    }


    public function getIdVale()
    {
        return $this->idVale;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setIdVale($idVale)
    {
        $this->idVale = $idVale;

        return $this;
    }

   


}
 
