

<br><div id="appE">

<modal-registrar id_form="frmRegistrarT" id="modalRegistrarT" url="?1=TorneosController&2=registrarF" titulo="Registrar Torneo"
:campos="campos_registroT" tamanio='tiny' ></modal-registrar>


<modal-editar id_form="frmEditarT" id="modalEditarT" url="?1=TorneosController&2=editarF" titulo="Editar Torneo"
:campos="campos_editarT" tamanio='tiny'></modal-editar>

<modal-eliminar id_form="frmEliminarT" id="modalEliminarT" url="?1=TorneosController&2=eliminarF" titulo="Eliminar Torneo"
sub_titulo="¿Está seguro de querer eliminar este torneo?" :campos="campos_eliminarT" tamanio='tiny'></modal-eliminar>
<modal-detalles :detalles="detalles"></modal-detalles>
<modal-jornadas :detalles="detalles"></modal-jornadas>

    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <i class="trophy icon"></i> <i class="futbol icon"></i>
                        Torneos Femeninos<font color="#A901DB" size="20px">.</font>
                        <?php

if($_SESSION["descRol"] == 'Administrador') {

    ?>

                           <button class="ui pink button">
                              <a href="?1=CategoriaController&2=gestionF"  style="color:white;">
                              <i class="chart bar outline icon"></i>
                              Categorías de Torneo
                               </a>
                           </button>
                           
   
                            <button class="ui olive button">
                            <a href="?1=EquipoController&2=gestionF"  style="color:white;">
                            <i class="users icon"></i><i class="futbol icon"></i>
                            Equipos
                            </a>
                            </button>

                            <button class="ui violet button">
                            <a href="?1=JugadoresController&2=gestionF"  style="color:white;">
                                <i class="female icon"></i><i class="futbol icon"></i>
                            Jugadores
                            </a>
                            </button>

<?php }else{ ?>

<button class="ui pink button">
<a href="?1=CategoriaController&2=gestionF"  style="color:white;">
<i class="chart bar outline icon"></i>
Categorías de Torneo
 </a>
</button>

<?php } ?>
                    </div>
                    
            
            </div>
            <div class="row title-bar">
                    <div class="sixteen wide column">
                    

                        <button class="ui right floated purple labeled icon button" @click="modalRegistrarT" id="btnModalRegistroEquipo">
                            <i class="plus icon"></i>
                            Agregar Torneo
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
                            <table id="dtTorneosF" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #FACC2E; color:white;">N°</th>
                                        <th style="background-color: #A901DB; color:white;">Nombre del Torneo</th>
                                        <th style="background-color: #A901DB; color:white;">Máximo de Equipos</th>
                                        <th style="background-color: #A901DB; color:white;">Cupos Disponibles</th>
                                        <th style="background-color: #A901DB; color:white;">Equipos Inscritos</th>
                                        <th style="background-color: #A901DB; color:white;">Categoría del Torneo</th>
                                        <th style="background-color: #A901DB; color:white;">Acciones</th>
                                       
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
    
                </div>

     



<div class="ui tiny modal" id="sorteos">
<div class="header">
<i class="trophy icon"></i><i class="futbol icon"></i> Realizar sorteo para Torneo: <a id="name"></a>
</div>
<div class="content">
<form method="post" action="?1=TorneosController&2=sorteoF">

    <input type="hidden" id="disponibles" name="disponibles">
    <input type="hidden" id="idTor" name="idTor">
    <label>Vueltas</label>
    <select class="ui dropdown" name='vueltas'>
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
     </select>
    <input type="submit" name="button" id="button" value="Realizar Sorteo" class="ui green button">
</form>

</div>

<div class="actions">
<button class="ui blue button" onclick="cerrar()">Listo</button>
</div>

</div>

<div class="ui  fullscreen longer modal" id="modalResultados"  style="overflow: scroll;">

<div class="header">
<div class="ui equal width form">
<form id="">
<div class="field">
        <div class="fields">
        <div class="seven wide field">
        <h3><i class="cogs icon"></i> Datos generales del partido</h3>
