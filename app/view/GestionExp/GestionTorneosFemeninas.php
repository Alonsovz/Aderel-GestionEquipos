<style>
    .hide{
        display:none;
    }
</style>

<br><div id="appE">

<modal-registrar id_form="frmRegistrarT" id="modalRegistrarT" url="?1=TorneosController&2=registrarF" titulo="Registrar Torneo"
:campos="campos_registroT" tamanio='tiny' ></modal-registrar>


<modal-editar id_form="frmEditarT" id="modalEditarT" url="?1=TorneosController&2=editarF" titulo="Editar Torneo"
:campos="campos_editarT" tamanio='tiny'></modal-editar>

<modal-eliminar id_form="frmEliminarT" id="modalEliminarT" url="?1=TorneosController&2=eliminarF" titulo="Eliminar Torneo"
sub_titulo="¿Está seguro de querer eliminar este torneo?" :campos="campos_eliminarT" tamanio='tiny'></modal-eliminar>

<modal-detalles :detalles="detalles"></modal-detalles>
<modal-jornadas :detalles="detalles"></modal-jornadas>
<modal-posiciones :detalles="detalles"></modal-posiciones>
<modal-goleo :detalles="detalles"></modal-goleo>
<modal-castigos :detalles="detalles"></modal-castigos>
<modal-suspendidos :detalles="detalles"></modal-suspendidos>

    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <i class="trophy icon"></i> <i class="futbol icon"></i>
                        Torneos Femeninos<font color="#1CC647" size="20px">.</font>
                    
           

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


                        </div>
            </div>
            
            <div class="row title-bar">
                    
            <div class="sixteen wide column">
                    <a class='ui right floated purple button' href="?1=TorneosController&2=historialF">
            <i class="time icon"></i>Historial de Torneos
            </a>
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
                        <input type="date" id="fecha" name="fecha">
                        <div class="ui red pointing label"  id="labelFecha"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Completa este campo
                                    </div>
            
        </div>

        <div class="three wide field">
            <label><center><i class="time icon"></i>Hora</center></label>
                        <input type="time" id="hora" name="hora" >
                        <input type="hidden" id="idPartido" name="idPartido" >
                        <div class="ui red pointing label"  id="labelHora"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Completa este campo
                                    </div>
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
        <div class="four wide field hide content" id='contTipoGane'>
            <label><center>Tipo Gane</center></label>
            <select name="tipoGane" id="tipoGane" class='ui dropdown'>
                <option value="Tiempo normal">Tiempo normal</option>
                <option value="Penalti">Penalti</option>
            </select>
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
                               {{option.correlativo}} -- {{option.equipo}}
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

    <button class="ui blue inverted segment"  style="width: 23%; text-align:center;" id="verPosiciones">
     Posiciones
     <div class="ui divider"></div>
     <i class="futbol icon"></i> <i class="calendar icon"></i>
    </button>

    <button class="ui orange inverted segment" id="tablaGol" style="width: 23%; text-align:center;">
    Goleadores
    <div class="ui divider"></div>
    <i class="futbol icon"></i> <i class="male icon"></i>
    </button>

    <button class="ui yellow inverted segment" id="tablaSus" style="width: 23%; text-align:center;">
     Jugadores suspendidos
     <div class="ui divider"></div>
     <i class="futbol icon"></i> <i class="trash icon"></i>
    </button>

    <button class="ui red inverted segment" id="tablaExp" style="width: 23%; text-align:center;">
     Jugadores expulsados
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

<form class="ui tiny modal" id="equipoWinner">
    <div class="header">
        <i class="sort amount up icon"></i> Equipo Ganador
    </div>

    <div class="content">
        <!-- PURO JQUERY -->
    </div>
    <div class="actions">
        <button class="ui black deny button" type='button' onclick='guardarGanadores()'>
        Cancelar
        </button>
    </div>
</form>


