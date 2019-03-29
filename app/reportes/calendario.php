<?php 

class Reporte {

    public static $con;


    public function __construct() {
        require_once './vendor/autoload.php';
    }

    public function calendario($id, $resultado,$resultado1,$resultado2,$resultado3,$resultado4,
    $validar1,$validar2,$validar3,$validar4,$validarDescanso1,$validarDescanso2,$validarDescanso3,$validarDescanso4) {

        $nombreT = $resultado->fetch_assoc();
        $nombreT = $nombreT['nombreT'];

        $validarDes1 = $validarDescanso1->fetch_assoc();
        $validarDes1 = $validarDes1["descansa"];

        $validarDes2 = $validarDescanso2->fetch_assoc();
        $validarDes2 = $validarDes2["descansa"];

        $validarDes3 = $validarDescanso3->fetch_assoc();
        $validarDes3 = $validarDes3["descansa"];

        $validarDes4 = $validarDescanso4->fetch_assoc();
        $validarDes4 = $validarDes4["descansa"];


        $año= date('Y');
        
        $tabla = '';

        $tabla .= ' <style>
                        td { 
                            text-align: center;
                            height: 30;
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
                            height:40;
                        }
                    </style>';

                     
        $tabla.= "
            <div class='header'>
            <table style='border: 1px solid white;'>
            <tr>
            <th style='font-size:22px; border: 1px solid white;'>
                <center>
                <br>Asociación Deportiva y Recreativa Lourdense (ADEREL)<br>
                Programación Torneo <font color='red'>".$nombreT."</font><br>
                Año ".$año."</center>
                
            </th>
            <th style='font-size:22px; border: 1px solid white;'>
            <img src='./res/img/logoOficial.png' width=100>
                </th>
            </tr>
            </table>
            </div>    
            <hr>";

            if($fila = $validar1->fetch_assoc() ==""){
                $tabla.="";
        
            }else{

                if($validarDes1== "0"){
                    $tabla .=" <h2>1er Vuelta</h2> <table class='tabla'>
            <tr>
                <th bgcolor='#A9E2F3'>Jornada</th>
                <th bgcolor='#A9E2F3'>Enfrentamiento</th>
                <th bgcolor='#A9E2F3'>Partido</th>
                <th bgcolor='#A9E2F3'>Cancha</th>
                <th bgcolor='#A9E2F3'>Fecha</th>
                <th bgcolor='#A9E2F3'>Hora</th>
            </tr>
            ";

        while($fila = $resultado1->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['jornada']."</td>
                        <td>".$fila['equipo1']." vs ".$fila['equipo2']."</td>
                        <td>".$fila['partido']."</td>
                        <td>".$fila['cancha']."</td>
                        <td>".$fila['fecha']."</td>
                        <td>".$fila['hora']."</td>
                     </tr>";
        }
                
        $tabla .= "</table><hr>";

                }else{
                    $tabla .=" <h2>1er Vuelta</h2> <table class='tabla'>
            <tr>
                <th bgcolor='#A9E2F3'>Jornada</th>
                
                <th bgcolor='#A9E2F3'>Descansa</th>
                <th bgcolor='#A9E2F3'>Enfrentamiento</th>
                <th bgcolor='#A9E2F3'>Partido</th>
                <th bgcolor='#A9E2F3'>Cancha</th>
                <th bgcolor='#A9E2F3'>Fecha</th>
                <th bgcolor='#A9E2F3'>Hora</th>
            </tr>
            ";

        while($fila = $resultado1->fetch_assoc()) {
            $tabla.="<tr>
                        <td>".$fila['jornada']."</td>
                        <td bgcolor='#F78181'>".$fila['descansa']."</td>
                        <td>".$fila['equipo1']." vs ".$fila['equipo2']."</td>
                        <td>".$fila['partido']."</td>
                        <td>".$fila['cancha']."</td>
                        <td>".$fila['fecha']."</td>
                        <td>".$fila['hora']."</td>
                     </tr>";
        }
                
        $tabla .= "</table><hr>";

                }


                

    }
        if($fila = $validar2->fetch_assoc() ==""){
            $tabla.="";
    
        }else{

            if($validarDes2=="0"){
                        $tabla.="<h2>2da Vuelta</h2><table class='tabla'>
                <tr>
                    <th bgcolor='#A9E2F3'>Jornada</th>
                    <th bgcolor='#A9E2F3'>Enfrentamiento</th>
                    <th bgcolor='#A9E2F3'>Partido</th>
                    <th bgcolor='#A9E2F3'>Cancha</th>
                    <th bgcolor='#A9E2F3'>Fecha</th>
                    <th bgcolor='#A9E2F3'>Hora</th>
                </tr>
                ";

            while($fila = $resultado2->fetch_assoc()) {
                $tabla.="<tr>
                            <td>".$fila['jornada']."</td>
                            <td>".$fila['equipo1']." vs ".$fila['equipo2']."</td>
                            <td>".$fila['partido']."</td>
                            <td>".$fila['cancha']."</td>
                            <td>".$fila['fecha']."</td>
                            <td>".$fila['hora']."</td>
                        </tr>";
                }
            
            $tabla .= "</table><hr>";

                        
            }
            else{

        $tabla.="<h2>2da Vuelta</h2><table class='tabla'>
        <tr>
            <th bgcolor='#A9E2F3'>Jornada</th>
            <th bgcolor='#A9E2F3'>Descansa</th>
            <th bgcolor='#A9E2F3'>Enfrentamiento</th>
            <th bgcolor='#A9E2F3'>Partido</th>
            <th bgcolor='#A9E2F3'>Cancha</th>
            <th bgcolor='#A9E2F3'>Fecha</th>
            <th bgcolor='#A9E2F3'>Hora</th>
        </tr>
        ";

    while($fila = $resultado2->fetch_assoc()) {
        $tabla.="<tr>
                    <td>".$fila['jornada']."</td>
                    <td bgcolor='#F78181'>".$fila['descansa']."</td>
                    <td>".$fila['equipo1']." vs ".$fila['equipo2']."</td>
                    <td>".$fila['partido']."</td>
                    <td>".$fila['cancha']."</td>
                    <td>".$fila['fecha']."</td>
                    <td>".$fila['hora']."</td>
                 </tr>";
        }
       
    $tabla .= "</table><hr>";
            }
     }

    if($fila = $validar3->fetch_assoc() ==""){
        $tabla.="";

    }else{
        if($validarDes3== "0"){

            $tabla.="
        <h2>3er Vuelta</h2><table class='tabla'>
        <tr>

            <th bgcolor='#A9E2F3'>Jornada</th>          
            <th bgcolor='#A9E2F3'>Enfrentamiento</th>
            <th bgcolor='#A9E2F3'>Partido</th>
            <th bgcolor='#A9E2F3'>Cancha</th>
            <th bgcolor='#A9E2F3'>Fecha</th>
            <th bgcolor='#A9E2F3'>Hora</th>
        </tr>
        ";

    while($fila = $resultado3->fetch_assoc()) {
        $tabla.="<tr>
                    <td>".$fila['jornada']."</td>
                    <td>".$fila['equipo1']." vs ".$fila['equipo2']."</td>
                    <td>".$fila['partido']."</td>
                    <td>".$fila['cancha']."</td>
                    <td>".$fila['fecha']."</td>
                    <td>".$fila['hora']."</td>
                 </tr>";
    }


    $tabla .= "</table><hr>";
        }else{
            $tabla.="
        <h2>3er Vuelta</h2><table class='tabla'>
        <tr>

            <th bgcolor='#A9E2F3'>Jornada</th>          
            <th bgcolor='#A9E2F3'>Descansa</th>
            <th bgcolor='#A9E2F3'>Enfrentamiento</th>
            <th bgcolor='#A9E2F3'>Partido</th>
            <th bgcolor='#A9E2F3'>Cancha</th>
            <th bgcolor='#A9E2F3'>Fecha</th>
            <th bgcolor='#A9E2F3'>Hora</th>
        </tr>
        ";

    while($fila = $resultado3->fetch_assoc()) {
        $tabla.="<tr>
                    <td>".$fila['jornada']."</td>
                    <td bgcolor='#F78181'>".$fila['descansa']."</td>
                    <td>".$fila['equipo1']." vs ".$fila['equipo2']."</td>
                    <td>".$fila['partido']."</td>
                    <td>".$fila['cancha']."</td>
                    <td>".$fila['fecha']."</td>
                    <td>".$fila['hora']."</td>
                 </tr>";
    }


    $tabla .= "</table><hr>";

        }

        

}

if($fila = $validar4->fetch_assoc() ==""){
    $tabla.="";

}else{
    if($validarDes4== "0"){
        $tabla.="<h2>4ta Vuelta</h2><table class='tabla'>
        <tr>
            <th bgcolor='#A9E2F3'>Jornada</th>           
            <th bgcolor='#A9E2F3'>Enfrentamiento</th>
            <th bgcolor='#A9E2F3'>Partido</th>
            <th bgcolor='#A9E2F3'>Cancha</th>
            <th bgcolor='#A9E2F3'>Fecha</th>
            <th bgcolor='#A9E2F3'>Hora</th>
        </tr>
        ";

    while($fila = $resultado4->fetch_assoc()) {
        $tabla.="<tr>
                    <td>".$fila['jornada']."</td>
                    <td>".$fila['equipo1']." vs ".$fila['equipo2']."</td>
                    <td>".$fila['partido']."</td>
                    <td>".$fila['cancha']."</td>
                    <td>".$fila['fecha']."</td>
                    <td>".$fila['hora']."</td>
                 </tr>";
    }
            
    $tabla .= "</table><hr>";
    }else{
        $tabla.="<h2>4ta Vuelta</h2><table class='tabla'>
        <tr>
            <th bgcolor='#A9E2F3'>Jornada</th>           
            <th bgcolor='#A9E2F3'>Descansa</th>
            <th bgcolor='#A9E2F3'>Enfrentamiento</th>
            <th bgcolor='#A9E2F3'>Partido</th>
            <th bgcolor='#A9E2F3'>Cancha</th>
            <th bgcolor='#A9E2F3'>Fecha</th>
            <th bgcolor='#A9E2F3'>Hora</th>
        </tr>
        ";

    while($fila = $resultado4->fetch_assoc()) {
        $tabla.="<tr>
                    <td >".$fila['jornada']."</td>
                    <td bgcolor='#F78181'>".$fila['descansa']."</td>
                    <td>".$fila['equipo1']." vs ".$fila['equipo2']."</td>
                    <td>".$fila['partido']."</td>
                    <td>".$fila['cancha']."</td>
                    <td>".$fila['fecha']."</td>
                    <td>".$fila['hora']."</td>
                 </tr>";
    }
            
    $tabla .= "</table><hr>";

    }
        
            
}
        
        
        $html = $tabla;


        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $pdf->WriteHTML($html);
        $pdf->Output();
    

    }

}

?>