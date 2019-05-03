

<br><div id="appE">

<modal-registrar id_form="frmRegistrarT" id="modalRegistrarT" url="?1=TorneosController&2=registrarM" titulo="Registrar Torneo"
:campos="campos_registroT" tamanio='tiny' ></modal-registrar>


<modal-editar id_form="frmEditarT" id="modalEditarT" url="?1=TorneosController&2=editarM" titulo="Editar Torneo"
:campos="campos_editarT" tamanio='tiny'></modal-editar>

<modal-eliminar id_form="frmEliminarT" id="modalEliminarT" url="?1=TorneosController&2=eliminarM" titulo="Eliminar Torneo"
sub_titulo="¿Está seguro de querer eliminar este torneo?" :campos="campos_eliminarT" tamanio='tiny'></modal-eliminar>

<modal-detalles :detalles="detalles"></modal-detalles>
<modal-jornadas :detalles="detalles"></modal-jornadas>
<modal-posiciones :detalles="detalles"></modal-posiciones>
<modal-goleo :detalles="detalles"></modal-goleo>
<modal-castigos :detalles="detalles"></modal-castigos>

    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <i class="trophy icon"></i> <i class="futbol icon"></i>
                        Torneos Masculinos<font color="#1CC647" size="20px">.</font>
                    
                        <?php

if($_SESSION["descRol"] == 'Administrador') {

    ?>

                           <button class="ui red button">
                              <a href="?1=CategoriaController&2=gestionM"  style="color:white;">
                              <i class="chart bar outline icon"></i>
                              Categorías de Torneo
                               </a>
                           </button>
                           
   
                            <button class="ui blue button">
                            <a href="?1=EquipoController&2=gestionM"  style="color:white;">
                            <i class="users icon"></i><i class="futbol icon"></i>
                            Equipos
                            </a>
                            </button>

                            <button class="ui yellow button">
                            <a href="?1=JugadoresController&2=gestionM"  style="color:white;">
                                <i class="female icon"></i><i class="futbol icon"></i>
                            Jugadores
                            </a>
                            </button>

<?php }else{ ?>

<button class="ui pink button">
<a href="?1=CategoriaController&2=gestionM"  style="color:white;">
<i class="chart bar outline icon"></i>
Categorías de Torneo
 </a>
</button>

<?php } ?>
                        </div>
            </div>
            <div class="row title-bar">
                    <div class="sixteen wide column">

                        <button class="ui right floated green labeled icon button" @click="modalRegistrarT" id="btnModalRegistroEquipo">
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
                            <table id="dtTorneosM" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #FACC2E; color:white;">N°</th>
                                        <th style="background-color: #1CC647; color:white;">Nombre del Torneo</th>
                                        <th style="background-color: #1CC647; color:white;">Máximo de Equipos</th>
                                        <th style="background-color: #1CC647; color:white;">Cupos Disponibles</th>
                                        <th style="background-color: #1CC647; color:white;">Equipos Inscritos</th>
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

     


<div class="ui tiny modal" id="sorteos">
<div class="header">
<i class="trophy icon"></i><i class="futbol icon"></i> Realizar sorteo para Torneo: <a id="name"></a>
</div>
<div class="content">
<form method="post" action="?1=TorneosController&2=sorteo">

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

<div class="ui fullscreen longer modal" id="modalResultados">

<div class="header">
<div class="ui equal width form">
<form id="frmResultado">
<div class="field">
        <div class="fields">
        <div class="seven wide field">
        <h3><i class="cogs icon"></i> Datos generales del partido</h3>
</div>

<div class="three wide field">
            <label><center>Torneo</center></label>
                        <input type="text" id="nombreTor" name="nombreTor" readonly>
                        <input type="hidden" id="idTo" name="idTo" readonly>
                        
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
                        <input type="hidden" id="idPartido" name="idPartido" >
            
        </div>

    </div>
    </div>
</div>
</div>
<div class="scrolling content">

<div class="ui equal width form">
<div class="field">
            <div class="fields">  
