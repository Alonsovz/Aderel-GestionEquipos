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
        '".$this->objeto->getTelefono()."',2,1,1,1);";

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
                else if($fila["idSancionado"]==2){
                    $acciones = ', "Acciones": "<table  style=width:100%;  color:#FFFFFF;><td style=background-color:#FAAC58;><center> Sancionado '.$btnVer.'</center></td><td><center>'.$imagen.'</center></td></table>"';
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

    public function mostrarJugadoresSancionM()
    {
        $_query = "select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,
        DATE_FORMAT(j.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento from jugadores j
         where j.idEliminado = 1 and j.idGenero = 2 and j.idJugador>1";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);

                $btnVer = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnInscribir icon brown small button\" onclick=\"ver(this)\"><i class=\"clock icon\"></i> Historial</button>';
                $btnSan = '<button id=\"'.$fila["idJugador"].'\" nombre=\"'.$fila["nombre"].'\" apellido=\"'.$fila["apellido"].'\" class=\"ui  icon red small button\" onclick=\"sancionar(this)\"><i class=\"close icon\"></i> Sancionar</button>';
                $btnQuitar = '<button id=\"'.$fila["idJugador"].'\"  nombre=\"'.$fila["nombre"].'\" apellido=\"'.$fila["apellido"].'\" class=\"ui  icon blue small button\" onclick=\"quitarSancion(this)\"><i class=\"trash icon\"></i> Quitar Sanción</button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

                if($fila["idFondo"]==2){
                    $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E; color:white;><center> En fondo común</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
                else if($fila["idSancionado"]==2){
                    $acciones = ', "Acciones": "<table  style=width:100%;  color:#FFFFFF;><td style=background-color:#FAAC58;><center> Sancionado  '.$btnVer.' '.$btnQuitar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
                else{
                    $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnVer.' '.$btnSan.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
               
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }


    public function mostrarJugadoresE()
    {
        $_query = "select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,
        DATE_FORMAT(j.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento from jugadores j
         where j.idEliminado = 2";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);

                $btnQuitar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui  icon blue small button\" onclick=\"reestablecerJ(this)\"><i class=\"sync icon\"></i> Reestablecer</button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

                
                    $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnQuitar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                
               
                

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

    public function inscripcionM($idCategoria=0)
    {
        $_query = "select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,
        DATE_FORMAT(j.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento from jugadores j
         where j.idEliminado = 1 and j.idGenero = 2 and j.idJugador>1 and j.idFondo=1 and j.idSancionado=1";

        

            $resultado = $this->con->ejecutar($_query);
            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                $_query='SELECT * from inscrijugador ins where ins.idJugador='.$fila["idJugador"].';';
                $res = $this->con->ejecutar($_query);
                

                $continuar=true;
                if($res->num_rows>0){   //esta inscrito en algun equipo aunque no necesariamente en la misma categoria

                    while($incri = $res->fetch_assoc()) {   //verficar si el equipo inscrito pertenece a la misma categoria
                        $_query='SELECT * FROM `equipos` where `idCategoria`='.$idCategoria.' and idEquipo='.$incri['idEquipo'].';';
                        $result = $this->con->ejecutar($_query);

                        if($result->num_rows>0) //pertenece a la misma categoria
                            $continuar=false;
                    }   
                }
                if(!$continuar) continue;   //se salta este jugador

                    
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
        $_query = "insert into inscriJugador values('".$this->objeto->getIdEquipo()."','".$this->objeto->getIdJugador()."',2,1,1,curdate())";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function getDui()
    {

        $_query="select dui from jugadores WHERE dui='".$this->objeto->getDui()."'";
       

        $resultado=$this->con->ejecutar($_query)->fetch_assoc();
        if($resultado['dui']!=null)
        {
            return 1;
        }
        else
        {
            return 0;
        }
        
        

    }


    public function inscribirJugadorMayor(){
        $_query = "insert into inscriJugador values('".$this->objeto->getIdEquipo()."','".$this->objeto->getIdJugador()."',2,1,2,curdate())";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function eliminarJugadorIns(){
        $_query = "delete from inscriJugador where idEquipo ='".$this->objeto->getIdEquipo()."'
        and idJugador =".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function inscripcionF($idCategoria=0)
    {
        $_query = "select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,
        DATE_FORMAT(j.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento from jugadores j
         where j.idEliminado = 1 and j.idGenero = 1  and j.idJugador>1 and j.idFondo=1 and j.idSancionado=1";

         $resultado = $this->con->ejecutar($_query);
         $_json = '';

         
         while($fila = $resultado->fetch_assoc()) {
             $_query='SELECT * from inscrijugador ins where ins.idJugador='.$fila["idJugador"].';';
             $res = $this->con->ejecutar($_query);
             

             $continuar=true;
             if($res->num_rows>0){   //esta inscrito en algun equipo aunque no necesariamente en la misma categoria

                 while($incri = $res->fetch_assoc()) {   //verficar si el equipo inscrito pertenece a la misma categoria
                     $_query='SELECT * FROM `equipos` where  `idCategoria`='.$idCategoria.' and idEquipo='.$incri['idEquipo'].';';
                     $result = $this->con->ejecutar($_query);

                     if($result->num_rows>0) //pertenece a la misma categoria
                         $continuar=false;
                 }   
             }
             if(!$continuar) continue;   //se salta este jugador

                 
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

    public function eliminarM() {
        $_query = "update jugadores set idEliminado=2 where idGenero = 2 and idJugador = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function reestablecerJ() {
        $_query = "update jugadores set idEliminado=1 where idJugador = ".$this->objeto->getIdJugador();

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
        '".$this->objeto->getTelefono()."',1,1,1,1);";

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

               
                
                $btnVer = '<button id=\"'.$fila["idJugador"].'\" class=\"ui icon green small button\" onclick=\"ver(this)\"><i class=\"futbol icon\"></i> Historial</button>';
                $btnEditar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEditarJ icon blue small button\" onclick=\"editarJugador(this)\"><i class=\"edit icon\"></i> Editar</button>';
                $btnEliminar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui btnEliminarJ icon negative small button\" onclick=\"eliminarJugador(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
                $btnQuitar = '<button id=\"'.$fila["idJugador"].'\" class=\"ui  icon purple small button\" onclick=\"quitarFondo(this)\"><i class=\"dollar icon\"></i> Quitar de Fondo</button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

                if($fila["idFondo"]==2){
                    $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnVer.' '.$btnEliminar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
                else if($fila["idSancionado"]==2){
                    $acciones = ', "Acciones": "<table  style=width:100%;  color:#FFFFFF;><td style=background-color:#FAAC58;><center> Sancionada '.$btnVer.'</center></td><td><center>'.$imagen.'</center></td></table>"';
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


    public function mostrarJugadoresSancionF()
    {
        $_query = "select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,
        DATE_FORMAT(j.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento from jugadores j
         where j.idEliminado = 1 and j.idGenero = 1 and j.idJugador>1";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);

                $btnVer = '<button id=\"'.$fila["idJugador"].'\" class=\"ui icon green small button\" onclick=\"ver(this)\"><i class=\"futbol icon\"></i> Historial</button>';
                $btnQuitar = '<button id=\"'.$fila["idJugador"].'\" nombre=\"'.$fila["nombre"].'\" apellido=\"'.$fila["apellido"].'\" class=\"ui  icon blue small button\" onclick=\"quitarSancion(this)\"><i class=\"trash icon\"></i> Quitar Sanción</button>';
                $btnSan = '<button id=\"'.$fila["idJugador"].'\" nombre=\"'.$fila["nombre"].'\" apellido=\"'.$fila["apellido"].'\" class=\"ui  icon purple small button\" onclick=\"sancionar(this)\"><i class=\"close icon\"></i> Sancionar</button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

                if($fila["idFondo"]==2){
                    $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E; color:white;><center> En fondo común</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
                else if($fila["idSancionado"]==2){
                    $acciones = ', "Acciones": "<table  style=width:100%;  color:#FFFFFF;><td style=background-color:#FAAC58;><center> Sancionada  '.$btnVer.''.$btnQuitar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                }
                else{
                    $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnVer.' '.$btnSan. '</center></td><td><center>'.$imagen.'</center></td></table>"';
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
        $_query="select i.*,i.pago as pago, j.nombre as name, j.apellido as apellido, e.nombre as equipo,
        t.nombreTorneo as torneo, c.nombreCategoria as categoria from inscriJugador i
       inner join jugadores j on j.idJugador = i.idJugador
       inner join equipos e on e.idEquipo = i.idEquipo
       inner join torneos t on t.idTorneo = e.idTorneo
       inner join categorias c on c.idCategoria = t.idCategoria
       where i.idJugador = ".$this->objeto->getIdJugador()." group by e.idEquipo ";
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
            $_query = "  select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,i.estado, 
            i.pago as pago,e.nombre as equipo,e.cuposMayores as cupos, e.carnets as carnets,
             t.nombreTorneo as torneo,i.idEquipo as idEquipo,t.idTorneo as idToJu, c.nombreCategoria as categoria from inscriJugador i
            inner join equipos e on e.idEquipo = i.idEquipo
            inner join jugadores j on j.idJugador = i.idJugador
            inner join torneos t on t.idTorneo = e.idTorneo
            inner join categorias c on c.idCategoria = t.idCategoria
            where i.pago=1";


        $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);

               
                
                $btnCobrar = '<button idToJu=\"'.$fila["idToJu"].'\" categoria=\"'.$fila["categoria"].'\" id=\"'.$fila["idJugador"].'\" idEq=\"'.$fila["idEquipo"].'\"  carnets=\"'.$fila["carnets"].'\" torneo=\"'.$fila["torneo"].'\" nombre=\"'.$fila["nombre"].'\" apellido=\"'.$fila["apellido"].'\" equipo=\"'.$fila["equipo"].'\" class=\"ui  icon green small button\" onclick=\"cobrarJugador(this)\"><i class=\"dollar icon\"></i> Cobrar</button>';
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

    public function sancionTorneo()
    {
        

        $_query="update inscriJugador set estado=5 where idJugador=".$this->objeto->getIdJugador()." 
        and idEquipo = ".$this->objeto->getIdEquipo();
       

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function quitarSancionTorneo()
    {
        

        $_query="update inscriJugador set estado=2 where idJugador=".$this->objeto->getIdJugador()." 
        and idEquipo = ".$this->objeto->getIdEquipo();
       

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }
    public function quitarSancionTorneoR()
    {
        

        $_query="update sancionTorneo set estado=2 where idJugador=".$this->objeto->getIdJugador()." 
        and idEquipo = ".$this->objeto->getIdEquipo();
       

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function registrarSancion(){
        $_query="Insert into sancionTorneo values(null,'".$this->objeto->getIdJugador()."',
        '".$this->objeto->getIdEquipo()."','".$this->objeto->getDescripcion()."',1,curdate())";
       

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function registrarSancionGraves(){
        $_query="Insert into sancionesGraves values(null,'".$this->objeto->getIdJugador()."','".$this->objeto->getDescripcion()."',1,curdate())";
       

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function sancionGrave()
    {
        

        $_query="update inscriJugador set estado=5 where idJugador=".$this->objeto->getIdJugador();
       

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function aplicarExpediente()
    {
        

        $_query="update jugadores set idSancionado=2 where idJugador=".$this->objeto->getIdJugador();
       

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function quitarSancionGraves(){
        $_query="update sancionesGraves set estado=2 where idJugador=".$this->objeto->getIdJugador();
       

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function quitarSancionGraveEquipo(){
        $_query="update inscriJugador set estado=2 where idJugador=".$this->objeto->getIdJugador();
       

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function quitarExpediente()
    {
        

        $_query="update jugadores set idSancionado=1 where idJugador=".$this->objeto->getIdJugador();
       

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function fondoComunRpt()
    {
        $_query = "select j.*,TIMESTAMPDIFF(YEAR,j.fechaNacimiento,CURDATE()) AS edad,
        DATE_FORMAT(j.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento from jugadores j
         where j.idEliminado = 1 and j.idJugador>1 and j.idFondo=2";

        

            $resultado = $this->con->ejecutar($_query);

            return $resultado;
    }

    public function registrarAmarilla(){
        $query="Insert into tarjetasAmarilla values (null,'".$this->objeto->getIdJugador()."','".$this->objeto->getIdTorneo()."',0)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function goleador(){
        $query="Insert into goleadores values (null,'".$this->objeto->getIdJugador()."','".$this->objeto->getIdTorneo()."',0)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function inscripcionSancionM($idTorneo=0){
        $_query="select i.*,i.pago as pago,i.idJugador as idJugador, j.*,
         j.nombre as name, j.correlativo as correlativo, j.apellido as apellido, e.nombre as equipo,
        t.nombreTorneo as torneo,e.idTorneo as idTorneo,i.idEquipo as idEquipo from inscriJugador i
       inner join jugadores j on j.idJugador = i.idJugador
       inner join equipos e on e.idEquipo = i.idEquipo
       inner join torneos t on t.idTorneo = e.idTorneo
       where  i.estado!=5 and i.pago=2 and e.idTorneo = ".$idTorneo." group by i.idJugador";

       $resultado = $this->con->ejecutar($_query);
        
       $_json = '';
       while($fila = $resultado->fetch_assoc()) {
           $object = json_encode($fila);

           $btnVer = '<button idTor=\"'.$fila["idTorneo"].'\" nombre=\"'.$fila["nombre"].'\"  apellido=\"'.$fila["apellido"].'\" equipo=\"'.$fila["equipo"].'\" id=\"'.$fila["idJugador"].'\" idE=\"'.$fila["idEquipo"].'\"  class=\"ui icon blue small button\" onclick=\"sancionar(this)\"><i class=\"close icon\"></i> Sancionar</button>';
           $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';
           
           $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnVer.'</center></td><td><center>'.$imagen.'</center></td></table>"';
           
           

           $object = substr_replace($object, $acciones, strlen($object) -1,0);

           $_json .= $object.',';
       }

       $_json = substr($_json,0, strlen($_json) - 1);

       echo '{"data": ['.$_json .']}';
    }


    public function detallesSancion(){
        $_query="select j.*, s.estado as estado , s.motivo as motivo, DATE_FORMAT(s.fecha, '%d/%m/%Y') as fecha  from jugadores j
        inner join sancionesGraves s on s.idJugador= j.idJugador
        where s.idJugador = ".$this->objeto->getIdJugador();
        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }


    public function detallesSancionTorneoM(){
        $_query="select j.*, s.estado as estado , s.observaciones as motivo,s.idEquipo as idE, DATE_FORMAT(s.fecha, '%d/%m/%Y') as fecha, 
        e.nombre as equipo,t.nombreTorneo as torneo  from jugadores j
        inner join sancionTorneo s on s.idJugador= j.idJugador
        inner join equipos e on e.idEquipo = s.idEquipo
        inner join torneos t on t.idTorneo = e.idTorneo
        where j.idGenero=2 and s.estado=1  group by s.idCastigo";

        $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);

               
                
                $btnCobrar = '<button  id=\"'.$fila["idJugador"].'\"  idE=\"'.$fila["idE"].'\" torneo=\"'.$fila["torneo"].'\" nombre=\"'.$fila["nombre"].'\" apellido=\"'.$fila["apellido"].'\" equipo=\"'.$fila["equipo"].'\" class=\"ui  icon green small button\" onclick=\"quitarSancion(this)\"><i class=\"trash icon\"></i> Quitar</button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';
                    $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnCobrar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }

    public function detallesSancionTorneoF(){
        $_query="select j.*, s.estado as estado , s.observaciones as motivo, s.idEquipo as idE, DATE_FORMAT(s.fecha, '%d/%m/%Y') as fecha, 
        e.nombre as equipo,t.nombreTorneo as torneo  from jugadores j
        inner join sancionTorneo s on s.idJugador= j.idJugador
        inner join equipos e on e.idEquipo = s.idEquipo
        inner join torneos t on t.idTorneo = e.idTorneo
        where j.idGenero=1 and s.estado=1  group by s.idCastigo";

        $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);

               
                
                $btnCobrar = '<button  id=\"'.$fila["idJugador"].'\" idE=\"'.$fila["idE"].'\"  torneo=\"'.$fila["torneo"].'\" nombre=\"'.$fila["nombre"].'\" apellido=\"'.$fila["apellido"].'\" equipo=\"'.$fila["equipo"].'\" class=\"ui  icon green small button\" onclick=\"quitarSancion(this)\"><i class=\"trash icon\"></i> Quitar</button>';
                $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';
                    $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnCobrar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
                
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }
        
        
        

}