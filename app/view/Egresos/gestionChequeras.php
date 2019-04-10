<br><div id="app">


<modal-registrar id_form="frmRegistrar" id="modalRegistrar" url="?1=EgresosController&2=registrarChequera" titulo="Registrar chequera"
        :campos="campos_registro" tamanio='tiny'></modal-registrar>
    
    <modal-editar id_form="frmEditar" id="modalEditar" url="?1=EgresosController&2=editarChequera" titulo="Editar chequera"
        :campos="campos_editar" tamanio='tiny'></modal-editar>

    <modal-eliminar id_form="frmEliminar" id="modalEliminar" url="?1=EgresosController&2=eliminarChequera" titulo="Eliminar chequera"
        sub_titulo="¿Está seguro de querer eliminar la chequera?" :campos="campos_eliminar" tamanio='tiny'></modal-eliminar>


<div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="money bill alternate icon"></i>
                    Gestion de chequeras ADEREL<font color="#DFD102" size="20px">.</font>
                    <a href="?1=IngresosController&2=nuevoIngreso" class="ui left floated red button">
                            <i class="hand left point icon"></i> Volver
                        </a>
                </div> 
        </div>
        <div class="row title-bar">
        <div class="sixteen wide column">
        <br>
                <button class="ui right floated blue labeled icon button"  @click="modalRegistrar">
                    <i class="plus icon"></i>
                    Agregar
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
                <table id="dtChequeras" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        <th style="background-color: #2ECCFA;">ID</th>
                            <th style="background-color: #2ECCFA;">Chequera</th>
                            <th style="background-color: #2ECCFA;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script src="./res/tablas/tablaChequeras.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>

<script>
var app = new Vue({
        el: "#app",
        data: {
            campos_registro: [{
                    label: 'Nombre de la chequera:',
                    name: 'chequera',
                    type: 'text'
                }
                
            ],
            campos_editar: [
                {
                    label: 'Nombre de la chequera:',
                    name: 'chequera',
                    type: 'text'
                },
                {
                    name: 'idDetalle',
                    type: 'hidden'
                }

            ],
            campos_eliminar: [{
                name: 'idEliminar',
                type: 'hidden'
            }]
        },
        methods: {
            refrescarTabla() {
                tablaChequeras.ajax.reload();
            },
            modalRegistrar() {
                $('#modalRegistrar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatos() {
                var id = $("#idDetalle").val();

                fetch("?1=EgresosController&2=cargarDatosChequeras&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        
                        $('#frmEditar input[name="chequera"]').val(dat.chequera);
                        
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        }
    });

  
</script>

<script>

$(document).on("click", ".btnEliminar", function () {
            $('#modalEliminar').modal('setting', 'closable', false).modal('show');
            $('#idEliminar').val($(this).attr("id"));
        });

        var editar=(ele)=>{
            $('#modalEditar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idDetalle').val($(ele).attr("id"));

            //alert($(ele).attr("id"));
        
            app.cargarDatos();
        }
</script>