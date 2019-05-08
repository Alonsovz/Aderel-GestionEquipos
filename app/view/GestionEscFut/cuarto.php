<br><div id="app">

    <modal-registrar id_form="frmRegistrar" id="modalRegistrar" url="?1=NatacionController&2=registrar"
     titulo="Registrar Usuario de Natación"
        :campos="campos_registro" tamanio='tiny' style="overflow: scroll;"></modal-registrar>

        <modal-editar id_form="frmEditar" id="modalEditar" url="?1=EscFutbolController&2=editarPrimerN" titulo=""
        :campos="campos_editar" tamanio='tiny'></modal-editar>

    <modal-eliminar id_form="frmEliminar" id="modalEliminar" url="?1=EscFutbolController&2=eliminarPrimerN"
     titulo="Eliminar Jugador de cuarto nivel" sub_titulo="¿Está seguro de querer eliminar este usuario?"
      :campos="campos_eliminar" tamanio='tiny'></modal-eliminar>

      <modal-reinscribir id_form="frmEliminar" id="modalInscribir" url="?1=EscFutbolController&2=reinscribir" 
        titulo="Inscribir alumno de escuela Aderel"
        sub_titulo="¿Está seguro de querer Inscribir este alumno?" :campos="campos_eliminar" tamanio='tiny'></modal-reinscribir>

        <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="futbol icon"></i><i class="university icon"></i>
                    4to Nivel Escuela de futbol Aderel (12-13 años)<font color="#04B4AE" size="20px">.</font>
                    <br>
                    <div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between; width:65%">
                    
                    
                    <button class="ui teal button">
                    <a href="?1=EscFutbolController&2=primer" style="color:white;">
                        1er Nivel (6-7 años)
                    </a>
                    </button>
                    <button class="ui blue button">
                    <a href="?1=EscFutbolController&2=segundo" style="color:white;">
                        2do Nivel (8-9 años)
                    </a>
                    </button>
                    <button class="ui yellow button">
                    <a href="?1=EscFutbolController&2=tercer" style="color:white;">
                        3er Nivel (10-11 años)
                    </a>
                    </button>
                    <button class="ui red button" id="4">
                    <a href="?1=EscFutbolController&2=cuarto" style="color:black;">
                        4to Nivel (12-13 años)
                    </a>
                    </button>
                    <button class="ui olive button">
                    <a href="?1=EscFutbolController&2=quinto" style="color:white;">
                        5to Nivel (14-15 años)
                    </a>
                    </button>
                    <button class="ui purple button">
                    <a href="?1=EscFutbolController&2=sexto" style="color:white;">
                        6to Nivel (16-17 años)
                    </a>
                    </button>
                    </div>
                </div>
        </div>

        <div class="row title-bar">
            <div class="sixteen wide column">
                <button class="ui right floated red labeled icon button" id="btnModalRegistroJugador">
                    <i class="plus icon"></i>
                    Agregar
                </button>

                <button class="ui right floated green labeled icon button" id="btnGestion">
                    <i class="cogs icon"></i>
                    Gestion General
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
                <table id="dtCuartoN" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                        <th style="background-color: #04B4AE; color:white;">N°</th>
                        <th style="background-color: #CD2020; color:white;"></th>
                            <th style="background-color: #CD2020; color:white;">Cod. Expediente</th>
                            <th style="background-color: #CD2020; color:white;">Nombres</th>
                            <th style="background-color: #CD2020; color:white;">Apellido</th>
                            <th style="background-color: #CD2020; color:white;">Fecha Nac</th>
                            <th style="background-color: #CD2020; color:white;">Edad</th>
                            <th style="background-color: #CD2020; color:white;">Carnet Min.</th>
                            <th style="background-color: #CD2020; color:white;">Encargado</th>
                            <th style="background-color: #CD2020; color:white;">Teléfono</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="ui  modal" id="modalAgregarJugador"  style="overflow: scroll;">

