<?php 

class DaoEscuela extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new escuelaFutbol();
    }

    public function mostrarPrimer()
    {
        $_query = "select e.*,TIMESTAMPDIFF(YEAR,e.fechaNacimiento,CURDATE()) AS edad, date_format(e.fechaNacimiento, '%d') as dia,
        date_format(e.fechaNacimiento, '%m') as mes,
        DATE_FORMAT(e.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        DATE_FORMAT(e.fechaInscripcion, '%d/%m/%Y') as fechaInscripcion,
        DATE_FORMAT(e.fechaFinal, '%d/%m/%Y') as fechaFinal
        from escuelaFut e
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
            $btnInscribir = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnVencidos icon violet small button\" onclick=\"reinscribirUsuario(this)\"><i class=\"pencil alternate icon\"></i>Inscripción</button>';

            if($dia>=$fila["dia"] && $fila["mes"] == $mes && $fila["edad"]>7){
                $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnEditar.''.$btnMover.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            else if($fila["estado"]==1){
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.''.$reporte.''.$btnInscribir.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            else{
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
        '".$this->objeto->getEncargado()."', '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',
        curdate(),curdate(),1,1,1);";

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
        date_format(e.fechaNacimiento, '%m') as mes,
        DATE_FORMAT(e.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        DATE_FORMAT(e.fechaInscripcion, '%d/%m/%Y') as fechaInscripcion,
        DATE_FORMAT(e.fechaFinal, '%d/%m/%Y') as fechaFinal
        from escuelaFut e
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
            $btnInscribir = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnVencidos icon violet small button\" onclick=\"reinscribirUsuario(this)\"><i class=\"pencil alternate icon\"></i>Inscripción</button>';

            if($dia>=$fila["dia"] && $fila["mes"] == $mes && $fila["edad"]>9){
                $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnEditar.''.$btnMover.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            else if($fila["estado"]==1){
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.''.$reporte.''.$btnInscribir.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            else{
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
        '".$this->objeto->getEncargado()."', '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',
        curdate(),curdate(),2,1,1);";

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
        date_format(e.fechaNacimiento, '%m') as mes,
        DATE_FORMAT(e.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        DATE_FORMAT(e.fechaInscripcion, '%d/%m/%Y') as fechaInscripcion,
        DATE_FORMAT(e.fechaFinal, '%d/%m/%Y') as fechaFinal
        from escuelaFut e
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
            $btnInscribir = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnVencidos icon violet small button\" onclick=\"reinscribirUsuario(this)\"><i class=\"pencil alternate icon\"></i>Inscripción</button>';

            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

            if($dia>=$fila["dia"] && $fila["mes"] == $mes && $fila["edad"]>11){
                $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnEditar.''.$btnMover.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            else if($fila["estado"]==1){
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.''.$reporte.''.$btnInscribir.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            else{
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
        '".$this->objeto->getEncargado()."', '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',
        curdate(),curdate(),3,1,1);";

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
        date_format(e.fechaNacimiento, '%m') as mes,
        DATE_FORMAT(e.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        DATE_FORMAT(e.fechaInscripcion, '%d/%m/%Y') as fechaInscripcion,
        DATE_FORMAT(e.fechaFinal, '%d/%m/%Y') as fechaFinal
        from escuelaFut e
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
            $btnInscribir = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnVencidos icon violet small button\" onclick=\"reinscribirUsuario(this)\"><i class=\"pencil alternate icon\"></i>Inscripción</button>';

            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

            if($dia>=$fila["dia"] && $fila["mes"] == $mes && $fila["edad"]>13){
                $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnEditar.''.$btnMover.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            else if($fila["estado"]==1){
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.''.$reporte.''.$btnInscribir.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            else{
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
        '".$this->objeto->getEncargado()."', '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',
        curdate(),curdate(),4,1,1);";

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
        date_format(e.fechaNacimiento, '%m') as mes,
        DATE_FORMAT(e.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        DATE_FORMAT(e.fechaInscripcion, '%d/%m/%Y') as fechaInscripcion,
        DATE_FORMAT(e.fechaFinal, '%d/%m/%Y') as fechaFinal
        from escuelaFut e
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

           $btnInscribir = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnVencidos icon violet small button\" onclick=\"reinscribirUsuario(this)\"><i class=\"pencil alternate icon\"></i>Inscripción</button>';
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i>Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i>Eliminar</button>';
            $reporte = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"file outline icon\"></i>Ficha</button>';
            $btnMover = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon yellow small button\" onclick=\"mover(this)\"><i class=\"arrow up icon\"></i>Mover</button>';
            
            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

            if($dia>=$fila["dia"] && $fila["mes"] == $mes && $fila["edad"]>15){
                $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnEditar.''.$btnMover.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            else if($fila["estado"]==1){
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.''.$reporte.''.$btnInscribir.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            else{
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
        '".$this->objeto->getEncargado()."', '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',
        curdate(),curdate(),5,1,1);";

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
        date_format(e.fechaNacimiento, '%m') as mes,
        DATE_FORMAT(e.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        DATE_FORMAT(e.fechaInscripcion, '%d/%m/%Y') as fechaInscripcion,
        DATE_FORMAT(e.fechaFinal, '%d/%m/%Y') as fechaFinal
        from escuelaFut e
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

            $btnInscribir = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnVencidos icon violet small button\" onclick=\"reinscribirUsuario(this)\"><i class=\"pencil alternate icon\"></i>Inscripción</button>';
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i>Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i>Eliminar</button>';
            $reporte = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"file outline icon\"></i>Ficha</button>';
            $btnMover = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon yellow small button\" onclick=\"mover(this)\"><i class=\"arrow up icon\"></i>Mover</button>';
            
            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';

            if($dia>=$fila["dia"] && $fila["mes"] == $mes && $fila["edad"]>17){
                $acciones = ', "Acciones": "<table  style=width:100%; background-color: red;><td style=background-color:#FE2E2E><center> '.$btnEditar.''.$reporte.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            else if($fila["estado"]==1)
            {
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.' '.$btnEliminar.''.$reporte.''.$btnInscribir.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
            else{
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
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getCarnet()."','".$this->objeto->getEncargado()."', 
        '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',curdate(),curdate(),6,1,1);";

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

    public function reinscribir() {
        $_query = "update escuelaFut set fechaInscripcion=curdate(), estado=2,
         fechaFinal=ADDDATE(curdate(),INTERVAL 366 DAY) where idUsuario = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function primerPago(){
        $_query = "insert into pagoEscuelaFut values(null, '".$this->objeto->getIdJugador()."',
        ADDDATE(curdate(),INTERVAL 0 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function segundoPago(){
        $_query = "insert into pagoEscuelaFut values(null, '".$this->objeto->getIdJugador()."',
        ADDDATE(curdate(),INTERVAL 31 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function tercerPago(){
        $_query = "insert into pagoEscuelaFut values(null, '".$this->objeto->getIdJugador()."',
        ADDDATE(curdate(),INTERVAL 61 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function cuartoPago(){
        $_query = "insert into pagoEscuelaFut values(null, '".$this->objeto->getIdJugador()."',
        ADDDATE(curdate(),INTERVAL 92 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function quintoPago(){
        $_query = "insert into pagoEscuelaFut values(null, '".$this->objeto->getIdJugador()."',
        ADDDATE(curdate(),INTERVAL 122 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function sextoPago(){
        $_query = "insert into pagoEscuelaFut values(null, '".$this->objeto->getIdJugador()."',
        ADDDATE(curdate(),INTERVAL 153 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }
    public function septimoPago(){
        $_query = "insert into pagoEscuelaFut values(null, '".$this->objeto->getIdJugador()."',
        ADDDATE(curdate(),INTERVAL 183 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function octavoPago(){
        $_query = "insert into pagoEscuelaFut values(null, '".$this->objeto->getIdJugador()."',
        ADDDATE(curdate(),INTERVAL 214 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function novenoPago(){
        $_query = "insert into pagoEscuelaFut values(null, '".$this->objeto->getIdJugador()."',
        ADDDATE(curdate(),INTERVAL 244 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function decimoPago(){
        $_query = "insert into pagoEscuelaFut values(null, '".$this->objeto->getIdJugador()."',
        ADDDATE(curdate(),INTERVAL 275 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function oncePago(){
        $_query = "insert into pagoEscuelaFut values(null, '".$this->objeto->getIdJugador()."',
        ADDDATE(curdate(),INTERVAL 305 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function docePago(){
        $_query = "insert into pagoEscuelaFut values(null, '".$this->objeto->getIdJugador()."',
        ADDDATE(curdate(),INTERVAL 336 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function mostrarEscFutPagos()
    {
        $_query = "select e.*,DATE_FORMAT(e.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        DATE_FORMAT(e.fechaInscripcion, '%d/%m/%Y') as fechaInscripcion,
        DATE_FORMAT(e.fechaFinal, '%d/%m/%Y') as fechaFinal,
        TIMESTAMPDIFF(YEAR,e.fechaNacimiento,CURDATE()) AS edad,
        n.nivel as nivel from escuelaFut e
        inner join nivelEscuela n on n.idEscuela = e.idEscuela
        where  e.idEliminado=1 and e.idUsuario>1 and e.estado=2;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnCobrar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui  icon blue small button\" onclick=\"cobrarEscuelaF(this)\"><i class=\"dollar icon\"></i>Cobrar</button>';
            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';
            
           
            $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnCobrar.'</center></td><td><center>'.$imagen.'</center></td></table>"'; 
           
            
           

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function pagos(){
        $_query="select p.*,DATE_FORMAT(p.fechasPago, '%d/%m/%Y') as fechaP, g.nombre as nombre, g.apellido as apellido,
        n.nivel as nivel
         from pagoEscuelaFut p
        inner join escuelaFut  g on g.idUsuario = p.idUsuario
        inner join nivelEscuela n on n.idEscuela = g.idEscuela
         where p.idUsuario =".$this->objeto->getIdJugador();


        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }

    public function cobrar()
    {

        $_query="update pagoEscuelaFut set estado=2 where id=".$this->objeto->getIdPago();
       

        $resultado = $this->con->ejecutar($_query);
        
        
        

    }




}

?>