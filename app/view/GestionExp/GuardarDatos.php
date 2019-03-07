<?php
 //require_once './vendor/autoload.php';
 $con = new mysqli("localhost","root","","ADEREL");


 $Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

 $query = "Insert into jugadores values (null,'Fabio','Alonso','$Imagen','10234212-5','2001-10-10',1,1,1)";

 $resultado = $con->query($query);

 if($resultado){
     echo "Siiiuuuu";
 }
 else{
     echo "Noooou";
 }
?>