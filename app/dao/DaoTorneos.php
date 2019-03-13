<?php 

class DaoTorneos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Torneos();
    }


    public function mostrarTorneos()
    {
        $_query = "select t.*, c.nombreCategoria as categoria from torneos t
        inner join categorias c on c.idCategoria  = t.idCategoria
         where t.idEliminado = 1 and t.idTorneo>1";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);
               
               

                $btnEditar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEditarT icon blue small button\" onclick=\"editarJugador(this)\"><i class=\"edit icon\"></i></button>';
                $btnEliminar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEliminarT icon negative small button\" onclick=\"eliminarJugador(this)\"><i class=\"trash icon\"></i></button>';
                

                $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }


}


?>