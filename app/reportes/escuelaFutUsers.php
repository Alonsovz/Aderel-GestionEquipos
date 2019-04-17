<?php 
class Reporte {
    public static $con;
    public function __construct() {
        require_once './vendor/autoload.php';
    }
  
      public function escuelaFutUsers($resultado,$resultado1,$encargados) {
        $nivel = $resultado1->fetch_assoc();
        $nivel = $nivel['idEscuela'];

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
                <font color='#172961'>";
                

                if($nivel == '1'){
                    $tabla.= " Escuela de Fútbol ADEREL - 1er Nivel";
                }
                if($nivel == '2'){
                    $tabla.= " Escuela de Fútbol ADEREL - 2do Nivel";
                }
                if($nivel == '3'){
                    $tabla.= " Escuela de Fútbol ADEREL - 3er Nivel";
                }
                if($nivel == '4'){
                    $tabla.= " Escuela de Fútbol ADEREL - 4to Nivel";
                }
                if($nivel == '5'){
                    $tabla.= " Escuela de Fútbol ADEREL - 5to Nivel";
                }
                if($nivel == '6'){
                    $tabla.= " Escuela de Fútbol ADEREL - 6to Nivel";
                }
                $tabla.= "</font>
                
            </th>
            <th style='border: 1px solid white;'>
                <img src='./res/img/logoAderel.png'>
                </th>
            </tr>
            </table>
            
            </div><hr> <br><h2>Datos Generales</h2> ";

            $tabla.="<table class='tabla' style='font-size:15px;'>
            <tr>
                <th bgcolor='#9FF781'>Profesor</th>
                <th bgcolor='#9FF781'>Días</th>
                <th bgcolor='#9FF781'>Hora</th>
                <th bgcolor='#9FF781'>Cancha</th>
                <th bgcolor='#9FF781'>Edad Mínima</th>
                <th bgcolor='#9FF781'>Edad Máxima</th>

            </tr>
            ";
            
            while($fila = $encargados->fetch_assoc()) {
                $tabla.="<tr>
                            <td>".$fila['profesor']."</td>
                            <td>".$fila['dias']."</td>
                            <td>".$fila['hora']."</td>
                            <td>".$fila['cancha']."</td>
                            <td>".$fila['edadInicial']."</td>
                            <td>".$fila['edadFinal']."</td>
                         </tr>";
            }
            $tabla .= "</table><br><br><hr><h2>Jugadores</h2>";
            
            $tabla.="<table class='tabla' style='font-size:13px;'>
            <tr>
                <th bgcolor='#A9E2F3'>Cod. Exp</th>
                <th bgcolor='#A9E2F3'>Foto</th>
                <th bgcolor='#A9E2F3'>Nombre</th>
                <th bgcolor='#A9E2F3'>Fecha Nac.</th>
                <th bgcolor='#A9E2F3'>Edad</th>
                <th bgcolor='#A9E2F3'>Carnet</th>
                <th bgcolor='#A9E2F3'>Fecha Inscripción</th>
                <th bgcolor='#A9E2F3'>Fin Inscripción</th>
                <th bgcolor='#A9E2F3'>Encargado</th>
                <th bgcolor='#A9E2F3'>Tel. Encargado</th>
            </tr>
            ";
        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['correlativo']."</td>
                        <td><img src=".$fila["foto"]." style='width:60px; '/></td>
                        <td style='width:200px; '>".$fila['nombre']." ".$fila['apellido']." </td>
                        <td>".$fila['fechaNacimiento']."</td>
                        <td>".$fila['edad']."</td>
                        <td>".$fila['dui']."</td>
                        <td style='width:100px; '>".$fila['fechaInscripcion']."</td>
                        <td>".$fila['fechaFinal']."</td>
                        <td style='width:200px; '>".$fila['encargado']."</td>
                        <td>".$fila['telefono']."</td>
                       
                     </tr>";
        }
        $tabla .= "</table>";
        
        $html = $tabla;
        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
    
    }
}