<?php 

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    public function gimnasio($id, $resultado) {
        $año= date('Y');
        
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
            <table>
            <tr>
            <th style='font-size:22px;'>
                <center><font color='#172961'>Gimanasio Aderel Lourdes</font>
                <br>Hoja de Inscripcion<br>
                Año ".$año."</center>
                
            </th>
            <th>
            <img src='./res/img/logoOficial.png' width=100>
                </th>
            </tr>
            </table>
            </div>    
            <hr>
            <table>
            <tr>
            <th><h2><font color='green'>Datos del Usuario</font></h2></th>
            </tr>
            </table>
            
            ";

        while($fila = $resultado->fetch_assoc()) {
            $tabla.="
                <br>   
            <table style='font-size: 20px;'>
			
			<tr>
                <td rowspan=3> <img src=".$fila["foto"]." style='width:120px;'/></td>
                <td> <b>Expediente:</b> ".$fila["correlativo"]."</td>
				<td > <b>Nombre:</b> ".$fila["nombre"]." ".$fila["apellido"]."</td>
				
			</tr>
			<tr>
            <td> <b>DUI : </b>".$fila["ddi"]."</td>
            <td> <b>Fecha de Nacimiento:</b> ".$fila["fechaNacimiento"]."</td>
            </tr>
            <tr>
                <td> <b>Fecha de Inicio :</b> ".$fila["fechaInscripcion"]."</td>
                <td > <b>Fecha Fin de Inscripcion:</b> <font color='red'>".$fila["fechaFinal"]."</font></td>
			</tr>
		</table>
                     ";
        }
                
        
        $tabla .="
        <br><br><br><br>F:____________________________________________________
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Nombre y firma</b>";
        
        $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
    

    }

}

?>