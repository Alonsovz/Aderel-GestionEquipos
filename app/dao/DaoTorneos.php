<?php 

class DaoTorneos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Torneos();
    }


    public function mostrarTorneosM()
    {
        $_query = "select t.*, c.nombreCategoria as categoria from torneos t
        inner join categorias c on c.idCategoria  = t.idCategoria
         where t.idEliminado = 1 and t.idTorneo>2 and t.idGenero=2";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);
               
               

                $btnEditar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEditarT icon blue small button\" onclick=\"editarTorneo(this)\"><i class=\"edit icon\"></i></button>';
                $btnEliminar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEliminarT icon negative small button\" onclick=\"eliminarTorneo(this)\"><i class=\"trash icon\"></i></button>';
                $btnVer = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui icon green small button\" onclick=\"verEquipos(this)\"><i class=\"hand point right icon\"></i><i class=\"users icon\"></i><i class=\"hand point left icon\"></i></button>';

                $acciones = ', "Acciones": "'.$btnVer.''.$btnEditar.' '.$btnEliminar.'"';
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }

    public function mostrarTorneosF()
    {
        $_query = "select t.*, c.nombreCategoria as categoria from torneos t
        inner join categorias c on c.idCategoria  = t.idCategoria
         where t.idEliminado = 1 and t.idTorneo>1 and t.idGenero=1";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);
               
               

                $btnEditar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEditarT icon blue small button\" onclick=\"editarTorneo(this)\"><i class=\"edit icon\"></i></button>';
                $btnEliminar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEliminarT icon negative small button\" onclick=\"eliminarTorneo(this)\"><i class=\"trash icon\"></i></button>';
                $btnVer = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui icon green small button\" onclick=\"verEquipos(this)\"><i class=\"hand point right icon\"></i><i class=\"futbol icon\"></i><i class=\"hand point left icon\"></i></button>';

                $acciones = ', "Acciones": "'.$btnVer.''.$btnEditar.' '.$btnEliminar.'"';
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }

    public function registrarM(){
        $query = "Insert into torneos values (null,'".$this->objeto->getNombreTorneo()."','".$this->objeto->getNumeroEquipos()."',
        '".$this->objeto->getDisponibles()."',
        '".$this->objeto->getIdCategoria()."',2,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function cargarDatosTorneoM() {

        $_query = "select * from torneos
        where idGenero=2 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarTorneosM(){
        $_query = "select * from torneos where idEliminado=1 and idTorneo>1 and disponibles>0 and idGenero=2";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function verCategoriaM(){
        $_query = "select idCategoria from torneos where  idGenero=2 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        echo $json;

    }

    public function editarM() {
        $_query = "update torneos set nombreTorneo = '".$this->objeto->getNombreTorneo()."',
        numeroEquipos = '".$this->objeto->getNumeroEquipos()."',
        idCategoria = '".$this->objeto->getIdCategoria()."'
         where idGenero=2 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarM() {
        
        $_query = "update torneos set idEliminado=2 where idGenero=2 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function disponiblesM() {
        $resta = 1;
        $_query = "update torneos set disponibles= disponibles - ".$resta." where idGenero=2 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function registrarF(){
        $query = "Insert into torneos values (null,'".$this->objeto->getNombreTorneo()."','".$this->objeto->getNumeroEquipos()."',
        '".$this->objeto->getDisponibles()."',
        '".$this->objeto->getIdCategoria()."',1,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function cargarDatosTorneoF() {

        $_query = "select * from torneos
        where idGenero=1 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarTorneosF(){
        $_query = "select * from torneos where idEliminado=1 and idTorneo>1 and disponibles>0 and idGenero=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function verCategoriaF(){
        $_query = "select idCategoria from torneos where  idGenero=1 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        echo $json;

    }

    public function editarF() {
        $_query = "update torneos set nombreTorneo = '".$this->objeto->getNombreTorneo()."',
        numeroEquipos = '".$this->objeto->getNumeroEquipos()."',
        idCategoria = '".$this->objeto->getIdCategoria()."'
         where idGenero=1 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarF() {
        
        $_query = "update torneos set idEliminado=2 where idGenero=1 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function disponiblesF() {
        $resta = 1;
        $_query = "update torneos set disponibles= disponibles - ".$resta." where idGenero=1 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function mostrarEquiposCM(){
        $_query = "select * from equipos where idEliminado=1 and idGenero=2 and  idTorneo=".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }

    public function mostrarEquiposCF(){
        $_query = "select * from equipos where idEliminado=1 and idGenero=1 and  idTorneo=".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }


}


?>