<?php 

class DaoEquipos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Equipos();
    }

    public function mostrarEquipos()
    {
        $_query = "call mostrarEquipos()";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            if($fila["idInscripcion"]== 1){
                $btnInscrbir = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnInscribir icon green small button\" onclick=\"inscribirEquipo(this)\"><i class=\"futbol icon\"></i></button>';
               }
               else{
                $btnInscrbir = '';
               }
            $btnEditar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnEditarE icon yellow small button\" onclick=\"editarEquipo(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnEliminarE icon negative small button\" onclick=\"eliminarEquipo(this)\"><i class=\"trash icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnInscrbir.''.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function registrar() {
        $_query = "insert into equipos values(null,'".$this->objeto->getNombreEquipo()."', '".$this->objeto->getEncargado()."',
        '".$this->objeto->getIdCategoria()."',1,1,1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function eliminar() {
        $_query = "update equipos set idEliminado=2 where idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editar() {
        $_query = "update equipos set nombre ='".$this->objeto->getNombreEquipo()."',encargado = '".$this->objeto->getEncargado()."',
        idCategoria = '".$this->objeto->getIdCategoria()."'
         where idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function inscribir() {
        $_query = "update equipos set idInscripcion=2, idTorneo='".$this->objeto->getIdTorneo()."'
         where idEquipo= ".$this->objeto->getIdEquipo();
         

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    

    public function cargarDatosEquipo() {

        $_query = "select * from equipos
        where idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarDatosEquipoIns() {

        $_query = "select e.*, c.nombreCategoria as categorias,c.idCategoria as id from equipos e
        inner join categorias c on c.idCategoria = e.idCategoria
        where e.idEquipo= ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function mostrarEquiposCmb() {
        $_query = "select * from equipos where idEliminado=1 and idEquipo>1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function mostrarEquipoCmb() {
        $_query = "select * from equipos where idEliminado=1";

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