<div class="five wide field">
    <h3><i class="futbol icon"></i> Marcador del partido</h3>
    </div>
        
            
                <div class="three wide field">
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

                <div class="three wide field">
                <label><center><i class="users icon"></i>Equipo</center></label>
                    <input type="text" id="equipo2" name="equipo2">
                </div>

                <div class="five wide field"></div>
            </div>
        </div>
        </form><br>
        <div class="ui divider"></div>
        <button class="ui blue button" id="btnGoleo"><i class="futbol icon"></i>Goleadores</button>
        <button class="ui yellow button" id="btnAmonestados"><i class="thumbs down icon"></i>Amonestados</button>
        
        <div id="goles">
        <div class="ui divider"></div>
        <a style="font-size:22px; color:black;"><i class="futbol icon"></i>Goleadores del partido</a>
        <span style="float:right;">
                    <button @click="agregarDetalle" class="ui pink circular icon button"><i class="plus icon"></i> Agregar</button>
        </span>        <br><br><br>
        <form action="" class="ui form" id="frmGoleador">
                <table class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                        <thead>
                            <tr>
                                <th style="background-color: #217CD1; color:white;"><i class="male icon"></i>Goleadores</th>
                                <th style="background-color: #217CD1; color:white;"><i class="futbol icon"></i>Goles anotados</th>
                                <th style="background-color: #217CD1; color:white;"><i class="trash icon"></i>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(envio, index) in envios">
                            <td>
                            <select v-model="envio.goleadores" class="ui search selection dropdown" id="goleadores"
                             name="goleadores">
                               <option v-for="option in goleadoresOps" :key='option.idJugador' :value="option.idJugador"> {{option.nombre}} {{option.apellido}}--
                               {{option.correlativo}}
                               </option>
                             </select>
                            </td>
                            <td>  
                            <input class="requerido" v-model="envio.goles" name="goles" id="goles" type="number" placeholder="Goles anotados ">
                            </td>
                            <td>
                            <center>
            </form>
                              <button type="button" @click="eliminarDetalle(index)" class="ui negative mini circular icon button"><i
                                  class="times icon"></i></button>
                                  </center>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
        
        </div>

        <div id="amonestados">

        <div class="ui divider"></div>
        <a style="font-size:22px; color:black;"><i class="thumbs down icon"></i>Amonestados del partido</a>
        <br> 
        <b>Nota:</b> Si un jugador será suspendido por un período mas extenso, debe gestionarse en el módulo de sanciones.
        <span style="float:right;">
                    <button @click="agregarDetalleC" class="ui olive circular icon button"><i class="plus icon"></i> Agregar</button>
        </span>        <br><br><br>
        <form action="" class="ui form" id="frmAmonestados">
                <table class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                        <thead>
                            <tr>
                                <th style="background-color: #CD2020; color: white;"><i class="male icon"></i>Jugador</th>
                                <th style="background-color: #CD2020; color: white;"><i class="futbol icon"></i>Tarjeta</th>
                                <th style="background-color: #CD2020; color: white;"><i class="futbol icon"></i>Observación</th>
                                <th style="background-color: #CD2020; color: white;"><i class="trash icon"></i>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(castigo, index) in castigos">
                            <td>
                            <select v-model="castigo.goleadores" class="ui search selection dropdown" id="amonestado"
                             name="amonestado">
                               <option v-for="option in goleadoresOps" :key='option.idJugador' :value="option.idJugador">{{option.nombre}} {{option.apellido}} --
                                {{option.correlativo}}
                               </option>
                             </select>
                            </td>
                            <td>  
                            <select class="ui search dropdown"  name="tarjeta" id="tarjeta" v-model="castigo.tarjeta">
                            <option value="Tarjeta Amarilla" selected>Tarjeta Amarilla</option>
                            <option value="Doble Amarilla">Doble Amarilla</option>
                            <option value="Roja Directa">Roja  Directa</option>
                            </select>
                            </td>
                            <td>
                            <textarea rows="2" name="observacion"  id="observacion" v-model="castigo.observacion" placeholder="Observación"></textarea>
                            </td>
                        
                            <td>
        </form>
                            <center>
                              <button type="button" @click="eliminarDetalleC(index)" class="ui negative mini circular icon button"><i
                                  class="times icon"></i></button>
                                  </center>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
        

        </div>
