<?php

class UsuarioController extends ControladorBase {

    // Vistas

    public static function loginView() {
        self::loadHeadOnly();
        require_once './app/view/Usuario/login.php';
    }

    

    public static function dashboard() {
        
        self::loadMain();    
        require_once './app/view/Usuario/dashboard.php';
    }
    
    public static function reporteria() {
        
        self::loadMain();    

        $daoT = new DaoTorneos();
        $torneos = $daoT->cargarTorneosRpt();


        $daoC = new DaoCategorias();
        $categoriasCMB = $daoC->mostrarCategoriasRpt();

        require_once './app/view/Usuario/reporteria.php';
    }


    public static function papeleria() {
        
        self::loadMain();    
        require_once './app/view/Usuario/papeleria.php';
    }


    public static function gestion() {
        self::loadMain();
        require_once './app/view/Usuario/gestion.php';
    }

    public static function contraOlvidada() {
        self::loadHeadOnly();
        require_once './app/view/Usuario/newPassword.php';
    }

    public static function resetPasswordView() {
        self::loadHeadOnly();
        require_once './app/view/Usuario/resetPassword.php';
    }

    public static function config() {
        self::loadMain();
        require_once './app/view/Usuario/config.php';
    }


    // Métodos

    public static function login() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);


        $dao = new DaoUsuario();
        $dao->objeto->setNomUsuario($datos->user);
        $dao->objeto->setPass($datos->pass);

        echo $dao->login();
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("location: ?");
    }

    public function encodeString() {
        $enc = new Encode();

        $encoded = $enc->encode('e', $_REQUEST["string"]);

        echo $encoded;
    }

    public function resetPassword() {

        $enc = new Encode();

        $datos = json_decode($_REQUEST["datos"]);
        $nomUser = $enc->encode('d', $_REQUEST["user"]);

        $dao = new DaoUsuario();

        $dao->objeto->setPass($datos->pass);
        $dao->objeto->setNomUsuario($nomUser);

        echo $dao->resetPassword($datos->code);
    }

    public function registrar() {
        $datos = $_REQUEST["datos"];

        $datos = json_decode($datos);

        if(empty($datos->rol)) {
            $rol = 2;
        } else {
            $rol = $datos->rol;
        }

        $dao = new DaoUsuario();

        $dao->objeto->setNombre($datos->nombre);
        $dao->objeto->setApellido($datos->apellido);
        $dao->objeto->setNomUsuario($datos->user);
        $dao->objeto->setEmail($datos->correo);
        $dao->objeto->setPass($datos->pass);
        $dao->objeto->setCodigoRol($rol);


        echo $dao->registrar();

    }

    public function newPass() {
        //Generador de contraseñas aleatorias
        $psswd = substr( md5(microtime()), 1, 8);

        $dao = new DaoUsuario();

        require './app/mail/Mail.php';
        $mail = new Mail();

        $datos = json_decode($_REQUEST["datos"]);

        $id = $datos->user;
        $email = $datos->correo;



        $dao->objeto->setNomUsuario($id);
        $dao->objeto->setEmail($email);

        //$datosUsuario = json_decode($dao->cargarDatosUsuario());

        if(!$mail->composeRestorePassMail($email, $id, $psswd)) {
            echo "El correo no fue enviado Correctamente";
        }

        echo $dao->reestablecer($psswd);
    }

    public function registrarExterno() {

    }


    public function getPass()
    {
            $pass=$_REQUEST['pass'];
            $dao= new DaoUsuario();
            $id=$_REQUEST['idU'];
            
            $dao->objeto->setCodigoUsuario($id);
            $contra=$dao->getPass();
            $passEncript=sha1($pass);
            $datos = array('pass' =>"$contra" ,'passEnc'=>"$passEncript" );
            $resp=json_encode($datos);
             echo $resp;
            
    }

    public function getUserName()
    {
        $dao=new DaoUsuario();
        $user=$_REQUEST['user'];
        $dao->objeto->setNomUsuario($user);

        echo $dao->getUserName();
    }
    public function getEmail(){
        $dao=new DaoUsuario();
        $email=$_REQUEST['email'];
        $user=$_REQUEST['user'];

        $dao->objeto->setEmail($email);
        $dao->objeto->setNomUsuario($user);
        echo $dao->getEmail();
        

    }

    public function editarNom()
    {
        $dao = new DaoUsuario();

        $id = $_REQUEST["id"];
        $user = $_REQUEST["user"];

        $dao->objeto->setCodigoUsuario($id);
        $dao->objeto->setNomUsuario($user);
        echo $dao->editarUser();
    }

    public function reestablecerContra()
    {
        $dao = new DaoUsuario();

        $id = $_REQUEST["id"];
        $nuPass = $_REQUEST["nuPass"];

        $dao->objeto->setPass($nuPass);
        $dao->objeto->setCodigoUsuario($id);
        echo $dao->restablecerContraConfig();
    }

    public function actualizarDatosPersonales()
    {
        $dao = new DaoUsuario();

        $id = $_REQUEST["id"];
        $nomUser = $_REQUEST["nom"];
        $ape = $_REQUEST["ape"];

        $dao->objeto->setNombre($nomUser);
        $dao->objeto->setApellido($ape);
        $dao->objeto->setCodigoUsuario($id);
        echo $dao->cambiarDatos();
    }

    public function eliminarCuenta() {
        $dao = new DaoUsuario();

        $id = $_REQUEST["id"];
        $dao->objeto->setCodigoUsuario($id);
        echo $dao->eliminarCuenta();
    }

    public function editar() {
       // $datos = $_REQUEST["datos"];

      //  $datos = json_decode($datos);

        $dao = new DaoUsuario();

        $dao->objeto->setNombre($_REQUEST["nombre"]);
        $dao->objeto->setApellido($_REQUEST["apellido"]);
        $dao->objeto->setNomUsuario($_REQUEST["user"]);
        $dao->objeto->setEmail($_REQUEST["correo"]);
        $dao->objeto->setCodigoRol($_REQUEST["rol"]);
        $dao->objeto->setCodigoUsuario($_REQUEST["idDetalle"]);

        echo $dao->editar();
    }


    public function cargarDatosUsuario() {
        $id = $_REQUEST["id"];

        $dao = new DaoUsuario();

        $dao->objeto->setCodigoUsuario($id);

        echo $dao->cargarDatosUsuario();
    }

    public function eliminar() {
        $datos = $_REQUEST["id"];

        $dao = new DaoUsuario();

        $dao->objeto->setCodigoUsuario($datos);

        echo $dao->eliminar();
    }

    public function reestablecerU() {
       // $datos = $_REQUEST["id"];

        $dao = new DaoUsuario();

        $dao->objeto->setCodigoUsuario($_REQUEST["id"]);

        echo $dao->reestablecerU();
    }

    public function mostrarUsuarios() {
        $dao = new DaoUsuario();

        echo $dao->mostrarUsuarios();
    }

    public function mostrarUsuariosE() {
        $dao = new DaoUsuario();

        echo $dao->mostrarUsuariosE();
    }

    // Reportes 


    public function reporteConsolidado() {
        $daoI = new DaoIngresos();
        $daoE = new DaoEgresos();
        $daoR = new DaoRemanente();
        
        require_once './app/reportes/ReporteConsolidado.php';
        
       // $idA= $_REQUEST["area"];
        $mes = $_REQUEST["mes"];
        $anio = $_REQUEST["anio"];

        $reporte = new Reporte();

        //$dao->objeto->setCodigoArea($idA);
        $daoI->objeto->setMes($mes);
       $daoI->objeto->setAnio($anio);

       $daoE->objeto->setMes($mes);
       $daoE->objeto->setAnio($anio);

       $daoR->objeto->setMes($mes);
       $daoR->objeto->setAnio($anio);

        $totalIngresos = $daoR->totalSaldo();

        $cuentaCorriente = $daoR->cuentasCorrientes();
        $totalCuentas = $daoR->totalCuentasCorrientes();

        $efectivo = $daoR->efectivo();

        $cajaChicaG = $daoR->cajaChicaGeneral();
        $cajaChicaA = $daoR->cajaChicaAderel();
        $totalCajas = $daoR->totalCajas();


        $nuevoSaldo = $daoR->nuevoSaldo();
        $validar = $daoR->totalSaldo();
        $saldoAnterior = $daoR->saldoAnteriorMes();
       

        $ingresosMes = $daoI->reporteIngresosPorMes();
        $totalIng = $daoI->totalMes();

        $egresosMes = $daoE->reporteEgresosPorMes();
        $totalCantidad = $daoE->totalCantidad();
        $totalRetencion = $daoE->totalRetencion();
        $totalPagado = $daoE->totalPagado();

        $reporte->reporteConsilidado($mes,$anio, $totalIngresos, $cuentaCorriente,$totalCuentas,$efectivo,$cajaChicaG,$cajaChicaA,$totalCajas,
        $nuevoSaldo,$ingresosMes,$egresosMes,$validar,$saldoAnterior,$totalIng,$totalCantidad,$totalRetencion,$totalPagado);
    }


    


    

    
}
