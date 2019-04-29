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
                $btnGestion = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui  icon orange small button\" onclick=\"calendarizacion(this)\"><i class=\"calendar icon\"></i>Gestionar</button>';

                $btnEstad = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui  icon blue small button\" onclick=\"estadisticas(this)\"><i class=\"sort amount up icon\"></i>Estadísticas</button>';

                if($fila["sorteo"]==1){
                    $acciones = ', "Acciones": "'.$btnVer.''.$sorteo .''.$btnEditar.' '.$btnEliminar.'"';
                }else{
                    $acciones = ', "Acciones": "'.$btnVer.''.$btnEstad.''.$btnReporte .''.$btnGestion.'"';
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
               
               
               
                $btnEditar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEditarT icon blue small button\" onclick=\"editarTorneo(this)\"><i class=\"edit icon\"></i> Editar </button>';
                $btnEliminar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEliminarT icon negative small button\" onclick=\"eliminarTorneo(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
                $btnVer = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui icon green small button\" onclick=\"verEquipos(this)\"><i class=\"users icon\"></i> Equipos</button>';
                $sorteo = '<button id=\"'.$fila["idTorneo"].'\"  equipos=\"'.$fila["inscritos"]. '\" name=\"'.$fila["nombreTorneo"]. '\"  class=\"ui icon yellow small button\" onclick=\"sorteos(this)\"><i class=\"futbol icon\"></i>Sorteo</button>';
                $btnReporte = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui  icon olive small button\" onclick=\"reporte(this)\"><i class=\"calendar icon\"></i>Calendarización</button>';
                $btnGestion = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui  icon orange small button\" onclick=\"calendarizacion(this)\"><i class=\"calendar icon\"></i>Gestionar</button>';

                $btnEstad = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui  icon blue small button\" onclick=\"estadisticas(this)\"><i class=\"sort amount up icon\"></i>Estadísticas</button>';

                if($fila["sorteo"]==1){
                    $acciones = ', "Acciones": "'.$btnVer.''.$sorteo .''.$btnEditar.' '.$btnEliminar.'"';
                }else{
                    $acciones = ', "Acciones": "'.$btnVer.''.$btnEstad.''.$btnReporte .''.$btnGestion.'"';
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
        $query = "
        select j.orden as jornada, j.vuelta_N as vuelta, j.descansa_id_Equipo as descansa,
                p.equipo1_id as equipo1, p.equipo2_id as equipo2, p.partido_N as partido, p.cancha as cancha, p.id as idPartido,
                p.fecha as fecha, p.hora as hora,t.nombreTorneo as nombreT, t.idTorneo as idTor FROM partidos p 
                inner JOIN jornadas j on j.id = p.jornadas_id
                inner join torneos t on t.idTorneo = j.idTorneo
                WHERE  p.estado=1 and j.idTorneo =".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function posiciones(){
        $query = "select p.*, e.nombre as nombreE, t.nombreTorneo as Torneo, (p.golesFavor - p.golesContra) as diferencia from posiciones p
        inner join equipos e on e.idEquipo = p.idEquipo 
        inner join torneos t on t.idTorneo = p.idTorneo
        where p.idTorneo = ".$this->objeto->getIdTorneo()." ORDER BY puntaje DESC, diferencia DESC";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function posicionesRpt(){
        $query = "select p.*, e.nombre as nombreE, t.nombreTorneo as Torneo, (p.golesFavor - p.golesContra) as diferencia from posiciones p
        inner join equipos e on e.idEquipo = p.idEquipo 
        inner join torneos t on t.idTorneo = p.idTorneo
        where p.idTorneo = ".$this->objeto->getIdTorneo()." ORDER BY puntaje DESC, diferencia DESC";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function goleadores(){
        $query = "select g.*, SUM(distinct(g.goles)) as goles, e.nombre as equipo, t.nombreTorneo as torneo, j.nombre as nombre, j.apellido as apellido from goleadores g
        inner join inscriJugador i on i.idJugador = g.idJugador
        inner join equipos e on e.idEquipo = i.idEquipo
        inner join torneos t on t.idTorneo = g.idTorneo
        inner join jugadores j on j.idJugador = i.idJugador
        where g.idTorneo = ".$this->objeto->getIdTorneo()."  group by g.idJugador order by goles desc";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function suspendidos(){
        $query = "select c.*,e.nombre as equipo, t.nombreTorneo as torneo, j.nombre as nombre, j.apellido as apellido from castigos c
        inner join inscriJugador i on i.idJugador = c.idJugador
                inner join equipos e on e.idEquipo = i.idEquipo
                inner join torneos t on t.idTorneo = c.idTorneo
                inner join jugadores j on j.idJugador = i.idJugador
                where c.idTorneo = ".$this->objeto->getIdTorneo()."  and c.tarjeta='Doble Amarilla' or c.tarjeta='Tarjeta Directa'";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function paraSorteo() {
        
        $_query = "update torneos set sorteo= 2 where idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        
    }

    public function mostrarGoleadoresCmb() {
        $_query = "select j.*, equipos.nombre as idEquipo from jugadores j 
        inner join inscrijugador incri on j.idJugador= incri.idJugador 
        inner join equipos on equipos.idEquipo= incri.idEquipo
        where j.idEliminado=1 and j.idFondo = 1 and j.idJugador>1 and j.idGenero=2 group by incri.idJugador";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarGoleadorasCmb() {
        $_query = "select j.*, equipos.nombre as idEquipo from jugadores j 
        inner join inscrijugador incri on j.idJugador= incri.idJugador 
        inner join equipos on equipos.idEquipo= incri.idEquipo
        where j.idEliminado=1 and j.idFondo = 1 and j.idJugador>1 and j.idGenero=1 group by incri.idJugador";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function registrarGoleador(){
        $query="Insert into goleadores values (null,'".$this->objeto->getIdJugador()."','".$this->objeto->getIdTorneo()."',
        '".$this->objeto->getGoles()."')";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function guardarDatos(){
        $query="update partidos set fecha ='".$this->objeto->getFecha()."', hora ='".$this->objeto->getHora()."', 
        hora ='".$this->objeto->getHora()."', estado=2 where id=".$this->objeto->getIdPartido();;

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }
    

    public function registrarCastigos(){
        $query="Insert into castigos values (null,'".$this->objeto->getIdJugador()."','".$this->objeto->getIdTorneo()."',
        '".$this->objeto->getTarjeta()."','".$this->objeto->getObservacion()."','".$this->objeto->getPartidos()."')";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function guardarEquipo1(){

        $_query = "update posiciones set golesFavor =golesFavor + '".$this->objeto->getGoles1()."' ,
         golesContra = golesContra + '".$this->objeto->getGolesContra1()."' ,
         puntaje = puntaje + '".$this->objeto->getPuntaje1()."' ,
         partidosJugados = partidosJugados + 1,  partidosEmpatados = partidosEmpatados + '".$this->objeto->getPartidosEmpatados1()."' ,
         partidosGanados = partidosGanados + '".$this->objeto->getPartidosGanados1()."' ,
         partidosPerdidos = partidosPerdidos + '".$this->objeto->getPartidosPerdidos1()."' 
        where idEquipo = (select idEquipo from equipos where nombre= '".$this->objeto->getEquipo1()."') 
        and idTorneo  = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }

    }

    public function guardarEquipo2(){

        $_query = "update posiciones set golesFavor =golesFavor + '".$this->objeto->getGoles2()."' ,
         golesContra = golesContra + '".$this->objeto->getGolesContra2()."' ,
         puntaje = puntaje + '".$this->objeto->getPuntaje2()."' ,
         partidosJugados = partidosJugados + 1,  partidosEmpatados = partidosEmpatados + '".$this->objeto->getPartidosEmpatados2()."' ,
         partidosGanados = partidosGanados + '".$this->objeto->getPartidosGanados2()."' ,
         partidosPerdidos = partidosPerdidos + '".$this->objeto->getPartidosPerdidos2()."' 
        where idEquipo = (select idEquipo from equipos where nombre= '".$this->objeto->getEquipo2()."') 
        and idTorneo  = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        

    }


}


?>