<?php 

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    public function historial($resultado,$resultado1,$equipo) {

        $torneo = $resultado1 ->fetch_assoc();
        $torneo = $torneo["torneo"];
        
        
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
                <br>Historial de partidos jugados por el equipo: <font color='blue'>".$equipo."</font><br>
                En el torneo : <font color='green'>".$torneo."</font><br>
                
                
            </th>
            <th style='font-size:22px; border: 1px solid white;'>
            <img src='./res/img/logoOficial.png' width=100>
                </th>
            </tr>
            </table>
            </div>    
            <hr>";

          
        $tabla.="<table class='tabla'>
        <tr>
        <th bgcolor='#A9E2F3'>Vuelta</th>
            <th bgcolor='#A9E2F3'>Jornada</th>
            <th bgcolor='#A9E2F3'>Local</th>           
            <th bgcolor='#A9E2F3'>Goles</th>
            <th bgcolor='#A9E2F3'>Visitante</th>
            <th bgcolor='#A9E2F3'>Fecha</th>
        </tr>
        ";

    while($fila = $resultado->fetch_assoc()) {
        $tabla.="<tr>
                    <td >".$fila['vuelta']."</td>
                    <td>".$fila['jornada']."</td>";
                    if($fila["equipoLocal"] == $equipo){
                    $tabla.="<td style='background-color:#F79F81;'>".$fila['equipoLocal']."</td>";
                    }else{
                        $tabla.="<td>".$fila['equipoLocal']."</td>";
                    }
                    
                    $tabla.="<td>".$fila['golesLocal']." -- ".$fila['golesVisitante']."</td>";
                            
                    if($fila["equipoVisitante"] == $equipo){
                        $tabla.="<td style='background-color:#F79F81;'>".$fila['equipoVisitante']."</td>";
                        }else{
                            $tabla.="<td>".$fila['equipoVisitante']."</td>";
                        }
                    
                    $tabla.="<td>".$fila['fecha']."</td>
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