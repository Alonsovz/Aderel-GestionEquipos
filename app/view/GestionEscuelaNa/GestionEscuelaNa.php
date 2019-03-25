<br><div id="app">

    <modal-registrar id_form="frmRegistrar" id="modalRegistrar" url="?1=NatacionController&2=registrar"
     titulo="Registrar Usuario de Natación"
        :campos="campos_registro" tamanio='tiny' style="overflow: scroll;"></modal-registrar>

    <modal-editar id_form="frmEditar" id="modalEditar" url="?1=NatacionController&2=editar" titulo="Editar Usuario de Escuela de Natación"
        :campos="campos_editar" tamanio='tiny'></modal-editar>

    <modal-eliminar id_form="frmEliminar" id="modalEliminar" url="?1=NatacionController&2=eliminar" titulo="Eliminar usuario de Escuela de
     Natación" sub_titulo="¿Está seguro de querer eliminar este usuario?" :campos="campos_eliminar" tamanio='tiny'></modal-eliminar>

        <modal-reinscribir id_form="frmEliminar" id="modalInscribir" url="?1=NatacionController&2=reinscribir" 
        titulo="Reeinscribir Usuario de la escuela Natación"
        sub_titulo="¿Está seguro de querer reeinscribir este usuario?" :campos="campos_eliminar" tamanio='tiny'></modal-reinscribir>

        <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="home icon"></i><i class="life ring icon"></i>
                    Escuela de Natación Aderel<font color="#04B4AE" size="20px">.</font>
                </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <button class="ui right floated teal labeled icon button" id="btnAgregarU">
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
                <table id="dtNatacion" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #04B4AE; color:white;">N°</th>
                            <th style="background-color: #04B4AE; color:white;"></th>
                            <th style="background-color: #04B4AE; color:white;">Cod. Expediente</th>
                            <th style="background-color: #04B4AE; color:white;">Nombres</th>
                            <th style="background-color: #04B4AE; color:white;">Apellido</th>
                            <th style="background-color: #04B4AE; color:white;">Edad</th>
                            <th style="background-color: #04B4AE; color:white;">DUI / Carnet Minoridad</th>
                            <th style="background-color: #04B4AE; color:white;">Encargado</th>
                            <th style="background-color: #04B4AE; color:white;">Tel. Encargado</th>
                            <th style="background-color: #04B4AE; color:white;">Fecha de Inscripción</th>
                            <th style="background-color: #04B4AE; color:white;">Fecha Final</th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="ui modal" id="modalAgregarU"  style="overflow: scroll;">

<div class="header">
<i class="male icon"></i><i class="life ring icon"></i> Agregar nuevo alumno de la escuela de natación
</div>
<div class="content" class="ui equal width form">
    <form class="ui form" id="frmUsuariosNa" method="POST" enctype="multipart/form-data" action='?1=NatacionController&2=registrar'> 
        <div class="field">
            <div class="fields">
                    <div class="eight wide field">
                        <label><i class="user icon"></i>Nombre</label>
                        <input type="text" name="nombreJ" placeholder="Nombre del Jugador" id="nombreJ">
                            
                            <div class="ui red pointing label"  id="labelNombre"
                            style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                            Completa este campo</div>
                    </div>
                    <div class="eight wide field">
                        <label><i class="user icon"></i>Apellido</label>
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
                                <input type="file" name="Imagen" id="Imagen">
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
                        
                        <div class="eight wide field">
                            <div id="age">
                            <b><label><i class="male icon"></i>La edad del jugador es:</label></b>
                            <input type="text" id="edad" name="edad" readonly>
                            </div>
                        </div>
                        <div class="eight wide field">
                        <label><i class="address card icon"></i>DUI/Carnet Minoridad:</label>
                            <input type="text" name="duiJ" placeholder="DUI del jugador" id="duiJ">
                                    <div class="ui red pointing label"  id="labelDui"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Completa este campo
                                    </div>
                        </div>
                       

                            
                        </div>
                </div>

                <div class="field" id="encar">
                <div class="fields">
                <div class="six wide field">
                            <div id="age">
                            <b><label><i class="male icon"></i>Encargado:</label></b>
                            <input type="text" id="encargado" name="encargado" >
                            </div>
                </div>
                <div class="five wide field">
                            <div id="age">
                            <b><label><i class="address card icon"></i>DUI Encargado:</label></b>
                            <input type="text" id="duiE" name="duiE">
                            </div>
                </div>
                <div class="five wide field">
                            <div id="age">
                            <b><label><i class="telephone icon"></i>Teléfono Encargado:</label></b>
                            <input type="text" id="telefono" name="telefono" >
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
        <button class="ui blue button" id="btnGuardarU" >
        Guardar
        </button>
    </div>
