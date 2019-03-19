<?php 

class DaoJugadores extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Jugadores();
    }

    public function registrarJugadorM(){
        $corr= "(select max(idJugador)+1 as id from jugadores)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();

        $idExp = '';

        if($fila["id"]<10){
            $idExp ='FF00000'.$fila['id'].'';
        }
        if($fila["id"]>9){
            $idExp = 'FF0000'.$fila['id'].'';
        }
        else if($fila["id"]>99){
            $idExp = 'FF000'.$fila['id'].'';

        }
        else if($fila["id"]>999){
            $idExp = 'FF00'.$fila['id'].'';

        }
        else if($fila["id"]>9999){
            $idExp = 'FF0'.$fila['id'].'';
        }

        else if($fila["id"]>99999){
            $idExp = 'FF'.$fila['id'].'';
        }



        $query = "Insert into jugadores values (null,'".$idExp."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getDui()."','".$this->objeto->getImg()."','".$this->objeto->getFechaNacimiento()."',
        '".$this->objeto->getEdad()."',1,2,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarJugadoresM()
    {
        $_query = "select j.* from jugadores j
         where j.idEliminado = 1 and j.idGenero = 2 and j.idJugador>2";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);


                $btnInscrbir = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnInscribir icon green small button\" onclick=\"verHistorial(this)\"><i class=\"futbol icon\"></i></button>';
                $btnEditar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEditarJ icon blue small button\" onclick=\"editarJugador(this)\"><i class=\"edit icon\"></i></button>';
                $btnEliminar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEliminarJ icon negative small button\" onclick=\"eliminarJugador(this)\"><i class=\"trash icon\"></i></button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

                $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnInscrbir.''.$btnEditar.' '.$btnEliminar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }

    public function eliminarM() {
        $_query = "update jugadores set idEliminado=2 where idGenero = 2 and idJugador = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function inscribirM() {
        $_query = "update jugadores set idInscripcion=2, idEquipo= '".$this->objeto->getIdEquipo()."'
         where idGenero = 2 and  idJugador = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    



    public function cargarDatosJugadorM() {

        $_query = "select * from jugadores
        where idGenero = 2 and  idJugador = ".$this->objeto->getIdJugador();

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


    public function editarM() {
        $_query = "update jugadores set nombre='".$this->objeto->getNombre()."', apellido = '".$this->objeto->getApellido()."',
        dui= '".$this->objeto->getDui()."', 
        fechaNacimiento = '".$this->objeto->getFechaNacimiento()."', 
        edad ='".$this->objeto->getEdad()."',foto='".$this->objeto->getImg()."'
         where idGenero = 2 and  idJugador = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function registrarJugadorF(){
        $corr= "(select max(idJugador)+1 as id from jugadores  where idGenero=1)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();

        $idExp = '';

        if($fila["id"]<10){
            $idExp ='FF00000'.$fila['id'].'';
        }
        if($fila["id"]>9){
            $idExp = 'FF0000'.$fila['id'].'';
        }
        else if($fila["id"]>99){
            $idExp = 'FF000'.$fila['id'].'';

        }
        else if($fila["id"]>999){
            $idExp = 'FF00'.$fila['id'].'';

        }
        else if($fila["id"]>9999){
            $idExp = 'FF0'.$fila['id'].'';
        }

        else if($fila["id"]>99999){
            $idExp = 'FF'.$fila['id'].'';
        }



        $query = "Insert into jugadores values (null,'".$idExp."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getDui()."','".$this->objeto->getImg()."','".$this->objeto->getFechaNacimiento()."',
        '".$this->objeto->getEdad()."',1,1,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarJugadoresF()
    {
        $_query = "select j.* from jugadores j
         where j.idEliminado = 1 and j.idGenero=1 and j.idJugador>2";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);

               
                
                $btnInscrbir = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnInscribir icon green small button\" onclick=\"verHistorial(this)\"><i class=\"futbol icon\"></i></button>';
                $btnEditar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEditarJ icon blue small button\" onclick=\"editarJugador(this)\"><i class=\"edit icon\"></i></button>';
                $btnEliminar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEliminarJ icon negative small button\" onclick=\"eliminarJugador(this)\"><i class=\"trash icon\"></i></button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

                $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnInscrbir.''.$btnEditar.' '.$btnEliminar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }

    public function eliminarF() {
        $_query = "update jugadores set idEliminado=2 where idGenero = 1 and idJugador = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function inscribirF() {
        $_query = "update jugadores set idInscripcion=2, idEquipo= '".$this->objeto->getIdEquipo()."'
         where idGenero = 1 and  idJugador = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    



    public function cargarDatosJugadorF() {

        $_query = "select * from jugadores
        where idGenero = 1 and  idJugador = ".$this->objeto->getIdJugador();

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


    public function editarF() {
        $_query = "update jugadores set nombre='".$this->objeto->getNombre()."', apellido = '".$this->objeto->getApellido()."',
        dui= '".$this->objeto->getDui()."', 
        fechaNacimiento = '".$this->objeto->getFechaNacimiento()."', 
        edad ='".$this->objeto->getEdad()."', foto='".$this->objeto->getImg()."'
         where idGenero = 1 and  idJugador = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }
    

}