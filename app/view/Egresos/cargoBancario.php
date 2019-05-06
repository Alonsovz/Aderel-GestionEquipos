<br><div id="app">


<modal-registrar id_form="frmRegistrar" id="modalRegistrar" url="?1=RemesasController&2=registrarCargo" titulo="Registrar Cargo Bancario"
        :campos="campos_registro" tamanio='tiny'></modal-registrar>
    
    <modal-editar id_form="frmEditar" id="modalEditar" url="?1=RemesasController&2=editarCargo" titulo="Editar cargo bancario"
        :campos="campos_editar" tamanio='tiny'></modal-editar>

    


<div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="money bill alternate icon"></i>
                    Cargo bancario a cuentas ADEREL<font color="#DFD102" size="20px">.</font>
                    <a href="?1=EgresosController&2=chequeras" class="ui left floated violet button">
                            <i class="id card icon"></i><i class="dollar icon"></i> Ver Cuentas
                        </a>

                        <a href="?1=RemesasController&2=remesas" class="ui left floated purple button">
                        <i class="dollar icon"></i><i class="share icon"></i> Remesar
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
                <table id="dtCargos" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        <th style="background-color: #2ECCFA;">ID</th>
                            <th style="background-color: #1CC647; color:white;">Concepto</th>
                            <th style="background-color: #1CC647; color:white;">Monto</th>
                            <th style="background-color: #1CC647; color:white;">Fecha</th>
                            <th style="background-color: #1CC647; color:white;">Chequera</th>
                            <th style="background-color: #1CC647; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<div id="eliminarCargo" class="ui tiny modal">
<div class="header">
                    Eliminar Cargo Bancario
                </div>
                <div class="content">
                    <h4>¿Desea eliminar el cargo bancario?</h4>
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
                    <button class="ui right red button" id="btnEliminarC">
                        Eliminar
                    </button>
                </div>

</div>

</div>

<script src="./res/tablas/tablaCargos.js"></script>
<script src="./res/js/modalRegistrarCargo.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>

<script>
var app = new Vue({
        el: "#app",
        data: {
            campos_registro: [
                {
                    label: 'Concepto del cargo:',
                    name: 'conceptoRe',
                    type: 'text'
                }
                ,
                {
                    label: 'Chequera:',
                    name: 'selectChequera',
                    type: 'select',
                    options: <?php echo $chequeras;?>
                },
                {
                    label: 'Monto de cargo $$:',
                    name: 'monto',
                    type: 'text'
                }
                
            ],
            campos_editar: [
                {
                    label: 'Concepto del cargo:',
                    name: 'conceptoRe',
                    type: 'text'
                }
                ,
                {
                    label: 'Chequera:',
                    name: 'selectChequera',
                    type: 'select',
                    options: <?php echo $chequeras;?>
                },
                {
                    label: 'Monto de cargo $$:',
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
                tablaCargos.ajax.reload();
            },
            modalRegistrar() {
                $('#modalRegistrar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatos() {
                var id = $("#idDetalle").val();

                fetch("?1=EgresosController&2=cargarDatosCargos&id=" + id)
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
});
var eliminar=(ele)=>{
            $('#eliminarCargo').modal('setting', 'closable', false).modal('show');
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


        $("#btnEliminarC").click(function(){
            var  idEliminar = $('#idEliminar').val();
              var  montoE = $('#montoE').val();
              var  idCheque = $('#idCheque').val();

         
            
            
            $.ajax({
                    type: 'POST',
                    url: '?1=RemesasController&2=eliminarCargo',
					data: {
                        idEliminar: idEliminar,
                        montoE: montoE,
                        idCheque: idCheque,
    
                    },
                    success: function(r) {
                                    if(r == 1) {
                                        $('#eliminarCargo').modal('hide');
                                        swal({
                                            title: 'Cargo bancario eliminado',
                                            text: 'Se actualizó el monto de la cuenta',
                                            type: 'success',
                                            showConfirmButton: false,
                                             timer: 1700

                                        }).then((result) => {
                                            if (result.value) {
                                                location.href = '?';
                                            }
                                        }); 
                                        $('#dtCargos').DataTable().ajax.reload();
                                        //limpiar();
                                    } 
                                }
            });
        });
</script>