<div class="header">
<i class="male icon"></i><i class="futbol icon"></i> Agregar nuevo Jugador de Cuarto Nivel (12-13 años)
</div>
<div class="content" class="ui equal width form">
    <form class="ui form" id="frmJugador" method="POST" enctype="multipart/form-data"> 
        <div class="field">
            <div class="fields">
                    <div class="five wide field">
                        <label><i class="user icon"></i>Nombre del Jugador</label>
                        <input type="text" name="nombreJ" placeholder="Nombre del Jugador" id="nombreJ">
                            
                            <div class="ui red pointing label"  id="labelNombre"
                            style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                            Completa este campo</div>
                    </div>
                    <div class="five wide field">
                        <label><i class="user icon"></i>Apellido del Jugador</label>
                        <input type="text" name="apellidoJ" placeholder="Apellido del Jugador" id="apellidoJ">
                        <div class="ui red pointing label"  id="labelApellido"
                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                        Completa este campo</div>
                    </div>  
                    <div class="six wide field">
                            <label><i class="photo icon"></i>Foto</label>
                                <input type="file" name="Imagen" placeholder="Cargar Foto del jugador" id="Imagen">
                                    <div class="ui red pointing label"  id="labelFoto"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Completa este campo
                                    </div>
                                <input type="hidden" name="img" id='img'>
                    </div>         
            </div>
        </div>  
        <div class="field">
            <div class="fields">  
                        <div class="six wide field">
                            <label><i class="calendar icon"></i>Fecha de Nacimiento</label>
                                <input type="date" id="fechaNac" name="fechaNac">
                                    <div class="ui red pointing label"  id="labelFecha"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Completa este campo</div>
                        </div>    

                        <div class="four wide field">
                            <div id="age">
                            <b><label><i class="male icon"></i>La edad del jugador es:</label></b>
                            <input type="text" id="edad" name="edad" readonly>
                            </div>
                        </div>  
                        <div class="six wide field">
                        <label><i class="address card icon"></i>Carnet Minoridad:</label>
                            <input type="text" name="carnet" placeholder="Carnet del jugador" id="carnet">
                            <div class="ui red pointing label"  id="labelError"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Ya existe
                                    </div>
                        </div>                        
                        
                        </div>
                        
            </div>   
            
                <div class="field">
                        <div class="fields">
                        <div class="six wide field">
                        <label><i class="user cicle icon"></i>Encargado</label>
                            <input type="text" name="encargado" placeholder="Encargado del jugador" id="encargado">
                            <div class="ui red pointing label"  id="labelEncargado"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Completa este campo</div>
                        </div>
                        <div class="five wide field">
                        <label><i class="address card icon"></i>Dui del Encargado</label>
                            <input type="text" name="duiJ" placeholder="DUI del encargado" id="duiJ">
                            <div class="ui red pointing label"  id="labelDui"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Completa este campo</div>
                        </div>

                        <div class="five wide field">
                        <label><i class="telephone icon"></i>Teléfono del Encargado</label>
                            <input type="text" name="telefono" placeholder="Teléfono" id="telefono">
                            <div class="ui red pointing label"  id="labelTelefono"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        Completa este campo</div>
                        </div>   
                        </div>
                </div>
                <div class="field">
                        <div class="fields">
                            <div class="sixteen wide field">
                            <div class="ui red pointing label"  id="validar"
                                        style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                        La edad del jugador no es apta para el nivel (12-13 años)</div>
                            </div>
                        </div>
                </div>
                
        </div>
    </form>

    <div class="actions">
        <button onclick="cerrar()" class="ui yellow button">
            Cancelar
        </button>
        <button class="ui blue button" id="btnGuardarJugador" >
        Guardar
        </button>
    </div>

<div class="ui modal" id="modalgestion">
    <div class="header">
        <i class="futbol icon"></i>Gestión general del cuarto nivel
    </div>
    <div class="content">
        <div  class="ui equal width form">
            <form id="frmGestion" class="ui form">
                <div class="field">
                        <div class="fields">
                                <div class="four wide field">
                                <input type="hidden" id="id" name="id" value="4">
                                    <label><i class="male icon"></i>Profesor</label>
                                    <input type="text" name="profesor"  id="profesor">
                                </div>
                        </div>
                </div>

                <div class="field">
                        <div class="fields">
                                <div class="eight wide field">
                                    <label><i class="calendar icon"></i>Dias</label>
                                    <select name="dias"  id="dias" class="ui dropdown">
                                    <option value="Lunes y Martes">Lunes y Martes</option>
                                    <option value="Lunes y Miercoles">Lunes y Miércoles</option>
                                    <option value="Lunes y Jueves">Lunes y Jueves</option>
                                    <option value="Lunes y Viernes">Lunes y Viernes</option>
                                    <option value="Martes y Miércoles">Martes y Miércoles</option>
                                    <option value="Martes y Jueves">Martes y Jueves</option>
                                    <option value="Martes y Viernes">Martes y Viernes</option>
                                    <option value="Miércoles y Jueves">Miércoles y Jueves</option>
                                    <option value="Miércoles y Viernes">Miércoles y Viernes</option>
                                    <option value="Jueves y Viernes">Jueves y Viernes</option>
                                    </select>
                                </div>
                                <div class="eight wide field">
                                    <label><i class="time icon"></i>Horarios</label>
                                    <select  name="horario"  id="horario" class="ui dropdown">
                                    <option value="4:00 pm a 5:00 pm">4:00 pm a 5:00 pm</option>
                                    <option value="5:00 pm a 6:00 pm">5:00 pm a 6:00 pm</option>
                                    <option value="6:00 pm a 7:00 pm">6:00 pm a 7:00 pm</option>
                                    <option value="7:00 pm a 8:00 pm">7:00 pm a 8:00 pm</option>
                                    </select>
                                </div>

                                <div class="eight wide field">
                                    <label><i class="futbol icon"></i>Cancha</label>
                                    <select  name="cancha"  id="cancha" class="ui dropdown">
                                    <option value="1">Cancha 1</option>
                                    <option value="2">Cancha 2</option>
                                    </select>
                                </div>
                                
                                
                        </div>
                </div>


            </form>
        </div>
    </div>
    <div class="actions">
        <button class="ui yellow button" id="cerrarGestion">
        Cerrar
        </button>
        <button class="ui blue button" id="guardarGestion">
        Guardar
        </button>
    </div>