</div>

</div>
<br><br>
<div class="actions">

<button class="ui orange button" id="cerrarRes">
<i class="close icon"></i>
Cancelar
</button>

<button id="guardarTodo" class="ui violet button"><i class="save icon">
</i> Guardar Todo
</button>

</div>

</div>


<div class="ui  modal" id="eleccion">
<div class="header">
<i class="sort amount up icon"></i> Estadísticas

<div class="row title-bar">
                    <div class="sixteen wide column">

                        <button class="ui right floated green labeled icon button"  id="imprimirEs">
                           <i class="file icon"></i>
                            Imprimir estadísticas
                        </button>
                    </div>
                 </div>
</div>

<div class="content">
<br>
<input type="hidden" id="idTorneoEs">
    <div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

    <button class="ui red inverted segment"  style="width: 30%; text-align:center;" id="verPosiciones">
     Posiciones
     <div class="ui divider"></div>
     <i class="futbol icon"></i> <i class="calendar icon"></i>
    </button>

    <button class="ui orange inverted segment" id="tablaGol" style="width: 30%; text-align:center;">
    Goleadores
    <div class="ui divider"></div>
    <i class="futbol icon"></i> <i class="male icon"></i>
    </button>

    <button class="ui yellow inverted segment" id="tablaCast" style="width: 30%; text-align:center;">
     Jugadores Castigados
     <div class="ui divider"></div>
     <i class="futbol icon"></i> <i class="trash icon"></i>
    </button>

    </div>
</div>
<div class="actions">
<button class="ui black deny button">
Cancelar
</button>
</div>
</div>

</div>