</div>

        <div class="one wide field">
            <label><center>Vuelta</center></label>
                        <input type="text" id="vuelta" name="vuelta" readonly>
            </div>
        

        <div class="one wide field">
            <label><center>Jornada</center></label>
                        <input type="text" id="jornada" name="jornada" readonly>
       </div>
        

        <div class="three wide field">
            <label><center><i class="calendar icon"></i>Fecha</center></label>
                        <input type="date" id="fecha" name="fecha" >
            
        </div>

        <div class="three wide field">
            <label><center><i class="time icon"></i>Hora</center></label>
                        <input type="time" id="hora" name="hora" >
            
        </div>

    </div>
    </div>
</div>
</div>
<div class="scrolling content">

<div class="ui equal width form">
    <form id="frmResultado">

    <h3><i class="futbol icon"></i> Marcador del partido</h3>
    <br>
        <div class="field">
            <div class="fields">
                <div class="five wide field">
                <label><center><i class="users icon"></i>Equipo</center></label>
                    <input type="text" id="equipo1" name="equipo1">
                </div>

                <div class="two wide field">
                <label><center><i class="futbol icon"></i>Goles</center></label>
                    <input type="number" id="goles1" name="goles1">
                </div>

                <div class="one wide field">
                <label><br></label>
                    <center><a style="font-size:22px; color:black;">vs</a></center>
                </div>

                <div class="two wide field">
                <label><center><i class="futbol icon"></i>Goles</center></label>
                    <input type="number" id="goles2" name="goles2">
                </div>

                <div class="five wide field">
                <label><center><i class="users icon"></i>Equipo</center></label>
                    <input type="text" id="equipo2" name="equipo2">
                </div>

                
            </div>
        </div>
        </form><br>
        <div class="ui divider"></div>
        
        <button class="ui blue button" id="btnGoleo"><i class="futbol icon"></i>Goleadores</button>
        <button class="ui yellow button" id="btnAmonestados"><i class="thumbs down icon"></i>Amonestados</button>
        
        <div id="goles">
        <div class="ui divider"></div>
        <a style="font-size:22px; color:black;"><i class="futbol icon"></i>Goleadores del partido</h3></a>
        <span style="float:right;">
                    <button @click="agregarDetalle" class="ui pink circular icon button"><i class="plus icon"></i> Agregar</button>
        </span>        <br><br><br>
                <table class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                        <thead>
                            <tr>
                                <th style="background-color: #DF01A5; color:white;"><i class="male icon"></i>Goleadores</th>
                                <th style="background-color: #DF01A5; color:white;"><i class="futbol icon"></i>Goles anotados</th>
                                <th style="background-color: #DF01A5; color:white;"><i class="trash icon"></i>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(envio, index) in envios">
                            <td>
                            <select v-model="envio.goleadores" class="ui search selection dropdown" id="goleadores"
                             name="goleadores">
                               <option v-for="option in goleadoresOps" :value="option.idJugador">{{option.nombre}} {{option.apellido}} --
                               {{option.correlativo}}
                               </option>
                             </select>
                            </td>
                            <td>  
                            <input class="requerido" v-model="envio.goles" type="number" placeholder="Goles anotados ">
                            </td>
                            <td>
                            <center>
                              <button type="button" @click="eliminarDetalle(index)" class="ui negative mini circular icon button"><i
                                  class="times icon"></i></button>
                                  </center>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
        <span style="float:right;">
        <button @click="" class="ui green circular icon button"><i class="check icon"></i> Guardar</button>
        </span> 
        </div>

        <div id="amonestados">

        <div class="ui divider"></div>
        <a style="font-size:22px; color:black;"><i class="thumbs down icon"></i>Amonestados del partido</a>
        <span style="float:right;">
                    <button @click="agregarDetalleC" class="ui olive circular icon button"><i class="plus icon"></i> Agregar</button>
        </span>        <br><br><br>
                <table class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                        <thead>
                            <tr>
                                <th style="background-color: #CD2020; color: white;"><i class="male icon"></i>Jugador</th>
                                <th style="background-color: #CD2020; color: white;"><i class="futbol icon"></i>Tarjeta</th>
                                <th style="background-color: #CD2020; color: white;"><i class="futbol icon"></i>Observación</th>
                                <th style="background-color: #CD2020; color: white;"><i class="futbol icon"></i>Tiempo de suspensión</th>
                                <th style="background-color: #CD2020; color: white;"><i class="trash icon"></i>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(castigo, index) in castigos">
                            <td>
                            <select v-model="castigo.goleadores" class="ui search selection dropdown" id="goleadores"
                             name="goleadores">
                               <option v-for="option in goleadoresOps" :value="option.idJugador">{{option.nombre}} {{option.apellido}}--
                               {{option.correlativo}}
                               </option>
                             </select>
                            </td>
                            <td>  
                            <select class="ui search dropdown"  name="tarjeta" id="tarjeta">
                            <option value="Tarjeta Amarilla" selected>Tarjeta Amarilla</option>
                            <option value="Doble Amarilla">Doble Amarilla</option>
                            <option value="Roja Directa">Roja  Directa</option>
                            </select>
                            </td>
                            <td>
                            <textarea rows="2" name="observacion" id="observacion" placeholder="Observación"></textarea>
                            </td>
                            
                            
                            <td>
                            <input   type="text" placeholder="Tiempo de suspensión" name="suspension" id="suspension">
                            </td>
                            <td>
                            <center>
                              <button type="button" @click="eliminarDetalleC(index)" class="ui negative mini circular icon button"><i
                                  class="times icon"></i></button>
                                  </center>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <span style="float:right;">
        <button @click="" class="ui green circular icon button"><i class="check icon"></i> Guardar</button>
        </span>
        
        </div>

