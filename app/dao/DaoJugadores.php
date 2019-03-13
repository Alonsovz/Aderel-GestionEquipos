<?php 

class DaoJugadores extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Jugadores();
    }

    public function registrarJugador(){
        $query = "Insert into jugadores values (null,'".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getDui()."','".$this->objeto->getImg()."','".$this->objeto->getFechaNacimiento()."',
        '".$this->objeto->getEdad()."',
        '".$this->objeto->getIdEquipo()."',1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarJugadores()
    {
        $_query = "select j.*, e.nombre as Equipo from jugadores j
        inner join equipos e on e.idEquipo  = j.idEquipo
         where j.idEliminado = 1";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);
               
               

                $btnEditar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEditarJ icon blue small button\" onclick=\"editarJugador(this)\"><i class=\"edit icon\"></i></button>';
                $btnEliminar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEliminarJ icon negative small button\" onclick=\"eliminarJugador(this)\"><i class=\"trash icon\"></i></button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }

    public function eliminar() {
        $_query = "update jugadores set idEliminado=2 where idJugador = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    



    public function cargarDatosJugador() {

        $_query = "select * from jugadores
        where idJugador = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);
        $_json = '';

        while($fila = $resultado->fetch_assoc()) {
                    
            $object = json_encode($fila);

                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';
                $acciones = ', "imagen": "'.$imagen.'"';

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
          $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);
    
        return $_json;
    }


    public function EDITAR() {
        $_query = "update jugadores set nombre='".$this->objeto->getNombre()."', apellido = '".$this->objeto->getApellido()."',
        dui= '".$this->objeto->getDui()."', foto = '".$this->objeto->getImg()."', 
          fechaNacimiento = '".$this->objeto->getFechaNacimiento()."', 
        edad ='".$this->objeto->getEdad()."', idEquipo = '".$this->objeto->getIdEquipo()."'
         where idJugador = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }
    

}