</div>

</div>
<script src="./res/tablas/tablaCuartoN.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>
<script src="./res/js/modalReinscribir.js"></script>
<script>
var app = new Vue({
        el: "#app",
        data: {
            detalles: [],
            campos_registro: [
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
                    label: 'Nombre:',
                    name: 'nombre',
                    type: 'text'
                },
                {
                    label: 'Apellido:',
                    name: 'apellido',
                    type: 'text'
                },
                {
                    label: 'Fecha de Nacimiento:',
                    name: 'fechaNac',
                    type: 'date'
                },
                {
                    label: 'Edad:',
                    name: 'edad',
                    type: 'text'
                },
                {
                    name: 'error',
                    type: 'text'
                },
                {
                    label: 'Carnet Min:',
                    name: 'carnetMin',
                    type: 'text'
                },
                {
                    label: 'Encargado:',
                    name: 'encargado',
                    type: 'text'
                },
                {
                    label: 'DUI Encargado:',
                    name: 'dui',
                    type: 'text'
                },
                {
                    label: 'Teléfono Encargado:',
                    name: 'telefono',
                    type: 'text'
                },
                {
                    name: 'idDetalleC',
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

                tablaCuartoN.ajax.reload();

                
            },
            cargarDatos() {
                var id = $("#idDetalleC").val();

                fetch("?1=EscFutbolController&2=cargarDatosPrimerN&id=" + id)
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
                       $('#frmEditar input[name="carnetMin"]').val(dat.carnet);
                       $('#frmEditar input[name="encargado"]').val(dat.encargado);
                       $('#frmEditar input[name="dui"]').val(dat.dui);
                       $('#frmEditar input[name="imagenNueva"]').val(dat.foto);
                       $('#frmEditar input[name="telefono"]').val(dat.telefono);
                       $('#frmEditar input[name="error"]').css("display","none");
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            cargarGestion(id) {
                this.id = parseInt(id);

                fetch("?1=EscFutbolController&2=cargarDatos&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmGestion input[name="profesor"]').val(dat.profesor);
                        $('#frmGestion select[name="dias"]').dropdown('set selected', dat.dias);
                        $('#frmGestion select[name="horario"]').dropdown('set selected', dat.hora);
                      $('#frmGestion select[name="cancha"]').dropdown('set selected', dat.cancha);
                    //  $('#frmGestion input[name="fecha"]').val(dat.fecha);
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

$("#btnGestion").click(function(){
    $("#modalgestion").modal('setting', 'closable', false).modal('show');
    app.cargarGestion(4);
});

$("#cerrarGestion").click(function(){
    $("#modalgestion").modal('hide');
});

var eliminar=(ele)=>{
  $('#modalEliminar').modal('setting', 'closable', false).modal('show');
  $('#idEliminar').val($(ele).attr("id"));
}

var editar=(ele)=>{
    $('#modalEditar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
     $('#idDetalleC').val($(ele).attr("id"));
    app.cargarDatos();

}

var reporte=(ele)=>{
    var id = $(ele).attr("id");
window.open('?1=EscFutbolController&2=ficha&id='+id,'_blank');
return false;
}

var reinscribirUsuario=(ele)=>{
  $('#modalInscribir').modal('setting', 'closable', false).modal('show');
  $('#idEliminar').val($(ele).attr("id"));
}

$(document).ready(function(){
    $("#duiJ").mask("99999999-9");
    $("#telefono").mask("9999-9999");
    $("#carnet").mask("99999999999999");
    $('#frmEditar input[name="carnet"]').mask("9999999999999");
    $('#frmEditar input[name="dui"]').mask("99999999-9");
    $('#frmEditar input[name="telefono"]').mask("9999-9999");
    $('#frmEditar input[name="error"]').css("display","none");
    $("#4").removeClass("ui red button");
    $("#4").addClass("ui red basic button");
});

$('#btnModalRegistroJugador').click(function() {
$('#modalAgregarJugador').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
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

function cerrar(){   
                $('#nombreJ').val('');
                $('#apellidoJ').val('');
                $('#duiJ').val('');
                $('#fechaNac').val('');
                 $('#telefono').val('');
                 $('#carnet').val('');
                 $('#edad').val('');
                $('#encargado').val('');
                $("#validar").css("display","none");
                 $("#btnGuardarJugador").attr("disabled",false);
                $('#modalAgregarJugador').modal('hide');
            }

$("#btnGuardarJugador").click(function(){

    const form = $('#frmJugador');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=EscFutbolController&2=guardarCuarto',
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
                        $('#dtCuartoN').DataTable().ajax.reload();
                        cerrar();
                    } 
                }
            });

});

$("#guardarGestion").click(function(){

alertify.confirm("¿Guardar cambios?",
        function(){
const form = $('#frmGestion');

const datosFormulario = new FormData(form[0]);


    $.ajax({
    enctype: 'multipart/form-data',
    contentType: false,
    processData: false,
    cache: false,
    type: 'POST',
    url: '?1=EscFutbolController&2=gestionGeneral',
    data: datosFormulario,
    success: function(r) {
        if(r == 1) {
            $('#modalgestion').modal('hide');
            swal({
                title: 'Listo',
                text: 'Cambios guardados con éxito',
                type: 'success',
                showConfirmButton: false,
                    timer: 1700

            }).then((result) => {
                
            }); 
        
        } 
    }
    });
},
        function(){
            //$("#modalCalendar").modal('toggle');
            alertify.error('Cancelado');
            
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
$("#edad").val(edad);

if(edad > 13 || edad < 12){
    $("#validar").css("display","block");
    $("#btnGuardarJugador").attr("disabled",true);
}else{
    $("#validar").css("display","none");
    $("#btnGuardarJugador").attr("disabled",false);
}

}

$('#fechaNac').change(function(){
    var fecha =  document.getElementById('fechaNac').value;

Edad(fecha);
resultado();


});

function resultadoE(){
    var fecha = $('#frmEditar input[name="fechaNac"]').val();

var edad = Edad(fecha);

$('#frmEditar input[name="edad"]').val(edad);

if(edad > 13 || edad < 12){
    $('#frmEditar input[name="error"]').val('La edad del jugador no es apta para el nivel');
    $('#frmEditar input[name="error"]').css("display","block");
    $('#frmEditar input[name="error"]').css("background-color","#FE2E2E");
    $('#frmEditar input[name="error"]').css("color","white");
    $('#frmEditar input[name="error"]').prop("readonly",true);
    //$("#btnGuardarJugador").attr("disabled",true);
}else{
    $('#frmEditar input[name="error"]').css("display","none");
}

}

$('#frmEditar input[name="fechaNac"]').change(function(){
    var fecha = $('#frmEditar input[name="fechaNac"]').val();

Edad(fecha);
$('#frmEditar input[name="carnet"]').val('');
resultadoE();


});


var mover=(ele)=>{
    var id = $(ele).attr("id");
    alertify.confirm("¿Desea movel el jugador al quinto nivel?",
            function(){
             $.ajax({
                type: 'POST',
                url: '?1=EscFutbolController&2=moverCuartoN',
                data: {

                    id : id,
                },
                success: function(r) {
                    if(r == 1) {
                        swal({
                            title: 'Listo!',
                            text: 'Jugador ya es parte del quinto nivel',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtCuartoN').DataTable().ajax.reload();
                        
                    } 
                }

             });
            },
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            }); 
}

$('#carnet').change(function(){

var dui=$('#carnet').val();

$.ajax({
type: 'POST',
url: '?1=EscFutbolController&2=getDui',
data:{dui},
success: function(r) {

    if(r==1)
    {
       $('#labelError').show();
       
       $("#btnGuardarJugador").attr("disabled", true);
    }    
    else{

       $("#btnGuardarJugador").attr("disabled", false);
    }  
}
});


});

$('#carnet').keyup(function(){

$('#labelError').hide();
$("#btnGuardarJugador").attr("disabled", false);

});
</script>