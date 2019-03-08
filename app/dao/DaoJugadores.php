<?php 

class DaoJugadores extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Jugadores();
    }

    public function registrarJugador(){
        $query = "Insert into jugadores values (null,'".$this->objeto->getNombre()."','".$this->objeto->getApellido()."',
        '".$this->objeto->getDui()."','".$this->objeto->getFoto()."','".$this->objeto->getFechaNacimiento()."',
        '".$this->objeto->getIdEquipo()."','".$this->objeto->getIdCategoria()."',1,'".$this->objeto->getImg()."');";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarJugadores()
    {
        $_query = "select j.*, e.nombre as Equipo, c.nombreCategoria as Categoria from jugadores j
        inner join equipos e on e.idEquipo  = j.idEquipo
        inner join categorias c on c.idCategoria = j.idCategoria
         where j.idEliminado = 1";

        // $resultado = $this->con->ejecutar($_query);


        // if($datos=$this->con->ejecutar($_query)){
		// 	$datosATabla = array();
		// 	while ($fila =$datos->fetch_assoc()) {
		// 		$datosATabla[]=$fila;	
		// 	}
		// }else{
		// 	// SENTENCIA NO EJECUTADA CORRECTAMENTE
		// 	return $datosATabla=false;
        // }

        // print_r($datosATabla);
        // foreach ($datosATabla as $registro) {

            $resultado = $this->con->ejecutar($_query);

            $_json = '';
    
            while($fila = $resultado->fetch_assoc()) {
    
                $object = json_encode($fila);
    
               
                $btnEditar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnEditar icon blue small button\"><i class=\"edit icon\"></i></button>';
                $btnEliminar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i></button>';
                $imagen='<img src="'.$fila['img'].'">';

                $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'","imagen": "'.$imagen.'"';
    
                $object = substr_replace($object, $acciones, strlen($object) -1, 0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            return '{"data": ['.$_json .']}';
    }

}

