<?php 

class DaoEquipos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Equipos();
    }

    public function mostrarEquiposF()
    {
        $_query = "select e.*,e.nombre as nombreE,c.edadMinima as edad, c.nombreCategoria as Categoria, i.estado as estado, t.nombreTorneo as torneo,
        t.idTorneo as idT from equipos e
        inner join categorias c on c.idCategoria = e.idCategoria
        inner join inscripcion i on i.idInscripcion = e.idInscripcion
        inner join torneos t on t.idTorneo = e.idTorneo
        where  e.idEliminado=1 and e.idEquipo>1 and e.idGenero=1 and e.idFondo=1;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnEditarE icon yellow small button\" onclick=\"editarEquipo(this)\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnEliminarE icon negative small button\" onclick=\"eliminarEquipo(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnVer = '<button id=\"'.$fila["idEquipo"].'\" categoria=\"'.$fila["Categoria"].'\" nombre=\"'.$fila["nombreE"].'\" encargado=\"'.$fila["encargado"].'\" class=\"ui btnVerT icon blue small button\" onclick=\"verJugadoresE(this)\"><i class=\"users icon\"></i> Jugadores</button>';
            $btnCancelar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui  icon purple small button\" onclick=\"enviarFondo(this)\"><i class=\"close icon\"></i> Fondo Común</button>';
            $inscrbirJ = '<button edadMinima=\"'.$fila["edad"].'\" id=\"'.$fila["idEquipo"].'\" categoria=\"'.$fila["Categoria"].'\" idTorneo=\"'.$fila["idT"].'\" nombre=\"'.$fila["nombreE"].'\" encargado=\"'.$fila["encargado"].'\"  class=\"ui icon green small button\" onclick=\"modalCambiar(this)\"><i class=\"edit icon\"></i> Inscribir J</button>';

            if($fila["idInscripcion"]== 1){
                $btnInscrbir = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnInscribir icon green small button\" onclick=\"inscribirEquipo(this)\"><i class=\"futbol icon\"></i>Inscribir</button>';
                
                $acciones = ', "Acciones": "'.$btnInscrbir.''.$btnEditar.' '.$btnEliminar.'"';
            }
               else{
                $btnInscrbir = '';
                $acciones = ', "Acciones": "'.$btnVer.' '.$btnCancelar.' '.$inscrbirJ.''.$btnEditar.''.$btnEliminar.'"';
               }
            
            
            
           

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function mostrarEquiposM()
    {
        $_query = "select e.*,e.nombre as nombreE,c.edadMinima as edad, c.nombreCategoria as Categoria, i.estado as estado, t.nombreTorneo as torneo,
         t.idTorneo as idT from equipos e
        inner join categorias c on c.idCategoria = e.idCategoria
        inner join inscripcion i on i.idInscripcion = e.idInscripcion
        inner join torneos t on t.idTorneo = e.idTorneo
        where  e.idEliminado=1  and e.idGenero=2 and e.idEquipo>2 and e.idFondo=1; ";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnEditarE icon yellow small button\" onclick=\"editarEquipo(this)\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnEliminarE icon negative small button\" onclick=\"eliminarEquipo(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnVer = '<button id=\"'.$fila["idEquipo"].'\" categoria=\"'.$fila["Categoria"].'\" nombre=\"'.$fila["nombreE"].'\" encargado=\"'.$fila["encargado"].'\" class=\"ui btnVerT icon blue small button\" onclick=\"verJugadoresE(this)\"><i class=\"users icon\"></i> Jugadores</button>';
            $btnCancelar = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui  icon purple small button\" onclick=\"enviarFondo(this)\"><i class=\"close icon\"></i> Fondo Común</button>';
            $inscrbirJ = '<button edadMinima=\"'.$fila["edad"].'\" id=\"'.$fila["idEquipo"].'\" categoria=\"'.$fila["Categoria"].'\" idTorneo=\"'.$fila["idT"].'\" nombre=\"'.$fila["nombreE"].'\" encargado=\"'.$fila["encargado"].'\"  class=\"ui icon green small button\" onclick=\"modalCambiar(this)\"><i class=\"edit icon\"></i> Inscribir J</button>';

            if($fila["idInscripcion"]== 1){
                
                $btnInscrbir = '<button id=\"'.$fila["idEquipo"].'\" class=\"ui btnInscribir icon green small button\" onclick=\"inscribirEquipo(this)\"><i class=\"futbol icon\"></i>Inscribir</button>';
                $acciones = ', "Acciones": "'.$btnInscrbir.''.$btnEditar.' '.$btnEliminar.'"';
            }
               else{
                $btnInscrbir = '';
                $acciones = ', "Acciones": "'.$btnVer.''.$btnCancelar.''.$inscrbirJ.''.$btnEditar.' '.$btnEliminar.'"';
               }
            
            
            
           

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function registrarM() {
        $_query = "insert into equipos values(null,'".$this->objeto->getNombreEquipo()."', '".$this->objeto->getEncargado()."',
        '".$this->objeto->getEncargadoAux()."',
        '".$this->objeto->getIdCategoria()."',1,2,2,1,1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function eliminarM() {
        $_query = "update equipos set idEliminado=2 where idGenero=2 and idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editarM() {
        $_query = "update equipos set nombre ='".$this->objeto->getNombreEquipo()."',encargado = '".$this->objeto->getEncargado()."',
        encargadoAux = '".$this->objeto->getEncargadoAux()."',
        idCategoria = '".$this->objeto->getIdCategoria()."'
         where idGenero=2 and idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function inscribirM() {
        $_query = "update equipos set idInscripcion=2, idTorneo='".$this->objeto->getIdTorneo()."'
         where idGenero=2 and idEquipo= ".$this->objeto->getIdEquipo();
         

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    

    public function cargarDatosEquipoM() {

        $_query = "select * from equipos
        where idGenero=2 and idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarDatosEquipoInsM() {

        $_query = "select e.*, c.nombreCategoria as categorias,c.idCategoria as id from equipos e
        inner join categorias c on c.idCategoria = e.idCategoria
        where e.idGenero=2 and  e.idEquipo= ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function mostrarEquiposCmbM() {
        $_query = "select * from equipos where idEliminado=1 and idEquipo>2 and idGenero=2";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function mostrarEquipoCmbM() {
        $_query = "select * from equipos where idEliminado=1 and idGenero=2 and idEquipo>2";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '{"val": '.$fila['idEquipo'].', "text": "'.$fila['nombre'].'"},';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }




    public function registrarF() {
        $_query = "insert into equipos values(null,'".$this->objeto->getNombreEquipo()."', '".$this->objeto->getEncargado()."',
        '".$this->objeto->getEncargadoAux()."','".$this->objeto->getIdCategoria()."',1,1,1,1,1)";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function eliminarF() {
        $_query = "update equipos set idEliminado=2 where idGenero=1 and idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editarF() {
        $_query = "update equipos set nombre ='".$this->objeto->getNombreEquipo()."',encargado = '".$this->objeto->getEncargado()."',
        encargadoAux = '".$this->objeto->getEncargadoAux()."',
        idCategoria = '".$this->objeto->getIdCategoria()."'
         where idGenero=1 and idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function inscribirF() {
        $_query = "update equipos set idInscripcion=2, idTorneo='".$this->objeto->getIdTorneo()."'
         where idGenero=1 and idEquipo= ".$this->objeto->getIdEquipo();
         

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    

    public function cargarDatosEquipoF() {

        $_query = "select * from equipos
        where idGenero=1 and idEquipo = ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarDatosEquipoInsF() {

        $_query = "select e.*, c.nombreCategoria as categorias,c.idCategoria as id from equipos e
        inner join categorias c on c.idCategoria = e.idCategoria
        where e.idGenero=1 and  e.idEquipo= ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function enviarFondo(){
        $_query = "update jugadores  as j
        inner join inscriJugador i on i.idJugador = j.idJugador 
        set j.idFondo =2
        where i.idEquipo= ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function enviarFondoEquipo(){
        $_query = "update equipos set idFondo =2 where idEquipo= ".$this->objeto->getIdEquipo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function mostrarEquiposCmbF() {
        $_query = "select * from equipos where idEliminado=1 and idEquipo>1 and idGenero=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function mostrarEquipoCmbF() {
        $_query = "select * from equipos where idEliminado=1 and idGenero=1 and idEquipo>1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= '{"val": '.$fila['idEquipo'].', "text": "'.$fila['nombre'].'"},';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarJugadoresInsM(){
        $_query = "select j.*,i.estado,e.nombre as equipo from inscriJugador i
        inner join equipos e on e.idEquipo = i.idEquipo
        inner join jugadores j on j.idJugador = i.idJugador
        where i.idEquipo='".$this->objeto->getIdEquipo()."'  and i.estado=2 group by i.idJugador";

        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }

}

?>