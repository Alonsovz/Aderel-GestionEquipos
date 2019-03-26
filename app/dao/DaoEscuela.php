<?php 

class DaoEscuela extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new escuelaFutbol();
    }

    public function mostrarPrimer()
    {
        $_query = "select e.*,TIMESTAMPDIFF(YEAR,e.fechaNacimiento,CURDATE()) AS edad, date_format(e.fechaNacimiento, '%d') as dia,
        date_format(e.fechaNacimiento, '%m') as mes from escuelaFut e
                where  e.idEliminado=1 and e.idEscuela=1 and e.idUsuario>1";

        $_json = '';
        
        $fechaMinima = date('Y-m-d');
        $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
        $fechaMini = date ( 'Y-m-d' , $fechaMin );
        $dia = date('d');
        $mes = date('m');

        $resultado = $this->con->ejecutar($_query);

        

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditar icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"> <i class=\"trash icon icon\"></i>Eliminar</button>';
            $reporte = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"> <i class=\"file outline icon\"></i>Ficha</button>';
            $btnMover = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon yellow small button\" onclick=\"mover(this)\"> <i class=\"arrow up icon\"></i> Mover</button>';
            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

            if($dia>=$fila["dia"] && $fila["mes"] == $mes && $fila["edad"]>7){
                $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnEditar.''.$btnMover.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }else{
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
                
            

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function registrarPrimer(){
        $corr= "(select max(idUsuario)+1 as id from escuelaFut)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();

        $idExp = '';

        if($fila["id"]<10){
            $idExp ='EF00000'.$fila['id'].'';
        }
        if($fila["id"]>9){
            $idExp = 'EF0000'.$fila['id'].'';
        }
        else if($fila["id"]>99){
            $idExp = 'EF000'.$fila['id'].'';

        }
        else if($fila["id"]>999){
            $idExp = 'EF00'.$fila['id'].'';

        }
        else if($fila["id"]>9999){
            $idExp = 'EF0'.$fila['id'].'';
        }

        else if($fila["id"]>99999){
            $idExp = 'EF'.$fila['id'].'';
        }



        $query = "Insert into escuelaFut values (null,'".$idExp."','".$this->objeto->getImg()."',
        '".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getCarnet()."',
        '".$this->objeto->getEncargado()."', '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',curdate(),1,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarSegundo()
    {
        $_query = "select e.*,TIMESTAMPDIFF(YEAR,e.fechaNacimiento,CURDATE()) AS edad, date_format(e.fechaNacimiento, '%d') as dia,
        date_format(e.fechaNacimiento, '%m') as mes from escuelaFut e
                where  e.idEliminado=1 and e.idEscuela=2 and e.idUsuario>1";

        $_json = '';
        
        $fechaMinima = date('Y-m-d');
        $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
        $fechaMini = date ( 'Y-m-d' , $fechaMin );
        $dia = date('d');
        $mes = date('m');

        $resultado = $this->con->ejecutar($_query);

        

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $reporte = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"file outline icon\"></i> Ficha</button>';
            $btnMover = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon yellow small button\" onclick=\"mover(this)\"><i class=\"arrow up icon\"></i> Mover</button>';
            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

            if($dia>=$fila["dia"] && $fila["mes"] == $mes && $fila["edad"]>9){
                $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnEditar.''.$btnMover.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }else{
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
                
            

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function registrarSegundo(){
        $corr= "(select max(idUsuario)+1 as id from escuelaFut)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();

        $idExp = '';

        if($fila["id"]<10){
            $idExp ='EF00000'.$fila['id'].'';
        }
        if($fila["id"]>9){
            $idExp = 'EF0000'.$fila['id'].'';
        }
        else if($fila["id"]>99){
            $idExp = 'EF000'.$fila['id'].'';

        }
        else if($fila["id"]>999){
            $idExp = 'EF00'.$fila['id'].'';

        }
        else if($fila["id"]>9999){
            $idExp = 'EF0'.$fila['id'].'';
        }

        else if($fila["id"]>99999){
            $idExp = 'EF'.$fila['id'].'';
        }



        $query = "Insert into escuelaFut values (null,'".$idExp."','".$this->objeto->getImg()."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getCarnet()."',
        '".$this->objeto->getEncargado()."', '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',curdate(),2,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarTercero()
    {
        $_query = "select e.*,TIMESTAMPDIFF(YEAR,e.fechaNacimiento,CURDATE()) AS edad, date_format(e.fechaNacimiento, '%d') as dia,
        date_format(e.fechaNacimiento, '%m') as mes from escuelaFut e
                where  e.idEliminado=1 and e.idEscuela=3 and e.idUsuario>1";

        $_json = '';
        
        $fechaMinima = date('Y-m-d');
        $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
        $fechaMini = date ( 'Y-m-d' , $fechaMin );
        $dia = date('d');
        $mes = date('m');

        $resultado = $this->con->ejecutar($_query);

        

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i>Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $reporte = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"file outline icon\"></i> Ficha</button>';
            $btnMover = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon yellow small button\" onclick=\"mover(this)\"><i class=\"arrow up icon\"></i> Mover</button>';
            
            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

            if($dia>=$fila["dia"] && $fila["mes"] == $mes && $fila["edad"]>11){
                $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnEditar.''.$btnMover.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }else{
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }


        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function registrarTercero(){
        $corr= "(select max(idUsuario)+1 as id from escuelaFut)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();

        $idExp = '';

        if($fila["id"]<10){
            $idExp ='EF00000'.$fila['id'].'';
        }
        if($fila["id"]>9){
            $idExp = 'EF0000'.$fila['id'].'';
        }
        else if($fila["id"]>99){
            $idExp = 'EF000'.$fila['id'].'';

        }
        else if($fila["id"]>999){
            $idExp = 'EF00'.$fila['id'].'';

        }
        else if($fila["id"]>9999){
            $idExp = 'EF0'.$fila['id'].'';
        }

        else if($fila["id"]>99999){
            $idExp = 'EF'.$fila['id'].'';
        }



        $query = "Insert into escuelaFut values (null,'".$idExp."','".$this->objeto->getImg()."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getCarnet()."',
        '".$this->objeto->getEncargado()."', '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',curdate(),3,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarCuarto()
    {
        $_query = "select e.*,TIMESTAMPDIFF(YEAR,e.fechaNacimiento,CURDATE()) AS edad, date_format(e.fechaNacimiento, '%d') as dia,
        date_format(e.fechaNacimiento, '%m') as mes from escuelaFut e
                where  e.idEliminado=1 and e.idEscuela=4 and e.idUsuario>1";

        $_json = '';
        
        $fechaMinima = date('Y-m-d');
        $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
        $fechaMini = date ( 'Y-m-d' , $fechaMin );
        $dia = date('d');
        $mes = date('m');

        $resultado = $this->con->ejecutar($_query);

        

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $reporte = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"file outline icon\"></i> Ficha</button>';
            $btnMover = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon yellow small button\" onclick=\"mover(this)\"><i class=\"arrow up icon\"></i> Mover </button>';
            
            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

            if($dia>=$fila["dia"] && $fila["mes"] == $mes && $fila["edad"]>13){
                $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnEditar.''.$btnMover.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }else{
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }


        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function registrarCuarto(){
        $corr= "(select max(idUsuario)+1 as id from escuelaFut)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();

        $idExp = '';

        if($fila["id"]<10){
            $idExp ='EF00000'.$fila['id'].'';
        }
        if($fila["id"]>9){
            $idExp = 'EF0000'.$fila['id'].'';
        }
        else if($fila["id"]>99){
            $idExp = 'EF000'.$fila['id'].'';

        }
        else if($fila["id"]>999){
            $idExp = 'EF00'.$fila['id'].'';

        }
        else if($fila["id"]>9999){
            $idExp = 'EF0'.$fila['id'].'';
        }

        else if($fila["id"]>99999){
            $idExp = 'EF'.$fila['id'].'';
        }



        $query = "Insert into escuelaFut values (null,'".$idExp."','".$this->objeto->getImg()."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getCarnet()."',
        '".$this->objeto->getEncargado()."', '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',curdate(),4,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarQuinto()
    {
        $_query = "select e.*,TIMESTAMPDIFF(YEAR,e.fechaNacimiento,CURDATE()) AS edad, date_format(e.fechaNacimiento, '%d') as dia,
        date_format(e.fechaNacimiento, '%m') as mes from escuelaFut e
                where  e.idEliminado=1 and e.idEscuela=5 and e.idUsuario>1";

        $_json = '';
        
        $fechaMinima = date('Y-m-d');
        $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
        $fechaMini = date ( 'Y-m-d' , $fechaMin );
        $dia = date('d');
        $mes = date('m');

        $resultado = $this->con->ejecutar($_query);

        

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i>Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i>Eliminar</button>';
            $reporte = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"file outline icon\"></i>Ficha</button>';
            $btnMover = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon yellow small button\" onclick=\"mover(this)\"><i class=\"arrow up icon\"></i>Mover</button>';
            
            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

            if($dia>=$fila["dia"] && $fila["mes"] == $mes && $fila["edad"]>15){
                $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnEditar.''.$btnMover.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }else{
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }


        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function registrarQuinto(){
        $corr= "(select max(idUsuario)+1 as id from escuelaFut)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();

        $idExp = '';

        if($fila["id"]<10){
            $idExp ='EF00000'.$fila['id'].'';
        }
        if($fila["id"]>9){
            $idExp = 'EF0000'.$fila['id'].'';
        }
        else if($fila["id"]>99){
            $idExp = 'EF000'.$fila['id'].'';

        }
        else if($fila["id"]>999){
            $idExp = 'EF00'.$fila['id'].'';

        }
        else if($fila["id"]>9999){
            $idExp = 'EF0'.$fila['id'].'';
        }

        else if($fila["id"]>99999){
            $idExp = 'EF'.$fila['id'].'';
        }



        $query = "Insert into escuelaFut values (null,'".$idExp."','".$this->objeto->getImg()."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getCarnet()."',
        '".$this->objeto->getEncargado()."', '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',curdate(),5,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarSexto()
    {
        $_query = "select e.*,TIMESTAMPDIFF(YEAR,e.fechaNacimiento,CURDATE()) AS edad, date_format(e.fechaNacimiento, '%d') as dia,
        date_format(e.fechaNacimiento, '%m') as mes from escuelaFut e
                where  e.idEliminado=1 and e.idEscuela=6 and e.idUsuario>1";

        $_json = '';
        
        $fechaMinima = date('Y-m-d');
        $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
        $fechaMini = date ( 'Y-m-d' , $fechaMin );
        $dia = date('d');
        $mes = date('m');

        $resultado = $this->con->ejecutar($_query);

        

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i>Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i>Eliminar</button>';
            $reporte = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"file outline icon\"></i>Ficha</button>';
            $btnMover = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon yellow small button\" onclick=\"mover(this)\"><i class=\"arrow up icon\"></i>Mover</button>';
            
            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

            if($dia>=$fila["dia"] && $fila["mes"] == $mes && $fila["edad"]>17){
                $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnEditar.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }else{
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }


        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function registrarSexto(){
        $corr= "(select max(idUsuario)+1 as id from escuelaFut)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();

        $idExp = '';

        if($fila["id"]<10){
            $idExp ='EF00000'.$fila['id'].'';
        }
        if($fila["id"]>9){
            $idExp = 'EF0000'.$fila['id'].'';
        }
        else if($fila["id"]>99){
            $idExp = 'EF000'.$fila['id'].'';

        }
        else if($fila["id"]>999){
            $idExp = 'EF00'.$fila['id'].'';

        }
        else if($fila["id"]>9999){
            $idExp = 'EF0'.$fila['id'].'';
        }

        else if($fila["id"]>99999){
            $idExp = 'EF'.$fila['id'].'';
        }



        $query = "Insert into escuelaFut values (null,'".$idExp."','".$this->objeto->getImg()."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getCarnet()."',
        '".$this->objeto->getEncargado()."', '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',curdate(),6,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function cargarDatosPrimerN() {

        $_query = "select *,TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS edad from escuelaFut
        where idUsuario = ".$this->objeto->getIdJugador();

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

    public function editarPrimerN(){
        $_query = "update escuelaFut set nombre='".$this->objeto->getNombre()."', apellido='".$this->objeto->getApellido()."', 
        fechaNacimiento='".$this->objeto->getFechaNacimiento()."', foto = '".$this->objeto->getImg()."',
        carnet='".$this->objeto->getCarnet()."',encargado='".$this->objeto->getEncargado()."',
         dui='".$this->objeto->getDui()."', telefono='".$this->objeto->getTelefono()."' where idUsuario =".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }
    public function eliminarPrimerN() {
        
        $_query = "update escuelaFut set idEliminado=2 where idUsuario = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function moverPrimerN() {
        
        $_query = "update escuelaFut set idEscuela=2 where idUsuario = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function ficha() {
        $query = "select e.*,TIMESTAMPDIFF(YEAR,e.fechaNacimiento,CURDATE()) AS edad, n.nivel from escuelaFut e
        inner join nivelEscuela n on n.idEscuela = e.idEscuela
        where e.idUsuario=".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }





}

?>