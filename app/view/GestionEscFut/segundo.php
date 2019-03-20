<br><div id="app">

    <modal-registrar id_form="frmRegistrar" id="modalRegistrar" url="?1=NatacionController&2=registrar"
     titulo="Registrar Usuario de Natación"
        :campos="campos_registro" tamanio='tiny' style="overflow: scroll;"></modal-registrar>

    <modal-editar id_form="frmEditar" id="modalEditar" url="?1=NatacionController&2=editar" titulo="Editar Usuario de Escuela de Natación"
        :campos="campos_editar" tamanio='tiny'></modal-editar>

    <modal-eliminar id_form="frmEliminar" id="modalEliminar" url="?1=NatacionController&2=eliminar" titulo="Eliminar usuario de Escuela de
     Natación" sub_titulo="¿Está seguro de querer eliminar este usuario?" :campos="campos_eliminar" tamanio='tiny'></modal-eliminar>


        <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="futbol icon"></i><i class="university icon"></i>
                    2do Nivel Escuela de futbol Aderel (8-9 años)<font color="#04B4AE" size="20px">.</font>
                    <br>
                    <div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between; width:65%">
                    <button class="ui teal button">
                    <a href="?1=EscFutbolController&2=primer" style="color:white;">
                        1er Nivel (6-7 años)
                    </a>
                    </button>

                   
                    <button class="ui yellow button">
                    <a href="?1=EscFutbolController&2=tercer" style="color:white;">
                        3er Nivel (10-11 años)
                    </a>
                    </button>
                    <button class="ui red button">
                    <a href="?1=EscFutbolController&2=cuarto" style="color:white;">
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
                <button class="ui right floated blue labeled icon button" id="btnModalRegistroJugador">
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
            <table id="dtSegundoN" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                        <th style="background-color: #04B4AE; color:white;">N°</th>
                            <th style="background-color: #217CD1; color:white;">Cod. Expediente</th>
                            <th style="background-color: #217CD1; color:white;">Nombres</th>
                            <th style="background-color: #217CD1; color:white;">Apellido</th>
                            <th style="background-color: #217CD1; color:white;">Fecha Nac</th>
                            <th style="background-color: #217CD1; color:white;">Edad</th>
                            <th style="background-color: #217CD1; color:white;">Carnet Min.</th>
                            <th style="background-color: #217CD1; color:white;">Encargado</th>
                            <th style="background-color: #217CD1; color:white;">DUI Encargado</th>
                            <th style="background-color: #217CD1; color:white;">Teléfono</th>
                            <th style="background-color: #217CD1; color:white;">Fecha de Inscripción</th>
                            <th style="background-color: #217CD1; color:white;">Acciones</th>
                           
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
<i class="male icon"></i><i class="futbol icon"></i> Agregar nuevo Jugador de Segundo Nivel (8-9 años)
</div>
<div class="content" class="ui equal width form">
    <form class="ui form" id="frmJugador" method="POST" enctype="multipart/form-data">
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
                                        La edad del jugador no es apta para el nivel (6-7 años)</div>
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
</div>

</div>
<script src="./res/tablas/tablaSegundoN.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>


<script>
$(document).ready(function(){
    $("#duiJ").mask("9999999-9");
    $("#telefono").mask("9999-9999");
    $("#carnet").mask("9999-999999-999-9");
});
$('#btnModalRegistroJugador').click(function() {
$('#modalAgregarJugador').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
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
                url: '?1=EscFutbolController&2=guardarSegundo',
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
                        $('#dtSegundoN').DataTable().ajax.reload();
                        cerrar();
                    } 
                }
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

if(edad > 9 || edad < 8){
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

</script>