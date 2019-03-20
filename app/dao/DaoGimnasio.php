<?php 

class DaoGimnasio extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Gimnasio();
    }

    public function mostrarGimnasio()
    {
        $_query = "select * from gimnasio
        where  idEliminado=1 and idUsuario>1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';
        $fechaMinima = date('Y-m-d');
        $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
        $fechaMini = date ( 'Y-m-d' , $fechaMin );

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarE icon blue small button\" onclick=\"editarUsuario(this)\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarE icon pink small button\" onclick=\"eliminarUsuario(this)\"><i class=\"trash icon\"></i></button>';
            
            if($fila["fechaFinal"] <= $fechaMini){
                $btnVencidos = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnVencidos icon red small button\" onclick=\"reinscribirUsuario(this)\"><i class=\"pencil alternate icon\"></i></button>';
                
                $acciones = ', "Acciones": "<div style=background-color:#FFFF00>'.$btnVencidos.''.$btnEditar.' '.$btnEliminar.'</div>"';
            }
               else{
                $btnInscrbir = '';
                $acciones = ', "Acciones": "'.$btnEditar.''.$btnEliminar.'"';
               }
            
            
            
           

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function registrarGim(){
        $corr= "(select max(idUsuario)+1 as id from gimnasio)";

        $resultado1 = $this->con->ejecutar($corr);

        $fila = $resultado1->fetch_assoc();

        $idExp = '';

        if($fila["id"]<10){
            $idExp ='GY00000'.$fila['id'].'';
        }
        if($fila["id"]>9){
            $idExp = 'GY0000'.$fila['id'].'';
        }
        else if($fila["id"]>99){
            $idExp = 'GY000'.$fila['id'].'';

        }
        else if($fila["id"]>999){
            $idExp = 'GY00'.$fila['id'].'';

        }
        else if($fila["id"]>9999){
            $idExp = 'GY0'.$fila['id'].'';
        }

        else if($fila["id"]>99999){
            $idExp = 'GY'.$fila['id'].'';
        }



        $query = "Insert into gimnasio values (null,'".$idExp."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."','".$this->objeto->getEdad()."',
        '".$this->objeto->getDui()."',curdate(),ADDDATE(curdate(),INTERVAL 31 DAY),1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function editar() {
        $_query = "update gimnasio set nombre='".$this->objeto->getNombre()."', apellido='".$this->objeto->getApellido()."',
        fechaNacimiento='".$this->objeto->getFechaNacimiento()."', edad='".$this->objeto->getEdad()."',
        ddi= '".$this->objeto->getDui()."' where idUsuario = ".$this->objeto->getIdUsuario();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function reinscribir() {
        $_query = "update gimnasio set fechaInscripcion=curdate(),
         fechaFinal=ADDDATE(curdate(),INTERVAL 31 DAY) where idUsuario = ".$this->objeto->getIdUsuario();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminar() {
        $_query = "update gimnasio set idEliminado=2 where idUsuario = ".$this->objeto->getIdUsuario();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function cargarDatosGimnasio() {

        $_query = "select * from gimnasio
        where idUsuario = ".$this->objeto->getIdUsuario();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function getDdi()
    {

        $_query="select idUsuario,ddi from gimnasio WHERE ddi='".$this->objeto->getDui()."' and idEliminado=1";
       

        $resultado=$this->con->ejecutar($_query)->fetch_assoc();
        if($resultado['ddi']!=null)
        {
            return 1;
        }
        else
        {
            return 0;
        }
        
        

    }



}


?>