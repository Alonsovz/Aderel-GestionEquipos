<?php 
class Reporte {
    public static $con;
    public function __construct() {
        require_once './vendor/autoload.php';
    }
  
      public function GimnasioUsers($resultado) {
        
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
                Usuarios de Gimnasio ADEREL</font>
                
            </th>
            <th style='border: 1px solid white;'>
                <img src='./res/img/logoAderel.png'>
                </th>
            </tr>
            </table>
            </div>   <br> 
            <table class='tabla' style='font-size:13px;'>
            <tr>
                <th bgcolor='#A9E2F3'>Cod. Exp</th>
                <th bgcolor='#A9E2F3'>Foto</th>
                <th bgcolor='#A9E2F3'>Nombre</th>
                <th bgcolor='#A9E2F3'>Fecha Nac.</th>
                <th bgcolor='#A9E2F3'>Edad</th>
                <th bgcolor='#A9E2F3'>DUI/Carnet</th>
                <th bgcolor='#A9E2F3'>Fecha Inscripción</th>
                <th bgcolor='#A9E2F3'>Fin Inscripción</th>
            </tr>
            ";
        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['correlativo']."</td>
                        <td><img src=".$fila["foto"]." style='width:60px; '/></td>
                        <td style='width:250px; '>".$fila['nombre']." ".$fila['apellido']." </td>
                        <td>".$fila['fechaNacimiento']."</td>
                        <td>".$fila['edad']."</td>
                        <td>".$fila['ddi']."</td>
                        <td>".$fila['fechaInscripcion']."</td>
                        <td>".$fila['fechaFinal']."</td>
                       
                     </tr>";
        }
        $tabla .= "</table>";
        
        $html = $tabla;
        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
    
    }
}