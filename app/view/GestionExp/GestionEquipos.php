<script>
    console.log(<?php echo $categoriasCMB;?>)


</script>
<div id="appE">
<modal-registrar id_form="frmRegistrarE" id="modalRegistrarE" url="?1=EquipoController&2=registrar" titulo="Registrar Equipo"
:campos="campos_registroE" tamanio='tiny' ></modal-registrar>


<modal-editar id_form="frmEditarE" id="modalEditarE" url="?1=EquipoController&2=editar" titulo="Editar Equipo"
:campos="campos_editarE" tamanio='tiny'></modal-editar>

<modal-eliminar id_form="frmEliminarE" id="modalEliminarE" url="?1=EquipoController&2=eliminar" titulo="Eliminar Equipo"
sub_titulo="¿Está seguro de querer eliminar esta equipo?" :campos="campos_eliminarE" tamanio='tiny'></modal-eliminar>

<div class="ui grid">
    
            <div class="row">
                 <div class="titulo">
                    <i class="team icon"></i>
                    Equipos<font color="#DFD102" size="20px">.</font>
                    </div>
            </div>

                 <div class="row title-bar">
                    <div class="sixteen wide column">
                    

                        <button class="ui right floated blue labeled icon button" @click="modalRegistrarE" id="btnModalRegistroEquipo">
                            <i class="plus icon"></i>
                            Agregar Equipo
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
                            <table id="dtEquipos" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #0174DF;">N°</th>
                                        <th style="background-color: #217CD1; color:white;">Nombre del  Equipo</th>
                                        <th style="background-color: #217CD1; color:white;">Encargado del Equipo</th>
                                        <th style="background-color: #217CD1; color:white;">Categoría del Equipo</th>
                                        <th style="background-color: #217CD1; color:white;">Estado</th>
                                        <th style="background-color: #217CD1; color:white;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
            
 </div>
</div>



<script src="./res/tablas/tablaEquipos.js"></script>

<script>
var appE = new Vue({
        el: "#appE",
        data: {
           
            campos_registroE: [{
                    label: 'Nombre del Equipo',
                    name: 'nombreEquipo',
                    type: 'text'
                },
                {
                    label: 'Encargado del Equipo:',
                    name: 'encargado',
                    type: 'text'
                },
                {
                    label: 'Categoría del Equipo:',
                    name: 'selectCategoria',
                    type: 'select',
                    options: <?php echo $categoriasCMB;?>
                }
               
                
            ],
            campos_editarE: [
                {
                    label: 'Nombre del Equipo',
                    name: 'nombre',
                    type: 'text'
                },
                {
                    label: 'Encargado del Equipo',
                    name: 'encargado',
                    type: 'text'
                },
                {
                    label: 'Categoría del Equipo:',
                    name: 'selectCategoria',
                    type: 'select',
                    options: <?php echo $categoriasCMB;?>,
                },
                {
                    name: 'idDetalleE',
                    type: 'hidden'
                }

            ],
            
           
            campos_eliminarE: [{
                name: 'idEliminar',
                type: 'hidden'
            }]
        },
        methods: {
            refrescarTabla() {
                tablaEquipos.ajax.reload();  
            },
            modalRegistrarE() {
                $('#modalRegistrarE').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatosE() {
                var id = $("#idDetalleE").val();

                fetch("?1=EquipoController&2=cargarDatosEquipo&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmEditarE input[name="nombre"]').val(dat.nombre);
                        $('#frmEditarE input[name="encargado"]').val(dat.encargado);
                        $('#frmEditarE select[name="selectCategoria"]').dropdown('set selected', dat.idCategoria);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            
           
            

        }
    });
</script>
<script>
var eliminarEquipo=(ele)=>{
  $('#modalEliminarE').modal('setting', 'closable', false).modal('show');
  $('#idEliminar').val($(ele).attr("id"));
}


var editarEquipo=(ele)=>{
            $('#modalEditarE').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idDetalleE').val($(ele).attr("id"));
            appE.cargarDatosE();
        }
</script>