<div class="ui tiny modal" id="eleccionRpt">
    <div class="header">
    <i class="calendar icon"></i> Reporte
    </div>

    <div class="content">

    <form class="ui form">
        <input type="hidden" name="idTorneoRpt" id="idTorneoRpt">

        <div class="field">
        <div class="fields">
            <div class="four wide field"></div>
                <div class="eight wide field">
                
                    <button id="imprimirTodo" class="ui blue button" style="margin:auto;">
                     <i class="print icon"></i>Imprimir todas las jornadas
                    </button>
                 </div>

            </div>
        </div>
        <div class="ui divider"></div>
        <br>
        <h3>Seleccione la vuelta y jornada que desea imprimir</h3><br>
        <div class="field">
            <div class="fields">
                <div class="eight wide field">
                <label>Vuelta</label>
                    <select name="vueltaRpt" id="vueltaRpt" class="ui search selection dropdown">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>

                <div class="eight wide field">
                <label>Jornada</label>
                    <select name="jornadaRpt" id="jornadaRpt" class="ui search selection dropdown">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="field">
        <div class="fields">
            <div class="six wide field"></div>
                <div class="eight wide field">
                
                    <a id="imprimirRpt" class="ui yellow button" style="margin:auto;">
                     <i class="print icon"></i>Imprimir
                    </a>
                 </div>

            </div>
        </div>
    </form>
    </div>

    <div class="actions">
    <button class="ui black deny button">
        Cerrar
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
<script src="./res/js/modalPosicionesTorneo.js"></script>
<script src="./res/js/modalGoleadores.js"></script>
<script src="./res/js/modalCastigos.js"></script>
<script src="./res/js/modalSuspendidos.js"></script>
<script>
var clasifiId=0;
var equipo1Id=0;
var equipo2Id=0;

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
                goleadores: '3',
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
                url: '?1=TorneosController&2=expulsados',
                data: {
                id: id
                },
                success: function (data) {
                appE.detalles = JSON.parse(data);
                $('#frmDetalles').removeClass('loading');
                }
                });

            },

            susp(id) {

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
                tablaTorneosF.ajax.reload();  
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

                $("#nombreTor").removeAttr('hidden');
                $("#jornada").removeAttr('hidden');
                $("#vuelta").removeAttr('hidden');
                $("#fecha").removeAttr('disabled');
                $("#hora").removeAttr('disabled');
                $('#guardarTodo').removeAttr('onclick');
                $('#contTipoGane').addClass('hide');

                
                const arrayJugadores = this.jugadores.filter((goleador,i)=>{
                    return goleador.idEquipo == equipo1 || goleador.idEquipo == equipo2;
                });
                

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
                    goleadores: '3',
                    goles: '',
            
                });
            
            },
            eliminarDetalleC(index) {
                this.castigos.splice(index, 1);
            },
            agregarDetalleC() {
                this.castigos.push({
                    goleadores: '3',
                tarjeta: 'Tarjeta Amarilla',
                observacion: '',
            
                });
            
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
                                            goleadores: '3',
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
                                            goleadores: '3',
                                            tarjeta: 'Tarjeta Amarilla',
                                            observacion: '',
                                        }];
                                    
                                          
                            }
                            
                        }
                    });
                }

                },
                historial(idTorneo, nombre){
                    var idTorneo = idTorneo;
                    var nombre = nombre;
            window.open('?1=EquipoController&2=historial&idTorneo='+idTorneo+'&nombre='+nombre,'_blank');
            return false;
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

  $("#tablaExp").click(function(){
    appE.suspendidos($("#idTorneoEs").val());
    
    $('#modalCastigos').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
  });

  $("#tablaSus").click(function(){
    appE.susp($("#idTorneoEs").val());
    
    $('#modalSuspendidos').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
  });

var reporte=(ele)=>{
    $('#eleccionRpt').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    $("#idTorneoRpt").val($(ele).attr('id'));
}

$("#imprimirTodo").click(function(){
    var id = $("#idTorneoRpt").val();
window.open('?1=TorneosController&2=calendario&id='+id,'_blank');
return false;
});

$("#imprimirRpt").click(function(){
    var vuelta = $("#vueltaRpt").val();
    var jornada = $("#jornadaRpt").val();
    var id = $("#idTorneoRpt").val();

window.open('?1=TorneosController&2=calendarioFiltro&vuelta='+vuelta+'&jornada='+jornada+'&id='+id,'_blank');
return false;
});


    



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
$('#fecha').keyup(function(){
    $("#labelFecha").css("display","none");
                    $("#guardarTodo").attr("disabled", false);
});

$('#hora').keyup(function(){
    $("#labelHora").css("display","none");
                    $("#guardarTodo").attr("disabled", false);
});

$("#guardarTodo").click(function(evt){
    if( $('#fecha').val() == ''){
        $("#labelFecha").css("display","block");
                    $("#guardarTodo").attr("disabled", true);
    }
    else if($('#hora').val() == ''){
        $("#labelHora").css("display","block");
                    $("#guardarTodo").attr("disabled", true);
    }
    else{
        alertify.confirm("¿Desea guardar el resultado de la jornada?",
            function(){
    const isOnClick = evt.target.getAttribute('onclick');
    // console.log('isOnClick :', isOnClick);
    if(isOnClick) return;   //si hay evento para clasificatoria
    
    var idTorneo = $('#idTo').val();
    var equipo1 = $('#equipo1').val();
    var equipo2 = $('#equipo2').val();
    var goles1  = $('#goles1').val();
    var goles2  = $('#goles2').val();
    var hora    = $('#hora').val();
    var fecha   = $('#fecha').val();
    var partido = $('#idPartido').val();
    var vuelta  = $('#vuelta').val();
    var jornada = $('#jornada').val();

         
        
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
                    jornada : jornada,
                    vuelta : vuelta,
                },
                success: function(r) {
                    if(r == 111) {
                        $('#modalResultados').modal('hide');
                        swal({
                            title: 'Listo!',
                            text: 'Resultado guardado con éxito',
                            type: 'success',
                            showConfirmButton: true

                        }).then((result) => {
                            if (result.value) {
                               appE.guardarGoleador();
                             //  appE.guardarAmonestado();
                                $('#modalDetallesJornadasM').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                                .modal('show');
                                        appE.cargarDetallesJornadas($("#idTo").val());   
                            }
                        }); 
                        
                        
                    } 
                }
            });
        },
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            });
        }
});

