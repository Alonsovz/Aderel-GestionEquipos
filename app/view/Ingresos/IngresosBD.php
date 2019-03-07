<?php
 header('Content-Type: application/json');
 $pdo = new PDO("mysql:dbname=ADEREL;host=localhost","root","");

$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';

switch($accion)
{
    case 'agregar':

    $sentenciaSQL= $pdo->prepare("INSERT INTO ingresos (title,start,cantidad,color,textColor,mes,anio,idEliminado)
    VALUES (:title,:start,:cantidad,:color,:textColor,:mes,:anio,:idEliminado)");

    $respuesta=$sentenciaSQL->execute(array(
        "title" =>$_POST['title'],
        "start" =>$_POST['start'],
        "cantidad" =>$_POST['cantidad'],
        "mes" =>$_POST['mes'],
        "anio" =>$_POST['anio'],
        "color" =>$_POST['color'],
        "textColor" =>$_POST['textColor'],
        "idEliminado" =>$_POST['idEliminado']
    ));

    echo json_encode($respuesta);

    break;

    
    case 'eliminar':
    $respuesta=false;
    if(isset($_POST['id'])){
        $setenciaSQL = $pdo->prepare("UPDATE Ingresos set idEliminado=2 where id=:id");
        $respuesta=$setenciaSQL->execute(array("id"=>$_POST['id']));
    }

    echo json_encode($respuesta);
    break;

    //echo "eliminar";
    break;


    case 'modificar':
        $setenciaSQL = $pdo ->prepare ("UPDATE Ingresos set
        title=:title,
        start=:start,
        cantidad=:cantidad,
        color=:color,
        textColor=:textColor,
        mes=:mes,
        anio=:anio,
        idEliminado=:idEliminado
        where id=:id
        ");

        $respuesta=$setenciaSQL->execute(array(
            "id" => $_POST['id'],
            "title" =>$_POST['title'],
            "start" =>$_POST['start'],
            "cantidad" =>$_POST['cantidad'],
            "mes" =>$_POST['mes'],
            "anio" =>$_POST['anio'],
            "color" =>$_POST['color'],
            "textColor" =>$_POST['textColor'],
            "idEliminado" =>$_POST['idEliminado']
        ));
    echo json_encode($respuesta);
    break;

    default:
    $setenciaSQL= $pdo->prepare("call mostrarIngresos()");
    $setenciaSQL->execute();
   
    $resultado = $setenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
    break;
}


?>




