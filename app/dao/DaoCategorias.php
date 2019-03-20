<?php 

class DaoCategorias extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Categorias();
    }

    public function mostrarCategoriasM()
    {
        $_query = "select * from categorias
        where  idEliminado=1 and idCategoria>2 and idGenero=2;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idCategoria"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editarCategoria(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idCategoria"].'\" class=\"ui btnEliminarC icon yellow small button\" onclick=\"eliminarCategoria(this)\"><i class=\"trash icon\"></i></button>';
            $btnTorneos = '<button id=\"'.$fila["idCategoria"].'\" class=\"ui icon green small button\" onclick=\"verTorneosM(this)\"><i class=\"trophy icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.''.$btnTorneos.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function mostrarCategoriasF()
    {
        $_query = "select * from categorias
        where  idEliminado=1 and idCategoria>1 and idGenero=1;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idCategoria"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editarCategoria(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idCategoria"].'\" class=\"ui btnEliminarC icon yellow small button\" onclick=\"eliminarCategoria(this)\"><i class=\"trash icon\"></i></button>';
            $btnTorneos = '<button id=\"'.$fila["idCategoria"].'\" class=\"ui icon green small button\" onclick=\"verTorneosF(this)\"><i class=\"trophy icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.''.$btnTorneos.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function registrarM() {
        $_query = "insert into categorias values(null,'".$this->objeto->getNombreCategoria()."',
         '".$this->objeto->getEdadMinima()."',2,1)";

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


    public function eliminarF() {
        $_query = "update categorias set idEliminado=2 where idGenero=1 and idCategoria = ".$this->objeto->getIdCategoria();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editarF() {
        $_query = "update categorias set nombreCategoria ='".$this->objeto->getNombreCategoria()."',
        edadMinima = '".$this->objeto->getEdadMinima()."'
         where idGenero=1 and idCategoria = ".$this->objeto->getIdCategoria();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function cargarDatosCategoriaF() {

        $_query = "select * from categorias
        where idGenero=1 and idCategoria = ".$this->objeto->getIdCategoria();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function mostrarCategoriasCmbM() {
        $_query = "select * from categorias where idEliminado=1 and idCategoria>2 and idGenero=2";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '{"val": '.$fila['idCategoria'].', "text": "'.$fila['nombreCategoria'].'"},';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarCategoriasCmbF() {
        $_query = "select * from categorias where idEliminado=1 and idCategoria>1 and idGenero=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '{"val": '.$fila['idCategoria'].', "text": "'.$fila['nombreCategoria'].'"},';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarTorneosCM(){
        $_query = "select t.*, c.nombreCategoria as nombreC from torneos t
        inner join categorias c on c.idCategoria = t.idCategoria
         where t.idEliminado=1 and t.idGenero=2 and  t.idCategoria=".$this->objeto->getIdCategoria();

        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }

    public function mostrarTorneosCF(){
        $_query = "select * from torneos where idEliminado=1 and idGenero=1 and  idCategoria=".$this->objeto->getIdCategoria();

        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }

}

?>