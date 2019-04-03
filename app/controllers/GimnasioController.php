
<?php

class GimnasioController extends ControladorBase {

    public static function gestion()
    {
        self::loadMain();
        require_once './app/view/GestionGimnasio/GestionGimnasio.php';
    }

    public function mostrarGimnasio() {
        $dao = new DaoGimnasio();

        echo $dao->mostrarGimnasio();
    }

    public function mostrarGimnasioPagos() {
        $dao = new DaoGimnasio();

        echo $dao->mostrarGimnasioPagos();
    }

    public function registrar() {

        $nombre = $_REQUEST["nombreJ"];
        $apellido = $_REQUEST["apellidoJ"];
        $dui = $_REQUEST["duiJ"];
        $fechaNac = $_REQUEST["fechaNac"];
        $img= $_REQUEST["img"];
        $edad= $_REQUEST["edad"];
        

        
        $dao = new DaoGimnasio();

        $dao->objeto->setNombre($nombre);
        $dao->objeto->setApellido($apellido);
        $dao->objeto->setDui($dui);
        $dao->objeto->setImg($img);
        $dao->objeto->setFechaNacimiento($fechaNac);


        echo $dao->registrarGim();

    }

    public function editar(){

        
        
        $dao = new DaoGimnasio();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setApellido($_REQUEST["apellido"]);
        $dao->objeto->setEdad($_REQUEST["edad"]);
        $dao->objeto->setDui($_REQUEST["dui"]);
        $dao->objeto->setFechaNacimiento($_REQUEST["fechaNac"]);
        $dao->objeto->setImg($_REQUEST['imagenNueva']);
        $dao->objeto->setIdUsuario($_REQUEST["idDetalle"]);


        echo $dao->editar();

    }

    public function getDui()
    {
        $dao=new DaoGimnasio();
        $dui=$_REQUEST["dui"];
        $dao->objeto->setDui($dui);

        echo $dao->getDdi();
    }


    public function eliminar() {
 
         $dao = new DaoGimnasio();
 
         $dao->objeto->setIdUsuario($_REQUEST["id"]);
 
         echo $dao->eliminar();
     }

     public function reinscribir() {
 
        $dao = new DaoGimnasio();

        $dao->objeto->setIdUsuario($_REQUEST["id"]);

        echo $dao->reinscribir();
        echo $dao->primerPago();
        echo $dao->segundoPago();
        echo $dao->tercerPago();
        echo $dao->cuartoPago();
        echo $dao->quintoPago();
        echo $dao->sextoPago();
        echo $dao->septimoPago();
        echo $dao->octavoPago();
        echo $dao->novenoPago();
        echo $dao->decimoPago();
        echo $dao->oncePago();
        echo $dao->docePago();
    }

     public function cargarDatosGimnasio() {
        $id = $_REQUEST["id"];

        $dao = new DaoGimnasio();

        $dao->objeto->setIdUsuario($id);

        echo $dao->cargarDatosGimnasio();
    }

    public function fichaG() {
        $dao = new DaoGimnasio();
        
        require_once './app/reportes/gimnasio.php';
        
       // $idA= $_REQUEST["area"];
        $id = $_REQUEST["id"];

        $reporte = new Reporte();

        //$dao->objeto->setCodigoArea($idA);
        $dao->objeto->setIdUsuario($id);
        $resultado = $dao->fichaG();
        $resultado1 = $dao->fichaG();

        $reporte->gimnasio($id, $resultado, $resultado1);
    }


    public function pagos(){
        $id = $_REQUEST["id"];

        $dao = new DaoGimnasio();

        $dao->objeto->setIdUsuario($id);

        $resultado =$dao->pagos();

        $json = '';

        while($fila = $resultado->fetch_assoc()) {

            $json .= json_encode($fila).',';

        }

        $json = substr($json, 0, strlen($json) - 1);

        echo'['.$json.']';
    }

    public function cobrar(){
        $id = $_REQUEST["idCobro"];
        $cantidad = $_REQUEST["cantidadG"];

        $dao = new DaoGimnasio();

        $dao->objeto->setIdPago($id);

        echo $dao->cobrar();

        $daoI = new DaoIngresos();

        $daoI->objeto->setTitle("Gimnasio");
        $daoI->objeto->setCantidad($cantidad);

        
        echo $daoI->guardarOtro();

    }


    public function exonerar(){
        $id = $_REQUEST["idCobroGim"];
        //$cantidad = $_REQUEST["cantidadG"];

        $dao = new DaoGimnasio();

        $dao->objeto->setIdPago($id);

        echo $dao->exonerar();

    }


    



    


}

?>