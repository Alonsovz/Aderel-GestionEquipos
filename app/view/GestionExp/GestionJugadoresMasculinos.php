

<br><div id="appJ">

<modal-eliminar id_form="frmEliminarJ" id="modalEliminarJ" url="?1=JugadoresController&2=eliminarM" titulo="Eliminar Jugador"
        sub_titulo="¿Está seguro de querer eliminar este jugador?" :campos="campos_eliminarJ" tamanio='tiny'></modal-eliminar>

<modal-editar id_form="frmEditarJ" id="modalEditarJ" url="?1=JugadoresController&2=editarM" titulo="Editar Jugador"
:campos="campos_editarJ" tamanio='tiny' style="overflow: scroll;"></modal-editar>


<modal-jugador :detalles="detalles"></modal-jugador>

        <div class="ui grid">
                        <div class="row">
                                <div class="titulo">
                                    <i class="male icon"></i>
                                    Jugadores Masculinos<font color="#FACC2E" size="20px">.</font>
                    <button class="ui red button" >
                        <a href="?1=CategoriaController&2=gestionM" style="color:white;">
                            <i class="chart bar outline icon"></i>
                        Categorías de Torneo
                        </a>
                    </button> 

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
                        
                        
                                </div>
                        </div>
                        <div class="row title-bar">
                            <div class="sixteen wide column">
                                <button class="ui right floated yellow labeled icon button" id="btnModalRegistroJugador">
                                    <i class="plus icon"></i>
                                    Agregar Jugador
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
                            <table id="dtJugadoresM" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #FACC2E;">N°</th>
                                        <th style="background-color: #FACC2E;" ></th>
                                        <th style="background-color: #FACC2E;">Cod. Expediente</th>
                                        <th style="background-color: #FACC2E;">Nombre</th>
                                        <th style="background-color: #FACC2E;">Apellido</th>
                                        <th style="background-color: #FACC2E;">DUI/Carnet Minoridad</th>
                                        <th style="background-color: #FACC2E;">Fecha de Nacimiento</th>
                                        <th style="background-color: #FACC2E;">Edad del Jugador</th>                
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
                    
        </div>

<div class="ui  modal" id="modalAgregarJugador"  style="overflow: scroll;">

<div class="header">
<i class="male icon"></i><i class="futbol icon"></i> Agregar nuevo Jugador
</div>
<div class="content" class="ui equal width form">
    <form class="ui form" id="frmJugador" method="POST" enctype="multipart/form-data" action='?1=JugadoresController&2=guardarJugadorM'> 
        <div class="field">
            <div class="fields">
                    <div class="eight wide field">
                        <label><i class="user icon"></i>Nombre del Jugador</label>
                        <input type="text" name="nombreJ" placeholder="Nombre del Jugador" id="nombreJ">
                            
                            <div class="ui red pointing label"  id="labelNombre"
                            style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                            Completa este campo</div>
                    </div>
                    <div class="eight wide field">
                        <label><i class="user icon"></i>Apellido del Jugador</label>
                        <input type="text" name="apellidoJ" placeholder="Apellido del Jugador" id="apellidoJ">
                        <div class="ui red pointing label"  id="labelApellido"
                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                        Completa este campo</div>
                    </div>     
            </div>
        </div>  
        <div class="field">
            <div class="fields">
                        <div class="ten wide field">
                            <label><i class="photo icon"></i>Foto</label>
                                <input type="file" name="Imagen" placeholder="Cargar Foto del jugador" id="Imagen">
                                    <div class="ui red pointing label"  id="labelFoto"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Completa este campo
                                    </div>
                                <input type="hidden" name="img" id='img'>
                        </div>    
                        <div class="six wide field">
                            <label><i class="calendar icon"></i>Fecha de Nacimiento</label>
                                <input type="date" id="fechaNac" name="fechaNac">
                                    <div class="ui red pointing label"  id="labelFecha"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Completa este campo</div>
                                    </div>                              
                        
                        </div>
                        
            </div>   
            
                <div class="field">
                        <div class="fields">
                        
                        <div class="three wide field">
                            
                            <b><label><i class="male icon"></i>Edad: </label></b>
                            <input type="text" id="edad" name="edad" readonly>
                           
                        </div>
                        <div class="six wide field">
                            
                            <b><label><i class="phone icon"></i>Teléfono del jugador:</label></b>
                            <input type="text" id="telefono" name="telefono" placeholder="Tel. del jugador">
                           
                        </div>
                        <div class="seven wide field">
                        <label><i class="address card icon"></i>DUI/Carnet Minoridad:</label>
                            <input type="text" name="duiJ" placeholder="DUI del jugador" id="duiJ">
                                    <div class="ui red pointing label"  id="labelDui"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Completa este campo
                                    </div>
                        </div>
                       

                            
                        </div>
                </div>
                
        </div>
    </form>

    <div class="actions">
        <button id="btnCerrar" class="ui yellow button">
            Cancelar
        </button>
        <button class="ui blue button" id="btnGuardarJugador" >
        Guardar
        </button>
    </div>
