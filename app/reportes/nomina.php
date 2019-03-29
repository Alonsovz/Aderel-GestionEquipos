<?php 
class Reporte {
    public static $con;
    public function __construct() {
        require_once './vendor/autoload.php';
    }
  
      public function nomina($encargados,$nomina) {
        
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
                <font color='#172961'>Complejo deportivo de Lourdes ADEREL</font>
                <br>Torneo : 
                
            </th>
            <th style='border: 1px solid white;'>
                <img src='./res/img/logoOficial.png' width=100>
                </th>
            </tr>
            </table>
            <hr>
            </div><h3 style:'text-align:center;'>    
            Fecha Recibido: ______________________________________________________<br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Equipo:_______________________________________________________<br><br>
            ";
        while($fila = $encargados->fetch_assoc()) {
            $tabla.="
                1er Representante: ".$fila['encargado']."<br><br>
                  
                2do Representante: ".$fila['encargadoAux']."
                        
                       
                     </h3>";
        }
      
        while($fila = $nomina->fetch_assoc()) {
            $tabla .= "<p align='right'><b><font color='#172961'>Total :</font> $".$fila['nombre']."</b></p><hr>";
    
            }
           
        $html = $tabla;
        $pdf = new \Mpdf\Mpdf();
        $pdf->WriteHTML($html);
        $pdf->Output();
    
    }
}