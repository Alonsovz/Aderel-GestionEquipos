<?php 

class DaoNatacion extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Natacion();
    }

    public function mostrarNatacion()
    {
        $_query = "select *,TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS edad from natacion
        where  idEliminado=1 and idUsuario>1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';
        $fechaMinima = date('Y-m-d');
        $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
        $fechaMini = date ( 'Y-m-d' , $fechaMin );

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarE icon blue small button\" onclick=\"editarUsuario(this)\"><i class=\"edit icon\"></i>Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarE icon pink small button\" onclick=\"eliminarUsuario(this)\"><i class=\"trash icon\"></i>Eliminar</button>';
            $btnReporte = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui  icon green small button\" onclick=\"reporte(this)\"><i class=\"file outline icon\"></i>Ficha</button>';
            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';
            $btnVencidos = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnVencidos icon red small button\" onclick=\"reinscribirUsuario(this)\"><i class=\"pencil alternate icon\"></i>Inscripción</button>';
            if($fila["fechaFinal"] <= $fechaMini){
                
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnVencidos.''.$btnReporte.' '.$btnEliminar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
            }
               else{
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnReporte.''.$btnEditar.''.$btnEliminar.'</center></td><td><center>'.$imagen.'</center></td></table>"';
               }
            
            
            
           

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function registrar(){
        $corr= "(select max(idUsuario)+1 as id from natacion)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();

        $idExp = '';

        if($fila["id"]<10){
            $idExp ='EN00000'.$fila['id'].'';
        }
        if($fila["id"]>9){
            $idExp = 'EN0000'.$fila['id'].'';
        }
        else if($fila["id"]>99){
            $idExp = 'EN000'.$fila['id'].'';

        }
        else if($fila["id"]>999){
            $idExp = 'EN00'.$fila['id'].'';

        }
        else if($fila["id"]>9999){
            $idExp = 'EN0'.$fila['id'].'';
        }

        else if($fila["id"]>99999){
            $idExp = 'EN'.$fila['id'].'';
        }



        $query = "Insert into natacion values (null,'".$idExp."','".$this->objeto->getImg()."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."',
        '".$this->objeto->getDui()."','".$this->objeto->getEncargado()."','".$this->objeto->getDuiEncargado()."'
        ,'".$this->objeto->getTelefono()."',curdate(),ADDDATE(curdate(),INTERVAL 31 DAY),1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function reinscribir() {
        $_query = "update natacion set fechaInscripcion=curdate(),
         fechaFinal=ADDDATE(curdate(),INTERVAL 31 DAY) where idUsuario = ".$this->objeto->getIdUsuario();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminar() {
        $_query = "update natacion set idEliminado=2 where idUsuario = ".$this->objeto->getIdUsuario();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function cargarDatosNatacion() {

        $_query = "select * from natacion
        where idUsuario = ".$this->objeto->getIdUsuario();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function editar() {
        $_query = "update natacion set nombre='".$this->objeto->getNombre()."', apellido='".$this->objeto->getApellido()."',
        fechaNacimiento='".$this->objeto->getFechaNacimiento()."',
        ddi= '".$this->objeto->getDui()."',encargado ='".$this->objeto->getEncargado()."',
        dui='".$this->objeto->getDuiEncargado()."', telefono='".$this->objeto->getTelefono()."' where idUsuario = ".$this->objeto->getIdUsuario();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    
    public function fichaN() {
        $query = "select *,TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS edad from natacion
        where idUsuario=".$this->objeto->getIdUsuario();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


}   