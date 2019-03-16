<?php 

class DaoTorneos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Torneos();
    }


    public function mostrarTorneos()
    {
        $_query = "select t.*, c.nombreCategoria as categoria from torneos t
        inner join categorias c on c.idCategoria  = t.idCategoria
         where t.idEliminado = 1 and t.idTorneo>1";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);
               
               

                $btnEditar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEditarT icon blue small button\" onclick=\"editarTorneo(this)\"><i class=\"edit icon\"></i></button>';
                $btnEliminar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEliminarT icon negative small button\" onclick=\"eliminarTorneo(this)\"><i class=\"trash icon\"></i></button>';
                

                $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }

    public function registrar(){
        $query = "Insert into torneos values (null,'".$this->objeto->getNombreTorneo()."','".$this->objeto->getNumeroEquipos()."',
        '".$this->objeto->getDisponibles()."',
        '".$this->objeto->getIdCategoria()."',1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function cargarDatosTorneo() {

        $_query = "select * from torneos
        where idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarTorneos(){
        $_query = "select * from torneos where idEliminado=1 and idTorneo>1 and disponibles>0";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function verCategoria(){
        $_query = "select idCategoria from torneos where idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        echo $json;

    }

    public function editar() {
        $_query = "update torneos set nombreTorneo = '".$this->objeto->getNombreTorneo()."',
        numeroEquipos = '".$this->objeto->getNumeroEquipos()."',
        idCategoria = '".$this->objeto->getIdCategoria()."'
         where idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminar() {
        
        $_query = "update torneos set idEliminado=2 where idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function disponibles() {
        $resta = 1;
        $_query = "update torneos set disponibles= disponibles - ".$resta." where idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


}


?>