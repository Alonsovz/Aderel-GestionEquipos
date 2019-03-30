<?php 
class Reporte {
    public static $con;
    public function __construct() {
        require_once './vendor/autoload.php';
    }
  
      public function nomina($encargados,$nomina,$nombreEquipo,$torneo ) {
        
        $nombreE = $nombreEquipo ->fetch_assoc();
        $nombreE = $nombreE["nombre"];

        $nTorneo = $torneo ->fetch_assoc();
        $nTorneo = $nTorneo["torneo"];

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
        $tabla .= "<hr><h2><font color=''>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                 Lista de Jugadores del Equipo</font></h2>";
        while($fila = $nomina->fetch_assoc()) {
            $tabla .= "
            <br><hr>
            <table style='border: 1px solid white; font-size:18px;'>
			
			<tr>
				<td rowspan=3> <img src=".$fila["foto"]." style='width:120px;'/></td>
				<td colspan=2><b>Nombre:</b> ".$fila["nombre"]." ".$fila["apellido"]."</td>
				
			</tr>
			<tr>
                <td><b>Teléfono :</b> ".$fila["telefono"]."</td>
                <td><b>Firma:</b> ______________________</td>
            </tr>
            <tr>
                <td><b>DUI :</b> ".$fila["dui"]."</td>
                <td><b>Fecha de Nacimiento:</b> ".$fila["fechaNacimiento"]."</td>
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