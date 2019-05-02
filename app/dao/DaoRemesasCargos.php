<?php 

class DaoRemesasCargos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new RemesasCargos();
    }

    public function mostrarCargos()
    {
        $_query = "select c.*, format(c.monto,2) as monto,  ch.chequera as chequera,DATE_FORMAT(c.fecha, '%d/%m/%Y') as fecha from cargosBancarios c
        inner join chequeras ch on ch.idChequera = c.idChequera
          where c.idEliminado=1;";

        $resultado = $this->con->ejecutar($_query);

       
        $_json ='';
        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idCargo"].'\" class=\"ui btnEditarE icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i>Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idCargo"].'\" class=\"ui btnEliminarE icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i>Eliminar</button>';
            
            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';   
               
            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarRemesas()
    {
        $_query = "select c.*, format(c.monto,2) as monto,  ch.chequera as chequera,DATE_FORMAT(c.fecha, '%d/%m/%Y') as fecha from remesas c
        inner join chequeras ch on ch.idChequera = c.idChequera
          where c.idEliminado=1;";

        $resultado = $this->con->ejecutar($_query);

       
        $_json ='';
        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idRemesa"].'\" class=\"ui btnEditarE icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i>Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idRemesa"].'\" class=\"ui btnEliminarE icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i>Eliminar</button>';
            
            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';   
               
            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function registrarRemesa(){
        $_query = "insert into remesas values(null,'".$this->objeto->getConcepto()."','".$this->objeto->getCantidad()."',
        curdate(),'".$this->objeto->getIdCheque()."',1) ";
    
            $resultado = $this->con->ejecutar($_query);
    
            if($resultado) {
                return 1;
            } else {
                return 0;
            }
        }


        public function sumarRemesa(){
            $_query = "update chequeras set monto = monto + '".$this->objeto->getCantidad()."'
            where idChequera =".$this->objeto->getIdCheque();
        
                $resultado = $this->con->ejecutar($_query);
        
                
            }

            public function registrarCargo(){
                $_query = "insert into cargosBancarios values(null,'".$this->objeto->getConcepto()."','".$this->objeto->getCantidad()."',
                curdate(),'".$this->objeto->getIdCheque()."',1) ";
            
                    $resultado = $this->con->ejecutar($_query);
            
                    if($resultado) {
                        return 1;
                    } else {
                        return 0;
                    }
                }

            public function restarCargo(){
                $_query = "update chequeras set monto = monto - '".$this->objeto->getCantidad()."'
                where idChequera =".$this->objeto->getIdCheque();
            
                    $resultado = $this->con->ejecutar($_query);
            
                    
                }


}