<br><br><div id="app">

    <modal-registrar id_form="frmRegistrar" id="modalRegistrar" url="?1=UsuarioController&2=registrar" titulo="Registrar Usuario"
        :campos="campos_registro" tamanio='tiny' ></modal-registrar>

    <modal-editar id_form="frmEditar" id="modalEditar" url="?1=UsuarioController&2=editar" titulo="Editar Usuario"
        :campos="campos_editar" tamanio='tiny'></modal-editar>

    <modal-eliminar id_form="frmEliminar" id="modalEliminar" url="?1=UsuarioController&2=eliminar" titulo="Eliminar Usuario"
        sub_titulo="¿Está seguro de querer eliminar este usuario?" :campos="campos_eliminar" tamanio='tiny'></modal-eliminar>



        <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="users icon"></i>
                    Usuarios Aderel<font color="#DFD102" size="20px">.</font>
                </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <button class="ui right floated blue labeled icon button" @click="modalRegistrar" id="btnModalRegistro">
                    <i class="plus icon"></i>
                    Agregar
                </button>
            </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <div class="ui divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
                <table id="dtUsuarios" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #E6C404;">N°</th>
                            <th style="background-color: #E6C404;">Nombres</th>
                            <th style="background-color: #E6C404;">Apellido</th>
                            <th style="background-color: #E6C404;">Usuario</th>
                            <th style="background-color: #E6C404;">Email</th>
                            <th style="background-color: #E6C404;">Rol</th>
                            <th style="background-color: #E6C404;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="./res/tablas/tablaUsuarios.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>

<script>
var app = new Vue({
        el: "#app",
        data: {
            campos_registro: [{
                    label: 'Nombre:',
                    name: 'nombre',
                    type: 'text'
                },
                {
                    label: 'Apellido:',
                    name: 'apellido',
                    type: 'text'
                },
                {
                    label: 'Usuario Aderel',
                    name: 'user',
                    type: 'text',
                    id: 'usuario'
                },
                {
                    label: 'Correo Electrónico:',
                    name: 'correo',
                    mask: 'correoElectronico',
                    type: 'text'
                },
                {
                    label: 'Contraseña:',
                    name: 'pass',
                    type: 'password'
                },
                {
                    label: 'Rol:',
                    name: 'rol',
                    type: 'select',
                    options: [
                        {
                            val: 4,
                            text: 'Tesorero'
                        },
                        {
                            val: 3,
                            text: 'Supervisor y Control'
                        },
                        {
                            val: 2,
                            text: 'Gestor de Torneos'
                        },
                        {
                            val: 1,
                            text: 'Administrador'
                        },
                    ]
                }
            ],
            campos_editar: [
                {
                    label: 'Nombre:',
                    name: 'nombre',
                    type: 'text'
                },
                {
                    label: 'Apellido:',
                    name: 'apellido',
                    type: 'text'
                },
                {
                    label: 'Usuario Aderel:',
                    name: 'user',
                    type: 'text'
                },
                {
                    label: 'Correo Electrónico:',
                    name: 'correo',
                    mask: 'correoElectronico',
                    type: 'text'
                },
                {
                    label: 'Rol:',
                    name: 'rol',
                    type: 'select',
                    options: [
                        {
                            val: 4,
                            text: 'Tesorero'
                        },
                        {
                            val: 3,
                            text: 'Supervisor y Control'
                        },
                        {
                            val: 2,
                            text: 'Gestor de Torneos'
                        },
                        {
                            val: 1,
                            text: 'Administrador'
                        },
                    ]
                },
                {
                    name: 'idDetalle',
                    type: 'hidden'
                }

            ],
            campos_eliminar: [{
                name: 'idEliminar',
                type: 'hidden'
            }]
        },
        methods: {
            refrescarTabla() {
                tablaUsuarios.ajax.reload();
            },
            modalRegistrar() {
                $('#modalRegistrar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatos() {
                var id = $("#idDetalle").val();

                fetch("?1=UsuarioController&2=cargarDatosUsuario&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmEditar input[name="nombre"]').val(dat.nombre);
                        $('#frmEditar input[name="apellido"]').val(dat.apellido);
                        $('#frmEditar input[name="user"]').val(dat.nomUsuario);
                        $('#frmEditar input[name="correo"]').val(dat.email);
                        $('#frmEditar select[name="rol"]').dropdown('set selected', dat.codigoRol);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        }
    });
</script>

<script>
        $(document).on("click", ".btnEliminar", function () {
            $('#modalEliminar').modal('setting', 'closable', false).modal('show');
            $('#idEliminar').val($(this).attr("id"));
        });
        $(document).on("click", ".btnEditar", function () {
            $('#modalEditar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idDetalle').val($(this).attr("id"));
            app.cargarDatos();
        });


</script>


<script>


    $("#usuario").change(function(){

       var user=$("#usuario").val();

            $.ajax({
            type: 'POST',
            url: '?1=UsuarioController&2=getUserName',
            data:{user},
            success: function(r) {

                    if(r==1)
                    {
                        
                        $("#btnRegistrar").attr("disabled", true);
                        $("#usuario").siblings('div.ui.red.pointing.label').html('El usuario ya existe!')
                        $("#usuario").siblings('div.ui.red.pointing.label').css('display', 'inline-block');
                    }    
                    else{

                        $("#btnRegistrar").attr("disabled", false);
                    }  
            }
                });

    });

    $("#usuario").keyup(function(){

        $("#btnRegistrar").attr("disabled", false);
    });




</script>
     