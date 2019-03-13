<?php 

class DaoCategorias extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Categorias();
    }

    public function mostrarCategorias()
    {
        $_query = "call mostrarCategorias()";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idCategoria"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editarCategoria(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idCategoria"].'\" class=\"ui btnEliminarC icon yellow small button\" onclick=\"eliminarCategoria(this)\"><i class=\"trash icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function registrar() {
        $_query = "insert into categorias values(null,'".$this->objeto->getNombreCategoria()."',
         '".$this->objeto->getEdadMinima()."','".$this->objeto->getEdadMaxima()."',1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function eliminar() {
        $_query = "update categorias set idEliminado=2 where idCategoria = ".$this->objeto->getIdCategoria();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editar() {
        $_query = "update categorias set nombreCategoria ='".$this->objeto->getNombreCategoria()."',
        edadMinima = '".$this->objeto->getEdadMinima()."', edadMaxima = '".$this->objeto->getEdadMaxima()."'
         where idCategoria = ".$this->objeto->getIdCategoria();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function cargarDatosCategoria() {

        $_query = "select * from categorias
        where idCategoria = ".$this->objeto->getIdCategoria();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function mostrarCategoriasCmb() {
        $_query = "select * from categorias where idEliminado=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '{"val": '.$fila['idCategoria'].', "text": "'.$fila['nombreCategoria'].'"},';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

}

?>