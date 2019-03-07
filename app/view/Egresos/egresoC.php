<?php
 header('Content-Type: application/json');
 $pdo = new PDO("mysql:dbname=ADEREL;host=localhost","root","");

$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';

switch($accion)
{
    case 'agregar':

    $setenciaSQL= $pdo->prepare("Call registrarEgreso(:chNo,:conceptoEgreso,:cantidad,:retencion,:pagado,:fecha,:idEliminado)");

    $respuesta=$setenciaSQL->execute(array(
        "chNo" =>$_POST['chNo'],
        "conceptoEgreso" =>$_POST['conceptoEgreso'],
        "cantidad" =>$_POST['cantidad'],
        "retencion" =>$_POST['retencion'],
        "pagado" =>$_POST['pagado'],
        "fecha" =>$_POST['fecha'],
        "idEliminado" =>$_POST['idEliminado']
    ));

    echo json_encode($respuesta);

    break;

    case 'eliminar':
    case 'eliminar':
    $respuesta=false;
    if(isset($_POST['id'])){
        $setenciaSQL = $pdo->prepare("UPDATE Ingresos set idEliminado=2 where id=:id");
        $respuesta=$setenciaSQL->execute(array("id"=>$_POST['id']));
    }

    echo json_encode($respuesta);
    break;

    echo "eliminar";
    break;

    case 'modificar':
        $setenciaSQL = $pdo ->prepare ("UPDATE Ingresos set
        title=:title,
        descripcion=:descripcion,
        start=:start,
        cantidad=:cantidad,
        color=:color,
        textColor=:textColor,
        idEliminado=:idEliminado
        where id=:id
        ");

        $respuesta=$setenciaSQL->execute(array(
            "id" => $_POST['id'],
            "title" =>$_POST['title'],
            "descripcion" =>$_POST['descripcion'],
            "start" =>$_POST['start'],
            "cantidad" =>$_POST['cantidad'],
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