</div>

</div>
<br><br>
<div class="actions">
<button class="ui red button" id="cerrarRes">
<i class="close icon"></i>
Cancelar
</button>

<button @click="" class="ui violet button"><i class="save icon">
</i> Guardar Todo
</button>

</div>

</div>
</div>

<script src="./res/tablas/tablaTorneosF.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>
<script src="./res/js/modalDetallesE.js"></script>
<script src="./res/js/modalJornadasTorneo.js"></script>
<script>
var appE = new Vue({
        el: "#appE",
        data: {
            detalles: [],
            envios: [{
                goleadores: '5',
                goles: '',
            }],
            castigos : [{
                goleadores: '5',
                suspension: '',
            }],

            goleadoresOps: <?php echo $goleadoresCmb?>,

            campos_registroT: [{
                    label: 'Nombre del Torneo',
                    name: 'nombreTorneo',
                    type: 'text'
                },
                {
                    label: 'Equipos que participarán:',
                    name: 'numeroEquipos',
                    type: 'number'
                },
                {
                    label: 'Categoría del Torneo:',
                    name: 'selectCategoria',
                    type: 'select',
                    options: <?php echo $categoriasCMB;?>
                }
               
                
            ],
            campos_editarT: [
                {
                    label: 'Nombre del Torneo',
                    name: 'nombreTorneo',
                    type: 'text'
                },
                {
                    label: 'Equipos que participarán:',
                    name: 'numeroEquipos',
                    type: 'number'
                },
                {
                    label: 'Categoría del Torneo:',
                    name: 'selectCategoria',
                    type: 'select',
                    options: <?php echo $categoriasCMB;?>
                },
                {
                    name: 'idDetalleE',
                    type: 'hidden'
                }

            ],
            
           
            campos_eliminarT: [{
                name: 'idEliminar',
                type: 'hidden'
            }]
        },
        methods: {
            cargarDetalles(id) {

            this.idTorneo = parseInt(id);

            $('#frmDetalles').addClass('loading');
            $.ajax({
            type: 'POST',
            url: '?1=TorneosController&2=mostrarEquiposCF',
            data: {
            id: id
            },
            success: function (data) {
            appE.detalles = JSON.parse(data);
            $('#frmDetalles').removeClass('loading');
            }
            });

            },
            cargarDetallesJornadas(id) {

            this.idTorneo = parseInt(id);

            $('#frmDetalles').addClass('loading');
            $.ajax({
            type: 'POST',
            url: '?1=TorneosController&2=calendarioGestionT',
            data: {
            id: id
            },
            success: function (data) {
            appE.detalles = JSON.parse(data);
            $('#frmDetalles').removeClass('loading');
            }
            });

            },
            cerrarModal() {
                this.detalles = [];
            },
            
            refrescarTabla() {
                tablaTorneosF.ajax.reload();  
            },
            modalRegistrarT() {
                $('#modalRegistrarT').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatosE() {
                var id = $("#idDetalleE").val();

                fetch("?1=TorneosController&2=cargarDatosTorneoF&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmEditarT input[name="nombreTorneo"]').val(dat.nombreTorneo);
                        $('#frmEditarT input[name="numeroEquipos"]').val(dat.numeroEquipos);
                        $('#frmEditarT select[name="selectCategoria"]').dropdown('set selected', dat.idCategoria);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            resultados(equipo1,equipo2,vuelta,jornada,hora,fecha){
                $("#equipo1").val(equipo1);
                $("#equipo2").val(equipo2);
                $("#vuelta").val(vuelta);
                $("#jornada").val(jornada);
                $("#fecha").val(fecha);
                $("#hora").val(hora);

                $('#modalResultados').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');

            },
            eliminarDetalle(index) {
                this.envios.splice(index, 1);
            },
            agregarDetalle() {
                this.envios.push({
                    goleadores: '5',
                    goles: '',
            
                });
            $('.ui.search.dropdown.selection').dropdown();
            $('.ui.search.dropdown.selection').css('max-width', '100%');
            $('.ui.search.dropdown.selection').css('min-width', '100%');
            $('.ui.search.dropdown.selection').css('width', '100%');
            },
            eliminarDetalleC(index) {
                this.castigos.splice(index, 1);
            },
            agregarDetalleC() {
                this.castigos.push({
                    goleadores: '5',
                    //goles: '',
            
                });
            $('.ui.search.dropdown.selection').dropdown();
            $('.ui.search.dropdown.selection').css('max-width', '100%');
            $('.ui.search.dropdown.selection').css('min-width', '100%');
            $('.ui.search.dropdown.selection').css('width', '100%');
            }
        }
    });
</script>
<script>
$(document).ready(function(){
    $('.ui.search.dropdown.selection').dropdown();
            $('.ui.search.dropdown.selection').css('max-width', '100%');
            $('.ui.search.dropdown.selection').css('min-width', '100%');
            $('.ui.search.dropdown.selection').css('width', '100%'); 

            $("#goles").hide();
            $("#amonestados").hide();
});
$("#btnGoleo").click(function(){
    $("#amonestados").hide('10');
    $("#goles").show('10');
    
});

$("#btnAmonestados").click(function(){
    $("#goles").hide('10');
    $("#amonestados").show('10');
    
    
});

$("#cerrarRes").click(function(){
    $('#modalDetallesJornadasM').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    $('#modalResultados').modal('hide');
});

var eliminarTorneo=(ele)=>{
  $('#modalEliminarT').modal('setting', 'closable', false).modal('show');
  $('#idEliminar').val($(ele).attr("id"));
}

var calendarizacion=(ele)=>{
     $('#modalDetallesJornadasM').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    appE.cargarDetallesJornadas($(ele).attr('id'));
  }

var editarTorneo=(ele)=>{
            $('#modalEditarT').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idDetalleE').val($(ele).attr("id"));
            appE.cargarDatosE();
        }
var verEquipos=(ele)=>{
            $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
            appE.cargarDetalles($(ele).attr('id'));
}

var sorteos=(ele)=>{
    $("#disponibles").val($(ele).attr("equipos"));
    $("#name").text($(ele).attr("name"));
    $("#idTor").val($(ele).attr("id"));
    $('#sorteos').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
}

var reporte=(ele)=>{
    var id = $(ele).attr("id");
window.open('?1=TorneosController&2=calendario&id='+id,'_blank');
return false;
}


function cerrar(){
    $('#sorteos').modal('hide');
}
</script>