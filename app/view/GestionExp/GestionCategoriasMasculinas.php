<br><div id="appC">
    <modal-registrar id_form="frmRegistrarC" id="modalRegistrarC" url="?1=CategoriaController&2=registrarCM" titulo="Registrar Categoría"
        :campos="campos_registroC" tamanio='mini' style="overflow: scroll;"></modal-registrar>

<modal-editar id_form="frmEditarC" id="modalEditarC" url="?1=CategoriaController&2=editarM" titulo="Editar Categoria"
:campos="campos_editarC" tamanio='tiny'></modal-editar>

<modal-eliminar id_form="frmEliminarC" id="modalEliminarC" url="?1=CategoriaController&2=eliminarM" titulo="Eliminar Categoria"
sub_titulo="¿Está seguro de querer eliminar esta categoria?" :campos="campos_eliminarC" tamanio='tiny'></modal-eliminar>

<modal-detalles :detalles="detalles"></modal-detalles>

<div class="ui grid">
        <div class="row">
                    <div class="titulo">
                            <i class="team icon"></i>
                            <i class="chart bar outline icon"></i>
                            <i class="male icon"></i>  Categorías Masculinas<font color="red" size="20px">.</font>
                            
                      
                            <?php

if($_SESSION["descRol"] == 'Administrador') {

    ?>                           

                            <button class="ui green button">
                            <a href="?1=TorneosController&2=gestionM"  style="color:white;">
                            <i class="trophy icon"></i>
                            Torneos
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

                                <button class="ui purple button">
                            <a href="?1=TorneosController&2=gestionM"  style="color:white;">
                            <i class="trophy icon"></i>
                            Torneos
                            </a>
                            </button>

<?php } ?>
                      
                    </div>
        </div>
                    <div class="row title-bar">
                            <div class="sixteen wide column">
                                <button class="ui right floated red labeled icon button" @click="modalRegistrarC" id="btnModalRegistroCategoria">
                                    <i class="plus icon"></i>
                                    Agregar Categoría
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
                            <table id="dtCategoriasM" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #CD2020; color: white;">N°</th>
                                        <th style="background-color: #CD2020; color: white;">Nombre de la Categoria</th>
                                        <th style="background-color: #CD2020; color: white;">Edad Mínima</th>
                                        <th style="background-color: #CD2020; color: white;">Edad Máxima</th>
                                        <th style="background-color: #CD2020; color: white;">Carnets Gratis</th>
                                        <th style="background-color: #CD2020; color: white;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>

        </div>

<div class="ui  modal" id="modalTorneo">
<div class="header">
<i class="male icon"></i><i class="futbol icon"></i> Torneos de la Categoria
</div>
      <div class="content">
      <div class="row title-bar">
                            <div class="sixteen wide column">
                                <div class="ui divider"></div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="sixteen wide column">
                            <table id="dtTorneosCM" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #CD2020; color: white;">N°</th>
                                        <th style="background-color: #CD2020; color: white;">Nombre del Torneos</th>
                                        <th style="background-color: #CD2020; color: white;">Equipos permitidos</th>
                                        <th style="background-color: #CD2020; color: white;">Cupos Disponibles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
      </div>

      <div class="actions">
       <button onclick="cerrarModal()" class="ui yellow button">
            Cerrar
        </button>
      </div>
</div>

</div>



</div>
<script src="./res/tablas/tablaCategoriasM.js"></script>
<script src="./res/js/modalTorneosC.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>
<script>
function cerrarModal(){
    $('#modalTorneo').modal('hide');
}
var appC = new Vue({
        el: "#appC",
        data: {
            detalles: [],
            campos_registroC: [
                {
                    label: 'Nombre de la Categoria',
                    name: 'nombreCategoria',
                    type: 'text'
                },
                {
                    label: 'Edad Minima:',
                    name: 'edadMinima',
                    type: 'number'
                },
                {
                    label: 'Edad Máxima:',
                    name: 'edadMaxima',
                    type: 'number'
                },
                {
                    label: 'Carnet gratis:',
                    name: 'carnets',
                    type: 'number'
                }
                
            ],
            campos_editarC: [
                {
                    label: 'Nombre de la Categoria',
                    name: 'nombreCategoria',
                    type: 'text'
                },
                {
                    label: 'Edad Mínima:',
                    name: 'edadMinima',
                    type: 'number'
                },
                {
                    label: 'Edad Máxima:',
                    name: 'edadMaxima',
                    type: 'number'
                },
                {
                    label: 'Carnet gratis:',
                    name: 'carnets',
                    type: 'number'
                },
                {
                    name: 'idDetalleC',
                    type: 'hidden'
                }

            ],

            campos_eliminarC: [{
                name: 'idEliminar',
                type: 'hidden'
            }]
        },
        methods: {
            cargarDetalles(id) {

          this.idCategoria = parseInt(id);

        $('#frmDetalles').addClass('loading');
         $.ajax({
        type: 'POST',
        url: '?1=CategoriaController&2=mostrarTorneosCM',
         data: {
          id: id
         },
       success: function (data) {
        appC.detalles = JSON.parse(data);
        $('#frmDetalles').removeClass('loading');
         }
         });

         },
         cerrarModal() {
                this.detalles = [];
            },
            refrescarTabla() {

                tablaCategoriasM.ajax.reload();

                
            },
            modalRegistrarC() {
                $('#modalRegistrarC').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatosC() {
                var id = $("#idDetalleC").val();

                fetch("?1=CategoriaController&2=cargarDatosCategoriaM&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmEditarC input[name="nombreCategoria"]').val(dat.nombreCategoria);
                        $('#frmEditarC input[name="edadMinima"]').val(dat.edadMinima);
                        $('#frmEditarC input[name="edadMaxima"]').val(dat.edadMaxima);
                        $('#frmEditarC input[name="carnets"]').val(dat.carnetGratis);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
           
            

        }
    });
</script>

<script type="text/javascript">

var eliminarCategoria=(ele)=>{
  $('#modalEliminarC').modal('setting', 'closable', false).modal('show');
  $('#idEliminar').val($(ele).attr("id"));
}

// $(document).on("click", ".btnEditarC", function () {
// });
var editarCategoria=(ele)=>{
    $('#modalEditarC').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
     $('#idDetalleC').val($(ele).attr("id"));
    appC.cargarDatosC();

}
var verTorneosM=(ele)=>{
            $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
            appC.cargarDetalles($(ele).attr('id'));
}



    


</script>