<script src="./res/tablas/tablaTorneosM.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>
<script src="./res/js/modalDetallesE.js"></script>
<script src="./res/js/modalJornadasTorneo.js"></script>
<script src="./res/js/modalPosicionesTorneo.js"></script>
<script src="./res/js/modalGoleadores.js"></script>
<script src="./res/js/modalCastigos.js"></script>
<script>
var appE = new Vue({
        el: "#appE",
        data: {
            detalles: [],
          //  detallesgoles: [],
            envios: [{
                goleadores: '3',
                goles: '',
               
            }],
            castigos : [{
                goleadores: '2',
                tarjeta: 'Tarjeta Amarilla',
                observacion: '',

            }],
            jugadores:<?php echo $goleadoresCmb?>,
            goleadoresOps: [],

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
                url: '?1=TorneosController&2=mostrarEquiposCM',
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

            tablaPosiciones(id) {

                this.idTorneo = parseInt(id);

                $('#frmDetalles').addClass('loading');
                $.ajax({
                type: 'POST',
                url: '?1=TorneosController&2=posiciones',
                data: {
                id: id
                },
                success: function (data) {
                appE.detalles = JSON.parse(data);
                $('#frmDetalles').removeClass('loading');
                }
                });

            },
            goleadores(id) {

                this.idTorneo = parseInt(id);

                $('#frmDetalles').addClass('loading');
                $.ajax({
                type: 'POST',
                url: '?1=TorneosController&2=goleadores',
                data: {
                id: id
                },
                success: function (data) {
                appE.detalles = JSON.parse(data);
                $('#frmDetalles').removeClass('loading');
                }
                });

            },

            suspendidos(id) {

                this.idTorneo = parseInt(id);

                $('#frmDetalles').addClass('loading');
                $.ajax({
                type: 'POST',
                url: '?1=TorneosController&2=amonestados',
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

            cerrarModalG() {
                
                $('#eleccion').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                 .modal('show');
                 this.detalles = [];
            },

            cerrarModalT() {
                
                $('#eleccion').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                 .modal('show');
                 this.detalles = [];
            },

            refrescarTabla() {
                tablaTorneosM.ajax.reload();  
            },
            modalRegistrarT() {
                $('#modalRegistrarT').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatosE() {
                var id = $("#idDetalleE").val();

                fetch("?1=TorneosController&2=cargarDatosTorneoM&id=" + id)
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
            resultados(equipo1,equipo2,vuelta,jornada,hora,fecha,nombreT,idTor,idPartido){
                $("#equipo1").val(equipo1);
                $("#equipo2").val(equipo2);
                $("#vuelta").val(vuelta);
                $("#jornada").val(jornada);
                $("#fecha").val(fecha);
                $("#hora").val(hora);
                $("#nombreTor").val(nombreT);
                $("#idTo").val(idTor);
                $("#idPartido").val(idPartido);

                
                const arrayJugadores = this.jugadores.filter((goleador,i)=>{
                    return goleador.idEquipo == equipo1 || goleador.idEquipo == equipo2;
                });
                console.log('arrayJugadores :', arrayJugadores);

                this.goleadoresOps.splice(0,this.goleadoresOps.length);
                arrayJugadores.forEach((value,i)=>{
                    this.goleadoresOps.push(value);
                });
                
                $('#modalResultados').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                    .modal('show');

            },
            eliminarDetalle(index) {
                this.envios.splice(index, 1);
            },
            agregarDetalle() {
                this.envios.push({
                    goleadores: '2',
                    goles: '',
            
                });
            $('.ui.search.dropdown.selection').dropdown();
          //  $('.ui.search.dropdown.selection').addClass('ui search selection dropdown');
            $('.ui.search.dropdown.selection').css('max-width', '100%');
            $('.ui.search.dropdown.selection').css('min-width', '100%');
            $('.ui.search.dropdown.selection').css('width', '100%');
            },
            eliminarDetalleC(index) {
                this.castigos.splice(index, 1);
            },
            agregarDetalleC() {
                this.castigos.push({
                    goleadores: '2',
                tarjeta: 'Tarjeta Amarilla',
                observacion: '',
            
                });
            $('.ui.search.dropdown.selection').dropdown();
            $('.ui.search.dropdown.selection').css('max-width', '100%');
            $('.ui.search.dropdown.selection').css('min-width', '100%');
            $('.ui.search.dropdown.selection').css('width', '100%');
            },
            guardarGoleador() {
                var idTor = $("#idTo").val();

                if (this.envios.length) {

                    $('#frmGoleador').addClass('loading');
                    $.ajax({
                        type: 'POST',
                        data: {
                            goleos: JSON.stringify(this.envios),
                            idTor : idTor,
                        },
                        url: '?1=TorneosController&2=registrarGoleador',
                        success: function (r) {
                            $('#frmGoleador').removeClass('loading');
                            if (r == 1) {
                                
                                        appE.envios = [{
                                            goleadores: '2',
                                            goles: ''
                                        }];

                                       
                                            
                            }
                            
                        }
                    });
                }

                },
                guardarAmonestado() {
                var idTorn = $("#idTo").val();

                if (this.castigos.length) {

                    $('#frmAmonestados').addClass('loading');
                    $.ajax({
                        type: 'POST',
                        data: {
                            castigo: JSON.stringify(this.castigos),
                            idTorn : idTorn,
                        },
                        url: '?1=TorneosController&2=registrarCastigo',
                        success: function (r) {
                            $('#frmAmonestados').removeClass('loading');
                            if (r == 1) {
                                
                                        appE.castigos = [{
                                            goleadores: '2',
                                            tarjeta: 'Tarjeta Amarilla',
                                            observacion: '',
                                        }];
                                    
                                          
                            }
                            
                        }
                    });
                }

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
$("#cerrarRes").click(function(){
    $('#modalDetallesJornadasM').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    $('#modalResultados').modal('hide');
});

$("#btnGoleo").click(function(){
    $("#amonestados").hide('10');
    $("#goles").show('10');
    
});

$("#guardarGol").click(function(){
    
    
});

$("#btnAmonestados").click(function(){
    $("#goles").hide('10');
    $("#amonestados").show('10');
    
    
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

  var estadisticas=(ele)=>{
     $('#eleccion').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    $("#idTorneoEs").val($(ele).attr('id'));
   // appE.goleadores($(ele).attr('id'));
  }

  $("#verPosiciones").click(function(){
    appE.tablaPosiciones($("#idTorneoEs").val());
    $('#modalPosiciones').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
  });

  $("#tablaGol").click(function(){
    appE.goleadores($("#idTorneoEs").val());
    $('#modalGoleo').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
  });

  $("#tablaCast").click(function(){
    appE.suspendidos($("#idTorneoEs").val());
    
    $('#modalCastigos').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
  });

var reporte=(ele)=>{
    var id = $(ele).attr("id");
window.open('?1=TorneosController&2=calendario&id='+id,'_blank');
return false;
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


$("#imprimirEs").click(function(){
    var id = $("#idTorneoEs").val();
window.open('?1=TorneosController&2=posicionesRpt&id='+id,'_blank');
return false;
});
    



function cerrar(){
    $('#sorteos').modal('hide');
}


$("#guardarTodo").click(function(){
    
    var idTorneo = $('#idTo').val();
               var equipo1 = $('#equipo1').val();
               var equipo2 = $('#equipo2').val();
               var goles1 = $('#goles1').val();
               var goles2 = $('#goles2').val();
               var hora = $('#hora').val();
               var fecha = $('#fecha').val();
               var partido = $('#idPartido').val();

         
        
            $.ajax({
                type: 'POST',
                url: '?1=TorneosController&2=guardarResultado',
                data: {
                    idTorneo : idTorneo,
                    equipo1 : equipo1,
                    equipo2 : equipo2,
                    goles2 : goles2,
                    goles1 : goles1,
                    hora : hora,
                    fecha : fecha,
                    partido : partido,
                },
                success: function(r) {
                    if(r == 11) {
                        $('#modalResultados').modal('hide');
                        swal({
                            title: 'Listo!',
                            text: 'Resultado guardado con éxito',
                            type: 'success',
                            showConfirmButton: true

                        }).then((result) => {
                            if (result.value) {
                                appE.guardarGoleador();
                                appE.guardarAmonestado();
                                $('#modalDetallesJornadasM').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                                .modal('show');
                                        appE.cargarDetallesJornadas($("#idTo").val());   
                            }
                        }); 
                        
                        
                    } 
                }
            });
});

function finalistas(element) {
    var idTorneo = $(element).attr('id');

    $.ajax({
        type: 'POST',
        url: '?1=TorneosController&2=posiciones',
        data: {
            id: idTorneo
        },
        success: function (data) {
            var datos = JSON.parse(data);
            let equipos_finalistas;
            const clasificatorias = [];

            if(datos.length>=10){
                //solo los primeros 8 equipos
                equipos_finalistas = datos.slice(0,8);
                for (let index = 0; index < 4; index++) {
                    clasificatorias.push({
                        partidoN:index+1,
                        etapa:'cuartos',
                        equiposId:[equipos_finalistas[index].idEquipo,equipos_finalistas[8-index-1].idEquipo],
                        idTorneo:idTorneo,
                    });
                }
            }else{
                equipos_finalistas = datos.slice(0,4);
                for (let index = 0; index < 2; index++) {
                    clasificatorias.push({
                        partidoN:index+1,
                        etapa:'semifinales',
                        equiposId:[equipos_finalistas[index].idEquipo,equipos_finalistas[4-index-1].idEquipo],
                        idTorneo:idTorneo,
                    });
                }
            }
            console.log('clasificatorias :', clasificatorias);
            $.ajax({
                type: 'POST',
                url: '?1=TorneosController&2=guardarClasificatorias',
                data: {datos: JSON.stringify(clasificatorias)}
            });
            
        }
    });
}
</script>