<?php 
class Reporte {
    public static $con;
    public function __construct() {
        require_once './vendor/autoload.php';
    }
  
      public function nomina($encargados,$nomina,$nombreEquipo,$torneo,$idFondo, $nominaMayores) {
        
        $nombreE = $nombreEquipo ->fetch_assoc();
        $nombreE = $nombreE["nombre"];

        $nTorneo = $torneo ->fetch_assoc();
        $nTorneo = $nTorneo["torneo"];

        $fondo = $idFondo ->fetch_assoc();
        $fondo = $fondo["idFondo"];


        $tabla = '';
        $tabla .= ' <style>
                        td { 
                            text-align: center;
                        }
                        table {
                            width: 100%;
                        }
                        .header {
                            font-family: sans-serif;
                            width: 100%;
                            display: flex;
                            justify-content: flex-end;
                        }
                        .tabla, th, td{
                            border: 1px solid white;
                            border-collapse: collapse;
                            font-family: sans-serif;
                        }
                    </style>';
                     
        $tabla.= "
            <div class='header'>
            <table style='border: 1px solid white;'>
            <tr>
            <th style='border: 1px solid white; font-size:22px;'>
                <font color=''>Complejo deportivo de Lourdes ADEREL</font>
                <br>Torneo :<font color=''> ".$nTorneo." </font>
                
            </th>
            <th style='border: 1px solid white;'>
                <img src='./res/img/logoOficial.png' width=100>
                </th>
            </tr>
            </table>
            <hr>
            </div><h3 style:'text-align:center;'> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
            Fecha Recibido: ______________________________________________________<br></h3>
           <h2>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
           Equipo: <font color=''>".$nombreE."</font><br></h2>
            ";
            if($fondo==2){
                $tabla.="<h2>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
                
                <font color=red>Equipo en fondo común</font></h2>";
            }
        while($fila = $encargados->fetch_assoc()) {
            $tabla.="<h3>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <font color=''>1er Representante: </font>".$fila['encargado']."<br><br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


            <font color=''> Teléfono 1er Representante: </font> ".$fila['telefonoE']."<br><br><br>


                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                <font color=''> 2do Representante: </font> ".$fila['encargadoAux']."<br><br>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <font color=''> Teléfono 2do Representante:</font> ".$fila['telefonoAux']."<br><br>
                        
                       
                     </h3>";
        }
        $tabla .= "<hr><h3><font color=''>
        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 Lista de jugadores mayores a la edad máxima de la categoría del equipo</font></h3>";
                 while($fila = $nominaMayores->fetch_assoc()) {
                    $tabla .= "
                    <br><hr>
                    <table style='border: 1px solid white; font-size:18px;'>
                    
                    <tr>
                        <td rowspan=4> <img src=".$fila["foto"]." style='width:120px;'/></td>
                        <td><b>Cod. Exp:</b> ".$fila["correlativo"]."</td>
                        <td><b>Nombre:</b> ".$fila["nombre"]." ".$fila["apellido"]."</td>
                        
                    </tr>
                    <tr>
                        <td><br><b>Teléfono :</b> ".$fila["telefono"]."</td>";
                        if($fondo==1){
                        $tabla .= "   
                        <td><br><b>Firma:</b> ______________________</td>";
        
                        }
                        $tabla .= "
                    </tr>
                    <tr>
                        <td><b>DUI :</b> ".$fila["dui"]."</td>
                        <td><b>Fecha de Nacimiento:</b> ".$fila["fechaNacimiento"]."</td>
                    </tr>
                    <tr>
                    <br>
                        <td><b>Inscripción :</b> ".$fila["fechaIns"]."</td>";
                        if($fila["pago"] == 1){
                            $tabla .= "   
                            <td style='background-color: #FA5858;'><br><b>Pendiente de pago</b></td>";
            
                            }
                            else{
                                $tabla .= "   
                                <td style='background-color: #81F79F;'><br><b>Inscrito</b></td>";
                            }
                            
                        $tabla .= "
                        
                        
                    </tr>
                </table>
                    
                    ";
            
                    }

                    $tabla .= "<hr><h2><font color=''>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                 Lista de jugadores del equipo</font></h2>";

        while($fila = $nomina->fetch_assoc()) {
            $tabla .= "
            <hr>
            <table style='border: 1px solid white; font-size:18px;'>
			
			<tr>
                <td rowspan=4> <img src=".$fila["foto"]." style='width:120px;'/></td>
                <td><b>Cod. Exp:</b> ".$fila["correlativo"]."</td>
				<td><b>Nombre:</b> ".$fila["nombre"]." ".$fila["apellido"]."</td>
				
			</tr>
			<tr>
                <td><br><b>Teléfono :</b> ".$fila["telefono"]."</td>";
                if($fondo==1){
                $tabla .= "   
                <td><br><b>Firma:</b> ______________________</td>";

                }
                $tabla .= "
            </tr>
            <tr>
                <td><b>DUI :</b> ".$fila["dui"]."</td>
                <td><b>Fecha de Nacimiento:</b> ".$fila["fechaNacimiento"]."</td>
            </tr>
            <tr>
            <br>
                <td><b>Inscripción :</b> ".$fila["fechaIns"]."</td>";
                if($fila["pago"] == 1){
                $tabla .= "   
                <td style='background-color: #FA5858;'><br><b>Pendiente de pago</b></td>";

                }
                else{
                    $tabla .= "   
                    <td style='background-color: #81F79F;'><br><b>Inscrito</b></td>";
                }
                $tabla .= "
            </tr>
		</table>
            
            ";
    
            }
           
        $html = $tabla;
        $pdf = new \Mpdf\Mpdf();
        $pdf->WriteHTML($html);
        $pdf->Output();
    
    }
}