<?php 

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    public function gimnasio($id, $resultado) {
        $año= date('Y');
        
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
                            border: 1px solid white;
                            border-collapse: collapse;
                            font-family: sans-serif;
                        }
                    </style>';

                     
        $tabla.= "
            <div class='header'>
            <table>
            <tr>
            <th style='font-size:22px;'>
                <center><font color='#172961'>Gimanasio Aderel Lourdes</font>
                <br>Hoja de Inscripcion<br>
                Año ".$año."</center>
                
            </th>
            <th>
                <img src='./res/img/logoAderel.png'>
                </th>
            </tr>
            </table>
            </div>    
            <hr>
            <table>
            <tr>
            <th><h2><font color='green'>Datos del Usuario</font></h2></th>
            </tr>
            </table>
            <table class='tabla' style='font-size:17px;'>
            ";

        while($fila = $resultado->fetch_assoc()) {
            $tabla.="<tr>
                        <td><br><br><br>Cod. Expediente: <b>".$fila["correlativo"]."</b></td>
                        <td ></td>
                        <td><br><br><br>Edad: <b>".$fila['edad']." años</b></td>
                
                    </tr>
                    
                    <tr>
                        
                        <td><br><br>Nombre del Usuario: <b>".$fila["nombre"]." ".$fila['apellido']."</b></td>
                        <td><br><br>Fecha de Nacimiento: <b>".$fila['fechaNacimiento']."</b></td>
                        <td><br><br>Carnet Min: <b>".$fila['ddi']."</b></td>
                     </tr>

                     <tr>
                     <td><br><br>Fecha de Inscripción: <b>".$fila['fechaInscripcion']."</b></td>
                     <td ><br><br>Fecha Final: <b style='color:red'>".$fila['fechaFinal']."</b></td>
                     </tr>
                     ";
        }
                
        $tabla .= "</table><hr>";
        $tabla .="
        <br><br><br><br>F:____________________________________________________
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Nombre y firma</b>";
        
        $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
    

    }

}

?>