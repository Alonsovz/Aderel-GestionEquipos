<?php 

class DaoEscuela extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new escuelaFutbol();
    }

    public function mostrarPrimer()
    {
        $_query = "select * from escuelaFut
        where  idEliminado=1 and idEscuela=1 and idUsuario>1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i></button>';
            $btnTorneos = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"list icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.''.$btnTorneos.'"';

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



        $query = "Insert into escuelaFut values (null,'".$idExp."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getEdad()."','".$this->objeto->getCarnet()."',
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
        $_query = "select * from escuelaFut
        where  idEliminado=1 and idEscuela=2 and idUsuario>1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i></button>';
            $btnTorneos = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"list icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.''.$btnTorneos.'"';

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



        $query = "Insert into escuelaFut values (null,'".$idExp."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getEdad()."','".$this->objeto->getCarnet()."',
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
        $_query = "select * from escuelaFut
        where  idEliminado=1 and idEscuela=3 and idUsuario>1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i></button>';
            $btnTorneos = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"list icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.''.$btnTorneos.'"';

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



        $query = "Insert into escuelaFut values (null,'".$idExp."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getEdad()."','".$this->objeto->getCarnet()."',
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
        $_query = "select * from escuelaFut
        where  idEliminado=1 and idEscuela=4 and idUsuario>1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i></button>';
            $btnTorneos = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"list icon\"></i></button>';
            
            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.''.$btnTorneos.'"';

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



        $query = "Insert into escuelaFut values (null,'".$idExp."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getEdad()."','".$this->objeto->getCarnet()."',
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
        $_query = "select * from escuelaFut
        where  idEliminado=1 and idEscuela=5 and idUsuario>1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i></button>';
            $btnTorneos = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"list icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.''.$btnTorneos.'"';

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



        $query = "Insert into escuelaFut values (null,'".$idExp."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getEdad()."','".$this->objeto->getCarnet()."',
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
        $_query = "select * from escuelaFut
        where  idEliminado=1 and idEscuela=6 and idUsuario>1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

           
            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarC icon blue small button\" onclick=\"editar(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarC icon red small button\" onclick=\"eliminar(this)\"><i class=\"trash icon\"></i></button>';
            $btnTorneos = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui icon grey small button\" onclick=\"reporte(this)\"><i class=\"list icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.''.$btnTorneos.'"';

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



        $query = "Insert into escuelaFut values (null,'".$idExp."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getEdad()."','".$this->objeto->getCarnet()."',
        '".$this->objeto->getEncargado()."', '".$this->objeto->getDui()."','".$this->objeto->getTelefono()."',curdate(),6,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function cargarDatosPrimerN() {

        $_query = "select * from escuelaFut
        where idUsuario = ".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function editarPrimerN(){
        $_query = "update escuelaFut set nombre='".$this->objeto->getNombre()."', apellido='".$this->objeto->getApellido()."', 
        fechaNacimiento='".$this->objeto->getFechaNacimiento()."', edad='".$this->objeto->getEdad()."', 
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

    public function ficha() {
        $query = "select e.*, n.nivel from escuelaFut e
        inner join nivelEscuela n on n.idEscuela = e.idEscuela
        where e.idUsuario=".$this->objeto->getIdJugador();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }





}

?>