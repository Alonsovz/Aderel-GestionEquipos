
<br><div id="appE">
<modal-registrar id_form="frmRegistrarE" id="modalRegistrarE" url="?1=EquipoController&2=registrarF" titulo="Registrar Equipo"
:campos="campos_registroE" tamanio='tiny' ></modal-registrar>


<modal-editar id_form="frmEditarE" id="modalEditarE" url="?1=EquipoController&2=editarF" titulo="Editar Equipo"
:campos="campos_editarE" tamanio='tiny'></modal-editar>

<modal-eliminar id_form="frmEliminarE" id="modalEliminarE" url="?1=EquipoController&2=eliminarF" titulo="Eliminar Equipo"
sub_titulo="¿Está seguro de querer eliminar este equipo?" :campos="campos_eliminarE" tamanio='tiny'></modal-eliminar>

<modal-eliminar id_form="frmFondoComun" id="modalFondo" url="?1=EquipoController&2=fondoComunF" titulo="Enviar a Fondo Común"
sub_titulo="¿Está seguro de enviar este equipo a fondo común?" :campos="camposFondoComun" tamanio='tiny'></modal-eliminar>

<div class="ui grid">
    
            <div class="row">
                 <div class="titulo">
                    <i class="Female icon"></i>Equipos Femeninos<font color="#86B404" size="20px">.</font>
                            
                            <button class="ui pink button">
                            <a href="?1=CategoriaController&2=gestionF"  style="color:white;">
                                <i class="chart bar outline icon"></i>
                            Categorías de Torneo
                            </a>
                            </button>

                            <button class="ui purple button">
                            <a href="?1=TorneosController&2=gestionF"  style="color:white;">
                            <i class="trophy icon"></i>
                            Torneos
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
                    

                        <button class="ui right floated olive labeled icon button" @click="modalRegistrarE" id="btnModalRegistroEquipo">
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
                            <table id="dtEquiposF" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #0174DF;">N°</th>
                                        <th style="background-color: #86B404; color:white;">Nombre del  Equipo</th>
                                        <th style="background-color: #86B404; color:white;">Encargado del Equipo</th>
                                        <th style="background-color: #86B404; color:white;">Encargado Aux del Equipo</th>
                                        <th style="background-color: #86B404; color:white;">Categoría del Equipo</th>
                                        <th style="background-color: #86B404; color:white;">Estado en torneo</th>
                                        <th style="background-color: #86B404; color:white;">Torneo </th>
                                        <th style="background-color: #86B404; color:white;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
            
 </div>
</div>
<div class="ui tiny modal" id="modalInscribirE">

<div class="header">
<i class="trophy icon"></i><i class="futbol icon"></i> Inscribir Equipo
</div>
<div class="content" class="ui equal width form">
    <form class="ui form" id="frmInscribirE"> 
        <div class="field">
            <div class="fields">
            <div class="eight wide field">
            <label><i class="users icon"></i>Nombre del equipo</label>
            <input type="text" name="nombreEquipo" id="nombreEquipo" readonly>
            </div>

            <div class="eight wide field">
            <label><i class="chart bar outline icon"></i>Categoría del equipo</label>
            <input type="text" name="categoria"  id="categoria" readonly>
            </div>
            </div>
        </div>
        
        <div class="field">
            <div class="fields">
                <div class="eight wide field">
                <label><i class="trophy icon"></i>Torneos disponibles</label>
                <select name="torneoIns" id="torneoIns" class="ui  dropdown" style="">
                        </select>
                        <input type="hidden" name="idE"  id="idE">   
                </div>
            </div>
        </div>
    </form>
</div>
    <div class="actions">
        <button onclick="cerrar()" class="ui yellow button">
            Cancelar
        </button>
        <button class="ui blue button" id="btnInscribirE" >
        Guardar
        </button>
    </div>
</div>


<script src="./res/tablas/tablaEquiposF.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>
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
                    label: 'Encargada del Equipo:',
                    name: 'encargado',
                    type: 'text'
                },
                {
                    label: 'Encargada Aux del Equipo:',
                    name: 'encargadoAux',
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
                    label: 'Encargada del Equipo',
                    name: 'encargado',
                    type: 'text'
                },
                {
                    label: 'Encargada Aux del Equipo:',
                    name: 'encargadoAux',
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
            camposFondoComun: [{
                name: 'idEliminar',
                type: 'hidden'
            }],
            campos_eliminarE: [{
                name: 'idEliminar',
                type: 'hidden'
            }]
        },
        methods: {
            refrescarTabla() {
                tablaEquiposF.ajax.reload();  
            },
            modalRegistrarE() {
                $('#modalRegistrarE').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatosE() {
                var id = $("#idDetalleE").val();

                fetch("?1=EquipoController&2=cargarDatosEquipoF&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmEditarE input[name="nombre"]').val(dat.nombre);
                        $('#frmEditarE input[name="encargado"]').val(dat.encargado);
                        $('#frmEditarE input[name="encargadoAux"]').val(dat.encargadoAux);
                        $('#frmEditarE select[name="selectCategoria"]').dropdown('set selected', dat.idCategoria);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },

            cargarDatosT() {
                var id = $("#idDetalleE").val();

                fetch("?1=EquipoController&2=cargarEquiposInsF&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmInscribirE input[name="nombreEquipo"]').val(dat.nombre);
                        $('#frmInscribirE input[name="categoria"]').val(dat.categorias);
                        $('#frmInscribirE input[name="IdCategoria"]').val(dat.id);
                        $('#frmInscribirE input[name="idE"]').val(dat.idEquipo);
                        //$('#frmInscribir select[name="selectCategoria"]').dropdown('set selected', dat.idCategoria);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
           
            
           
            

        }
    });
</script>
<script>
var eliminarEquipo=(ele)=>{
  $('#modalEliminarE').modal('setting', 'closable', false).modal('show');
 $('#idEliminar').val($(ele).attr("id"));
}

var enviarFondo=(ele)=>{
  $('#modalFondo').modal('setting', 'closable', false).modal('show');
  $('#idEliminar').val($(ele).attr("id"));
}


var editarEquipo=(ele)=>{
            $('#modalEditarE').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idDetalleE').val($(ele).attr("id"));
            appE.cargarDatosE();
        }

var inscribirEquipo=(ele)=>{
           $('#modalInscribirE').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
           $('#idDetalleE').val($(ele).attr("id"));
           appE.cargarDatosT();
        }


    function cerrar(){
        $('#modalInscribirE').modal('hide');
    }
     


    


        $(function() {
        

            var option = '';
            var torneo = '<?php echo $torneos?>';

            $.each(JSON.parse(torneo), function() {
                option = `<option value="${this.idTorneo}">${this.nombreTorneo} </option>`;

                $('#torneoIns').append(option);
            });


            $('#btnInscribirE').click(function() {
               var idEquipo = $('#idE').val();
               var idT = $('#torneoIns').val();
         
        
            $.ajax({
                type: 'POST',
                url: '?1=EquipoController&2=inscribirEquipoF',
                data: {
                    idEquipo : idEquipo,
                    idT : idT,
                },
                success: function(r) {
                    if(r == 11) {
                        $('#modalInscribirE').modal('hide');
                        swal({
                            title: 'Listo!',
                            text: 'Equipo inscrito con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtEquiposF').DataTable().ajax.reload();
                        
                    } 
                }
            });
            });

            
            

            
        });


</script>
