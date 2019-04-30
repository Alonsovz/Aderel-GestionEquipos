<?php 
class Reporte {
    public static $con;
    public function __construct() {
        require_once './vendor/autoload.php';
    }
  
      public function estadisticas($resultado, $nombreTorneo , $goleadores, $castigos) {
        $nombreT = $nombreTorneo ->fetch_assoc();
        $nombreT = $nombreT["Torneo"];

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
                            border: 1px solid black;
                            border-collapse: collapse;
                            font-family: sans-serif;
                        }
                    </style>';
                     
        $tabla.= "
            <div class='header'>
            <table style='border: 1px solid white;'>
            <tr>
            <th style='border: 1px solid white; font-size:22px;'>
                <font color=''>
                Estadisticas del torneo: </font><font color='#172961'>".$nombreT." </font>
                
            </th>
            <th style='border: 1px solid white;'>
                <img src='./res/img/logoOficial.png' width=100>
                </th>
            </tr>
            </table>
            <hr>
            </div> 
            <div class='ui divider'></div>
            
            <h2 style='color:#172961;'>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            Tabla de posiciones</h2>
            </br>
            <table class='tabla' style='font-size:17px;'>
            
            <tr>
            <th style='background-color: #58D3F7;'>Equipo</th>
            <th style='background-color: #58D3F7;'>PJ</th>
            <th style='background-color: #58D3F7;'>G</th>
            <th style='background-color: #58D3F7;'>E</th>
            <th style='background-color: #58D3F7;'>P</th>
            
            <th style='background-color: #58D3F7;'>GF</th>
            <th style='background-color: #58D3F7;'>GC</th>
            <th style='background-color: #58D3F7;'>DG</th>
            <th style='background-color: #58D3F7;'>Puntos</th>
            </tr>
            ";
        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['nombreE']."</td>
                        <td>".$fila['partidosJugados']."</td>
                        <td>".$fila['partidosGanados']."</td>
                        <td>".$fila['partidosEmpatados']."</td>
                        <td>".$fila['partidosPerdidos']."</td>
                        
                        <td>".$fila['golesFavor']."</td>
                        <td>".$fila['golesContra']."</td>
                        <td>".$fila['diferencia']."</td>
                        <td style='font-weight:bold;'>".$fila['puntaje']."</td>
                       
                     </tr>";
        }
        $tabla .= "</table>";


        $tabla .= " <div class='ui divider'><br><hr></div>
            
            <h2 style='color:#172961;'>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            Tabla de Goleadores</h2>
            </br>
            <table class='tabla' style='font-size:17px;'>
            
            <tr>
            <th style='background-color: #82FA58;'>Jugador</th>
            <th style='background-color: #82FA58;'>Equipo</th>
            <th style='background-color: #82FA58;'>Goles</th>
            

            </tr>
            ";
            while($fila = $goleadores->fetch_assoc()) {
                $tabla.="<tr>
                         <td style='width:400px; '>".$fila['nombre']." ".$fila['apellido']." </td>
                            <td>".$fila['equipo']."</td>
                            <td>".$fila['goles']."</td>
                           
                           
                         </tr>";
            }
            $tabla .= "</table>";


            $tabla .= " <div class='ui divider'><br><hr></div>
            
            <h2 style='color:#172961;'>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            Tabla de suspendidos</h2>
            </br>
            <table class='tabla' style='font-size:17px;'>
            
            <tr>
            <th style='background-color: #F78181;'>Jugador</th>
            <th style='background-color: #F78181;'>Equipo</th>
            <th style='background-color: #F78181;'>Tipo de suspension</th>
            

            </tr>
            ";
            while($fila = $castigos->fetch_assoc()) {
                $tabla.="<tr>
                         <td style='width:400px; '>".$fila['nombre']." ".$fila['apellido']." </td>
                            <td>".$fila['equipo']."</td>
                            <td>".$fila['tarjeta']."</td>
                           
                           
                         </tr>";
            }
            $tabla .= "</table>";
        
        $html = $tabla;
        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
    
    }
}