<?php

class TorneosController extends ControladorBase {

    public static function gestion()
    {
        self::loadmain();
        require_once './app/view/GestionTorneos/GestionTorneos.php';
    }

}



?>