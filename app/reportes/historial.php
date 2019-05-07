<?php 

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    public function historial($resultado) {

        
        
        
        $tabla = '';

        $tabla .= ' <style>
                        td { 
                            text-align: center;
                            height: 30;
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
                            border: 1px solid black;
                            border-collapse: collapse;
                            font-family: sans-serif;
                            height:40;
                        }
                    </style>';

                     
        $tabla.= "
            <div class='header'>
            <table style='border: 1px solid white;'>
            <tr>
            <th style='font-size:22px; border: 1px solid white;'>
                <center>
                <br>Asociación Deportiva y Recreativa Lourdense (ADEREL)<br>
                Programación Torneo <font color='red'>
                
            </th>
            <th style='font-size:22px; border: 1px solid white;'>
            <img src='./res/img/logoOficial.png' width=100>
                </th>
            </tr>
            </table>
            </div>    
            <hr>";

          
        $tabla.="<h2>4ta Vuelta</h2><table class='tabla'>
        <tr>
            <th bgcolor='#A9E2F3'>Jornada</th>           
            <th bgcolor='#A9E2F3'>Descansa</th>
            <th bgcolor='#A9E2F3'>Enfrentamiento</th>
            <th bgcolor='#A9E2F3'>Resultado</th>
            <th bgcolor='#A9E2F3'>Partido</th>
            <th bgcolor='#A9E2F3'>Cancha</th>
            <th bgcolor='#A9E2F3'>Fecha</th>
            <th bgcolor='#A9E2F3'>Hora</th>
        </tr>
        ";

    while($fila = $resultado4->fetch_assoc()) {
        $tabla.="<tr>
                    <td >".$fila['jornada']."</td>
                    <td bgcolor='#F78181'>".$fila['descansa']."</td>
                    <td>".$fila['equipo1']." vs ".$fila['equipo2']."</td>
                    <td></td>
                    <td>".$fila['partido']."</td>
                    ";
                            if($can4==0){
                                $tabla.="<td></td>";
                             }  else{
                                $tabla.="<td>".$fila['cancha']."</td>";
                             } 
                                
                             $tabla.="<td>".$fila['fecha']."</td>
                                <td>".$fila['hora']."</td>
                             </tr>";
    }
            
    $tabla .= "</table><hr>";

    
        
            

        
        
        $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
    

    }

}

?>