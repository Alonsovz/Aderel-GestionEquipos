<div class="ui top fixed menu borderless" id="barra" style="background-color: blue;">
    <a class="item" id="btn-menu">
        <i class="material-icons">menu</i>
    </a>
    <a class="item" style="color:#12055D;" href="?1=UsuarioController&2=dashboard">
        <i class="material-icons">home</i>
    </a>
    
    
    <a style=" display: flex; justify-content: center; align-items: center;">
        <img src="./res/img/logoaderel.png" alt="" width="" class="logo" id=""> 
    
    <br>
    <img src="./res/img/letras.png" width="50%" height="60%" >
    </a>

    <div style="margin-right:20px;" id="usuario-header" class="ui floated right dropdown  floating item">
    
        <img class="ui avatar image" src="./res/img/userDef.png">  &nbsp;&nbsp; <font color="#12055D"><?php echo $_SESSION["nomUsuario"] ?></font>
        <i class="dropdown icon"></i>
        <div class="menu">
        
            <div class="header">
                <?php echo $_SESSION["descRol"] ?>
            </div>
            <div class="divider"></div>
            <a href="?1=UsuarioController&2=config">
                <div class="item" id="#btnConf">
                    <i class="cog icon"></i>
                    Cuenta
                </div>
            </a>
            <a href="?1=UsuarioController&2=logout">
                <div style="color:#c0392b;" class="item">
                    <i class="power icon"></i>
                    Cerrar Sesi&oacute;n
                </div>
            </a>
        </div>
    </div>
    
</div>

<script>
    $(document).ready(function () {
        $('.ui.dropdown')
            .dropdown();
    });
</script>
