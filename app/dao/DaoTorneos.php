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
            
            $btnFinal = $this->clasificacionButton($fila["idTorneo"]);
            
            
            if($fila["sorteo"]==1){
                $acciones = ', "Acciones": "'.$btnVer.''.$sorteo .''.$btnEditar.' '.$btnEliminar.'"';
            }else{
                $acciones = ', "Acciones": "'.$btnVer.''.$btnEstad.''.$btnReporte .''.$btnGestion.''.$btnFinal.'"';
            }
            

            $object = substr_replace($object, $acciones, strlen($object) -1,0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        echo '{"data": ['.$_json .']}';
    }

    public function mostrarTorneosHistorialM()
    {
        $_query = "select t.*, c.nombreCategoria as categoria from torneos t
        inner join categorias c on c.idCategoria  = t.idCategoria
        where t.idEliminado = 3 and t.idTorneo>2 and t.idGenero=2";
        
        $resultado = $this->con->ejecutar($_query);
        
        $_json = '';
        while($fila = $resultado->fetch_assoc()) {
            $object = json_encode($fila);
            
            

            
            $btnVer = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui icon blue small button\" onclick=\"verEquipos(this)\"><i class=\"users icon\"></i> Equipos</button>';
            $btnEstad = '<button id=\"'.$fila["idTorneo"].'\" torneo=\"'.$fila["nombreTorneo"].'\" class=\"ui icon red small button\" onclick=\"verEstadisticas(this)\"><i class=\"sort amount up icon\"></i> Estadisticas</button>';
           
            $acciones = ', "Acciones": "'.$btnVer.''.$btnEstad.'"';
            
            

            $object = substr_replace($object, $acciones, strlen($object) -1,0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        echo '{"data": ['.$_json .']}';
    }

    public function mostrarTorneosHistorialF()
    {
        $_query = "select t.*, c.nombreCategoria as categoria from torneos t
        inner join categorias c on c.idCategoria  = t.idCategoria
        where t.idEliminado = 3 and t.idTorneo>1 and t.idGenero=1";
        
        $resultado = $this->con->ejecutar($_query);
        
        $_json = '';
        while($fila = $resultado->fetch_assoc()) {
            $object = json_encode($fila);
            
            $btnVer = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui icon blue small button\" onclick=\"verEquipos(this)\"><i class=\"users icon\"></i> Equipos</button>';
            $btnEstad = '<button id=\"'.$fila["idTorneo"].'\" torneo=\"'.$fila["nombreTorneo"].'\"  class=\"ui icon red small button\" onclick=\"verEstadisticas(this)\"><i class=\"sort amount up icon\"></i> Estadisticas</button>';
           
                $acciones = ', "Acciones": "'.$btnVer.''.$btnEstad.'"';
            
            

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
               
               
               
                $btnEditar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEditarT icon blue small button\" onclick=\"editarTorneo(this)\"><i class=\"edit icon\"></i> Editar</button>';
            $btnEliminar = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui btnEliminarT icon negative small button\" onclick=\"eliminarTorneo(this)\"><i class=\"trash icon\"></i> Eliminar</button>';
            $btnVer = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui icon green small button\" onclick=\"verEquipos(this)\"><i class=\"users icon\"></i> Equipos</button>';
            $sorteo = '<button id=\"'.$fila["idTorneo"].'\"  equipos=\"'.$fila["inscritos"]. '\" name=\"'.$fila["nombreTorneo"]. '\"  class=\"ui icon yellow small button\" onclick=\"sorteos(this)\"><i class=\"futbol icon\"></i> Sorteo</button>';
            $btnReporte = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui  icon purple small button\" onclick=\"reporte(this)\"><i class=\"calendar icon\"></i>Calendarización</button>';
            $btnGestion = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui  icon orange small button\" onclick=\"calendarizacion(this)\"><i class=\"calendar icon\"></i>Gestionar</button>';
            $btnEstad = '<button id=\"'.$fila["idTorneo"].'\" class=\"ui  icon blue small button\" onclick=\"estadisticas(this)\"><i class=\"sort amount up icon\"></i>Estadísticas</button>';
            
            $btnFinal = $this->clasificacionButton($fila["idTorneo"]);
            
            
            if($fila["sorteo"]==1){
                $acciones = ', "Acciones": "'.$btnVer.''.$sorteo .''.$btnEditar.' '.$btnEliminar.'"';
            }else{
                $acciones = ', "Acciones": "'.$btnVer.''.$btnEstad.''.$btnReporte .''.$btnGestion.''.$btnFinal.'"';
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

    public function cargarTorneosRpt(){
        $_query = "select t.*, c.nombreCategoria as cat from torneos t
        inner join categorias c on c.idCategoria= t.idCategoria
        where t.idEliminado=1 and t.idTorneo>2";

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

    public function mostrarEquiposHM(){
        $_query = "select * from equipos where idEliminado=3 and idGenero=2 and  idTorneo=".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        return $resultado;
    }

    public function mostrarEquiposHF(){
        $_query = "select * from equipos where idEliminado=3 and idGenero=1 and  idTorneo=".$this->objeto->getIdTorneo();

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

    public function calendarioFiltro(){
        $query = "
        select j.orden as jornada, j.vuelta_N as vuelta, j.descansa_id_Equipo as descansa,
                p.equipo1_id as equipo1, p.equipo2_id as equipo2, p.partido_N as partido, p.cancha as cancha, p.id as idPartido,
                p.fecha as fecha, p.hora as hora,t.nombreTorneo as nombreT, t.idTorneo as idTor FROM partidos p 
                inner JOIN jornadas j on j.id = p.jornadas_id
                inner join torneos t on t.idTorneo = j.idTorneo
                WHERE  p.estado=1 and j.idTorneo =".$this->objeto->getIdTorneo()."
                 and j.orden = ".$this->objeto->getJornada()." and j.vuelta_N = ".$this->objeto->getVuelta();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function posiciones($idTorneo=false){
        if($idTorneo==false)    $this->objeto->getIdTorneo();

        $query = "select p.*, e.nombre as nombreE, t.nombreTorneo as Torneo, (p.golesFavor - p.golesContra) as diferencia from posiciones p
        inner join equipos e on e.idEquipo = p.idEquipo 
        inner join torneos t on t.idTorneo = p.idTorneo
        where p.idTorneo = ".$idTorneo." ORDER BY puntaje DESC, diferencia DESC";

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
        $query = "select g.*, e.nombre as equipo, t.nombreTorneo as torneo, j.nombre as nombre, j.apellido as apellido from goleadores g
        inner join inscriJugador i on i.idJugador = g.idJugador
        inner join equipos e on e.idEquipo = i.idEquipo
        inner join torneos t on t.idTorneo = g.idTorneo
        inner join jugadores j on j.idJugador = i.idJugador
        where e.idTorneo =  ".$this->objeto->getIdTorneo()."  and g.idTorneo=  ".$this->objeto->getIdTorneo()." 
          group by g.idTorneo, g.idJugador order by g.goles desc LIMIT 5";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function campeon(){
        $query = "select c.*, e.nombre as equipo, e.encargado as encargado, e.encargadoAux as encargadoAux, 
        t.nombreTorneo as torneo from clasificatoria c
        inner join equipos e on e.idEquipo = c.idEquipoGanador 
        inner join torneos t on t.idTorneo = c.idTorneo
        where c.idTorneo  = ".$this->objeto->getIdTorneo()." and c.etapa= 'final'";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function castigos(){
        $query = "select c.*,e.nombre as equipo, t.nombreTorneo as torneo, j.nombre as nombre, j.apellido as apellido from expulsiones c
        inner join inscriJugador i on i.idJugador = c.idJugador
                inner join equipos e on e.idEquipo = i.idEquipo
                inner join torneos t on t.idTorneo = c.idTorneo
                inner join jugadores j on j.idJugador = i.idJugador
                where c.idTorneo = ".$this->objeto->getIdTorneo()."  and c.estado=1";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function amonestados(){
        $query = "select c.*,e.nombre as equipo, t.nombreTorneo as torneo, j.nombre as nombre, j.apellido as apellido from tarjetasAmarilla c
        inner join inscriJugador i on i.idJugador = c.idJugador
                inner join equipos e on e.idEquipo = i.idEquipo
                inner join torneos t on t.idTorneo = c.idTorneo
                inner join jugadores j on j.idJugador = i.idJugador
                where c.idTorneo = ".$this->objeto->getIdTorneo()."  and tarjetas=3";

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
        where j.idEliminado=1 and j.idFondo = 1 and j.correlativo != 'FM000001' and j.idGenero=2 and incri.pago=2";

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
        where j.idEliminado=1 and j.idFondo = 1 and j.correlativo != 'FF000001' and j.idGenero=1 and incri.pago=2";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function registrarGoleador(){
        $query="update  goleadores set goles = goles + '".$this->objeto->getGoles()."' where idJugador ='".$this->objeto->getIdJugador()."' and
        idTorneo = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function guardarDatos(){
        $query="update partidos set fecha ='".$this->objeto->getFecha()."', hora ='".$this->objeto->getHora()."', 
        hora ='".$this->objeto->getHora()."', estado=2 where id=".$this->objeto->getIdPartido();

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function guardarHistorial(){
        $query="Insert into historialE values (null,'".$this->objeto->getEquipo1()."','".$this->objeto->getGoles1()."',
        '".$this->objeto->getEquipo2()."','".$this->objeto->getGoles2()."','".$this->objeto->getVuelta()."',
        '".$this->objeto->getJornada()."','".$this->objeto->getFecha()."','".$this->objeto->getIdTorneo()."')";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    
    

    public function registrarAmarilla(){
        $query="Insert into tarjetasAmarilla values (null,'".$this->objeto->getIdJugador()."','".$this->objeto->getIdTorneo()."',0)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function registrarDirecto(){
        $query="Insert into expulsiones values (null,'".$this->objeto->getIdJugador()."','".$this->objeto->getIdTorneo()."',
        '".$this->objeto->getTarjeta()."','".$this->objeto->getPartidos()."','".$this->objeto->getObservacion()."',1)";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function updateAmarilla(){
        $query="update tarjetasAmarilla set tarjetas = tarjetas + 1 where idJugador= '".$this->objeto->getIdJugador()."'
         and idTorneo= ".$this->objeto->getIdTorneo();

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
        where idEquipo = (select idEquipo from equipos where nombre= '".$this->objeto->getEquipo1()."' and idTorneo='".$this->objeto->getIdTorneo()."') 
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
        where idEquipo = (select idEquipo from equipos where nombre= '".$this->objeto->getEquipo2()."' and idTorneo='".$this->objeto->getIdTorneo()."') 
        and idTorneo  = ".$this->objeto->getIdTorneo();

        $resultado = $this->con->ejecutar($_query);

        

    }


    private function clasificacionButton($idTorneo)
    {
        $_query = 'SELECT * FROM `clasificatoria` WHERE `idTorneo`='.$idTorneo;
        $clasi = $this->con->ejecutar($_query);

        if($clasi->num_rows==0){    //aun no inicia la clasificacion
            $nEquipos = $this->posiciones($idTorneo)->num_rows;
            
            if($nEquipos>=10)   //cuartos de final
                $htmlButton='<button id=\"'.$idTorneo.'\" class=\"ui  icon orange small button\" onclick=\"finalistas(this)\"><i class=\"calendar icon\"></i>Cuartos de final</button>';
            
            else //seminifinales
                $htmlButton='<button id=\"'.$idTorneo.'\" class=\"ui  icon orange small button\" onclick=\"finalistas(this)\"><i class=\"calendar icon\"></i>Semifinal</button>';
            
        }else{
            $etapa=null;
            
            while($fila = $clasi->fetch_assoc()) {
                if($fila['idEquipoGanador']==null) $etapa=$fila['etapa'];       //etapa en progreso
            }

            if($etapa==null){
                $_query="SELECT * FROM `clasificatoria` WHERE fecha=(SELECT max(fecha) from clasificatoria) and idTorneo=".$idTorneo;
                $result = $this->con->ejecutar($_query);
                $siguienteEtapa = $result->fetch_assoc();

                switch ($siguienteEtapa['etapa']) {
                    case 'cuartos de final':
                        $etapa='semifinal';
                        break;

                    case 'semifinal':
                        $etapa='final';
                        break;

                    case 'final':
                        return '';
                        break;    
                }
                $htmlButton='<button id=\"'.$idTorneo.'\" class=\"ui  icon orange small button\" onclick=\"finalistas(this,`'.$siguienteEtapa['etapa'].'`)\"><i class=\"calendar icon\"></i>'.$etapa.'</button>';

            }else{
                $htmlButton='<button id=\"'.$idTorneo.'\"  class=\"ui  icon orange small button\" onclick=\'equipoWinner(this)\'><i class=\"calendar icon\"></i>Ganadores '.$etapa.'</button>';
            }

            

        }
        return $htmlButton;
    }

    public function equiposClasificacion($idTorneo)
    {
        $_query = 'SELECT * FROM `clasificatoria` WHERE `idTorneo`='.$idTorneo;
        $clasi = $this->con->ejecutar($_query);

        $datos;
        $cont=0;
        while($fila = $clasi->fetch_assoc()) {
            if($fila['idEquipoGanador']==null){
                $etapa=$fila['etapa'];
                $_query="SELECT (SELECT nombre from equipos where idEquipo=".$fila['idEquipo1'].") as equipo1, (SELECT nombre from equipos where idEquipo=".$fila['idEquipo2'].") as equipo2;";

                $equipos=$this->con->ejecutar($_query);
                $nomEquipos=$equipos->fetch_assoc();
                $datos[$cont]['etapa']             = $etapa;
                $datos[$cont]['fecha']             = $fila['fecha'];
                $datos[$cont]['hora']              = $fila['hora'];
                $datos[$cont]['idClasificatoria']  = $fila['idClasificatoria'];
                $datos[$cont]['idTorneo']          = $fila['idTorneo'];
                $datos[$cont]['equipo1']['id']     = $fila['idEquipo1'];
                $datos[$cont]['equipo1']['nombre'] = $nomEquipos['equipo1'];
                $datos[$cont]['equipo2']['id']     = $fila['idEquipo2'];
                $datos[$cont]['equipo2']['nombre'] = $nomEquipos['equipo2'];

                $cont++;
            } 
        }
        $datos= json_encode($datos);
        
        return $datos;
    }

    public function clasificatoriaEnProceso($idTorneo, $etapa)
    {
        $_query = 'SELECT c.partidoN, c.idEquipoGanador, (SELECT nombre from equipos where idEquipo= c.idEquipoGanador ) as equipoGanador FROM clasificatoria c WHERE `idTorneo`='.$idTorneo.' and etapa="'.$etapa.'" order by partidoN;';
        $clasi=$this->con->ejecutar($_query);
        
        $filas=[];
        while($fila = $clasi->fetch_assoc()) 
            array_push($filas,$fila);
        
        return $filas;
    }

    public function historiaTorneo($idTorneo)
    {
        $_query = 'UPDATE `torneos` SET `idEliminado`=3 WHERE `idTorneo`='.$idTorneo;
        $clasi=$this->con->ejecutar($_query);

        $_query='UPDATE `equipos` SET `idEliminado`=3 WHERE `idTorneo`='.$idTorneo;
        $this->con->ejecutar($_query);
    }

}


?>