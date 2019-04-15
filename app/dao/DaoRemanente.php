<?php 

class DaoRemanente extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Remanentes();
    }

    public function registrar() {
        $_query = "call registrarRemanente('".$this->objeto->getTotalSaldoIngresos()."','".$this->objeto->getSaldoAnterior()."',
        '".$this->objeto->getCuentaCorriente()."','".$this->objeto->getEfectivo()."',
         '".$this->objeto->getCajaChica()."', '".$this->objeto->getNuevoSaldo()."','".$this->objeto->getMes()."',
         '".$this->objeto->getAnio()."')";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function totalSaldo() {
        $query = "select format(totalSaldoIngresos,2) as totalSaldoIngresos from remanentes 
        where idRemanente=(select max(idRemanente) from remanentes)
        and mes='{$this->objeto->getMes()}' and anio='{$this->objeto->getAnio()}'";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function cuentaCorriente() {
        $query = "select format(cuentaCorriente,2) as cuentaCorriente from remanentes
         where idRemanente=(select max(idRemanente) from remanentes)
         and mes='{$this->objeto->getMes()}' and anio='{$this->objeto->getAnio()}'";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function efectivo() {
        $query = "select format(efectivo,2) as efectivo from remanentes 
        where idRemanente=(select max(idRemanente) from remanentes)
        and mes='{$this->objeto->getMes()}' and anio='{$this->objeto->getAnio()}'";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function cajaChica() {
        $query = "select format(cajaChica,2) as cajaChica from remanentes 
        where idRemanente=(select max(idRemanente) from remanentes)
        and mes='{$this->objeto->getMes()}' and anio='{$this->objeto->getAnio()}'";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function nuevoSaldo() {
        $query = "select format(nuevoSaldo,2) as nuevoSaldo from remanentes
         where idRemanente=(select max(idRemanente) from remanentes)
         and mes='{$this->objeto->getMes()}' and anio='{$this->objeto->getAnio()}'";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function saldoAnterior() {
        $_query = "select format(nuevoSaldo,2) as nuevoSaldo from remanentes 
        where idRemanente=(select max(idRemanente) from remanentes) ";

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
        
    }

    public function saldoAnteriorMes() {
        $_query = "select format(saldoAnterior,2) as saldoAnterior from remanentes where 
        idRemanente=(select max(idRemanente) from remanentes) 
        and mes='{$this->objeto->getMes()}' and anio='{$this->objeto->getAnio()}'";


        $resultado = $this->con->ejecutar($_query);
        
        return $resultado;
        
    }


}