</div>

</div>


<div class="ui tiny modal" id="modalInscribirJ"  style="overflow: scroll;">

<div class="header">
<i class="male icon"></i><i class="futbol icon"></i> Inscribir Jugador
</div>
<div class="content" class="ui equal width form">
    <form class="ui form" id="frmInscribirJ"> 
        <div class="field">
            <div class="fields">
            <div class="eight wide field">
            <label><i class="users icon"></i>Nombre del jugador</label>
            <input type="text" name="nombreJugador" id="nombreJugador" readonly>
            </div>

            <div class="eight wide field">
            <label><i class="chart bar outline icon"></i>Edad del Jugador</label>
            <input type="text" name="edadJ"  id="edadJ" readonly>
            <input type="hidden" name="idJ"  id="idJ">
            </div>
            </div>
        </div>
        
        <div class="field">
            <div class="fields">
            <div class="four wide field"></div>
                <div class="eight wide field">
                <label><i class="trophy icon"></i>Equipos disponibles</label>
                <select name="equipo" id="equipo" class="ui search dropdown" style="">
                        </select>
                         
                </div>
            </div>
        </div>
    </form>
</div>
    <div class="actions">
        <button id="btnCerrarJ" class="ui yellow button">
            Cancelar
        </button>
        <button class="ui blue button" id="btnInscribir" >
        Guardar
        </button>
    </div>
</div>

<script src="./res/tablas/tablaJugadoresM.js"></script>

