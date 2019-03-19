<?php 

class DaoEquipos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Equipos();
    }

    public function mostrarEquiposF()
    {
        $_query = "select e.*, c.nombreCategoria as Categoria, i.estado as estado, t.nombreTorneo as torneo from equipos e
        inner join categorias c on c.idCategoria = e.idCategoria
        inner join inscripcion i on i.idInscripcion = e.idInscripcion
        inner join torneos t on t.idTorneo = e.idTorneo
        where  e.idEliminado=1 and e.idEquipo>1 and e.idGenero=1;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnEditarE icon yellow small button\" onclick=\"editarEquipo(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnEliminarE icon negative small button\" onclick=\"eliminarEquipo(this)\"><i class=\"trash icon\"></i></button>';
            $btnVer = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnVerT icon blue small button\" onclick=\"verJugadores(this)\"><i class=\"hand point right icon\"></i><i class=\"users icon\"></i><i class=\"hand point left icon\"></i></button>';
            $btnCancelar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnVerT icon purple small button\" onclick=\"enviarFondo(this)\"><i class=\"hand point right icon\"></i><i class=\"close icon\"></i></i></button>';


            if($fila["idInscripcion"]== 1){
                $btnInscrbir = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnInscribir icon green small button\" onclick=\"inscribirEquipo(this)\"><i class=\"futbol icon\"></i></button>';
                
                $acciones = ', "Acciones": "'.$btnInscrbir.''.$btnEditar.' '.$btnEliminar.'"';
            }
               else{
                $btnInscrbir = '';
                $acciones = ', "Acciones": "'.$btnVer.''.$btnEditar.' '.$btnCancelar.' '.$btnEliminar.'"';
               }
            
            
            
           

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function mostrarEquiposM()
    {
        $_query = "select e.*, c.nombreCategoria as Categoria, i.estado as estado, t.nombreTorneo as torneo from equipos e
        inner join categorias c on c.idCategoria = e.idCategoria
        inner join inscripcion i on i.idInscripcion = e.idInscripcion
        inner join torneos t on t.idTorneo = e.idTorneo
        where  e.idEliminado=1  and e.idGenero=2 and e.idEquipo>2;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnEditarE icon yellow small button\" onclick=\"editarEquipo(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnEliminarE icon negative small button\" onclick=\"eliminarEquipo(this)\"><i class=\"trash icon\"></i></button>';
            $btnVer = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnVerT icon blue small button\" onclick=\"verJugadores(this)\"><i class=\"hand point right icon\"></i><i class=\"users icon\"></i><i class=\"hand point left icon\"></i></button>';
            $btnCancelar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnVerT icon purple small button\" onclick=\"enviarFondo(this)\"><i class=\"hand point right icon\"></i><i class=\"close icon\"></i></i></button>';


            if($fila["idInscripcion"]== 1){
                $btnInscrbir = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnInscribir icon green small button\" onclick=\"inscribirEquipo(this)\"><i class=\"futbol icon\"></i></button>';
                
                $acciones = ', "Acciones": "'.$btnInscrbir.''.$btnEditar.' '.$btnEliminar.'"';
            }
               else{
                $btnInscrbir = '';
                $acciones = ', "Acciones": "'.$btnVer.''.$btnEditar.' '.$btnCancelar.' '.$btnEliminar.'"';
               }
            
            
            
           

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function registrarM() {
        $_query = "insert into equipos values(null,'".$this->objeto->getNombreEquipo()."', '".$this->objeto->getEncargado()."',
        '".$this->objeto->getEncargadoAux()."',
        '".$this->objeto->getIdCategoria()."',1,1,2,2,1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function eliminarM() {
        $_query = "update equipos set idEliminado=2 where idGenero=2 and idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editarM() {
        $_query = "update equipos set nombre ='".$this->objeto->getNombreEquipo()."',encargado = '".$this->objeto->getEncargado()."',
        encargadoAux = '".$this->objeto->getEncargadoAux()."',
        idCategoria = '".$this->objeto->getIdCategoria()."'
         where idGenero=2 and idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function inscribirM() {
        $_query = "update equipos set idInscripcion=2, idTorneo='".$this->objeto->getIdTorneo()."'
         where idGenero=2 and idEquipo= ".$this->objeto->getIdEquipo();
         

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    

    public function cargarDatosEquipoM() {

        $_query = "select * from equipos
        where idGenero=2 and idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarDatosEquipoInsM() {

        $_query = "select e.*, c.nombreCategoria as categorias,c.idCategoria as id from equipos e
        inner join categorias c on c.idCategoria = e.idCategoria
        where e.idGenero=2 and  e.idEquipo= ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function mostrarEquiposCmbM() {
        $_query = "select * from equipos where idEliminado=1 and idEquipo>2 and idGenero=2";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function mostrarEquipoCmbM() {
        $_query = "select * from equipos where idEliminado=1 and idGenero=2 and idEquipo>2";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '{"val": '.$fila['idEquipo'].', "text": "'.$fila['nombre'].'"},';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }




    public function registrarF() {
        $_query = "insert into equipos values(null,'".$this->objeto->getNombreEquipo()."', '".$this->objeto->getEncargado()."',
        '".$this->objeto->getEncargadoAux()."','".$this->objeto->getIdCategoria()."',1,1,1,1,1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function eliminarF() {
        $_query = "update equipos set idEliminado=2 where idGenero=1 and idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editarF() {
        $_query = "update equipos set nombre ='".$this->objeto->getNombreEquipo()."',encargado = '".$this->objeto->getEncargado()."',
        encargadoAux = '".$this->objeto->getEncargadoAux()."',
        idCategoria = '".$this->objeto->getIdCategoria()."'
         where idGenero=1 and idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function inscribirF() {
        $_query = "update equipos set idInscripcion=2, idTorneo='".$this->objeto->getIdTorneo()."'
         where idGenero=1 and idEquipo= ".$this->objeto->getIdEquipo();
         

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    

    public function cargarDatosEquipoF() {

        $_query = "select * from equipos
        where idGenero=1 and idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarDatosEquipoInsF() {

        $_query = "select e.*, c.nombreCategoria as categorias,c.idCategoria as id from equipos e
        inner join categorias c on c.idCategoria = e.idCategoria
        where e.idGenero=1 and  e.idEquipo= ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function mostrarEquiposCmbF() {
        $_query = "select * from equipos where idEliminado=1 and idEquipo>1 and idGenero=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function mostrarEquipoCmbF() {
        $_query = "select * from equipos where idEliminado=1 and idGenero=1 and idEquipo>1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '{"val": '.$fila['idEquipo'].', "text": "'.$fila['nombre'].'"},';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

}

?>