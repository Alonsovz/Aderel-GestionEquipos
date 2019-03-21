<?php

$N = $_POST["disponibles"]; //ATENCIÓN!! "N" DEBE SER PAR! (2,4,8,12,20,...)

if ($N%2==0) {
} else {

	$N = $N+1; 
}

//crea los grupos
for ($i = 0; $i<(($N)/2); $i++) {
//   g1.push([$i]);
   $g1[$i] = $i;
   //
//   g2.push([i]);
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
   
   //-------------------
echo "</table>";
}
?>