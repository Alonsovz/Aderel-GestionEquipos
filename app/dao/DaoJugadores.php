<?php 

class DaoJugadores extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Jugadores();
    }

    public function registrarJugador(){
        $query = "Insert into jugadores values ('".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFoto()."','".$this->objeto->getDui()."','".$this->objeto->getFechaNacimiento()."',
        '".$this->objeto->getIdEquipo()."','".$this->objeto->getIdCategoria()."');";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarJugadores()
    {
        $_query = "select j.*, e.nombre as Equipo, c.nombreCategoria as Categoria from jugadores j
        inner join equipos e on e.idEquipo  = j.idEquipo
        inner join categorias c on c.idCategoria = j.idCategoria
         where j.idEliminado = 1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           $foto = '<img src="data:image/jpeg;base64,'.base64_encode( $fila['foto'] ).'" width="10px" height="10px"/> ';
            $btnEditar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEditar icon blue small button\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

}

