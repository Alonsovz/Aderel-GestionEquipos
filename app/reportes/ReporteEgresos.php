<?php 

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    


    public function reporteEgresoPorFechas($fecha1,$fecha2, $resultado, $resultado1,$cantidad,$retencion,$pagado) {
        $validar = $resultado1->fetch_assoc();
        $validar = $validar['fechaEgreso'];
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
                <font color='#172961'>Reporte  de Egresos entre las fechas: <font color='blue'>".$fecha1."</font> y <font color='blue'>".$fecha2."</font>
                
            </th>
            <th style='border: 1px solid white;'>
            <img src='./res/img/logoOficial.png' width=100>
                </th>
            </tr>
            </table>
                
            </div>    

            <table class='tabla'>
            <tr>
                <th bgcolor='#F3F781'>Ch No</th>
                <th bgcolor='#F3F781'>Concepto Egreso</th>
                <th bgcolor='#F3F781'>Cantidad</th>
                <th bgcolor='#F3F781'>Retención</th>
                <th bgcolor='#F3F781'>Pagado</th>
                <th bgcolor='#F3F781'>Fecha</th>
            </tr>

            ";

        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['chNo']."</td>
                        <td>".$fila['conceptoEgreso']."</td>
                        <td>".$fila['cantidad']."</td>
                        <td>".$fila['retencion']."</td>
                        <td>".$fila['pagado']."</td>
                        <td>".$fila['fechaEgreso']."</td>
                     </tr>";
        }
        

        $tabla .= "</table>";
        while($fila = $cantidad->fetch_assoc()) {
            $tabla .= "<p align='right'><b><font color='#172961'>Total de cantidad:</font> $".$fila['cantidad']."</b>";
    
            }
        while($fila = $retencion->fetch_assoc()) {
        $tabla .= "<b><br><font color='#172961'>Total de retención:</font> $".$fila['retencion']."</b>";
        
         }
     while($fila = $pagado->fetch_assoc()) {
        $tabla .= "<b><br><font color='#172961'>Total pagado:</font> $".$fila['pagado']."</b></p><hr>";
            
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