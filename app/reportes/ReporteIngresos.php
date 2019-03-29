<?php 
class Reporte {
    public static $con;
    public function __construct() {
        require_once './vendor/autoload.php';
    }
  
      public function reporteIngresosPorFechas($fecha,$fecha2, $resultado,$resultado1,$total) {
        $validar = $resultado1->fetch_assoc();
        $validar = $validar['start'];
        if($validar=="")
        {
            $tabla = '<h1>El rango de fechas seleccionado no contiene ningún registro</h1>';
            $html = $tabla;
        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
        }else{
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
                <font color='#172961'>Reporte  de Ingresos entre las fechas: <font color='blue'>".$fecha."</font> y <font color='blue'>".$fecha2."</font>
                
            </th>
            <th style='border: 1px solid white;'>
                <img src='./res/img/logoAderel.png'>
                </th>
            </tr>
            </table>
            </div>    
            <table class='tabla'>
            <tr>
                <th bgcolor='#A9E2F3'>Ingreso</th>
                <th bgcolor='#A9E2F3'>Cantidad</th>
                <th bgcolor='#A9E2F3'>Fecha</th>
            </tr>
            ";
        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['title']."</td>
                        <td>".$fila['cantidad']."</td>
                        <td>".$fila['start']."</td>
                       
                     </tr>";
        }
        $tabla .= "</table>";
        while($fila = $total->fetch_assoc()) {
            $tabla .= "<p align='right'><b><font color='#172961'>Total :</font> $".$fila['cantidad']."</b></p><hr>";
    
            }
            $tabla .= "<br><br><br><br><table>
            <tr>
            <th style='border: 1px solid black;border-left:0; border-bottom:0;border-top:0;'>F._______________________________<br>
            <br>Nom:___________________________<br>
            Presidente ADEREL</th>
            <th style='border: 1px solid black;border-left:0; border-bottom:0;border-top:0;'>F._______________________________<br>
            <br>Nom:___________________________<br>
            Tesorero ADEREL</th>
            <th style='border: 1px solid black;border-right:0; border-bottom:0;border-top:0;border-left:0;'>F.______________________________<br>
            <br>Nom:___________________________<br>
            Elaborado Por</th>
            </tr>
            
        </table>";
        $html = $tabla;
        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
    }
    }
}