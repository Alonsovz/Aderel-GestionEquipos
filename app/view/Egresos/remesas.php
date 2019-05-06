<br><div id="app">


<modal-registrar id_form="frmRegistrar" id="modalRegistrar" url="?1=RemesasController&2=registrarRemesa" titulo="Registrar remesa"
        :campos="campos_registro" tamanio='tiny'></modal-registrar>
    
    <modal-editar id_form="frmEditar" id="modalEditar" url="?1=EgresosController&2=editarChequera" titulo="Editar chequera"
        :campos="campos_editar" tamanio='tiny'></modal-editar>

   


<div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="money bill alternate icon"></i>
                    Remesas a cuentas ADEREL<font color="#DFD102" size="20px">.</font>
                    <a href="?1=EgresosController&2=chequeras" class="ui left floated violet button">
                            <i class="id card icon"></i><i class="dollar icon"></i> Ver Cuentas
                        </a>

                        <a href="?1=RemesasController&2=cargoBancario" class="ui left floated green button">
                            <i class="building icon"></i><i class="dollar icon"></i> Cargos bancarios
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
                <table id="dtRemesas" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    
                <thead>
                        <tr>
                        <th style="background-color: #2ECCFA;">ID</th>
                            <th style="background-color: #CD2020; color:white;">Concepto</th>
                            <th style="background-color: #CD2020; color:white;">Monto</th>
                            <th style="background-color: #CD2020; color:white;">Fecha</th>
                            <th style="background-color: #CD2020; color:white;">Chequera</th>
                            <th style="background-color: #CD2020; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="eliminarRemesa" class="ui tiny modal">
<div class="header">
                    Eliminar Remesa
                </div>
                <div class="content">
                    <h4>¿Desea eliminar la remesa?</h4>
                    <form action="" class="ui equal width form">
                        <div class="fields">
                            <input type="hidden" name="idEliminar" id="idEliminar">
                            <input type="hidden" name="montoE" id="montoE">
                            <input type="hidden" name="idCheque" id="idCheque">
                        </div>
                    </form>        
                </div>
                <div class="actions">
                    <button class="ui black deny button">
                        Cancelar
                    </button>
                    <button class="ui right red button" id="btnEliminarR">
                        Eliminar
                    </button>
                </div>

</div>

</div>

<script src="./res/tablas/tablaRemesas.js"></script>
<script src="./res/js/modalRegistrarRemesa.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>

<script>
var app = new Vue({
        el: "#app",
        data: {
            campos_registro: [{
                    label: 'Concepto de la remesa:',
                    name: 'conceptoRe',
                    type: 'text'
                }
                ,
                {
                    label: 'Chequera a remesar:',
                    name: 'selectChequera',
                    type: 'select',
                    options: <?php echo $chequeras;?>
                },
                {
                    label: 'Monto a remesar:',
                    name: 'monto',
                    type: 'text'
                }
                
            ],
            campos_editar: [
                {
                    label: 'Concepto de la remesa:',
                    name: 'conceptoRe',
                    type: 'text'
                }
                ,
                {
                    label: 'Chequera a remesar:',
                    name: 'selectChequera',
                    type: 'select',
                    options: <?php echo $chequeras;?>
                },
                {
                    label: 'Monto a remesar:',
                    name: 'monto',
                    type: 'text'
                },
                {
                    name: 'idDetalle',
                    type: 'hidden'
                }

            ]
        },
        methods: {
            refrescarTabla() {
                tablaRemesas.ajax.reload();
            },
            modalRegistrar() {
                $('#modalRegistrar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatos() {
                var id = $("#idDetalle").val();

                fetch("?1=EgresosController&2=cargarDatosRemesas&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        
                        $('#frmEditar input[name="conceptoRe"]').val(dat.concepto);
                        $('#frmEditar input[name="monto"]').val(dat.monto);
                        $('#frmEditar select[name="selectChequera"]').dropdown('set selected', dat.idChequera);
                        
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        }
    });

  
</script>

<script>
$(document).ready(function(){
    $("#frmRegistrar input[name='monto']").mask("###0.00", {reverse: true});
    $('#frmEditar input[name="monto"]').mask("###0.00", {reverse: true});
   // $("#frmRegistrar input[name='selectChequera']").addClass("ui search dropdown");
});
var eliminar=(ele)=>{
            $('#eliminarRemesa').modal('setting', 'closable', false).modal('show');
            $('#idEliminar').val($(ele).attr("id"));
            $('#montoE').val($(ele).attr("monto"));
            $('#idCheque').val($(ele).attr("idChequera"));
        }

        var editar=(ele)=>{
            $('#modalEditar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idDetalle').val($(ele).attr("id"));

            //alert($(ele).attr("id"));
        
            app.cargarDatos();
        }


        $("#btnEliminarR").click(function(){
            var  idEliminar = $('#idEliminar').val();
              var  montoE = $('#montoE').val();
              var  idCheque = $('#idCheque').val();

         
            
            
            $.ajax({
                    type: 'POST',
                    url: '?1=RemesasController&2=eliminarRemesa',
					data: {
                        idEliminar: idEliminar,
                        montoE: montoE,
                        idCheque: idCheque,
    
                    },
                    success: function(r) {
                                    if(r == 1) {
                                        $('#eliminarRemesa').modal('hide');
                                        swal({
                                            title: 'Remesa eliminada',
                                            text: 'Se actualizó el monto de la cuenta',
                                            type: 'success',
                                            showConfirmButton: false,
                                             timer: 1700

                                        }).then((result) => {
                                            if (result.value) {
                                                location.href = '?';
                                            }
                                        }); 
                                        $('#dtRemesas').DataTable().ajax.reload();
                                        //limpiar();
                                    } 
                                }
            });
        });

</script>