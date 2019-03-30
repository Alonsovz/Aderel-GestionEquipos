
<br><div id="appE">
<modal-registrar id_form="frmRegistrarE" id="modalRegistrarE" url="?1=EquipoController&2=registrarF" titulo="Registrar Equipo"
:campos="campos_registroE" tamanio='tiny' ></modal-registrar>


<modal-editar id_form="frmEditarE" id="modalEditarE" url="?1=EquipoController&2=editarF" titulo="Editar Equipo"
:campos="campos_editarE" tamanio='tiny'></modal-editar>

<modal-eliminar id_form="frmEliminarE" id="modalEliminarE" url="?1=EquipoController&2=eliminarF" titulo="Eliminar Equipo"
sub_titulo="¿Está seguro de querer eliminar este equipo?" :campos="campos_eliminarE" tamanio='tiny'></modal-eliminar>

<modal-fondo id_form="frmFondoComun" id="modalFondo" url="?1=EquipoController&2=enviarFondo" titulo="Enviar a Fondo Común"
sub_titulo="¿Está seguro de enviar este equipo a fondo común?" :campos="camposFondoComun" tamanio='tiny'></modal-fondo>>

<modal-detalles :detalles="detalles"></modal-detalles>
<modal-jugador :detalles="detalles"></modal-jugador>
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
            <input type="hidden" name="idCat"  id="idCat" readonly>
            </div>
            </div>
        </div>
     
        <div class="field">
            <div class="fields">
                <div class="sixteen wide field">
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

<div class="ui longer fullscreen first coupled modal" id="modalCambios">
<div id="cargandoModal" class="ui inverted dimmer">
        <div class="ui big loader"></div>
</div>

<div class="header">
    Inscribir Jugadora
</div>
<div class="content">
<div style="margin-bottom: 0em !important; width: 100% !important;" class="ui tiny fluid horizontal divided list">

        <div class="item" style="font-size:20px;">
        <i class="users icon"></i>
            <div class="content" style="font-size:20px;">
               {{datosDetalle.nombre}}
            </div>
        </div>
        <div class="item" style="font-size:20px;">
        <i class="chart bar outline icon"></i>
            <div class="content" style="font-size:20px;">
            {{datosDetalle.Categoria}}
            </div>
        </div>
        <div class="item" style="font-size:20px;">
        <i class="user outline icon"></i>
            <div class="content" style="font-size:20px;">
          {{datosDetalle.encargado}}
          <input type="hidden" id="idEqui" >
          <input type="hidden" id="idTor" >
            </div>
        </div>
        <div class="item" style="font-size:20px;">
        <i class="chart bar outline icon"></i>
        <div class="content" style="font-size: 20px;">
        Edad Minima de la Categoria: 
            <a id="edadMinima"></a>
        </div>
        </div>
    </div>
    <div class="ui divider"></div>
                <div class="row">
                        <div class="sixteen wide column">
                            <table id="dtInscriF" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #DF01A5; color:white;">N°</th>
                                        <th style="background-color: #DF01A5; color:white;" ></th>
                                        <th style="background-color: #DF01A5; color:white;">Cod. Expediente</th>
                                        <th style="background-color: #DF01A5; color:white;">Nombre</th>
                                        <th style="background-color: #DF01A5; color:white;">Apellido</th>
                                        <th style="background-color: #DF01A5; color:white;">DUI/Carnet Minoridad</th>
                                        <th style="background-color: #DF01A5; color:white;">Fecha de Nacimiento</th>
                                        <th style="background-color: #DF01A5; color:white;">Edad del Jugador</th>                
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
</div>
<div class="actions">
    <button @click="cerrar()" class="ui black button">
        Listo
    </button>
    
</div>
</div>



</div>

<script src="./res/js/modalDetallesEqui.js"></script>
<script src="./res/tablas/tablaEquiposF.js"></script>
<script src="./res/tablas/tablaInscripcionF.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>
<script src="./res/js/modalVerJugador.js"></script>
<script src="./res/js/modalFondoComun.js"></script>
<script>