<script src="./res/js/modalVerJugador.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>
<script>
 $(document).ready(function(){
    $('#dui').mask("99999999-9");
    $('#telefono').mask("9999-9999");
    $('#frmEditarJ input[name="telefono"]').mask("9999-9999");
});   
var appJ = new Vue({
        el: "#appJ",
        data: {
            detalles: [],
            campos_editarJ: [
                {
                    label: 'Foto:',
                    name: 'foto',
                    type: 'img',
                    val:''
                },
                {
                    label: 'Cambiar Foto',
                    name: 'nuevaFoto',
                    type: 'file',
                },
                {
                    name: 'imagenNueva',
                    type: 'hidden'
                },
                {
                    label: 'Nombre del Jugador',
                    name: 'nombre',
                    type: 'text'
                },
                {
                    label: 'Apellido del Jugador:',
                    name: 'apellido',
                    type: 'text'
                },
                {
                    label: 'Fecha de Nacimiento:',
                    name: 'fechaNacimiento',
                    type: 'date', 
                },
                {
                    label: 'Edad:',
                    name: 'edad',
                    type: 'text', 
                },
                {
                    label: 'Teléfono:',
                    name: 'telefono',
                    type: 'text', 
                },
                {
                    label: 'DUI/Carnet Minoridad:',
                    name: 'dui',
                    type: 'text', 
                },
    
                {
                    name: 'idDetalleE',
                    type: 'hidden'
                }
               
                
            ],
            
            campos_eliminarJ: [{
                name: 'idEliminar',
                type: 'hidden'
            }]
        },
        methods: {
            refrescarTabla() {
                
                tablaJugadoresM.ajax.reload();

                
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
            appJ.detalles = JSON.parse(data);
            $('#frmDetalles').removeClass('loading');
            }
            });

            },
            cerrarModalD() {
                this.detalles = [];

                $('#modalCambios').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
            },
            
            cargarDatosJ() {
                var id = $("#idDetalleE").val();

                fetch("?1=JugadoresController&2=cargarDatosJugadoresM&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);


                        // $('#frmEditarJ input[name="foto"]').val(dat.imagen);
                        this.campos_editarJ[0].val=dat.imagen;
                        $('#frmEditarJ input[name="nombre"]').val(dat.nombre);
                        $('#frmEditarJ input[name="apellido"]').val(dat.apellido);
                        $('#frmEditarJ input[name="dui"]').val(dat.dui);
                        $('#frmEditarJ input[name="imagenNueva"]').val(dat.foto);
                        $('#frmEditarJ input[name="fechaNacimiento"]').val(dat.fechaNacimiento);
                        $('#frmEditarJ input[name="edad"]').val(dat.edad);
                        $('#frmEditarJ input[name="telefono"]').val(dat.telefono);
                        //$('#frmEditarJ select[name="equipo"]').dropdown('set selected', dat.idEquipo);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            cargarDatosJu() {
                var id = $("#idDetalleE").val();

                fetch("?1=JugadoresController&2=cargarDatosJugadoresM&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmInscribirJ input[name="nombreJugador"]').val(dat.nombre +' '+ dat.apellido);
                        $('#frmInscribirJ input[name="edadJ"]').val(dat.edad);
                        $('#frmInscribirJ input[name="idJ"]').val(dat.idJugador);
                        //$('#frmInscribirJ input[name="IdCategoria"]').val(dat.id);
                        //$('#frmInscribir select[name="selectCategoria"]').dropdown('set selected', dat.idCategoria);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
            
           
            

        }
    });
</script>
<script type="text/javascript">



function limpiar(){
    //$("#age").hide(); 
                $('#nombreJ').val('');
                $('#apellidoJ').val('');
                $('#dui').val('');
                $('#fechaNac').val('');
                $('#Imagen').val('');
                $('#telefono').val('');
                
}
$(function(){
$('#btnCerrar').click(function() { 
//$("#age").hide();   
                $('#nombreJ').val('');
                $('#apellidoJ').val('');
                $('#dui').val('');
                $('#fechaNac').val('');
                $("#telefono").val('');
                $('#Imagen').val('');
                $('#modalAgregarJugador').modal('hide');
            });
            $('#btnCerrarJ').click(function() { 
  
                $('#nombreJugador').val('');
                $('#edad').val('');
                $('#modalInscribirJ').modal('hide');
            });
        });


var eliminarJugador=(ele)=>{
  $('#modalEliminarJ').modal('setting', 'closable', false).modal('show');
  $('#idEliminar').val($(ele).attr("id"));
}

var editarJugador=(ele)=>{
            $('#modalEditarJ').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idDetalleE').val($(ele).attr("id"));
            appJ.cargarDatosJ();
        }

var ver=(ele)=>{
     $('#modalVer').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    appJ.verDetalle($(ele).attr('id'));
  }

</script>
<script>
$(function(){

$('#Imagen').change(e=>{
    let reader= new FileReader();

    reader.readAsDataURL(e.target.files[0]);

    reader.onload=(e)=>{
        $('#img').val(e.target.result);
    }
})
});

