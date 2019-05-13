<br><div id="app">
    



    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <i class="male icon"></i><i class="futbol icon"></i><i class="close icon"></i>
                        Sanciones definitivas del torneo<font color="#DFD102" size="20px">.</font>

                        <a href="?1=GestionExpController&2=sancionesM" class="ui red button">
                   <i class="close icon"></i> Sanciones definitivas
                    </a>
                    </div>

                    
            </div>
            <div class="sixteen wide column">
                                <button class="ui right floated violet labeled icon button" id="verSuspendidos">
                                    <i class="eye icon"></i>
                                    Ver Sancionados
                                </button>
                            </div>
                        </div>
            
            <div class="ui divider"></div>
            
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
        
<div class="row title-bar">
                            

    
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

    <div class="ui fullscreen modal" id="suspendidos">
<div class="header">
Jugadores suspendidos
</div>
<div class="content">
<div class="row">
                <div class="sixteen wide column">
                <table id="dtSancionM" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #FACC2E; color:white;">N°</th>
                                        <th style="background-color: #7401DF; color:white;" ></th>
                                        <th style="background-color: #7401DF; color:white;">Cod. Expediente</th>
                                        <th style="background-color: #7401DF; color:white;">Nombre</th>
                                        <th style="background-color: #7401DF; color:white;">Apellido</th>
                                        <th style="background-color: #7401DF; color:white;">Equipo</th>
                                        <th style="background-color: #7401DF; color:white;">Torneo</th>
                                        <th style="background-color: #7401DF; color:white;">Motivo</th>      
                                        <th style="background-color: #7401DF; color:white;">Fecha</th>        
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                </div>
</div>
</div>
<div class="actions">
<button class="ui black deny button">Cerrar</button>
</div>
</div>




<div class="ui tiny modal" id="quitar">

                <div class="header">
                    Quitar sanción
                </div>
                <div class="content">
                    <h4>¿Quitar sanción a <a id="nom" style="color:black;"></a>  del torneo <a id="torneo" style="color:black;"></a>?</h4>
                    <form action="" class="ui equal width form" :id="id_form">
                        <div class="fields">
                            <div  class="field">
                                <input type="hidden" name="idJug" id="idJug">
                                <input type="hidden" name="idEq" id="idEq">
                            </div>
                        </div>
                    </form>        
                </div>
                <div class="actions">
                    <button class="ui black deny button">
                        Cancelar
                    </button>
                    <button class="ui right blue button" id="btnQuitar">
                        Quitar Sanción
                    </button>
                </div>
     </div>

<script src="./res/tablas/tablaTorneosSancionM.js"></script>
<script src="./res/tablas/tablaJugadoresSancionM.js"></script>
<script src="./res/tablas/tablaSancionadosM.js"></script>
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

$("#verSuspendidos").click(function(){

    $("#suspendidos").modal('setting', 'closable', false).modal('show');
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
var quitarSancion=(ele)=>{
    $("#nom").text($(ele).attr("nombre") +" "+$(ele).attr("apellido"));
   
    $("#idJug").val($(ele).attr("id"));
    $("#idEq").val($(ele).attr("idE"));
    $("#torneo").text($(ele).attr("torneo"));
    $("#quitar").modal('setting', 'closable', false).modal('show');
}
$("#aplicar").click(function(){
    var idJugador =  $("#idJugador").val();
    var idEquipo = $("#idEquipo").val();
    var motivo = $("#motivo").val();

    alertify.confirm("¿Desea aplicar la sanción al jugador?",
            function(){
    $.ajax({
                
                type: 'POST',
                url: '?1=JugadoresController&2=sancionTorneo',
                data: {
                    idEquipo : idEquipo,
                    idJugador : idJugador,
                    motivo : motivo,
                },
                success: function(r) {
                    if(r == 11) {
                        $('#modalSancion').modal('hide');
                        swal({
                            title: 'Listo',
                            text: 'Sanción aplicada con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtSancionF').DataTable().ajax.reload();
                        var table = $('#dtInscriM').DataTable();
                        table.destroy();
                        
                        mostrarJugadores($("#idTorneo").val());
                       // $("#nombreT").text($(ele).attr('torneo'));
                        $("#modalCambios").modal('setting', 'closable', false).modal('show');
                    } 
                }
            });
        },
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            });
});

$("#btnQuitar").click(function(){
    var idJugador =  $("#idJug").val();
    var idEquipo =  $("#idEq").val();
   

   
    $.ajax({
                
                type: 'POST',
                url: '?1=JugadoresController&2=quitarSancion',
                data: {
                    idJugador : idJugador,
                    idEquipo : idEquipo,
                },
                success: function(r) {
                    if(r == 11) {
                        $('#quitar').modal('hide');
                        swal({
                            title: 'Listo',
                            text: 'Sanción eliminada con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtSancionM').DataTable().ajax.reload();
                        //$("#modalCambios").modal('setting', 'closable', false).modal('show');
                    } 
                }
            });
        
});
</script>