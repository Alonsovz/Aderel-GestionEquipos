<?php 

class Remanentes extends ModeloBase{
    private $saldoAnterior;
    private $totalSaldoIngresos;
    private $cuentaCorriente;
    private $efectivo;
    private $cajaChica;
    private $nuevoSaldo;
    private $mes; 
    private $anio;

    public function __construct() {

    }
    public function getSaldoAnterior()
    {
        return $this->saldoAnterior;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setSaldoAnterior($saldoAnterior)
    {
        $this->saldoAnterior = $saldoAnterior;

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
    public function setTotalSaldoIngresos($totalSaldoIngresos)
    {
        $this->totalSaldoIngresos = $totalSaldoIngresos;

        return $this;
    }

    public function getTotalSaldoIngresos()
    {
        return $this->totalSaldoIngresos;
    }

    public function setCuentaCorriente($cuentaCorriente)
    {
        $this->cuentaCorriente = $cuentaCorriente;

        return $this;
    }

    public function getCuentaCorriente()
    {
        return $this->cuentaCorriente;
    }

    public function setEfectivo($efectivo)
    {
        $this->efectivo = $efectivo;

        return $this;
    }

    public function getEfectivo()
    {
        return $this->efectivo;
    }

    public function setCajaChica($cajaChica)
    {
        $this->cajaChica = $cajaChica;

        return $this;
    }

    public function getCajaChica()
    {
        return $this->cajaChica;
    }

    public function setNuevoSaldo($nuevoSaldo)
    {
        $this->nuevoSaldo = $nuevoSaldo;

        return $this;
    }

    public function getNuevoSaldo()
    {
        return $this->nuevoSaldo;
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