function finalistas(element,etapa) {
    var idTorneo = $(element).attr('id');

    if(etapa) window.location = `?1=TorneosController&2=getPreviewClasificatoriaF&torneo=${idTorneo}&etapa=${etapa}`;
    else    window.location = '?1=TorneosController&2=getPreviewClasificatoriaF&torneo='+idTorneo;

}

const equipoWinner = (elem)=>{

    const id= $(elem).attr('id');
    $.ajax({
        type: 'POST',
        url: '?1=TorneosController&2=getClasificatoria',
        data: {idTorneo: id},
        success(data){
            data = JSON.parse(data);
            console.log('data :', data);
            let html='';
            html+=`<h3>Etapa: ${data[0].etapa}</h3>`;
            data.forEach((element,i) => {
                html += `
                <div class="field">
                    <strong>Partido: ${element.equipo1.nombre} vs ${element.equipo2.nombre}</strong> 
                    <a href='#' class='ui button' onclick="resultadoClasificatoria(event,{id:${element.equipo1.id}, nombre:'${element.equipo1.nombre}'},{id:${element.equipo2.id}, nombre:'${element.equipo2.nombre}'},'${element.hora}', '${element.fecha}',${element.idTorneo}, ${element.idClasificatoria})">Resultados</a>
                    `+
                    
                    // <label>Equipo ganador</label>
                    // <select class="ui fluid dropdown" name='equipoWinner${i+1}'>
                    //     <option value='${element.equipo1.id}'>${element.equipo1.nombre}</option>
                    //     <option value='${element.equipo2.id}'>${element.equipo2.nombre}</option>
                    // </select>
                `</div>
                <input type="hidden" name='clasificatoria${i+1}' value='${element.idClasificatoria}'>
                
                <br>
                <div class='ui divider'></div>`;
            });

            $('#equipoWinner .content').html(html);
            $('select.dropdown').dropdown();
            
            $('#equipoWinner').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');

        }
    });    
};

function guardarGanadores() {
    $('#equipoWinner').modal('hide');
}

function resultadoClasificatoria(evt,equipo1,equipo2, hora, fecha, idTorneo, idCategoria) {
    evt.preventDefault();
    appE.resultados(equipo1.nombre,equipo2.nombre,null, null, hora,fecha,null,idTorneo);
    $("#nombreTor").attr('hidden',true);
    $("#jornada").attr('hidden',true);
    $("#vuelta").attr('hidden',true);
    $('#contTipoGane').removeClass('hide');

    $('#guardarTodo').attr('onclick','guardarWinner(event)');
    clasifiId=idCategoria;
    equipo1Id=equipo1.id;
    equipo2Id=equipo2.id;
}

function guardarWinner(evt) {
    if( $('#fecha').val() == ''){
        $("#labelFecha").css("display","block");
                    $("#guardarTodo").attr("disabled", true);
    }
    else if($('#hora').val() == ''){
        $("#labelHora").css("display","block");
                    $("#guardarTodo").attr("disabled", true);
    }
    else{
        alertify.confirm("¿Desea guardar el resultado?",
            function(){
    
    var idTorneo = $('#idTo').val();
    var equipo1 = $('#equipo1').val();
    var equipo2 = $('#equipo2').val();
    var goles1  = $('#goles1').val();
    var goles2  = $('#goles2').val();
    var hora    = $('#hora').val();
    var fecha   = $('#fecha').val();
    var partido = $('#idPartido').val();
    var vuelta  = $('#vuelta').val();
    var jornada = $('#jornada').val();
    var tipoGane = $('#tipoGane').val();

    
    $.ajax({
        type: 'POST',
        url: '?1=TorneosController&2=guardarResultado&clasifi=true',
        data: {
            idTorneo: idTorneo,
            equipo1 : equipo1,
            equipo1Id:equipo1Id,
            equipo2 : equipo2,
            equipo2Id:equipo2Id,
            goles2  : goles2,
            goles1  : goles1,
            hora    : hora,
            fecha   : fecha,
            partido : partido,
            jornada : jornada,
            vuelta  : vuelta,
            clasifiId:clasifiId,
            tipoGane:tipoGane
        },
        success(data){
            swal({
                title: 'Listo!',
                text: 'Guardado con éxito',
                type: 'success',
                showConfirmButton: true
            }).then((result) => {
                            if (result.value) {
                                appE.guardarGoleador();
                              //  appE.guardarAmonestado();
                                $('#dtTorneosF').DataTable().ajax.reload();
                               $('#modalResultados').modal('hide');
                            }
                        }); 
        }
    });
},
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            });
}
}

</script>