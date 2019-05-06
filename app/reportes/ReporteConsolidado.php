<?php 

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    


    public function reporteConsilidado($mes,$anio, $totalIngresos, $cuentaCorriente,$totalCuentas,$efectivo,$cajaChicaG,$cajaChicaA,$totalCajas,
    $nuevoSaldo,$ingresosMes,$egresosMes,$validar,$saldoAnterior1,$saldoAnterior2,$totalIng,$totalCantidad,$totalRetencion,$totalPagado,
    $SumtotalIngresos)
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

        $totalSaldo = $SumtotalIngresos->fetch_assoc();
        $totalSaldo = $totalSaldo['totalSaldoIngresos'];

        $totalSaldoA1 = $saldoAnterior1->fetch_assoc();
        $totalSaldoA1 = $totalSaldoA1['saldoAnterior'];

        $totalSaldoA2 = $saldoAnterior2->fetch_assoc();
        $totalSaldoA2 = $totalSaldoA2['saldoAnterior'];

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
            <hr>
            </div>    
                        <h2><font color='#BA9B1E'>Egresos del mes</font> </h2>
            <table class='tabla'>
            <tr>
                <th bgcolor='#F3F781'>Ch No</th>
                <th bgcolor='#F3F781'>Concepto Egreso</th>
                <th bgcolor='#F3F781'>Cantidad</th>
                <th bgcolor='#F3F781'>Retención</th>
                <th bgcolor='#F3F781'>Pagado</th>
                <th bgcolor='#F3F781'>Cuenta</th>
                <th bgcolor='#F3F781'>Fecha</th>
            </tr>

            ";

        while($fila = $egresosMes->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['chNo']."</td>
                        <td>".$fila['conceptoEgreso']."</td>
                        <td>$ ".$fila['cantidad']."</td>
                        <td>$ ".$fila['retencion']."</td>
                        <td>$ ".$fila['pagado']."</td>";
                        if($fila['idChequera'] == 1){
                            $tabla .= "<td style='background-color:#F5A9A9;'>".$fila['chequera']."</td>";
                        }else 
                        if($fila['idChequera'] == 2){
                            $tabla .= "<td style='background-color:#BCF5A9;'>".$fila['chequera']."</td>";
                        }
                        else if($fila['idChequera'] == 3){
                            $tabla .= "<td style='background-color:#F5DA81;'>".$fila['chequera']."</td>";
                        }

                        $tabla .= "<td>".$fila['fechaEgreso']."</td>
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
            <td> $".$fila['cantidad']."</td>
            <td>".$fila['start']."</td>
           
         </tr>";
        }

        $tabla .= "</table>";
        while($fila = $totalIng->fetch_assoc()) {
            $tabla .= "<p align='right'><b><font color='#172961'>Total de Ingresos:</font> $".$fila['total']."</b></p><hr>";
    
            }

            $tabla .= "<hr><h2><font color='#BA9B1E'>Totales del Mes:</font></h2>";
           
               $tabla .= "<b><font color='#172961'>Saldo Anterior cuenta 1:</font> $".$totalSaldoA1."</b><br>";
               $tabla .= "<b><font color='#172961'>Saldo Anterior cuenta 2:</font> $".$totalSaldoA2."</b>";
       
               
           
           $tabla .= "<br><b><font color='#172961'>Dinero en efectivo:</font> $".$efectivo."</b><br><hr>";
           
        $tabla .= " <table style='border: 1px solid white;'>
        <tr style='border: 1px solid white;'>
        <th style='border: 1px solid white; font-size:18px;'><font color='#DBA901'>Cuentas de Banco:</font></th>
       
                <th style='border: 1px solid white;'>Cuenta</th>
                <th style='border: 1px solid white;'>Monto</th>
            </tr>";
        while($fila = $cuentaCorriente->fetch_assoc()) {
         $tabla.="
         <tr style='border: 1px solid white;'>
         <td style='border: 1px solid white;'></td>
            <td style='border: 1px solid white;'>".$fila['chequera']. "</td>
             <td style='border: 1px solid white;'>$".$fila['monto']."</td>
            
             </tr>  
         ";
        }
        $tabla .= "</table>";

        $tabla .= "<b>
        <table style='border: 1px solid white;'>
            <tr style='border: 1px solid white;'>
            <hr>
                <th style='border: 1px solid white;color:white;'>------------<b></th>
                <th style='border: 1px solid white;'>Total de dinero en cuentas</th>
                ";

        while($fila = $totalCuentas->fetch_assoc()) {
            $tabla.="
            
            <th style='border: 1px solid white;'>$".$fila['totalCuentas']."</th>
            </tr>";
        }
        $tabla .= "</table><hr>";
         
               
              
             $tabla .= "<table style='border: 1px solid white;'>
             <tr style='border: 1px solid white;'>
             <th style='border: 1px solid white;font-size:18px;'><font color='#DBA901'>Cajas:</font></th>
                <th style='border: 1px solid white;'>Caja</th>
                <th style='border: 1px solid white;'>Monto</th>
            </tr>";
         while($fila = $cajaChicaA->fetch_assoc()) {
             $tabla.="
             <tr style='border: 1px solid white;'>
             <td style='border: 1px solid white;'></td>
                <td style='border: 1px solid white;'>Caja chica ADEREL</td>
                 <td style='border: 1px solid white;'>$".$fila['montoActual']."</td>
                
             </tr>";
            }
           
            while($fila = $cajaChicaG->fetch_assoc()) {
                $tabla.="
             <tr>
             <td style='border: 1px solid white;'></td>
                <td style='border: 1px solid white;'>Caja chica General</td>
                 <td style='border: 1px solid white;'>$".$fila['montoActual']."</td>
                
            </tr> ";
                 }  
            $tabla .= "</table>";
            $tabla .= "<b>
         <table style='border: 1px solid white;'>
            <tr style='border: 1px solid white;'>
            <th style='border: 1px solid white; color:white;'>-------<b></th>
                <th style='border: 1px solid white;'>Total en Cajas</th>
                ";

        while($fila = $totalCajas->fetch_assoc()) {
            $tabla.="
            
            <th style='border: 1px solid white;'>$".$fila['totalCajas']."</th>
            </tr>";
        }
        $tabla .= "</table><hr>";

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


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();

    }
    }

}