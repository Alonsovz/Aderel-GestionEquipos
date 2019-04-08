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
            $idExp ='FM00000'.$fila['id'].'';
        }
        if($fila["id"]>9){
            $idExp = 'FM0000'.$fila['id'].'';
        }
        else if($fila["id"]>99){
            $idExp = 'FM000'.$fila['id'].'';

        }
        else if($fila["id"]>999){
            $idExp = 'FM00'.$fila['id'].'';

        }
        else if($fila["id"]>9999){
            $idExp = 'FM0'.$fila['id'].'';
        }

        else if($fila["id"]>99999){
            $idExp = 'FM'.$fila['id'].'';
        }



        $query = "Insert into jugadores values (null,'".$idExp."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getDui()."','".$this->objeto->getImg()."','".$this->objeto->getFechaNacimiento()."',
        '".$this->objeto->getTelefono()."',2,1,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarJugadoresM()
    {
        $_query = "select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,
        DATE_FORMAT(j.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento from jugadores j
         where j.idEliminado = 1 and j.idGenero = 2 and j.idJugador>1";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);


                $btnVer = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnInscribir icon green small button\" onclick=\"ver(this)\"><i class=\"futbol icon\"></i> Historial</button>';
                $btnEditar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEditarJ icon blue small button\" onclick=\"editarJugador(this)\"><i class=\"edit icon\"></i> Editar</button>';
                $btnEliminar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEliminarJ icon yellow small button\" onclick=\"eliminarJugador(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
                $btnQuitar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui  icon purple small button\" onclick=\"quitarFondo(this)\"><i class=\"dollar icon\"></i> Quitar de Fondo</button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

                if($fila["idFondo"]==2){
                    $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnVer.' '.$btnEliminar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
                else{
                    $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnVer.''.$btnEditar.' '.$btnEliminar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
               
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }


    public function mostrarJugadoresFondoComun()
    {
        $_query = "select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,
        DATE_FORMAT(j.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento from jugadores j
         where j.idEliminado = 1 and j.idJugador>1 and j.idFondo=2";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);


                $btnQuitar = '<button id=\"'.$fila["idJugador"].'\" nombre=\"'.$fila["nombre"].'\" apellido=\"'.$fila["apellido"].'\" class=\"ui  icon blue small button\" onclick=\"quitarFondo(this)\"><i class=\"dollar icon\"></i> Quitar de Fondo</button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

             $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td><center> '.$btnQuitar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                
               
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }

    public function inscripcionM()
    {
        $_query = "select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,
        DATE_FORMAT(j.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento from jugadores j
         where j.idEliminado = 1 and j.idGenero = 2 and j.idJugador>1";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);

                $btnVer = '<button id=\"'.$fila["idJugador"].'\" class=\"ui icon yellow small button\" onclick=\"ver(this)\"><i class=\"list icon\"></i> Detalles </button>';
                $btnInscrbir = '<button id=\"'.$fila["idJugador"].'\" edad=\"'.$fila["edad"].'\" class=\"ui btnInscribir icon blue small button\" onclick=\"inscribir(this)\"><i class=\"edit icon\"></i><i class=\"futbol icon\"></i> Inscribir</button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

                if($fila["idFondo"]==2){
                    $acciones = ', "Acciones": "<table  style=width:100%;><td style=background-color:#FE2E2E><center> '.$btnVer.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
                else{
                    $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnVer.''.$btnInscrbir.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
               
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }

    public function inscribirJugadorM(){
        $_query = "insert into inscriJugador values('".$this->objeto->getIdEquipo()."','".$this->objeto->getIdJugador()."',
        '".$this->objeto->getIdTorneo()."',2,1,1,curdate())";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }


    public function inscribirJugadorMayor(){
        $_query = "insert into inscriJugador values('".$this->objeto->getIdEquipo()."','".$this->objeto->getIdJugador()."',
        '".$this->objeto->getIdTorneo()."',2,1,2,curdate())";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function inscripcionF()
    {
        $_query = "select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,
        DATE_FORMAT(j.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento from jugadores j
         where j.idEliminado = 1 and j.idGenero = 1  and j.idJugador>1";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);

                $btnVer = '<button id=\"'.$fila["idJugador"].'\" class=\"ui icon blue small button\" onclick=\"ver(this)\"><i class=\"list icon\"></i> Historial</button>';
                $btnInscrbir = '<button  id=\"'.$fila["idJugador"].'\" edad=\"'.$fila["edad"].'\" class=\"ui btnInscribir icon red small button\" onclick=\"inscribir(this)\"><i class=\"futbol icon\"></i> Inscribir</button>';
                $btnEditar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEditarJ icon blue small button\" onclick=\"editarJugador(this)\"><i class=\"edit icon\"></i> Editar</button>';
                $btnEliminar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEliminarJ icon negative small button\" onclick=\"eliminarJugador(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

                if($fila["idFondo"]==2){
                    $acciones = ', "Acciones": "<table  style=width:100%;><td style=background-color:#FE2E2E><center> '.$btnVer.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
                else{
                    $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnVer.''.$btnInscrbir.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
                

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

        $_query = "select *,TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS edad from jugadores
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
        dui= '".$this->objeto->getDui()."',  telefono = '".$this->objeto->getTelefono()."',
        fechaNacimiento = '".$this->objeto->getFechaNacimiento()."',foto='".$this->objeto->getImg()."'
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
        '".$this->objeto->getTelefono()."',1,1,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarJugadoresF()
    {
        $_query = "select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,
        DATE_FORMAT(j.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento from jugadores j
         where j.idEliminado = 1 and j.idGenero=1 and j.idJugador>1";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);

               
                
                $btnVer = '<button id=\"'.$fila["idJugador"].'\" class=\"ui  icon green small button\" onclick=\"ver(this)\"><i class=\"futbol icon\"></i> Historial</button>';
                $btnEditar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEditarJ icon blue small button\" onclick=\"editarJugador(this)\"><i class=\"edit icon\"></i> Editar</button>';
                $btnEliminar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEliminarJ icon negative small button\" onclick=\"eliminarJugador(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
                $btnQuitar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui  icon purple small button\" onclick=\"quitarFondo(this)\"><i class=\"dollar icon\"></i> Quitar de Fondo</button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

                if($fila["idFondo"]==2){
                    $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnVer.' '.$btnEliminar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
                else{
                    $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnVer.''.$btnEditar.' '.$btnEliminar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
                

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

        $_query = "select *,TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS edad from jugadores
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
        dui= '".$this->objeto->getDui()."', telefono = '".$this->objeto->getTelefono()."',
        fechaNacimiento = '".$this->objeto->getFechaNacimiento()."', foto='".$this->objeto->getImg()."'
         where idGenero = 1 and  idJugador = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function detalles(){
        $_query="select i.*, j.nombre as name, j.apellido as apellido, e.nombre as equipo,
         t.nombreTorneo as torneo, c.nombreCategoria as categoria from inscriJugador i
        inner join jugadores j on j.idJugador = i.idJugador
        inner join torneos t on t.idTorneo = i.idTorneo
        inner join equipos e on e.idEquipo = i.idEquipo
        inner join categorias c on c.idCategoria = t.idTorneo
        where i.idJugador =".$this->objeto->getIdJugador()." group by e.nombre";
        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }


    public function quitarFondo(){
        $_query = "update jugadores set idFondo = 1
        where idJugador = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

        public function validarInscripcion(){
            $_query = "select i.*,e.idCategoria from inscriJugador i  
            inner join equipos e on e.idEquipo = i.idEquipo
            where i.idJugador = ".$this->objeto->getIdJugador();

                $resultado = $this->con->ejecutar($_query);

              //  $fila = $resultado->fetch_assoc();

                if($resultado){
                    return 1;
                }else{
                    return 0;
                }
        }   


        public function mostrarJugPendPago(){
            $_query = "select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,i.estado, 
            i.pago as pago,e.nombre as equipo, t.nombreTorneo as torneo from inscriJugador i
            inner join equipos e on e.idEquipo = i.idEquipo
            inner join jugadores j on j.idJugador = i.idJugador
            inner join torneos t on t.idTorneo = i.idTorneo
            where i.pago=1 and i.estado=2 group by i.idJugador";


        $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);

               
                
                $btnCobrar = '<button id=\"'.$fila["idJugador"].'\" torneo=\"'.$fila["torneo"].'\" nombre=\"'.$fila["nombre"].'\" apellido=\"'.$fila["apellido"].'\" equipo=\"'.$fila["equipo"].'\" class=\"ui  icon green small button\" onclick=\"cobrarJugador(this)\"><i class=\"dollar icon\"></i> Cobrar</button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';
                    $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnCobrar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';

        }


        public function cobrarInscripcion()
    {
        

        $_query="update inscriJugador set pago=2 where idJugador=".$this->objeto->getIdJugador();
       

        $resultado = $this->con->ejecutar($_query);
        
        
        

    }
        
        
        

}