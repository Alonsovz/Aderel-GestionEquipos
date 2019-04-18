<?php 
class Reporte {
    public static $con;
    public function __construct() {
        require_once './vendor/autoload.php';
    }
  
      public function morososEscFutbol($resultado) {
       

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
                <font color='#172961'>
                Jugadores de la escuela de Fútbol con cuotas pendientes de pago.</font>
                
            </th>
            <th style='border: 1px solid white;'>
                <img src='./res/img/logoAderel.png'>
                </th>
            </tr>
            </table><hr><br><br>";
           
            
            $tabla.="<table class='tabla' style='font-size:13px;'>
            <tr>
                <th bgcolor='#A9E2F3'>Cod. Exp</th>
                <th bgcolor='#A9E2F3'>Foto</th>
                <th bgcolor='#A9E2F3'>Nombre</th>
                <th bgcolor='#A9E2F3'>Fecha Nac.</th>
                <th bgcolor='#A9E2F3'>Edad</th>
                <th bgcolor='#A9E2F3'>Encargado</th>
                <th bgcolor='#A9E2F3'>Tel. Encargado</th>
                <th bgcolor='#A9E2F3'>Nivel</th>
                <th bgcolor='#A9E2F3'>Cuotas Atrasadas</th>
            </tr>
            ";
        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['correlativo']."</td>
                        <td><img src=".$fila["foto"]." style='width:60px; '/></td>
                        <td style='width:200px; '>".$fila['nombre']." ".$fila['apellido']." </td>
                        <td>".$fila['fechaNacimiento']."</td>
                        <td>".$fila['edad']."</td>
                        <td style='width:200px; '>".$fila['encargado']."</td>
                        <td>".$fila['telefono']."</td>";
                    
                        if($fila['idEscuela'] == 1){
                        $tabla.="<td style='background-color: #58FA58'>1er</td>";
                        }
                        if($fila['idEscuela'] == 2){
                            $tabla.="<td style='background-color: #F5A9A9'>2do</td>";
                         }
                        if($fila['idEscuela'] == 3){
                         $tabla.="<td style='background-color: #FAAC58'>3er</td>";
                         }
                        if($fila['idEscuela'] == 4){
                         $tabla.="<td style='background-color: #81F7F3'>4to</td>";
                        }
                         if($fila['idEscuela'] == 5){
                         $tabla.="<td style='background-color: #F3F781'>5to</td>";
                        }
                        if($fila['idEscuela'] == 6){
                         $tabla.="<td style='background-color: #BE81F7'>6to</td>";
                        }
                        $tabla.="<td style='width:100px; '>".$fila['cuotasAtrasadas']."</td>
                        
                        </tr>";
        }
        $tabla .= "</table>";
        
        $html = $tabla;
        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
    
    }
}