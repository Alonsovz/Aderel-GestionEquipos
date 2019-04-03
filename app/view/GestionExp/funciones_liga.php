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
	
	
	$contador=0;
	//$columna = mysqli_fetch_array( $resultado );
	while ($columna = mysqli_fetch_array( $resultado ))
	{
		
		
		$equipos[$contador]['id']     = $columna['id'];
		$equipos[$contador]['nombre'] = $columna['nom'];
		$contador++;
    }

	$N=$contador;
	 // Fin de la tabla
	// cerrar conexión de base de datos
	mysqli_close( $conexion );
// }
?>
<br>
<a class='ui red floated button' href="?1=TorneosController&2=gestionM">
<i class="left point hand icon"></i>Volver
</a>

<button class="ui right floated green labeled icon button" onclick='enviar()' id="btnGuardar">
<i class="save icon"></i>
     Guardar datos
</button>

<?php
echo "<script>
const nEquipos = ".$contador.";
const idTorneo = ".$id.";
</script>";

if ($N%2!=0) 
	$N = $N+1; // sumamos 1 al numero impar de equipos. A este equipo en un futuro lo podemos llamar descanso

	
	

		//crea los grupos
	for ($xy = 0; $xy<(($N-1)/2); $xy++) {
		$g1[$xy] = $xy;
		$g2[$xy] = $N-$xy-1;
	}

	$html="";
	for ($j = 0; $j<$N-1; $j++) { // JORNADAS -----------------------------------------------
		$cancha=2;
		//anuncia los grupos
	$html.="
	<form class='jornadas'>
		<h5>Jornada ". ($j+1 ) ."</h5>	
		<table class='ui  table' style='width:100%; margin:auto; font-weight: bold; border: 1px solid;' >
		<input type='hidden' name='jornada' value='".($j+1)."'>
		<thead>
		<tr>
		
			<th style='background-color: #201EAC; color:white;'><center>N° de Partido</th>
			<th style='background-color: #201EAC;color:white;' ><center>Enfrentamiento</th>
			<th style='background-color: #201EAC;color:white;'><center>Cancha</th>
			<th style='background-color: #201EAC;color:white;'><center>Hora</th>
			<th style='background-color: #201EAC;color:white;'><center>Fecha</th>               
		</tr>
	</thead>";

		$conta=0;
		$partidos=1;
		foreach ($g1 as $equipo1) {
			
			if($equipo1>=count($equipos)){ 
			$html.="
			<tfoot>
			
				<tr>
					<td></td>
					<td bgcolor='#F78181'><center>Descansa</td>
					<td colspan='1' bgcolor='#A9BCF5'><center>
						".$equipos[$g2[$conta]]['nombre'] ."
						<input type='hidden' name='descansa' value='".$equipos[$g2[$conta]]['nombre'] ."'>
					</td>
				</tr>
			</tfoot>";

			}elseif ($g2[$conta]>=count($equipos)) { 
				$html.="
				<tfoot>
					<tr>
						<td></td>
						<td bgcolor='#F78181'><center>Descansa</td>
					<td colspan='1' bgcolor='#A9BCF5'><center>
							".$equipos[$equipo1]['nombre'] ."
							<input type='hidden' name='descansa' value='". $equipos[$equipo1]['nombre'] ."'>
						</td>
					</tr>
				</tfoot>";
			}else{
				if($cancha==2)
					$cancha=1;
				else
					$cancha=2;

				if(rand(0,1)==0){//izq
					$nombre    = 
						'<span class="equipo1">'.
							$equipos[$equipo1]['nombre'].
						"</span> vs 
						<span class='equipo2'>".
							$equipos[$g2[$conta]]['nombre'].
						"</span>";
						
					$idEquipo1 = $equipos[$equipo1]['nombre'];
					$idEquipo2 = $equipos[$g2[$conta]]['nombre'];
				}else{
					$nombre    = 
						'<span class="equipo1">'.
							$equipos[$g2[$conta]]['nombre'].
						"</span> vs 
						<span class='equipo2'>".
							$equipos[$equipo1]['nombre'].
						"</span>";

					$idEquipo1 = $equipos[$g2[$conta]]['nombre'];
					$idEquipo2 = $equipos[$equipo1]['nombre'];
				} 
				$html.="

				<tr>
					<td bgcolor='#F2F5A9' style='width: 10%;'><center>Partido ".$partidos."</td>
					<td bgcolor='#F2F5A9' style='width: 30%;'><center>
						". $nombre ."
						<input type='hidden' name='idEquipo1[".$partidos."]' value='". $idEquipo1 ."'>
						<input type='hidden' name='idEquipo2[".$partidos."]' value='". $idEquipo2 ."'>
						<input type='hidden' name='partido[".$partidos."]' value='". $partidos ."'>
					</td>
					<td style='width: 10%;'><center>
						<select name='cancha[".$partidos."]'>
							<option value='1'>Cancha 1</option>
							<option value='2'>Cancha 2</option>
						</select>
					</td>
					<td bgcolor='' style='width: 15%;'><center>Hora: <input type='time' name='hora[".$partidos."]'></td>
					<td bgcolor='#F2F5A9' style='width: 15%;'><center>Fecha: <input type='date' name='fecha[".$partidos."]'></td>
				</tr>";
				$partidos++;

			}
			 // crear registro de la jornada

			$conta++;
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
	

		$html.="</table>
		</form><br>
		";
	}
	// VUELTAS -----------------------------------------------
for ($i=0; $i < $vueltas; $i++) { 
	?>
	<div id="vuelta-<?php echo ($i+1); ?>">
		<h4>Vuelta: <?php echo ($i+1); ?> </h4> <hr>

		<?php echo $html; ?>

	</div>

<?php
}
?>


<script>
const nVueltas        = <?php echo $vueltas ?>;

(()=>{
	const equipo1 = $('#vuelta-1 .equipo1');
	const equipo2 = $('#vuelta-1 .equipo2');

if(nVueltas>1){

	for (let i = 0; i < equipo1.length; i++) {
	//Cambia el text
		$($('#vuelta-2 .equipo1')[i])
			.text($(equipo2[i]).text());

		$($('#vuelta-2 .equipo2')[i])
			.text($(equipo1[i]).text());


	// Cambia los valores que se enviaran a la BD
		$($('#vuelta-2 [name^="idEquipo1"]')[i])
			.text($(equipo2[i]).text());

		$($('#vuelta-2 [name^="idEquipo2"]')[i])
			.text($(equipo1[i]).text());
	}

	if(nVueltas==4){
	
		for (let i = 0; i < equipo1.length; i++) {
		//Cambia el text
			$($('#vuelta-4 .equipo1')[i])
				.text($(equipo2[i]).text());

			$($('#vuelta-4 .equipo2')[i])
				.text($(equipo1[i]).text());


		// Cambia los valores que se enviaran a la BD
			$($('#vuelta-4 [name^="idEquipo1"]')[i])
				.text($(equipo2[i]).text());

			$($('#vuelta-4 [name^="idEquipo2"]')[i])
				.text($(equipo1[i]).text());
		}

	}
}




			
})();

const enviar =()=>{
    alertify.confirm("¿Deseas guardar las jornadas?",
            function(){
	const formulario = $('.jornadas');

	const datosFormulario=[];
	for (let index = 0; index < formulario.length; index++) {
		const elemento = formulario[index];

		const datos = $(elemento).serializeArray();
		datosFormulario.push(datos);
	}
	// console.log('datosFormulario :', datosFormulario);
	// const partir 
	const datosEnviar     = [];
	const jornadasXvuelta = datosFormulario.length/nVueltas;
	let contadorJornadas  = 0;
	let vueltaActual 	  = 1;
	
	if(nEquipos%2==1){
		//EQUIPOS IMPARES
		for (let index = 0; index < datosFormulario.length; index++) {
			if(!(contadorJornadas<jornadasXvuelta)){
				//calcular vuelta
				contadorJornadas=0;
				vueltaActual++;
			}
			const jornada={
				jornada : datosFormulario[index][0].value,
				nvuelta : vueltaActual,
				partidos: [],
				idDescansa:0,
				idTorneo:idTorneo
			};
			contadorJornadas++;

			//CALCULAR ID DESCANSA
			jornada.idDescansa= datosFormulario[index].find((elemento,indice)=>{
				return elemento.name=="descansa";
			}).value;	

			for (let j = 1; j <= ((datosFormulario[index].length-2)/6); j++) {
				const partido = {};
				
				partido.equipo1= datosFormulario[index].find((elemento,indice)=>{
					return elemento.name==`idEquipo1[${j}]`;
				}).value;

				partido.equipo2= datosFormulario[index].find((elemento,indice)=>{
					return elemento.name==`idEquipo2[${j}]`;
				}).value;

				partido.fecha= datosFormulario[index].find((elemento,indice)=>{
					return elemento.name==`fecha[${j}]`;
				}).value;

				partido.hora= datosFormulario[index].find((elemento,indice)=>{
					return elemento.name==`hora[${j}]`;
				}).value;

				partido.cancha= datosFormulario[index].find((elemento,indice)=>{
					return elemento.name==`cancha[${j}]`;
				}).value;

				partido.partido= datosFormulario[index].find((elemento,indice)=>{
					return elemento.name==`partido[${j}]`;
				}).value;

				jornada.partidos.push(partido);
			}
			datosEnviar.push(jornada);
		}

	}else{
		//EQUIPOS PARES
		for (let index = 0; index < datosFormulario.length; index++) {
			if(!(contadorJornadas<jornadasXvuelta)){
				contadorJornadas=0;
				vueltaActual++;
			}
			const jornada={
				jornada : datosFormulario[index][0].value,
				nvuelta : vueltaActual,
				partidos: [],
				idTorneo: idTorneo
			};
			contadorJornadas++;

			for (let j = 1; j <= ((datosFormulario[index].length-1)/6); j++) {
				const partido = {
					// equipo1: datosFormulario[index][1*j].value,
					// equipo2: datosFormulario[index][2*j].value,
					// fecha  : datosFormulario[index][6*j].value,
					// hora   : datosFormulario[index][5*j].value,
					// cancha : datosFormulario[index][3*j].value,
					// partido: datosFormulario[index][4*j].value,
				};

				partido.equipo1= datosFormulario[index].find((elemento,indice)=>{
					return elemento.name==`idEquipo1[${j}]`;
				}).value;

				partido.equipo2= datosFormulario[index].find((elemento,indice)=>{
					return elemento.name==`idEquipo2[${j}]`;
				}).value;

				partido.fecha= datosFormulario[index].find((elemento,indice)=>{
					return elemento.name==`fecha[${j}]`;
				}).value;

				partido.hora= datosFormulario[index].find((elemento,indice)=>{
					return elemento.name==`hora[${j}]`;
				}).value;

				partido.cancha= datosFormulario[index].find((elemento,indice)=>{
					return elemento.name==`cancha[${j}]`;
				}).value;

				partido.partido= datosFormulario[index].find((elemento,indice)=>{
					return elemento.name==`partido[${j}]`;
				}).value;

				jornada.partidos.push(partido);
			}
			datosEnviar.push(jornada);
		}
	}

	$.ajax({
		type:'post',
		data:{datos:JSON.stringify(datosEnviar)},
		url:'?1=SorteoController&2=getRegistrar',
        success: function(r) {
                    if(r == "ok") {
                        swal({
                            title: 'Listo!',
                            text: 'Los Jornadas ya fueron guardadas!!',
                            type: 'success',
                            showConfirmButton: true,
                            

                        }).then((result) => {
                            if (result.value) {
                                $("#btnGuardar").attr("disabled", true);
                            }
                        }); 
                        
                        
                    } 
                }
	});
},
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            }); 

}
</script>