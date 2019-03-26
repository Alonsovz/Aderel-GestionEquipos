<?php

$N = $_POST["disponibles"];
$vueltas= $_POST["vueltas"];
$id= $_POST["idTor"];


// if ($N%2==0) {
    $usuario = "root";
    $password = "";
	$servidor = "localhost";
	$basededatos = "ADEREL";
	
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
	
	// Selección del a base de datos a utilizar
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	// establecer y realizar consulta. guardamos en variable.
    $consulta = "select e.idEquipo as id, e.nombre as nom from equipos e
    inner join torneos t on t.idTorneo = e.idTorneo
    where e.idTorneo = ".$id." and t.inscritos=".$N."  group by e.nombre";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "<br>Algo ha ido mal en la consulta a la base de datos");
	
	// Motrar el resultado de los registro de la base de datos
	// Encabezado de la tabla
	echo "<table class='ui  very compact celled table' style='width:10%;'>";
	echo "<tr>";
	echo "<th bgcolor='lightblue'>Equipos</th>";
	echo "</tr>";
	
	$contador=0;
	//$columna = mysqli_fetch_array( $resultado );
	while ($columna = mysqli_fetch_array( $resultado ))
	{
		echo "<br><tr>";
		echo "<td>" . $columna['nom'] . "</td>";
        echo "</tr>";
		  
		$equipos[$contador]['id']     = $columna['id'];
		$equipos[$contador]['nombre'] = $columna['nom'];
		$contador++;
    }
   
	echo "</table><br> <br> "; // Fin de la tabla
	// cerrar conexión de base de datos
	mysqli_close( $conexion );
// }

if ($N%2!=0) 
	$N = $N+1; // sumamos 1 al numero impar de equipos. A este equipo en un futuro lo podemos llamar descanso

	//crea los grupos
for ($i = 0; $i<(($N-1)/2); $i++) {
	$g1[$i] = $i;
	$g2[$i] = $N-$i-1;
}


// VUELTAS -----------------------------------------------
for ($i=0; $i < $vueltas; $i++) { 
	echo "<h4>Vuelta: ".($i+1)."</h4> <hr>"	;

	for ($j = 0; $j<$N-1; $j++) { // JORNADAS -----------------------------------------------
		$cancha=2;
		//anuncia los grupos
	?>
	<form class='jornadas'>
		<h5>Jornada <?php echo ($j+1 )?></h5>	
		<table class='ui table' >
		<input type="hidden" name="vuelta" value='<?php echo ($i+1)?>'>
		<input type="hidden" name="jornada" value='<?php echo ($j+1)?>'>

		<?php
		$conta=0;
		foreach ($g1 as $equipo1) {
	
			
			if($equipo1>=count($equipos)){ ?>
			<tfoot>
				<tr>
					<td></td>
					<td>Descansa</td>
					<td colspan="3">
						<?php echo $equipos[$g2[$conta]]['nombre'] ?>
						<input type="hidden" name="descansa" value='<?php echo $equipos[$g2[$conta]]['id'] ?>'>
					</td>
				</tr>
			</tfoot>
			<?php
			}elseif ($g2[$conta]>=count($equipos)) { ?>
				<tfoot>
					<tr>
						<td></td>
						<td>Descansa</td>
						<td colspan="3">
							<?php echo $equipos[$equipo1]['nombre'] ?>
							<input type="hidden" name="descansa" value='<?php echo $equipos[$equipo1]['id'] ?>'>
						</td>
					</tr>
				</tfoot>
			<?php
			}else{
				if($cancha==2)
					$cancha=1;
				else
					$cancha=2;

				if(rand(0,1)==0){//izq
					$nombre    = $equipos[$equipo1]['nombre']." vs ".$equipos[$g2[$conta]]['nombre'];
					$idEquipo1 = $equipos[$equipo1]['id'];
					$idEquipo2 = $equipos[$g2[$conta]]['id'];
				}else{
					$nombre    = $equipos[$g2[$conta]]['nombre']." vs ".$equipos[$equipo1]['nombre'];
					$idEquipo1 = $equipos[$g2[$conta]]['id'];
					$idEquipo2 = $equipos[$equipo1]['id'];
				} 
				?>
				<tr>
					<td>Partido 1</td>
					<td>Cancha <?php echo $cancha ?></td>
					<td>
						<?php echo $nombre ?>
						<input type="hidden" name="idEquipo1[]" value='<?php echo $idEquipo1 ?>'>
						<input type="hidden" name="idEquipo2[]" value='<?php echo $idEquipo2 ?>'>
						<input type="hidden" name="cancha[]" value='<?php echo $cancha ?>'>
					</td>
					<td><input type='time' name='hora[]'></td>
					<td><input type='date' name='fecha[]'></td>
				</tr>
		<?php }
			 // crear registro de la jornada

			$conta=$conta+1;
		}
		
		 // Calculamos la siguiente jornada
		$temp1 = $g2[0];
		$temp2 = $g1[($N/2)-1];
		for ($k = 0; $k<$N/2; $k++) {
			if ($k == ($N/2)-1) {
				$g1[1] = $temp1;
				$g2[($N/2)-1] = $temp2;
			} else {
				$g1[($N/2)-1-$k] = $g1[($N/2)-1-$k-1];
				$g2[$k] = $g2[$k+1];
			}
		}
	
		echo '</table></form><br>';
	}
}
?>
	<input type="submit" value="Guardar" class='ui button' onclick='enviar()'>
<script>
const enviar =()=>{
	const formulario = $('.jornadas');

	const datosFormulario=[];
	for (let index = 0; index < formulario.length; index++) {
		const elemento = formulario[index];

		const datos = new FormData(elemento);
		datosFormulario.push(datos);
	}
	$.ajax({
		// type:'post',
		data:{datos:datosFormulario},
		url:'/?1=SorteoController&2=getRegistrar'
	})

}
</script>