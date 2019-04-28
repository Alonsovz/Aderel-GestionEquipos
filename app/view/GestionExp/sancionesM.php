<br><div id="app">
<modal-registrar id_form="frmRegistrar" id="modalRegistrar" url="?1=UsuarioController&2=registrar" titulo="Registrar Usuario"
        :campos="campos_registro" tamanio='tiny' ></modal-registrar>

    <modal-editar id_form="frmEditar" id="modalEditar" url="?1=UsuarioController&2=editar" titulo="Editar Usuario"
        :campos="campos_editar" tamanio='tiny'></modal-editar>

    <modal-eliminar id_form="frmEliminar" id="modalEliminar" url="?1=UsuarioController&2=eliminar" titulo="Eliminar Usuario"
        sub_titulo="¿Está seguro de querer eliminar este usuario?" :campos="campos_eliminar" tamanio='tiny'></modal-eliminar>



        <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="male icon"></i><i class="futbol icon"></i><i class="close icon"></i>
                    Sanciones graves<font color="#DFD102" size="20px">.</font>
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
                <table id="" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
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