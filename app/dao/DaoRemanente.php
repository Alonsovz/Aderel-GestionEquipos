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
        $query = "select format(( (select nuevoSaldo from remanentes where idRemanente=(select max(idRemanente) from remanentes))
        + ( select sum(cantidad) as total from ingresos where mes='{$this->objeto->getMes()}'
         and anio= '{$this->objeto->getAnio()}'  and idEliminado=1)),2)
        as totalSaldoIngresos";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function cuentasCorrientes() {
        $query = "select format(monto,2) as monto, chequera from chequeras where idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalCuentasCorrientes() {
        $query = "select format(sum(Monto),2) as totalCuentas from chequeras where idEliminado=1;";

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

    public function cajaChicaGeneral() {
        $query = "select *, format(montoActual,2) as montoActual from tipoCaja where idTipo=1";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function cajaChicaAderel() {
        $query = "select *, format(montoActual,2) as montoActual from tipoCaja where idTipo=2";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalCajas() {
        $query = "select format(sum(montoActual),2) as totalCajas from tipoCaja;";

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
        $_query = "select format(nuevoSaldo,2) as nuevoSaldo from remanentes where 
        idRemanente=(select max(idRemanente) from remanentes);";


        $resultado = $this->con->ejecutar($_query);
        
        return $resultado;
        
    }


}