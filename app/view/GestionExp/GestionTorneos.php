

<div id="appT">

<modal-registrar id_form="frmRegistrarT" id="modalRegistrarT" url="?1=TorneosController&2=registrar" titulo="Registrar Torneo"
:campos="campos_registroT" tamanio='tiny' ></modal-registrar>


<modal-editar id_form="frmEditarT" id="modalEditarT" url="?1=TorneosController&2=editar" titulo="Editar Torneo"
:campos="campos_editarT" tamanio='tiny'></modal-editar>

<modal-eliminar id_form="frmEliminarT" id="modalEliminarT" url="?1=TorneosController&2=eliminar" titulo="Eliminar Torneo"
sub_titulo="¿Está seguro de querer eliminar este torneo?" :campos="campos_eliminarT" tamanio='tiny'></modal-eliminar>


    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <i class="trophy icon"></i> <i class="futbol icon"></i>
                        Gestión de Torneos<font color="#DFD102" size="20px">.</font>
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
                            <table id="dtTorneos" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #FACC2E; color:white;">N°</th>
                                        <th style="background-color: #1CC647; color:white;">Nombre del Torneo</th>
                                        <th style="background-color: #1CC647; color:white;">Máximo de Equipos</th>
                                        <th style="background-color: #1CC647; color:white;">Cupos Disponibles</th>
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
<script src="./res/tablas/tablaTorneos.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>

<script>
var appE = new Vue({
        el: "#appT",
        data: {
           
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
            refrescarTabla() {
                tablaTorneos.ajax.reload();  
            },
            modalRegistrarT() {
                $('#modalRegistrarT').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatosE() {
                var id = $("#idDetalleE").val();

                fetch("?1=TorneosController&2=cargarDatosTorneo&id=" + id)
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
</script>