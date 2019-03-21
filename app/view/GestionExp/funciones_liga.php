<?php

$N = $_POST["disponibles"];
$id= $_POST["idTor"];

if ($N%2==0) {
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
	echo "<th>equip</th>";
	echo "</tr>";
	
	//$columna = mysqli_fetch_array( $resultado );
	while ($columna = mysqli_fetch_array( $resultado ))
	{
		echo "<tr>";
		echo "<td>" . $columna['id'] . "</td><td>" . $columna['nom'] . "</td>";
        echo "</tr>";
        
    
    }
    
	
	echo "</table>"; // Fin de la tabla
	// cerrar conexión de base de datos
	mysqli_close( $conexion );
}

for ($i = 0; $i<(($N)/2); $i++) {

   $g1[$i] = $i;

   $g2[$i] = $N-$i-1;
   }
for ($j = 0; $j<$N-1; $j++) {
echo "<br><br><table><tr><td><b>Jornada ".($j+1)."</b></td></tr> ";
echo "<tr><td>";
$conta=0;
foreach ($g1 as $equipo1) {
    
	echo "".($equipo1+1)." vs";
 	echo "".($g2[$conta]+1)."<BR>";
$conta=$conta+1;
echo "<br><br><br>"; 
}
echo "</td></tr><tr><td>";
echo "</td></tr>";
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
   
   //-------------------
echo "</table>";
}
?>