$(function(){

    $('#frmEditarJ input[name="nuevaFoto"]').change(e=>{
    let reader= new FileReader();

    reader.readAsDataURL(e.target.files[0]);

    reader.onload=(e)=>{
        $('#frmEditarJ input[name="imagenNueva"]').val(e.target.result);
    }
})
});



 $('#btnModalRegistroJugador').click(function() {
$('#modalAgregarJugador').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

            $(function(){
                $("#nombreJ").keyup(function(){
                    $("#labelNombre").css("display","none");
                    $("#btnGuardarJugador").attr("disabled", false);
                });
                $("#apellidoJ").keyup(function(){
                    $("#labelApellido").css("display","none");
                    $("#btnGuardarJugador").attr("disabled", false);
                });
                $("#Imagen").change(function(){
                    $("#labelFoto").css("display","none");
                    $("#btnGuardarJugador").attr("disabled", false);
                });
                $("#fechaNac").keyup(function(){
                    $("#labelFecha").css("display","none");
                    $("#btnGuardarJugador").attr("disabled", false);
                });
                $("#dui").keyup(function(){
                    $("#labelDui").css("display","none");
                    $("#btnGuardarJugador").attr("disabled", false);
                });
            $('#btnGuardarJugador').click(function() {
                if($("#nombreJ").val()=='')
                {
                    $("#labelNombre").css("display","block");
                    $("#btnGuardarJugador").attr("disabled", true);
                }
                if($("#apellidoJ").val()==""){
                    $("#labelApellido").css("display","block");
                    $("#btnGuardarJugador").attr("disabled", false);
                }
                if($("#img").val()==""){
                    $("#labelFoto").css("display","block");
                    $("#btnGuardarJugador").attr("disabled", false);
                }
                if($("#fechaNac").val()==""){
                    $("#labelFecha").css("display","block");
                    $("#btnGuardarJugador").attr("disabled", false);
                }
                if($("#dui").val()==""){
                    $("#labelDui").css("display","block");
                    $("#btnGuardarJugador").attr("disabled", false);
                }

                
                else{
                const form = $('#frmJugador');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=JugadoresController&2=guardarJugadorM',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $('#modalAgregarJugador').modal('hide');
                        swal({
                            title: 'Registrado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtJugadoresM').DataTable().ajax.reload();
                        limpiar();
                    } 
                }
            });
        }
            });

            $('#btnInscribir').click(function() {
               var idEquipo = $('#equipo').val();
               var idJ = $('#idJ').val();
         
        
            $.ajax({
                type: 'POST',
                url: '?1=JugadoresController&2=inscribirJugadorM',
                data: {
                    idEquipo : idEquipo,
                    idJ : idJ,
                },
                success: function(r) {
                    if(r == 1) {
                        $('#modalInscribirJ').modal('hide');
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
                        $('#dtJugadoresM').DataTable().ajax.reload();
                        
                    } 
                }
            });
            });
});



$(function() {
            var option = '';
            var equipos = '<?php echo $equiposCMB?>';

            $.each(JSON.parse(equipos), function() {
                option = `<option value="${this.idEquipo}">${this.nombre}</option>`;

                $('#equipo').append(option);
            });
        });

         

function Edad(FechaNacimiento) {

var fechaNace = new Date(FechaNacimiento);
var fechaActual = new Date()

var mes = fechaActual.getMonth();
var dia = fechaActual.getDate();
var año = fechaActual.getFullYear();

fechaActual.setDate(dia);
fechaActual.setMonth(mes);
fechaActual.setFullYear(año);

edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));

return edad;
}


function resultado(){
    var fecha = document.getElementById('fechaNac').value;

var edad = Edad(fecha);
$("#age").show();
$("#edad").val(edad);
if(edad>18){
    $('#duiJ').mask("99999999-9");
}
else{
    $('#duiJ').mask("9999-999999-999-9");
}
}


function resultadoE(){
    var fecha = $('#frmEditarJ input[name="fechaNacimiento"]').val();

var edad = Edad(fecha);

$('#frmEditarJ input[name="edad"]').val(edad);

if(edad>18){
    $('#frmEditarJ input[name="dui"]').mask("99999999-9");
}
else{
    $('#frmEditarJ input[name="dui"]').mask("9999-999999-999-9");
}
}

$('#fechaNac').change(function(){
    var fecha =  document.getElementById('fechaNac').value;

Edad(fecha);
$("#duiJ").val('');
resultado();


});

$('#frmEditarJ input[name="fechaNacimiento"]').change(function(){
    var fecha = $('#frmEditarJ input[name="fechaNacimiento"]').val();

Edad(fecha);

resultadoE();


});

</script>