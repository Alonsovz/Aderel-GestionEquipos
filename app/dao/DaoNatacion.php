<?php 

class DaoNatacion extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Natacion();
    }

    public function mostrarNatacion()
    {
        $_query = "select *,DATE_FORMAT(fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        DATE_FORMAT(fechaInscripcion, '%d/%m/%Y') as fechaInscripcion,
        DATE_FORMAT(fechaFinal, '%d/%m/%Y') as fechaFinal,
        TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS  edad from natacion
        where  idEliminado=1 and idUsuario>1 ";

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
            $btnVencidos = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui  icon red small button\" onclick=\"reinscribirUsuario(this)\"><i class=\"pencil alternate icon\"></i>Inscripción</button>';
            $btnInscribir = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui  icon violet small button\" onclick=\"reinscribirUsuario(this)\"><i class=\"pencil alternate icon\"></i>Inscripción</button>';

            if($fila["fechaFinal"] >= $fechaMini){
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center> '.$btnInscribir.' '.$btnEditar.''.$btnEliminar.'</center></td><td><center>'.$imagen.'</center></td></table>"';    
                
               
            }
            else if($fila["estado"]==1){
                $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnEditar.''.$btnEliminar.' '.$btnInscribir.'</center></td><td><center>'.$imagen.'</center></td></table>"';    
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
        ,'".$this->objeto->getTelefono()."',curdate(),curdate(),1,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function reinscribir() {
        $_query = "update natacion set fechaInscripcion=curdate(), estado=2,
         fechaFinal=ADDDATE(curdate(),INTERVAL 366 DAY) where idUsuario = ".$this->objeto->getIdUsuario();

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

        $_query = "select *,TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS edad from natacion
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

    public function editar() {
        $_query = "update natacion set nombre='".$this->objeto->getNombre()."', apellido='".$this->objeto->getApellido()."',
        fechaNacimiento='".$this->objeto->getFechaNacimiento()."', foto ='".$this->objeto->getImg()."',
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
        $query = "select *,TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS edad,
        DATE_FORMAT(fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        DATE_FORMAT(fechaInscripcion, '%d/%m/%Y') as fechaInscripcion,
        DATE_FORMAT(fechaFinal, '%d/%m/%Y') as fechaFinal from natacion
        where idUsuario=".$this->objeto->getIdUsuario();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function primerPago(){
        $_query = "insert into pagoNatacion values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 0 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function segundoPago(){
        $_query = "insert into pagoNatacion values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 31 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function tercerPago(){
        $_query = "insert into pagoNatacion values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 61 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function cuartoPago(){
        $_query = "insert into pagoNatacion values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 92 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function quintoPago(){
        $_query = "insert into pagoNatacion values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 122 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function sextoPago(){
        $_query = "insert into pagoNatacion values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 153 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }
    public function septimoPago(){
        $_query = "insert into pagoNatacion values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 183 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function octavoPago(){
        $_query = "insert into pagoNatacion values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 214 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function novenoPago(){
        $_query = "insert into pagoNatacion values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 244 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function decimoPago(){
        $_query = "insert into pagoNatacion values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 275 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function oncePago(){
        $_query = "insert into pagoNatacion values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 305 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function docePago(){
        $_query = "insert into pagoNatacion values(null, '".$this->objeto->getIdUsuario()."',
        ADDDATE(curdate(),INTERVAL 336 DAY),1);";

        $resultado = $this->con->ejecutar($_query);

    }

    public function mostrarNatacionPagos()
    {
        $_query = "select *,DATE_FORMAT(fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        DATE_FORMAT(fechaInscripcion, '%d/%m/%Y') as fechaInscripcion,
        DATE_FORMAT(fechaFinal, '%d/%m/%Y') as fechaFinal,
        TIMESTAMPDIFF(YEAR,fechaNacimiento,CURDATE()) AS edad from natacion
        where  idEliminado=1 and idUsuario>1 and estado=2;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnCobrar = '<button id=\"'.$fila["idUsuario"].'\" class=\"ui  icon red small button\" onclick=\"cobrarNatacion(this)\"><i class=\"dollar icon\"></i>Cobrar</button>';
            $imagen='<img src=\"'.$fila['foto'].'\" width=\"50px\" height=\"50px\" />';
            
           
            $acciones = ', "Acciones": "<table  style=width:100%;><td><center>'.$btnCobrar.'</center></td><td><center>'.$imagen.'</center></td></table>"'; 
           
            
           

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }

    public function pagos(){
        $_query="select p.*,DATE_FORMAT(p.fechasPago, '%d/%m/%Y') as fechaP, g.nombre as nombre, g.apellido as apellido 
        from pagoNatacion p
        inner join natacion  g on g.idUsuario = p.idUsuario
         where p.idUsuario =".$this->objeto->getIdUsuario();


        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }

    public function cobrar()
    {

        $_query="update pagoNatacion set estado=2 where id=".$this->objeto->getIdPago();
       

        $resultado = $this->con->ejecutar($_query);
        
        
        

    }


    public function exonerar()
    {

        $_query="update pagoNatacion set estado=3 where id=".$this->objeto->getIdPago();
       

        $resultado = $this->con->ejecutar($_query);
        
        if($resultado){
            return 1;

        }else{
            return 0;
        }
        
        

    }

}   