</div>


<script src="./res/tablas/tablaEscuelaNa.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>
<script src="./res/js/modalReinscribir.js"></script>
<script>

var app = new Vue({
        el: "#app",
        data: {
           
            campos_registro: [{
                    label: 'Nombre del Usuario',
                    name: 'nombre',
                    type: 'text'
                },
                {
                    label: 'Apellido',
                    name: 'apellido',
                    type: 'text'
                },
                {
                    label: 'Fecha de Nacimiento',
                    name: 'fechaNac',
                    type: 'date'
                },
                {
                    label: 'Edad',
                    name: 'edad',
                    type: 'text'
                },
                {
                    label: 'Dui/Carnet de Minoridad',
                    name: 'dui',
                    type: 'text'
                },
                {
                    label: 'Encargado:',
                    name: 'encargado',
                    type: 'text'
                },
                {
                    label: 'Telefono:',
                    name: 'telefono',
                    type: 'text'
                },
                {
                    label: 'Dui de Encargado:',
                    name: 'duiEncargado',
                    type: 'text'
                }
                
               
                
            ],
            campos_editar: [
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
                    label: 'Nombre del Usuario',
                    name: 'nombre',
                    type: 'text'
                },
                {
                    label: 'Apellido',
                    name: 'apellido',
                    type: 'text'
                },
                {
                    label: 'Fecha de Nacimiento',
                    name: 'fechaNac',
                    type: 'date'
                },
                {
                    label: 'Edad',
                    name: 'edad',
                    type: 'text'
                },
                {
                    label: 'Dui/Carnet de Minoridad',
                    name: 'dui',
                    type: 'text'
                },
                {
                    label: 'Encargado:',
                    name: 'encargado',
                    type: 'text'
                },
                {
                    label: 'Telefono:',
                    name: 'telefono',
                    type: 'text'
                },
                {
                    label: 'Dui de Encargado:',
                    name: 'duiEncargado',
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
                tablaNatacion.ajax.reload();
                $('#frmRegistrar input[name="encargado"]').hide();
            $('#frmRegistrar input[name="duiEncargado"]').hide();
            $('#frmRegistrar input[name="telefono"]').hide();
            },
            modalRegistrar() {
                $('#modalRegistrar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatos() {
                var id = $("#idDetalle").val();

                fetch("?1=NatacionController&2=cargarDatosNatacion&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);
                        this.campos_editar[0].val=dat.imagen;
                        $('#frmEditar input[name="nombre"]').val(dat.nombre);
                        $('#frmEditar input[name="apellido"]').val(dat.apellido);
                        $('#frmEditar input[name="fechaNac"]').val(dat.fechaNacimiento);
                        $('#frmEditar input[name="edad"]').val(dat.edad);
                        $('#frmEditar input[name="imagenNueva"]').val(dat.foto);
                        $('#frmEditar input[name="dui"]').val(dat.ddi);
                        if(dat.encargado==''){
                            $('#frmEditar input[name="encargado"]').hide();
                            $('#frmEditar input[name="duiEncargado"]').hide();
                            $('#frmEditar input[name="telefono"]').hide();
                        }else{
                            $('#frmEditar input[name="encargado"]').show();
                            $('#frmEditar input[name="duiEncargado"]').show();
                            $('#frmEditar input[name="telefono"]').show();
                        $('#frmEditar input[name="encargado"]').val(dat.encargado);
                        $('#frmEditar input[name="duiEncargado"]').val(dat.dui);
                        $('#frmEditar input[name="telefono"]').val(dat.telefono);
                        }
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            
        }
    });
</script>
<script>
var reporte=(ele)=>{
    var id = $(ele).attr("id");
window.open('?1=NatacionController&2=fichaN&id='+id,'_blank');
return false;
}

var eliminarUsuario=(ele)=>{
  $('#modalEliminar').modal('setting', 'closable', false).modal('show');
  $('#idEliminar').val($(ele).attr("id"));
}

var reinscribirUsuario=(ele)=>{
  $('#modalInscribir').modal('setting', 'closable', false).modal('show');
  $('#idEliminar').val($(ele).attr("id"));
}

var editarUsuario=(ele)=>{
            $('#modalEditar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idDetalle').val($(ele).attr("id"));
            app.cargarDatos();
        }

</script>

<script>

$("#btnAgregarU").click(function(){
    $('#modalAgregarU').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');

});

$('#btnCerrar').click(function() { 
               // $("#age").hide();   
                $('#nombreJ').val('');
                $('#apellidoJ').val('');
                $('#duiJ').val('');
                $('#fechaNac').val('');
                $('#Imagen').val('');
                $("#encargado").val('');
                $("#duiE").val('');
                $("#telefono").val('');
                $("#edad").val('');
                $('#modalAgregarU').modal('hide');
            });

            function limpiar(){
                $('#nombreJ').val('');
                $('#apellidoJ').val('');
                $('#duiJ').val('');
                $('#fechaNac').val('');
                $('#Imagen').val('');
                $("#encargado").val('');
                $("#duiE").val('');
                $("#telefono").val('');
                $("#edad").val('');
            }

$("#btnGuardarU").click(function(){
    const form = $('#frmUsuariosNa');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=NatacionController&2=registrar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $('#modalAgregarU').modal('hide');
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
                        $('#dtNatacion').DataTable().ajax.reload();
                        limpiar();
                    } 
                }
            
        });

    });


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

