<?php 
class Reporte {
    public static $con;
    public function __construct() {
        require_once './vendor/autoload.php';
    }
  
      public function ingresosCategoria($resultado,$resultado1) {
       
      

        $cate = $resultado1->fetch_assoc();
        $cate = $cate['categoria'];
        
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
                <font color='#172961'>Reporte  de Ingresos por Categoria: ".$cate."</font>
                
            </th>
            <th style='border: 1px solid white;'>
                <img src='./res/img/logoOficial.png' width=100>
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
        
        $html = $tabla;
        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
    
    }
}