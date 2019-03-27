<?php 

class DaoGimnasio extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Gimnasio();
    }

    public function mostrarGimnasio()
    {
        $_query = "select *,TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS edad from gimnasio
        where  idEliminado=1 and idUsuario>1";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';
        $fechaMinima = date('Y-m-d');
        $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
        $fechaMini = date ( 'Y-m-d' , $fechaMin );

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEditarE icon blue small button\" onclick=\"editarUsuario(this)\"><i class=\"edit icon\"></i>Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnEliminarE icon red small button\" onclick=\"eliminarUsuario(this)\"><i class=\"trash icon\"></i>Eliminar</button>';
            $btnVencidos = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui btnVencidos icon violet small button\" onclick=\"reinscribirUsuario(this)\"><i class=\"pencil alternate icon\"></i>Inscripción</button>';
            $btnReporte = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui  icon green small button\" onclick=\"reporte(this)\"><i class=\"file outline icon\"></i>Ficha</button>';
            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';
            
            if($fila["fechaFinal"] <= $fechaMini){
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnVencidos.' '.$btnEditar.''.$btnEliminar.'</center></td><td><center>'.$imagen.'</center></td></table>"';    
                
               
            }
            else if($fila["estado"]==1){
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.''.$btnEliminar.' '.$btnReporte.' '.$btnVencidos.'</center></td><td><center>'.$imagen.'</center></td></table>"';    
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



    public function mostrarGimnasioPagos()
    {
        $_query = "select *,TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS edad from gimnasio
        where  idEliminado=1 and idUsuario>1 and estado=2;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnCobrar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui  icon red small button\" onclick=\"cobrar(this)\"><i class=\"dollar icon\"></i>Cobrar</button>';
         
            
           
            
            $acciones = ', "Acciones": "'.$btnCobrar.'"';  
            
           

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



        $query = "Insert into gimnasio values (null,'".$idExp."','".$this->objeto->getImg()."','".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getFechaNacimiento()."',
        '".$this->objeto->getDui()."',curdate(),curdate(),1,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function editar() {
        $_query = "update gimnasio set nombre='".$this->objeto->getNombre()."', apellido='".$this->objeto->getApellido()."',
        fechaNacimiento='".$this->objeto->getFechaNacimiento()."', foto ='".$this->objeto->getImg()."',
        ddi= '".$this->objeto->getDui()."' where idUsuario = ".$this->objeto->getIdUsuario();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function reinscribir() {
        $_query = "update gimnasio set fechaInscripcion=curdate(), estado=2,
         fechaFinal=ADDDATE(curdate(),INTERVAL 366 DAY) where idUsuario = ".$this->objeto->getIdUsuario();

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

        $_query = "select *,TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS edad from gimnasio
        where idUsuario = ".$this->objeto->getIdUsuario();

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

    

    public function fichaG(){
        $query = "select *,TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS edad from gimnasio
        where idUsuario=".$this->objeto->getIdUsuario();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function primerPago(){
        $_query = "insert into pagoGimnasio values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 0 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function segundoPago(){
        $_query = "insert into pagoGimnasio values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 31 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function tercerPago(){
        $_query = "insert into pagoGimnasio values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 61 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function cuartoPago(){
        $_query = "insert into pagoGimnasio values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 92 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function quintoPago(){
        $_query = "insert into pagoGimnasio values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 122 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function sextoPago(){
        $_query = "insert into pagoGimnasio values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 153 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }
    public function septimoPago(){
        $_query = "insert into pagoGimnasio values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 183 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function octavoPago(){
        $_query = "insert into pagoGimnasio values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 214 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function novenoPago(){
        $_query = "insert into pagoGimnasio values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 244 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function decimoPago(){
        $_query = "insert into pagoGimnasio values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 275 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function oncePago(){
        $_query = "insert into pagoGimnasio values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 305 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function docePago(){
        $_query = "insert into pagoGimnasio values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 336 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }


    public function pagos(){
        $_query="select p.*, g.nombre as nombre, g.apellido as apellido from pagoGimnasio p
        inner join gimnasio  g on g.idUsuario = p.idUsuario
         where p.idUsuario =".$this->objeto->getIdUsuario();


        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }


    public function cobrar()
    {

        $_query="update pagoGimnasio set estado=2 where id=".$this->objeto->getIdPago();
       

        $resultado = $this->con->ejecutar($_query);
        if($resultado)
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