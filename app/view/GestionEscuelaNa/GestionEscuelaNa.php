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
                <button class="ui right floated teal labeled icon button" @click="modalRegistrar">
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
                            <th style="background-color: #04B4AE; color:white;">Cod. Expediente</th>
                            <th style="background-color: #04B4AE; color:white;">Nombres</th>
                            <th style="background-color: #04B4AE; color:white;">Apellido</th>
                            <th style="background-color: #04B4AE; color:white;">Fecha de Nacimiento</th>
                            <th style="background-color: #04B4AE; color:white;">Edad</th>
                            <th style="background-color: #04B4AE; color:white;">DUI / Carnet Minoridad</th>
                            <th style="background-color: #04B4AE; color:white;">Encargado</th>
                            <th style="background-color: #04B4AE; color:white;">DUI Encargado</th>
                            <th style="background-color: #04B4AE; color:white;">Fecha de Inscripción</th>
                            <th style="background-color: #04B4AE; color:white;">Fecha Final</th>
                            <th style="background-color: #04B4AE; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
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
                    label: 'Dui de Encargado:',
                    name: 'duiEncargado',
                    type: 'text'
                }
                
               
                
            ],
            campos_editar: [
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

                        $('#frmEditar input[name="nombre"]').val(dat.nombre);
                        $('#frmEditar input[name="apellido"]').val(dat.apellido);
                        $('#frmEditar input[name="fechaNac"]').val(dat.fechaNacimiento);
                        $('#frmEditar input[name="edad"]').val(dat.edad);
                        $('#frmEditar input[name="dui"]').val(dat.ddi);
                        if(dat.encargado==''){
                            $('#frmEditar input[name="encargado"]').hide();
                            $('#frmEditar input[name="duiEncargado"]').hide();
                        }else{
                            $('#frmEditar input[name="encargado"]').show();
                            $('#frmEditar input[name="duiEncargado"]').show();
                        $('#frmEditar input[name="encargado"]').val(dat.encargado);
                        $('#frmEditar input[name="duiEncargado"]').val(dat.duiEncargado);
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

$(document).ready(function(){
    $('#frmRegistrar input[name="encargado"]').hide();
    $('#frmRegistrar input[name="duiEncargado"]').hide();
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
    var fecha = $('#frmRegistrar input[name="fechaNac"]').val();

var edad = Edad(fecha);

$('#frmRegistrar input[name="edad"]').val(edad);

if(edad>18){
    $('#frmRegistrar input[name="dui"]').mask("99999999-9");
    $('#frmRegistrar input[name="duiEncargado"]').hide();
    $('#frmRegistrar input[name="encargado"]').hide();
    $('#frmRegistrar input[name="encargado"]').val('nada');
    $('#frmRegistrar input[name="duiEncargado"]').val('nada');
}
else{
    $('#frmRegistrar input[name="dui"]').mask("9999-999999-999-9");
    $('#frmRegistrar input[name="duiEncargado"]').show();
    $('#frmRegistrar input[name="duiEncargado"]').mask("99999999-9");
    $('#frmRegistrar input[name="encargado"]').show();
    $('#frmRegistrar input[name="encargado"]').val('');
    $('#frmRegistrar input[name="duiEncargado"]').val('');
}
}


$('#frmRegistrar input[name="fechaNac"]').change(function(){
    var fecha = $('#frmRegistrar input[name="fechaNac"]').val();

Edad(fecha);
$('#frmRegistrar input[name="dui"]').val('');

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
    $('#frmEditar input[name="encargado"]').val('nada');
    $('#frmEditar input[name="duiEncargado"]').val('nada');
}
else{
    $('#frmEditar input[name="dui"]').mask("9999-999999-999-9");
    $('#frmEditar input[name="duiEncargado"]').show();
    $('#frmEditar input[name="duiEncargado"]').mask("99999999-9");
    $('#frmEditar input[name="encargado"]').show();
    $('#frmEditar input[name="encargado"]').val('');
    $('#frmEditar input[name="duiEncargado"]').val('');
}
}


$('#frmEditar input[name="fechaNac"]').change(function(){
    var fecha = $('#frmEditar input[name="fechaNac"]').val();

Edad(fecha);

$('#frmEditar input[name="dui"]').val('');
$('#frmRegistrar input[name="encargado"]').hide();
    $('#frmRegistrar input[name="duiEncargado"]').hide();
resultadoF();


});





</script>