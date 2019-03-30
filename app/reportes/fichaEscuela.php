<?php 

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    public function fichaEscuela($id, $resultado) {
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
                <center><font color='#172961'>Escuela de Fútbol Aderel Lourdes</font>
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
            <th><h2><font color='green'>Datos del Jugador</font></h2></th>
            </tr>
            </table>
           
            ";

        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<table style='font-size: 20px;'>
			
			<tr>
                <td rowspan=4 colspan=2> <img src=".$fila["foto"]." style='width:130px;'/></td>
                <td> <b>Expediente:</b> ".$fila["correlativo"]."</td>
                <td > <b>Nombre:</b> ".$fila["nombre"]." ".$fila["apellido"]."</td>
                <td ><b> Nivel: </b> ".$fila["nivel"]."</td>
				
			</tr>
			<tr>
            <td><br> <b>Carnet Min. : </b>".$fila["carnet"]."</td>
            <td><br> <b>Fecha de Nac. :</b> ".$fila["fechaNacimiento"]."</td>
            <td><br> <b>Edad:</b> ".$fila["edad"]." años</td>
            </tr>
            <tr>
                <td><br> <b>Encargado :</b> ".$fila["encargado"]."</td>
                <td><br> <b>DUI :</b> ".$fila["dui"]."</td>
                <td><br> <b>Teléfono </b> ".$fila["telefono"]."</td>
            </tr>
            
            <tr>
                <td><br> <b>Inicio de inscripción :</b> ".$fila["fechaInscripcion"]."</td>
                <td colspan=2><br> <b>Fecha Fin de Inscripcion:</b> <font color='red'>".$fila["fechaFinal"]."</font></td>
			</tr>
        </table>
                     ";
        }
                
        $tabla .= "<hr>";
        $tabla .="
        <br><br><br><br>F:____________________________________________________
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Nombre y firma del reponsable</b>";
        
        $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
    

    }

}

?>