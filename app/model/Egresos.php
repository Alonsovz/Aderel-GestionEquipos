<?php 

class Egresos extends ModeloBase{
    private $idEgreso;
    private $chNo;
    private $conceptoEgreso;
    private $cantidad;
    private $retencion;
    private $pagado;
    private $fechaEgreso;
    private $fecha;
    private $fecha2;
    private $mes;
    private $anio;
    private $idCheque;
    private $numeroCuenta;


    public function __construct() {

    }

    public function getNumeroCuenta()
    {
        return $this->numeroCuenta;
    }

    /**
     * Set the value of idEgreso
     *
     * @return  self
     */ 
    public function setNumeroCuenta($numeroCuenta)
    {
        $this->numeroCuenta = $numeroCuenta;

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

    public function getFechaEgreso()
    {
        return $this->fechaEgreso;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFechaEgreso($fechaEgreso)
    {
        $this->fechaEgreso = $fechaEgreso;

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

    /**
     * Get the value of idEgreso
     */ 
    public function getIdEgreso()
    {
        return $this->idEgreso;
    }

    /**
     * Set the value of idEgreso
     *
     * @return  self
     */ 
    public function setIdEgreso($idEgreso)
    {
        $this->idEgreso = $idEgreso;

        return $this;
    }

    /**
     * Get the value of chNO
     */ 
    public function getChNo()
    {
        return $this->chNo;
    }

    /**
     * Set the value of chNO
     *
     * @return  self
     */ 
    public function setChNo($chNo)
    {
        $this->chNo = $chNo;

        return $this;
    }


    /**
     * Get the value of conceptoIngreso
     */ 
    public function getConceptoEgreso()
    {
        return $this->conceptoEgreso;
    }

    /**
     * Set the value of conceptoIngreso
     *
     * @return  self
     */ 
    public function setConceptoEgreso($conceptoEgreso)
    {
        $this->conceptoEgreso = $conceptoEgreso;

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


    /**
     * Get the value of retencion
     */ 
    public function getRetencion()
    {
        return $this->retencion;
    }

    /**
     * Set the value of retencion
     *
     * @return  self
     */ 
    public function setRetencion($retencion)
    {
        $this->retencion = $retencion;

        return $this;
    }

    /**
     * Get the value of pagado
     */ 
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * Set the value of retencion
     *
     * @return  self
     */ 
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;

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


}
 