var appE = new Vue({
        el: "#appE",
        data: {
            detalles: [],
            datosDetalle: {
                nombre: '',
                Categoria: '',
                encargado: '',
            },
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
                    label: 'Teléfono Encargada:',
                    name: 'telefonoE',
                    type: 'text'
                },
                {
                    label: 'Encargada Aux del Equipo:',
                    name: 'encargadoAux',
                    type: 'text'
                },
                {
                    label: 'Teléfono Aux del Equipo:',
                    name: 'telefonoAux',
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
                label: 'Encargada del Equipo:',
                    name: 'encargado',
                    type: 'text'
                },
                {
                    label: 'Teléfono Encargada:',
                    name: 'telefonoE',
                    type: 'text'
                },
                {
                    label: 'Encargada Aux del Equipo:',
                    name: 'encargadoAux',
                    type: 'text'
                },
                {
                    label: 'Teléfono Aux del Equipo:',
                    name: 'telefonoAux',
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
            cargarDetalles(id, categoria) {

            this.idEquipo = parseInt(id);
            this.categoria = categoria;

            $('#frmDetalles').addClass('loading');
            $.ajax({
            type: 'POST',
            url: '?1=EquipoController&2=mostrarJugadoresInsM',
            data: {
            id: id
            },
            success: function (data) {
            appE.detalles = JSON.parse(data);
            $('#frmDetalles').removeClass('loading');
            }
            });

            },
            verDetalle(id){
                this.idJugador = parseInt(id);

            $('#frmDetalles').addClass('loading');
            $.ajax({
            type: 'POST',
            url: '?1=JugadoresController&2=verDetalles',
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
                $('#modalCambios').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
            },
            cerrarModalD() {
                this.detalles = [];

                $('#modalCambios').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
            },
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
                        $('#frmEditarE input[name="telefonoE"]').val(dat.telefonoE);
                        $('#frmEditarE input[name="telefonoAux"]').val(dat.telefonoAux);
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
                        $('#frmInscribirE input[name="idCat"]').val(dat.idCategoria);
                        
                        //$('#frmInscribir select[name="selectCategoria"]').dropdown('set selected', dat.idCategoria);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            cerrar()
            {
                $('#modalCambios').modal('hide');
            }
           
            
           
            

        }
    });
</script>
<script>
var inscribir=(ele)=>{
    if($(ele).attr("edad")<$("#edadMinima").text()){
        swal({
            title: 'Error!',
            text: 'La edad de la jugadora es menor a la edad minima de la categoría',
            type: 'error',
            showConfirmButton: true
                        });
        }else{

    alertify.confirm("¿Desea  inscribir la  jugadora?",
            function(){
var idEquipo = $("#idEqui").val();
  var idJugador = $(ele).attr("id");
  var idTorneo = $("#idTor").val();


             $.ajax({
                type: 'POST',
                url: '?1=JugadoresController&2=inscribirJugadorM',
                data: {
                    idEquipo : idEquipo,
                    idJugador : idJugador,
                    idTorneo : idTorneo,
                },
                success: function(r) {
                    if(r == 1) {
                        swal({
                            title: 'Listo!',
                            text: 'Jugador inscrito con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtInscriM').DataTable().ajax.reload();
                        
                    } 
                }

             });
            },
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            }); 
        }
}
var modalCambiar=(ele)=>{
                
                appE.datosDetalle.nombre= $(ele).attr("nombre");
                appE.datosDetalle.Categoria= $(ele).attr("categoria");
                appE.datosDetalle.encargado= $(ele).attr("encargado");
                $("#idEqui").val($(ele).attr("id"));
                $("#idTor").val($(ele).attr("idTorneo"));
                $("#edadMinima").text($(ele).attr("edadMinima"));
                $('#modalCambios').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
            }


var eliminarEquipo=(ele)=>{
  $('#modalEliminarE').modal('setting', 'closable', false).modal('show');
 $('#idEliminar').val($(ele).attr("id"));
}

var enviarFondo=(ele)=>{
  $('#modalFondo').modal('setting', 'closable', false).modal('show');
  $('#idEliminar').val($(ele).attr("id"));
}

var verJugadoresE=(ele)=>{
     $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    appE.cargarDetalles($(ele).attr('id'),$(ele).attr("categoria"));
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
var ver=(ele)=>{
     $('#modalVer').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    appE.verDetalle($(ele).attr('id'));
  }

    function cerrar(){
        $('#modalInscribirE').modal('hide');
    }
     


    


        $(function() {
        

            var option = '';
            var idCat = '';
            
            var torneo = '<?php echo $torneos?>';

            $.each(JSON.parse(torneo), function() {
                
                option = `<option value="${this.idTorneo}"> Nombre Torneo: ${this.nombreTorneo} -- Categoria: ${this.cat} </option>`;

                

                $('#torneoIns').append(option);

                
            });
           

            $('#btnInscribirE').click(function() {
               var idEquipo = $('#idE').val();
               var idT = $('#torneoIns').val();
               var idCE = $('#idCat').val();
         
                
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
