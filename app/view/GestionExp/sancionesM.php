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

                        <a href="?1=GestionExpController&2=sancionesTorneoM" class="ui olive button">
                   <i class="close icon"></i> Sanciones por torneo
                    </a>
                    </div>

                    
            </div>

            <div class="row title-bar">
                <div class="sixteen wide column">
                    <button class="ui right floated blue labeled icon button"  id="btnModalRegistro">
                        <i class="plus icon"></i>
                        Agregar sanción
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
                                <th style="background-color: #E6C404;">Motivo</th>
                                <th style="background-color: #E6C404;">Tiempo</th>
                                <th style="background-color: #E6C404;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

    <div class="ui modal" id="modalSancion">
        <div class="header">
            Nueva Sanción
        </div>

        <div class="content">

        <form class="ui form">
            <div class="field">
                <div class="fields">
                    <div class="six wide field">
                        <label><i class="male icon"></i>Jugador</label>
                        <select id="jugador"  name="jugador" class="ui search dropdown"></select>
                    </div>

                    <div class="six wide field">
                        <label><i class="close icon"></i>Motivo de sanción</label>
                        <textarea rows="2" id="motivo" name="motivo" placeholder="Tiempo">
                        </textarea>
                    </div>

                    <div class="four wide field">
                        <label><i class="clock icon"></i>Tiempo de sanción</label>
                        <input type="text" name="tiempo" id="tiempo" placeholder="Tiempo">
                    </div>


                </div>
            </div>
        </form>

        </div>

        <div class="actions">
            <button class="ui black deny button">
            Cancelar
            </button>

            <button class="ui blue button" id="aplicar">
            Sancionar
            </button>
        </div>
    </div>
</div>


<script>
$("#btnModalRegistro").click(function(){
   $("#modalSancion").modal('setting', 'closable', false).modal('show');
});
</script>