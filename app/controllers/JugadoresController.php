<?php

class JugadoresController extends ControladorBase {

    public static function gestion()
    {
        self::loadMain();
        require_once './app/view/Jugadores/jugadores.php';
    }

}


?>