<?php 

class DaoCajaChica extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new CajaChica();
    }

    public function mostrarGeneral()
    {
        $_query = "select *,format(cantidad,2) as cantidad, DATE_FORMAT(fecha, '%d/%m/%Y') as fecha  from cajaChica
        where  idEliminado=1 and idTipo=1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["id"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["id"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnVer = '<button id=\"'.$fila["id"].'\" class=\"ui icon green small button\" onclick=\"ver(this)\"><i class=\"list icon\"></i> Ver</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.''.$btnVer.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarAderel()
    {
        $_query = "select *,format(cantidad,2) as cantidad, DATE_FORMAT(fecha, '%d/%m/%Y') as fecha  from cajaChica
        where  idEliminado=1 and idTipo=2";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["id"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["id"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnVer = '<button id=\"'.$fila["id"].'\" class=\"ui icon green small button\" onclick=\"ver(this)\"><i class=\"list icon\"></i> Ver</button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.''.$btnVer.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    

    public function registrarGeneral() {
        $_query = "insert into cajaChica values(null,curdate(),'".$this->objeto->getCantidad()."',
        '".$this->objeto->getCantidadLetras()."','".$this->objeto->getConcepto()."','".$this->objeto->getRecibido()."',1,
        DATE_FORMAT(CURDATE(),'%m'),year(CURRENT_DATE()),1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function gestionCajaAderel() {
        $_query = "update tipoCaja set monto = '".$this->objeto->getCantidad()."' where idTipo=2;" ;

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function gestionCajaGeneral() {
        $_query = "update tipoCaja set monto = '".$this->objeto->getCantidad()."' where idTipo=1;" ;

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function nuevoMontoG() {
     //   $resta= $this->objeto->getCantidad();
        $_query = "update tipoCaja set montoActual = montoActual - '".$this->objeto->getCantidad()."' where idTipo=1;" ;

        $resultado = $this->con->ejecutar($_query);

        
    }

    public function nuevoMontoA() {
        //   $resta= $this->objeto->getCantidad();
           $_query = "update tipoCaja set montoActual = montoActual - '".$this->objeto->getCantidad()."' where idTipo=2;" ;
   
           $resultado = $this->con->ejecutar($_query);
   
           
       }

       public function reintegroCajaA() {
        //   $resta= $this->objeto->getCantidad();
           $_query = "update tipoCaja set montoActual = montoActual + '".$this->objeto->getCantidad()."' where idTipo=2;" ;
   
           $resultado = $this->con->ejecutar($_query);
   
           
       }

       public function reintegroCajaG() {
        //   $resta= $this->objeto->getCantidad();
           $_query = "update tipoCaja set montoActual = montoActual + '".$this->objeto->getCantidad()."' where idTipo=1;" ;
   
           $resultado = $this->con->ejecutar($_query);
   
           
       }

    public function registrarAderel() {
        $_query = "insert into cajaChica values(null,curdate(),'".$this->objeto->getCantidad()."',
        '".$this->objeto->getCantidadLetras()."','".$this->objeto->getConcepto()."','".$this->objeto->getRecibido()."',2,
        DATE_FORMAT(CURDATE(),'%m'),year(CURRENT_DATE()),1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function registrarF() {
        $_query = "insert into categorias values(null,'".$this->objeto->getNombreCategoria()."',
         '".$this->objeto->getEdadMinima()."',1,1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function eliminarM() {
        $_query = "update categorias set idEliminado=2 where idGenero=2 and idCategoria = ".$this->objeto->getIdCategoria();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editarM() {
        $_query = "update categorias set nombreCategoria ='".$this->objeto->getNombreCategoria()."',
        edadMinima = '".$this->objeto->getEdadMinima()."'
         where idGenero=2 and idCategoria = ".$this->objeto->getIdCategoria();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function cargarDatosCategoriaM() {

        $_query = "select * from categorias
        where idGenero=2 and idCategoria = ".$this->objeto->getIdCategoria();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function montoEnCajaG() {
        $_query = "select *, format(monto,2) as monto from tipoCaja where idTipo=1";

        $resultado = $this->con->ejecutar($_query);

        $mon = '';

        while($fila = $resultado->fetch_assoc()) {
            $mon = $fila['monto'];
        }

        //$json = substr($json,0, strlen($json) - 1);

        return $mon;
    }

    public function montoEnCajaActualG() {
        $_query = "select *, format(montoActual,2) as montoActual from tipoCaja where idTipo=1";

        $resultado = $this->con->ejecutar($_query);

        $mon = '';

        while($fila = $resultado->fetch_assoc()) {
            $mon = $fila['montoActual'];
        }

        //$json = substr($json,0, strlen($json) - 1);

        return $mon;
    }

    public function montoEnCajaActualA() {
        $_query = "select *, format(montoActual,2) as montoActual from tipoCaja where idTipo=2";

        $resultado = $this->con->ejecutar($_query);

        $mon = '';

        while($fila = $resultado->fetch_assoc()) {
            $mon = $fila['montoActual'];
        }

        //$json = substr($json,0, strlen($json) - 1);

        return $mon;
    }

    public function montoEnCajaA() {
        $_query = "select *, format(monto,2) as monto from tipoCaja where idTipo=2";

        $resultado = $this->con->ejecutar($_query);

        $mon = '';

        while($fila = $resultado->fetch_assoc()) {
            $mon = $fila['monto'];
        }

        //$json = substr($json,0, strlen($json) - 1);

        return $mon;
    }


    

}

?>