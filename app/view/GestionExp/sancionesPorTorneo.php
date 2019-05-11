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
                        Sanciones definitivas del torneo<font color="#DFD102" size="20px">.</font>

                        <a href="?1=GestionExpController&2=sancionesTorneoM" class="ui olive button">
                   <i class="close icon"></i> Sanciones por torneo
                    </a>
                    </div>

                    
            </div>

            

            
            <div class="row">
                <div class="sixteen wide column">
                <table id="dtTorneosM" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #FACC2E; color:white;">N°</th>
                                        <th style="background-color: #1CC647; color:white;">Nombre del Torneo</th>
                                        <th style="background-color: #1CC647; color:white;">Categoría del Torneo</th>
                                        <th style="background-color: #1CC647; color:white;">Acciones</th>
                                       
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                </div>
            </div>
    </div>

    <div class="ui longer fullscreen first coupled modal" id="modalCambios">
<div id="cargandoModal" class="ui inverted dimmer">
        <div class="ui big loader"></div>
</div>

<div class="header">
    Sancionar Jugador de manera definitiva del torneo : <a id="nombreT"></a>
</div>
<div class="content">
        <div style="margin-bottom: 0em !important; width: 100% !important;" class="ui tiny fluid horizontal divided list">

        
        </div>
    
    <div class="ui divider"></div>
                <div class="row">
                        <div class="sixteen wide column">
                            <table id="dtInscriM" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: ##81BEF7; color: white;">N°</th>
                                        <th style="background-color: #CD2020; color: white;" ></th>
                                        <th style="background-color: #CD2020; color: white;">Cod. Expediente</th>
                                        <th style="background-color: #CD2020; color: white;">Nombre</th>
                                        <th style="background-color: #CD2020; color: white;">Apellido</th>
                                        <th style="background-color: #CD2020; color: white;">Equipo</th>
                                                      
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
</div>
<div class="actions">
    <button  class="ui black  button" id="cerrar">
        Listo
    </button>
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
                       <input type="text" name="nombre" id="nombre" readonly>
                       <input type="hidden" name="idEquipo" id="idEquipo" readonly>
                       <input type="hidden" name="idTorneo" id="idTorneo" readonly>
                       <input type="hidden" name="idJugador" id="idJugador" readonly>
                    </div>
                    <div class="four wide field">
                        <label><i class="clock icon"></i>Equipo</label>
                        <input type="text" name="equipo" id="equipo" readonly>
                    </div>

                    <div class="six wide field">
                        <label><i class="close icon"></i>Motivo de sanción</label>
                        <textarea rows="2" id="motivo" name="motivo" placeholder="Tiempo">
                        </textarea>
                    </div>

                    

                </div>
            </div>
        </form>

        </div>

        <div class="actions">
            <button class="ui black deny button" id="cerrarSancion">
            Cancelar
            </button>

            <button class="ui blue button" id="aplicar">
            Sancionar
            </button>
        </div>
    </div>

</div>

<script src="./res/tablas/tablaTorneosSancionM.js"></script>
<script src="./res/tablas/tablaJugadoresSancionM.js"></script>
<script>
$("#btnModalRegistro").click(function(){
   $("#modalSancion").modal('setting', 'closable', false).modal('show');
});


var verJugadores=(ele)=>{



    mostrarJugadores($(ele).attr('id'));
    $("#nombreT").text($(ele).attr('torneo'));
    $("#modalCambios").modal('setting', 'closable', false).modal('show');
}
$("#cerrarSancion").click(function(){
    mostrarJugadores($("#idTorneo").val());
    
    $("#modalCambios").modal('setting', 'closable', false).modal('show');
});

$("#cerrar").click(function(){
    var table = $('#dtInscriM').DataTable();
    table.destroy();
    $("#modalCambios").modal('hide');
});

var sancionar=(ele)=>{
    $("#nombre").val($(ele).attr("nombre") +" "+$(ele).attr("apellido"));

    $("#idTorneo").val($(ele).attr("idTor"));
    $("#idEquipo").val($(ele).attr("idE"));
    $("#idJugador").val($(ele).attr("id"));
    $("#equipo").val($(ele).attr("equipo"));

   // $("#modalCambios").modal('hide');
    var table = $('#dtInscriM').DataTable();
    table.destroy();
    
    $("#modalSancion").modal('setting', 'closable', false).modal('show');
}


</script>