$('#frmEditar input[name="nuevaFoto"]').change(e=>{
let reader= new FileReader();

reader.readAsDataURL(e.target.files[0]);

reader.onload=(e)=>{
    $('#frmEditar input[name="imagenNueva"]').val(e.target.result);
}
})
});

$(document).ready(function(){
    $("#encar").hide();
    $('#frmEditar input[name="duiEncargado"]').mask("99999999-9");
    $('#frmEditar input[name="telefono"]').mask("9999-9999");
    $("#duiE").mask("99999999-9");
    $("#telefono").mask("9999-9999");
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

function resultadoE(){
    var fecha = $('#fechaNac').val();

var edad = Edad(fecha);

$('#edad').val(edad);

if(edad>18){
    $('#duiJ').mask("99999999-9");
    $('#encar').hide();
    $('#encargado').val('nada');
    $('#duiE').val('nada');
    $('#telefono').val('nada');
}
else{
    $("#encar").show();
    $('#duiJ').mask("999999999999999999999");
    $('#telfono').mask("9999-9999");
    $('#encargado').val('');
    $('#duiE').val('');
    $('#telefono').val('');
}

}


$('#fechaNac').change(function(){
    var fecha = $('#fechaNac').val();

Edad(fecha);
$('#duiJ').val('');

resultadoE();


});

function resultadoF(){
    var fecha = $('#frmEditar input[name="fechaNac"]').val();

var edad = Edad(fecha);

$('#frmEditar input[name="edad"]').val(edad);
if(edad>18){
    $('#frmEditar input[name="dui"]').mask("99999999-9");
    $('#frmEditar input[name="duiEncargado"]').hide();
    $('#frmEditar input[name="encargado"]').hide();
    $('#frmEditar input[name="telefono"]').hide();
    $('#frmEditar input[name="encargado"]').val('nada');
    $('#frmEditar input[name="duiEncargado"]').val('nada');
    $('#frmEditar input[name="telefono"]').val('nada');
}
else{
    $('#frmEditar input[name="dui"]').mask("9999-999999-999-9");
    $('#frmEditar input[name="duiEncargado"]').show();
    $('#frmEditar input[name="duiEncargado"]').mask("99999999-9");
    $('#frmEditar input[name="encargado"]').show();
    $('#frmEditar input[name="telefono"]').show();
    $('#frmEditar input[name="telefono"]').mask("9999-9999");
    $('#frmEditar input[name="encargado"]').val('');
    $('#frmEditar input[name="duiEncargado"]').val('');
}
}


$('#frmEditar input[name="fechaNac"]').change(function(){
    var fecha = $('#frmEditar input[name="fechaNac"]').val();

Edad(fecha);

$('#frmEditar input[name="dui"]').val('');
$('#frmEditar input[name="encargado"]').hide();
    $('#frmEditar input[name="duiEncargado"]').hide();
resultadoF();


});





</script>