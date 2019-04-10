<?php 

class DaoEgresos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Egresos();
    }

    public function mostrarEgresos() {
        $_query = "select e.*, c.chequera as chequera  from egresos e 
        inner join chequeras c on c.idChequera = e.idChequera
        where e.idEliminado=1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idEgreso"].'\" class=\"ui btnEditar icon blue small button\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idEgreso"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarChequeras() {
        $_query = "select * from chequeras where idEliminado=1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idChequera"].'\" class=\"ui btnEditar icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idChequera"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function cargarDatosEgresos() {

        $_query = "select *  from egresos where idEgreso = ".$this->objeto->getIdEgreso();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarDatosChequeras() {

        $_query = "select * from chequeras where idChequera = ".$this->objeto->getIdEgreso();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function registrar(){
    $_query = "insert into egresos values(null,'".$this->objeto->getChNo()."', '".$this->objeto->getConceptoEgreso()."',
    '".$this->objeto->getCantidad()."', '".$this->objeto->getRetencion()."', '".$this->objeto->getPagado()."', curdate(),
     '".$this->objeto->getMes()."','".$this->objeto->getAnio()."','".$this->objeto->getIdCheque()."',1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function registrarChequera(){
        $_query = "insert into chequeras values(null,'".$this->objeto->getConceptoEgreso()."',1) ";
    
            $resultado = $this->con->ejecutar($_query);
    
            if($resultado) {
                return 1;
            } else {
                return 0;
            }
        }

    public function editar() {
        $_query = "call editarEgreso('".$this->objeto->getChNo()."', '".$this->objeto->getConceptoEgreso()."',
        '".$this->objeto->getCantidad()."', '".$this->objeto->getRetencion()."', '".$this->objeto->getPagado()."',
        ".$this->objeto->getIdCheque().",".$this->objeto->getIdEgreso().")";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function editarChequera() {
        $_query = "update chequeras set chequera ='".$this->objeto->getConceptoEgreso()."'
         where idChequera = ".$this->objeto->getIdEgreso();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function mostrarChequerasCMB() {
        $_query = "select * from chequeras where idEliminado=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarChequeCmb() {
        $_query = "select * from chequeras where idEliminado=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '{"val": '.$fila['idChequera'].', "text": "'.$fila['chequera'].'"},';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function eliminarChequera() {
        $_query = "update chequeras set idEliminado=2 where idChequera = ".$this->objeto->getIdChequera();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminar() {
        $_query = "update egresos set idEliminado=2 where idEgreso = ".$this->objeto->getIdEgreso();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getCheque()
    {

        $_query="select idEgreso,chNo from egresos WHERE chNo='".$this->objeto->getChNo()."' and idEliminado=1";
       

        $resultado=$this->con->ejecutar($_query)->fetch_assoc();
        if($resultado['chNo']!=null)
        {
            return 1;
        }
        else
        {
            return 0;
        }
        
        

    }

    public function reporteEgresoPorFechas() {
        $query = "call reporteEgresosPorFechas('{$this->objeto->getFecha()}','{$this->objeto->getFecha2()}')";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function reporteEgresosPorMes() {
        $query = "call reporteEgresosPorMes('{$this->objeto->getMes()}','{$this->objeto->getAnio()}')";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function mostrarTotal() {
        $_query = "select format(SUM(Cantidad),2) as cantidad, format(SUM(retencion),2) as retencion, format(SUM(pagado),2) as pagado,idEliminado
         from egresos where idEliminado=1
         and mes='{$this->objeto->getMes()}' and anio='{$this->objeto->getAnio()}'";

        $resultado = $this->con->ejecutar($_query);

        if($resultado->num_rows == 1) {
            $fila = $resultado->fetch_assoc();

            if($fila["idEliminado"] == 1) {
                //session_unset();
                session_start();
                 $_SESSION["cantidad"] = $fila["cantidad"];
                 $_SESSION["retencion"] = $fila["retencion"];
                 $_SESSION["pagado"] = $fila["pagado"];
                            
                    return 1;
                
            } 
            else{
                return 2;
            }
        }
        else {
            return 0;
        }
        
    }
    public function totalCantidad() {
        $query = "select format(sum(cantidad),2) as cantidad from egresos where mes='{$this->objeto->getMes()}'
         and anio= '{$this->objeto->getAnio()}' and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalRetencion() {
        $query = "select format(sum(retencion),2) as retencion from egresos where mes='{$this->objeto->getMes()}'
         and anio= '{$this->objeto->getAnio()}' and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalPagado() {
        $query = "select format(sum(pagado),2) as pagado from egresos where mes='{$this->objeto->getMes()}'
         and anio= '{$this->objeto->getAnio()}' and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalCantidadFechas() {
        $query = "select format(sum(cantidad),2) as cantidad from egresos where 
        fechaEgreso between '{$this->objeto->getFecha()}' and '{$this->objeto->getFecha2()}' and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalRetencionFechas() {
        $query = "select format(sum(retencion),2) as retencion,fechaEgreso from egresos where fechaEgreso
         between '{$this->objeto->getFecha()}'
        and '{$this->objeto->getFecha2()}' and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalPagadoFechas() {
        $query = "select format(sum(pagado),2) as pagado,fechaEgreso from egresos where fechaEgreso
         between '{$this->objeto->getFecha()}'
         and '{$this->objeto->getFecha2()}' and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function totaldia() {
        $query = "select format(sum(cantidad),2) as total from egresos where start=curdate() and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function reporteDiarioEgresos() {
        $query = "call reporteDiarioEgresos()";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalCantidadDia() {
        $query = "select format(sum(cantidad),2) as cantidad from egresos where fechaEgreso=curdate() and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalRetencionDia() {
        $query = "select format(sum(retencion),2) as retencion from egresos where fechaEgreso=curdate() and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalPagadoDia() {
        $query = "select format(sum(pagado),2) as pagado from egresos where fechaEgreso=curdate() and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }
}    