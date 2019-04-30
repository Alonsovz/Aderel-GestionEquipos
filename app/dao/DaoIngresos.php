<?php 

class DaoIngresos extends DaoBase {

    public function __construct() {
        parent::__construct();
        $this->objeto = new Ingresos();
    }

    public function mostrarIngresos() {
        $pdo = new PDO("mysql:dbname=ADEREL;host=localhost","root","");
        $setenciaSQL= $pdo->prepare("call mostrarIngresos()");
    $setenciaSQL->execute();
   
    $resultado = $setenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
    }


    public function mostrarIngresosCmb() {
        $_query = "select * from Ingresos where idEliminado=1";

        $resultado = $this->con->ejecutar($_query);

        $json = '';

        while($fila = $resultado->fetch_assoc()) {
            $json .= json_encode($fila).',';
        }

        $json = substr($json,0, strlen($json) - 1);

        return '['.$json.']';
    }

    public function mostrarIngresosTabla() {
        $_query = "select id,title,format(SUM(Cantidad),2) as cantidad,DATE_FORMAT(start, '%d/%m/%Y') as start from Ingresos where idEliminado=1 
        group by start,title order by start desc;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            $btnEditar = '<button id=\"'.$fila["id"].'\" class=\"ui btnEditar icon blue small button\"><i class=\"edit icon\"></i></button>';
            $btnEliminar = '<button id=\"'.$fila["id"].'\" class=\"ui btnEliminar icon negative small button\"><i class=\"trash icon\"></i></button>';

            $acciones = ', "Acciones": "'.$btnEditar.' '.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }


    public function mostrarIngresosTablaE() {
        $_query = "select id,title,format(SUM(Cantidad),2) as cantidad,DATE_FORMAT(start, '%d/%m/%Y') as start from Ingresos
         where idEliminado=2
        group by start,title order by start desc;";

        $resultado = $this->con->ejecutar($_query);

        $_json = '';

        while($fila = $resultado->fetch_assoc()) {

            $object = json_encode($fila);

            
            $btnEliminar = '<button id=\"'.$fila["id"].'\" class=\"ui red button\" onclick=\"reestablecerI(this)\"><i class=\"recycle icon\"></i> Reestablecer</button>';

            $acciones = ', "Acciones": "'.$btnEliminar.'"';

            $object = substr_replace($object, $acciones, strlen($object) -1, 0);

            $_json .= $object.',';
        }

        $_json = substr($_json,0, strlen($_json) - 1);

        return '{"data": ['.$_json .']}';
    }
    

    public function mostrarTotal() {
        $_query = "select format(SUM(cantidad),2) as ingresoMes, idEliminado  from Ingresos where  idEliminado=1
         and mes='{$this->objeto->getMes()}' and anio='{$this->objeto->getAnio()}'";

         $resultado = $this->con->ejecutar($_query);

         $json = json_encode($resultado->fetch_assoc());
 
         return $json;
        
    }


    public function verMes() {
        $dataTable=null;
        $_query = "call mostrarIngresosMes('".$this->objeto->getMes()."','".$this->objeto->getAnio()."');";

         $resultado = $this->con->ejecutar($_query);

         $dataTable.="<table  class='table table-sucess' border=2px width='1000'>
					<tr class='danger'>
						
						<th><center>Ingreso</th>
						<th><center>Cantidad total</th>
						<th><center>Fecha</th>
						
						

					</tr>";
		while($fila=$resultado->fetch_assoc()){
			$dataTable.="
				<tr>
					
					<td align='center'>".$fila['title']."</td>
					<td align='center'>".$fila['SUM(Cantidad)']."</td>
					<td align='center'>".$fila['start']."</td>
					


				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;
    } 

    public function reporteIngresosPorFechas() {
        $query = "call reporteIngresosPorFechas('{$this->objeto->getFecha()}','{$this->objeto->getFecha2()}')";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function reporteIngresosPorMes() {
        $query = "call reporteIngresosPorMes('{$this->objeto->getMes()}','{$this->objeto->getAnio()}')";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalMes() {
        $query = "select format(sum(cantidad),2) as total from ingresos where mes='{$this->objeto->getMes()}'
         and anio= '{$this->objeto->getAnio()}' and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function total() {
        $query = "select format(sum(cantidad),2) as cantidad from ingresos where 
        start between '{$this->objeto->getFecha()}' and '{$this->objeto->getFecha2()}' and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totaldia() {
        $query = "select format(sum(cantidad),2) as total from ingresos where start=curdate() and idEliminado=1;";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function reporteDiarioIngresos() {
        $query = "call reporteDiarioIngresos()";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function reporteIngresosPorCategorias() {
        $query = "select *,format((cantidad),2) as cantidad,DATE_FORMAT(start, '%d/%m/%Y') as start
         from ingresos where idEliminado=1 and categoria='{$this->objeto->getCategoria()}' order by start desc";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function totalIngresosPorCategoria() {
        $query = "select format(sum(cantidad),2) as total
         from ingresos where idEliminado=1 and categoria='{$this->objeto->getCategoria()}'";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function totalIngresoPorTorneo() {
        $query = "select format(sum(i.cantidad),2) as total from ingresos i
        inner join torneos t on t.idTorneo = i.idTorneo
        where i.idEliminado=1 and i.idTorneo='{$this->objeto->getIdTorneo()}'";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }

    public function reporteIngresosPorTorneos() {
        $query = "select i.*,format((i.cantidad),2) as cantidad,t.nombreTorneo as torneo,DATE_FORMAT(i.start, '%d/%m/%Y') as start from ingresos i
        inner join torneos t on t.idTorneo = i.idTorneo
        where i.idEliminado=1 and i.idTorneo='{$this->objeto->getIdTorneo()}' order by start desc";

        $resultado = $this->con->ejecutar($query);

        return $resultado;
    }


    public function guardarOtro(){
        $_query = "insert into ingresos values (null,'".$this->objeto->getTitle()."','".$this->objeto->getDescripcion()."',curdate(),'".$this->objeto->getCantidad()."',
        '#140E93','#E6C404',DATE_FORMAT(CURDATE(),'%m'),year(CURRENT_DATE()),".$this->objeto->getIdTorneo().",'".$this->objeto->getCategoria()."',1);";

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

    public function reestablecer() {
        $_query = "update ingresos set idEliminado=1 where id = ".$this->objeto->getId();

        $resultado = $this->con->ejecutar($_query);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }
    


}