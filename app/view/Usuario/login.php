<?php
if(isset($_REQUEST["3"])) {

    $enc = new Encode();

    $nomUser = $enc->encode('d', $_REQUEST["3"]);

} else {
    $nomUser = '';
}

?>

<style>

    body {
    
    background: url("./res/img/fondoAlterno.jpg") no-repeat center;
    background-size: 100% 100%;
    
    }
</style>
<!-- kiondaquepex -->

<body>
    
    <div id="app">
        <div class="contenedor" style="margin-top:0; height: 100vh; background: none !important; display: flex;
        align-items: center;
        justify-content: center; ">
            <div class="cuadro" style="border: 3px solid #08088A;">
                <div class="cuadro-ins" style="border: 3px solid #08088A;">
                    <img src="./res/img/logoOficial.png" width=100>
                </div>
                <form id="frmLogin" action="" method="POST" class="ui form">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon" style="color:#12055D;"></i>
                            <input style="color:#12055D;" @keyup.enter="login" value="<?php echo $nomUser?>" @keyup="setTrue" type="text"
                                class="requerido" name="user" id="user" placeholder="Usuario">
                        </div>
                    </div>
                    <div style="text-align: right;" class="field">
                        <div class="ui right labeled left icon input">
                            <i class="lock icon" style="color:#12055D;"></i>
                            <input style="color:#12055D;" type="password" class="requerido" name="pass" id="pass" placeholder="Contraseña"
                                @keyup.enter="login" @keyup="setTrue">
                            <div id="show-contra" class="ui basic label"><i style="margin: 0;" id="icon-contra" class="eye slash icon"></i></div>
                        </div>
                        <a href="?1=UsuarioController&2=contraOlvidada"><small>Olvidé mi contraseña</small></a>
                    </div>
                    <a id="label-error" style="display: none; margin: 0; text-align:center;" class="ui red fluid large label">Datos
                        Incorrectos</a>
                    <button style="margin-top: 15px;" class="ui yellow fluid button" name="btnLogin" id="btnLogin"
                        value="noloc" @click="login" id="btnLogin" type="button" @submit.prevent="">Ingresar</button>

                </form>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $('#user').focus();
        });
    </script>

    <script>
        $(function () {
            $('#frmLogin :input').keyup(function () {
                $('#label-error').css('display', 'none');
            });
        });
    </script>

    <script>
        $(function () {
            $('#show-contra').mousedown(function () {
                $('#icon-contra').attr('class', 'eye icon');
                $('#pass').attr('type', 'text');
            });


            $('#show-contra').mouseup(function () {
                $('#icon-contra').attr('class', 'eye slash icon');
                $('#pass').attr('type', 'password');
            });

        });
    </script>


    <script>
        $(function () {
            $('#btnLogin').click(function () {
                login();
            });

            $("#user, #pass").on('keyup', function (e) {
                if (e.keyCode == 13) {
                    login();
                }
            });
        });


        function login() {
            if (validarVacios('frmLogin', '#btnLogin') == 0) {

                $('#label-error').css('display', 'none');
                $('#label-error').html('');

                var gatos = {};
                $('#frmLogin').addClass('loading');

                $('#frmLogin').find(":input").each(function () {
                    gatos[this.name] = $(this).val();
                });

                gatos = JSON.stringify(gatos);

                $.ajax({
                    type: 'POST',
                    url: '?1=UsuarioController&2=login',
                    data: {
                        datos: gatos
                    },
                    success: function (r) {
                        $('#frmLogin').removeClass('loading');
                        if (r == 1) {
                            location.href = '?1=UsuarioController&2=dashboard';
                        } else if (r == 2){
                            $('#label-error').html('La cuenta no existe');
                            $('#label-error').css('display', 'inline-block');
                        }
                        else {
                            $('#label-error').html('Datos Incorrectos');
                            $('#label-error').css('display', 'inline-block');
                        }
                    }
                });

            } else {
                $('#label-error').html('Complete todos los campos');
                $('#label-error').css('display', 'inline-block');
            }
        }
    </script>

</body>