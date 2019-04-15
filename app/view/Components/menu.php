<div id="sidebar" class="ui sidebar inverted vertical menu" >
    <a class="header item" id="titulo-menu">
        <b><i class="home icon"></i>Men&uacute; ADEREL</b>
    </a>

    <?php

        if($_SESSION["descRol"] == 'Administrador') {
            require_once 'menuAdmin.php';
        } else if($_SESSION["descRol"] == 'Supervisor y Control') {
            require_once 'menuSupervisor.php';
        }
        else if($_SESSION["descRol"] == 'Tesorero') {
            require_once 'menuFinanzas.php';
        }
        else{
            require_once 'menuTorneos.php';
        }

    ?>

</div>

<div class="pusher">
    <div class="contenedor">