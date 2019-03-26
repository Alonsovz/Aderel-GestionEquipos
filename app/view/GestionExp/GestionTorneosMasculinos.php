

<br><div id="appT">

<modal-registrar id_form="frmRegistrarT" id="modalRegistrarT" url="?1=TorneosController&2=registrarM" titulo="Registrar Torneo"
:campos="campos_registroT" tamanio='tiny' ></modal-registrar>


<modal-editar id_form="frmEditarT" id="modalEditarT" url="?1=TorneosController&2=editarM" titulo="Editar Torneo"
:campos="campos_editarT" tamanio='tiny'></modal-editar>

<modal-eliminar id_form="frmEliminarT" id="modalEliminarT" url="?1=TorneosController&2=eliminarM" titulo="Eliminar Torneo"
sub_titulo="¿Está seguro de querer eliminar este torneo?" :campos="campos_eliminarT" tamanio='tiny'></modal-eliminar>

<modal-detalles :detalles="detalles"></modal-detalles>

    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <i class="trophy icon"></i> <i class="futbol icon"></i>
                        Torneos Masculinos<font color="#1CC647" size="20px">.</font>
                    

                        <button class="ui red button" >
                            <a href="?1=CategoriaController&2=gestionM" style="color:white;">
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
                            <i class="male icon"></i><i class="futbol icon"></i>
                            Jugadores
                            </a>
                            </button>
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

     
</div>

<div class="ui modal" id="sorteos">
<div class="header">
<i class="female icon"></i><i class="futbol icon"></i> Realizar sorteo <a id="name"></a>
</div>
<div class="content">
<form method="post" action="?1=TorneosController&2=sorteo">

    <input type="hidden" id="disponibles" name="disponibles">
    <input type="hidden" id="idTor" name="idTor">
    <label>Vueltas</label>
    <select class="ui dropdown" name='vueltas'>
        <option value="" selected disabled>Seleccionar</option>
        <option value="1">1</option>
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


<script src="./res/tablas/tablaTorneosM.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>
<script src="./res/js/modalDetallesE.js"></script>
<script>
var appE = new Vue({
        el: "#appT",
        data: {
            detalles: [],
            
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
            cerrarModal() {
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

            
            
           
            

        }
    });
</script>
<script>
var eliminarTorneo=(ele)=>{
  $('#modalEliminarT').modal('setting', 'closable', false).modal('show');
  $('#idEliminar').val($(ele).attr("id"));
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


function cerrar(){
    $('#sorteos').modal('hide');
}
</script>