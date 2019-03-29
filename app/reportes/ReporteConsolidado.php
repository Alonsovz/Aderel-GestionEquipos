<?php 

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    


    public function reporteConsilidado($mes,$anio, $totalIngresos, $cuentaCorriente,$efectivo,$cajaChica,
    $nuevoSaldo,$ingresosMes,$egresosMes,$validar,$saldoAnterior,$totalIng,$totalCantidad,$totalRetencion,$totalPagado)
    {   
        $nombreMes ="";
        if($mes == "01"){
            $nombreMes = "Enero";
        }
        if($mes == "02"){
            $nombreMes = "Febrero";
        }
        if($mes == "03"){
            $nombreMes = "Marzo";
        }
        if($mes == "04"){
            $nombreMes = "Abril";
        }
        if($mes == "05"){
            $nombreMes = "Mayo";
        }
        if($mes == "06"){
            $nombreMes = "Junio";
        }
        if($mes == "07"){
            $nombreMes = "Julio";
        }
        if($mes == "08"){
            $nombreMes = "Agosto";
        }
        if($mes == "09"){
            $nombreMes = "Septiembre";
        }
        if($mes == "10"){
            $nombreMes = "Octubre";
        }
        if($mes == "11"){
            $nombreMes = "Noviembre";
        }
        if($mes == "12"){
            $nombreMes = "Diciembre";
        }
        $validacion = $validar->fetch_assoc();
        $validacion = $validacion['totalSaldoIngresos'];
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
            <th style='border: 1px solid white; font-size:28px;'>
                <font color='#172961'>Reporte Consolidado del Mes de:</font> <font color='#BA9B1E'>".$nombreMes."
                </font>
            </th>
            <th style='border: 1px solid white;'>
            <img src='./res/img/logoOficial.png' width=100>
                </th>
            </tr>
            </table>
            </div>    
                        <h2><font color='#BA9B1E'>Egresos del mes</font> </h2>
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

        while($fila = $egresosMes->fetch_assoc()) {
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
        while($fila = $totalCantidad->fetch_assoc()) {
            $tabla .= "<p align='right'><b><font color='#172961'>Total de cantidad:</font> $".$fila['cantidad']."</b>";
    
            }
        while($fila = $totalRetencion->fetch_assoc()) {
        $tabla .= "<b><br><font color='#172961'>Total de retención:</font> $".$fila['retencion']."</b>";
        
         }
     while($fila = $totalPagado->fetch_assoc()) {
        $tabla .= "<b><br><font color='#172961'>Total pagado:</font> $".$fila['pagado']."</b></p><hr>";
            
         }

        $tabla.= "
               
                        <h2><font color='#BA9B1E'>Ingresos del mes</font> </h2>
            <table class='tabla'>
            <tr>
                <th bgcolor='#A9E2F3'>Ingreso</th>
                <th bgcolor='#A9E2F3'>Cantidad</th>
                <th bgcolor='#A9E2F3'>Fecha</th>
            </tr>

            ";

        while($fila = $ingresosMes->fetch_assoc()) {
            $tabla.="<tr>
            <td>".$fila['title']."</td>
            <td>".$fila['cantidad']."</td>
            <td>".$fila['start']."</td>
           
         </tr>";
        }

        $tabla .= "</table><br>";
        while($fila = $totalIng->fetch_assoc()) {
            $tabla .= "<p align='right'><b><font color='#172961'>Total de Ingresos:</font> $".$fila['total']."</b></p><hr>";
    
            }
            $tabla .= "<h2><font color='#BA9B1E'>Totales del Mes:</font></h2>";
        while($fila = $saldoAnterior->fetch_assoc()) {
            $tabla .= "<b><br><font color='#172961'>Saldo Anterior:</font> $".$fila['saldoAnterior']."</b>";
    
            }
        while($fila = $totalIngresos->fetch_assoc()) {
        $tabla .= "<br><b><font color='#172961'>Suma de Ingresos más saldo de mes anterior:</font> $".$fila['totalSaldoIngresos']."</b>";

        }

        while($fila = $cuentaCorriente->fetch_assoc()) {
            $tabla .= "<br><b><font color='#172961'>Cuenta Corriente:</font> $".$fila['cuentaCorriente']."</b>";
            }
        
         while($fila = $efectivo->fetch_assoc()) {
                $tabla .= "<br><b><font color='#172961'>Efectivo:</font> $".$fila['efectivo']."</b>";
             }  
         while($fila = $cajaChica->fetch_assoc()) {
             $tabla .= "<br><b><font color='#172961'>Caja Chica:</font> $".$fila['cajaChica']."</b>";
              }  

        while($fila = $nuevoSaldo->fetch_assoc()) {
              $tabla .= "<br><b><font color='blue'>Nuevo Saldo:</font><font color='#BA9B1E'> $".$fila['nuevoSaldo']."</font></b>
              ";
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


        $pdf = new \Mpdf\Mpdf();
        $pdf->WriteHTML($html);
        $pdf->Output();

    }
    }

}