<?php

$N = $_POST["disponibles"];
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
    where e.idTorneo = ".$id." and t.inscritos=".$N." and e.idGenero=2 group by e.nombre";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "<br>Algo ha ido mal en la consulta a la base de datos");
	
	// Motrar el resultado de los registro de la base de datos
	// Encabezado de la tabla
	echo "<table borde='2'>";
	echo "<tr>";
	echo "<th>id</th>";
	echo "<th>equipo</th>";
	echo "</tr>";
	
	$contador=0;
	//$columna = mysqli_fetch_array( $resultado );
	while ($columna = mysqli_fetch_array( $resultado ))
	{
		echo "<tr>";
		echo "<td>" . $columna['id'] . "</td><td>" . $columna['nom'] . "</td>";
        echo "</tr>";
		  
		$equipos[$contador]['id']     = $columna['id'];
		$equipos[$contador]['nombre'] = $columna['nom'];
		$contador++;
    }
   
	echo "</table>"; // Fin de la tabla
	// cerrar conexión de base de datos
	mysqli_close( $conexion );
// }

?>
<div style='color:white'>
<?php
if ($N%2!=0) 
	$N = $N+1; // sumamos 1 al numero impar de equipos. A este equipo en un futuro lo podemos llamar descanso

	//crea los grupos
for ($i = 0; $i<(($N-1)/2); $i++) {
	$g1[$i] = $i;
	$g2[$i] = $N-$i-1;
}

$jornadas=[];
for ($j = 0; $j<$N-1; $j++) {//j son los rounds
	$jornada=[];
	$conta=0;
	$contEcuentro=0;
	foreach ($g1 as $equipo1) {

		if($equipo1>=count($equipos)){
			$descansa['nombre'] = $equipos[$g2[$conta]]['nombre'];
			$descansa['id'] = $equipos[$g2[$conta]]['id'];

		}elseif ($g2[$conta]>=count($equipos)){
			$descansa['nombre'] = $equipos[$equipo1]['nombre'];
			$descansa['id'] = $equipos[$equipo1]['id'];

		}else{
			$juegaTitular = $equipos[$equipo1]['nombre']." vs ".$equipos[$g2[$conta]]['nombre'];
			$juegaIDs     = [$equipos[$equipo1]['id'] , $equipos[$g2[$conta]]['id']];

		}
		
		if(isset($descansa))
			$jornada['descansa']=$descansa;
		
		// if(!isset($descansa)){
			$jornada['encuentro'][$contEcuentro]['titular'] = $juegaTitular;
			$jornada['encuentro'][$contEcuentro]['ids']     = $juegaIDs;
		// }

		$conta++;
		$contEcuentro++;
	}

	array_push($jornadas,$jornada);
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
   }//-------------------
}


?>
</div>
<div id="jornadas"></div>

<script>
const jornadas = <?php echo json_encode($jornadas) ?>;
console.log('jornadas :', jornadas);

let html = jornadas.reduce((acc,valor, indice)=>{
	let htm=`<h4>Jornada: ${indice+1}</h4>
		<ul>`;
		
	
	htm+=valor.encuentro.reduce((accc,encuentro,ind)=>{
		let h =`<li>${encuentro.titular}</li>`;
		if(accc!=h)
			return accc+h
	},'');
	if(valor.descansa){
		htm+=`<li>Descansa: ${valor.descansa.nombre}</li>`;

	}
	
	htm+='</ul>';
	return acc+htm;
},'')

document.getElementById('jornadas').innerHTML=html;

</script>
