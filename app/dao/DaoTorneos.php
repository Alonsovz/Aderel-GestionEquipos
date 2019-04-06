<?php 

class DaoTorneos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Torneos();
    }


    public function mostrarTorneosM()
    {
        $_query = "select t.*, c.nombreCategoria as categoria from torneos t
        inner join categorias c on c.idCategoria  = t.idCategoria
         where t.idEliminado = 1 and t.idTorneo>2 and t.idGenero=2";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);
               
               

                $btnEditar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEditarT icon blue small button\" onclick=\"editarTorneo(this)\"><i class=\"edit icon\"></i> Editar</button>';
                $btnEliminar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEliminarT icon negative small button\" onclick=\"eliminarTorneo(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
                $btnVer = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui icon green small button\" onclick=\"verEquipos(this)\"><i class=\"users icon\"></i> Equipos</button>';
                $sorteo = '<button id=\"'.$fila["idTorneo"].'\"  equipos=\"'.$fila["inscritos"]. '\" name=\"'.$fila["nombreTorneo"]. '\"  class=\"ui icon yellow small button\" onclick=\"sorteos(this)\"><i class=\"futbol icon\"></i> Sorteo</button>';
                $btnReporte = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui  icon purple small button\" onclick=\"reporte(this)\"><i class=\"calendar icon\"></i>Calendarización</button>';
                $btnGestion = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui  icon gray small button\" onclick=\"calendarizacion(this)\"><i class=\"calendar icon\"></i>Gestionar</button>';

                if($fila["sorteo"]==1){
                    $acciones = ', "Acciones": "'.$btnVer.''.$sorteo .''.$btnEditar.' '.$btnEliminar.'"';
                }else{
                    $acciones = ', "Acciones": "'.$btnVer.''.$btnEditar.' '.$btnEliminar.''.$btnReporte .''.$btnGestion.'"';
                }
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }

    public function mostrarTorneosF()
    {
        $_query = "select t.*, c.nombreCategoria as categoria from torneos t
        inner join categorias c on c.idCategoria  = t.idCategoria
         where t.idEliminado = 1 and t.idTorneo>1 and t.idGenero=1";

        

            $resultado = $this->con->ejecutar($_query);

            $_json = '';

            
            while($fila = $resultado->fetch_assoc()) {
                    
                $object = json_encode($fila);
               
               
                $btnGestion = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui  icon gray small button\" onclick=\"calendarizacion(this)\"><i class=\"calendar icon\"></i>Gestionar</button>';
                $btnEditar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEditarT icon blue small button\" onclick=\"editarTorneo(this)\"><i class=\"edit icon\"></i> Editar </button>';
                $btnEliminar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEliminarT icon negative small button\" onclick=\"eliminarTorneo(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
                $btnVer = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui icon green small button\" onclick=\"verEquipos(this)\"><i class=\"users icon\"></i> Equipos</button>';
                $sorteo = '<button id=\"'.$fila["idTorneo"].'\"  equipos=\"'.$fila["inscritos"]. '\" name=\"'.$fila["nombreTorneo"]. '\"  class=\"ui icon yellow small button\" onclick=\"sorteos(this)\"><i class=\"futbol icon\"></i>Sorteo</button>';
                $btnReporte = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui  icon olive small button\" onclick=\"reporte(this)\"><i class=\"calendar icon\"></i>Calendarización</button>';

                if($fila["sorteo"]==1){
                    $acciones = ', "Acciones": "'.$btnVer.''.$sorteo .''.$btnEditar.' '.$btnEliminar.'"';
                }else{
                    $acciones = ', "Acciones": "'.$btnVer.''.$btnEditar.' '.$btnEliminar.''.$btnReporte .''.$btnGestion.'"';
                }
                
                

                $object = substr_replace($object, $acciones, strlen($object) -1,0);
    
                $_json .= $object.',';
            }
    
            $_json = substr($_json,0, strlen($_json) - 1);
    
            echo '{"data": ['.$_json .']}';
    }

    public function registrarM(){
        $query = "Insert into torneos values (null,'".$this->objeto->getNombreTorneo()."','".$this->objeto->getNumeroEquipos()."',
        '".$this->objeto->getDisponibles()."',0,
        '".$this->objeto->getIdCategoria()."',2,1,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function cargarDatosTorneoM() {

        $_query = "select * from torneos
        where idGenero=2 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarTorneosM(){
        $_query = "select t.*, c.nombreCategoria as cat from torneos t
        inner join categorias c on c.idCategoria= t.idCategoria
        where t.idEliminado=1 and t.idTorneo>1 and t.disponibles>0 and t.idGenero=2";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function verCategoriaM(){
        $_query = "select idCategoria from torneos where  idGenero=2 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        echo $json;

    }

    public function editarM() {
        $_query = "update torneos set nombreTorneo = '".$this->objeto->getNombreTorneo()."',
        numeroEquipos = '".$this->objeto->getNumeroEquipos()."',
        idCategoria = '".$this->objeto->getIdCategoria()."'
         where idGenero=2 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarM() {
        
        $_query = "update torneos set idEliminado=2 where idGenero=2 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function disponiblesM() {
        $resta = 1;
        $suma =1;
        $_query = "update torneos set disponibles= disponibles - ".$resta.", inscritos= inscritos + ".$suma."
         where idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        
    }


    public function registrarF(){
        $query = "Insert into torneos values (null,'".$this->objeto->getNombreTorneo()."','".$this->objeto->getNumeroEquipos()."',
        '".$this->objeto->getNumeroEquipos()."',0,
        '".$this->objeto->getIdCategoria()."',1,1,1);";

        $resultado = $this->con->ejecutar($query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function cargarDatosTorneoF() {

        $_query = "select * from torneos
        where idGenero=1 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        $json = json_encode($resultado->fetch_assoc());

        return $json;
    }

    public function cargarTorneosF(){
        $_query = "select t.*, c.nombreCategoria as cat from torneos t
        inner join categorias c on c.idCategoria= t.idCategoria
        where t.idEliminado=1 and t.idTorneo>1 and t.disponibles>0 and t.idGenero=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


    public function verCategoriaF(){
        $_query = "select idCategoria from torneos where  idGenero=1 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        echo $json;

    }

    public function editarF() {
        $_query = "update torneos set nombreTorneo = '".$this->objeto->getNombreTorneo()."',
        numeroEquipos = '".$this->objeto->getNumeroEquipos()."',
        idCategoria = '".$this->objeto->getIdCategoria()."'
         where idGenero=1 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function eliminarF() {
        
        $_query = "update torneos set idEliminado=2 where idGenero=1 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function disponiblesF() {
        $resta = 1;
        $suma =1;
        $_query = "update torneos set disponibles= disponibles - ".$resta.", inscritos=inscritos + ".$suma." where idGenero=1 and idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }


    public function mostrarEquiposCM(){
        $_query = "select * from equipos where idEliminado=1 and idGenero=2 and  idTorneo=".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }

    public function mostrarEquiposCF(){
        $_query = "select * from equipos where idEliminado=1 and idGenero=1 and  idTorneo=".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }


    public function calendarioVuelta1(){
        $query = "select j.orden as jornada, j.vuelta_N as vuelta, j.descansa_id_Equipo as descansa,
        p.equipo1_id as equipo1, p.equipo2_id as equipo2, p.partido_N as partido, p.cancha as cancha,
        p.fecha as fecha, p.hora as hora,t.nombreTorneo as nombreT FROM partidos p 
        inner JOIN jornadas j on j.id = p.jornadas_id
        inner join torneos t on t.idTorneo = j.idTorneo
        WHERE  j.vuelta_N=1 and j.idTorneo =".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }
    

    public function calendarioVuelta2(){
        $query = "select j.orden as jornada, j.vuelta_N as vuelta, j.descansa_id_Equipo as descansa,
        p.equipo1_id as equipo1, p.equipo2_id as equipo2, p.partido_N as partido, p.cancha as cancha,
        p.fecha as fecha, p.hora as hora,t.nombreTorneo as nombreT FROM partidos p 
        inner JOIN jornadas j on j.id = p.jornadas_id
        inner join torneos t on t.idTorneo = j.idTorneo
        WHERE  j.vuelta_N=2 and j.idTorneo =".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function calendarioVuelta3(){
        $query = "select j.orden as jornada, j.vuelta_N as vuelta, j.descansa_id_Equipo as descansa,
        p.equipo1_id as equipo1, p.equipo2_id as equipo2, p.partido_N as partido, p.cancha as cancha,
        p.fecha as fecha, p.hora as hora,t.nombreTorneo as nombreT FROM partidos p 
        inner JOIN jornadas j on j.id = p.jornadas_id
        inner join torneos t on t.idTorneo = j.idTorneo
        WHERE  j.vuelta_N=3 and j.idTorneo =".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function calendarioVuelta4(){
        $query = "select j.orden as jornada, j.vuelta_N as vuelta, j.descansa_id_Equipo as descansa,
        p.equipo1_id as equipo1, p.equipo2_id as equipo2, p.partido_N as partido, p.cancha as cancha,
        p.fecha as fecha, p.hora as hora,t.nombreTorneo as nombreT FROM partidos p 
        inner JOIN jornadas j on j.id = p.jornadas_id
        inner join torneos t on t.idTorneo = j.idTorneo
        WHERE  j.vuelta_N=4 and j.idTorneo =".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function calendarioGestionT(){
        $query = "select j.orden as jornada, j.vuelta_N as vuelta, j.descansa_id_Equipo as descansa,
        p.equipo1_id as equipo1, p.equipo2_id as equipo2, p.partido_N as partido, p.cancha as cancha,
        p.fecha as fecha, p.hora as hora,t.nombreTorneo as nombreT FROM partidos p 
        inner JOIN jornadas j on j.id = p.jornadas_id
        inner join torneos t on t.idTorneo = j.idTorneo
        WHERE  j.idTorneo =".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function paraSorteo() {
        
        $_query = "update torneos set sorteo= 2 where idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        
    }

    public function mostrarGoleadoresCmb() {
        $_query = "select * from jugadores where idEliminado=1 and idFondo = 1 and idJugador>1 and idGenero=2";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarGoleadorasCmb() {
        $_query = "select * from jugadores where idEliminado=1 and idFondo = 1 and idJugador>1 and idGenero=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }


}


?>