<div id="appC">
    <modal-registrar id_form="frmRegistrarC" id="modalRegistrarC" url="?1=CategoriaController&2=registrarCF" titulo="Registrar Categoría"
        :campos="campos_registroCF" tamanio='mini' style="overflow: scroll;"></modal-registrar>

<modal-editar id_form="frmEditarC" id="modalEditarC" url="?1=CategoriaController&2=editarF" titulo="Editar Categoria"
:campos="campos_editarC" tamanio='tiny'></modal-editar>

<modal-eliminar id_form="frmEliminarC" id="modalEliminarC" url="?1=CategoriaController&2=eliminarF" titulo="Eliminar Categoria"
sub_titulo="¿Está seguro de querer eliminar esta categoria?" :campos="campos_eliminarC" tamanio='tiny'></modal-eliminar>

<div class="ui grid">
        <div class="row">
                    <div class="titulo">
                            <i class="team icon"></i>
                            <i class="chart bar outline icon"></i>
                            <i class="female icon"></i>  Categorías Femeninas<font color="#DF01A5" size="20px">.</font>
                        
                      
                    </div>
        </div>
                    <div class="row title-bar">
                            <div class="sixteen wide column">
                                <button class="ui right floated pink labeled icon button" @click="modalRegistrarC" id="btnModalRegistroCategoria">
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
                            <table id="dtCategoriasF" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #purple; color: white;">N°</th>
                                        <th style="background-color: #DF01A5; color: white;">Nombre de la Categoria</th>
                                        <th style="background-color: #DF01A5; color: white;">Edad Mínima</th>
                                        <th style="background-color: #DF01A5; color: white;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>

        </div>
</div>

</div>
<script src="./res/tablas/tablaCategoriasF.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>
<script>
var appC = new Vue({
        el: "#appC",
        data: {
            campos_registroCF: [
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
            refrescarTabla() {

                tablaCategoriasF.ajax.reload();

                
            },
            modalRegistrarC() {
                $('#modalRegistrarC').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatosC() {
                var id = $("#idDetalleC").val();

                fetch("?1=CategoriaController&2=cargarDatosCategoriaF&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmEditarC input[name="nombreCategoria"]').val(dat.nombreCategoria);
                       $('#frmEditarC input[name="edadMinima"]').val(dat.edadMinima);
                      //  $('#frmEditarC input[name="edadMaxima"]').val(dat.edadMaxima);
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

</script>