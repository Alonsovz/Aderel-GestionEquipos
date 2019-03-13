<script>
    console.log(<?php echo $equipoCMB;?>)


</script>

<div id="appJ">

<modal-eliminar id_form="frmEliminarJ" id="modalEliminarJ" url="?1=JugadoresController&2=eliminar" titulo="Eliminar Jugador"
        sub_titulo="¿Está seguro de querer eliminar este jugador?" :campos="campos_eliminarJ" tamanio='tiny'></modal-eliminar>

<modal-editar id_form="frmEditarJ" id="modalEditarJ" url="?1=JugadoresController&2=editar" titulo="Editar Jugador"
:campos="campos_editarJ" tamanio='tiny' style="overflow: scroll;"></modal-editar>
        <div class="ui grid">
                        <div class="row">
                                <div class="titulo">
                                    <i class="team icon"></i>
                                    Jugadores<font color="#DFD102" size="20px">.</font>
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
                            <table id="dtJugadores" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #FACC2E;">N°</th>
                                        <th style="background-color: #FACC2E;" ></th>
                                        <th style="background-color: #FACC2E;">Nombre</th>
                                        <th style="background-color: #FACC2E;">Apellido</th>
                                        <th style="background-color: #FACC2E;">Dui</th>
                                        <th style="background-color: #FACC2E;">Fecha de Nacimiento</th>
                                        <th style="background-color: #FACC2E;">Edad del Jugador</th>
                                        <th style="background-color: #FACC2E;">Equipo</th>
                                       
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
                    
        </div>

<div class="ui tiny modal" id="modalAgregarJugador"  style="overflow: scroll;">

<div class="header">
<i class="male icon"></i><i class="trophy icon"></i><i class="futbol icon"></i> Agregar nuevo Jugador
</div>
<div class="content" class="ui equal width form">
    <form class="ui form" id="frmJugador" method="POST" enctype="multipart/form-data" action='?1=JugadoresController&2=guardarJugador'> 
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
            <div id="age">
            <div class="field">
            <div class="fields">
                <div class="three wide field"></div>
            <div class="five wide field">
                <label>La edad del jugador es:</label>
            </div>
                <div class="five wide field">
                 <input type="text" id="edad" name="edad" readonly>
                </div>
            <div class="three wide field"></div>
            </div>
            </div>
            </div>
                <div class="field">
                        <div class="fields">
                        <div class="six wide field">
                        <label><i class="address card icon"></i>N° Dui del Jugador</label>
                            <input type="text" name="dui" placeholder="DUI del jugador" id="dui">
                                    <div class="ui red pointing label"  id="labelDui"
                                    style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                    Completa este campo
                                    </div>
                        </div>
                            <div class="ten wide field">
                            <label><i class="calendar icon"></i>Nombre del Equipo</label>
                            <select name="equipo" id="equipo" class="ui search dropdown">
                            </select>
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

<script src="./res/tablas/tablaJugadores.js"></script>

<script>
    
var appJ = new Vue({
        el: "#appJ",
        data: {
            
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
                    label: 'DUI:',
                    name: 'dui',
                    type: 'text', 
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
                    label: 'Equipo:',
                    name: 'equipo',
                    type: 'select',
                    options: <?php echo $equipoCMB;?>,
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
                
                tablaJugadores.ajax.reload();

                
            },
            
            cargarDatosJ() {
                var id = $("#idDetalleE").val();

                fetch("?1=JugadoresController&2=cargarDatosJugadores&id=" + id)
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
                        $('#frmEditarJ input[name="fechaNacimiento"]').val(dat.fechaNacimiento);
                        $('#frmEditarJ input[name="edad"]').val(dat.edad);
                        $('#frmEditarJ select[name="equipo"]').dropdown('set selected', dat.idEquipo);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            
           
            

        }
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#age").hide();
});

$(function(){
$('#btnCerrar').click(function() { 
                $("#age").hide();   
                $('#nombreJ').val('');
                $('#apellidoJ').val('');
                $('#dui').val('');
                $('#fechaNac').val('');
                $('#equipo').prop('selected', false).find('option:first').prop('selected', true);
                $('#Imagen').val('');
                $('#modalAgregarJugador').modal('hide');
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
            $('#btnGuardarJugador').click(function() {
                const form = $('#frmJugador');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=JugadoresController&2=guardarJugador',
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
                        $('#dtJugadores').DataTable().ajax.reload();
                        
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
}


function resultadoE(){
    var fecha = $('#frmEditarJ input[name="fechaNacimiento"]').val();

var edad = Edad(fecha);

$('#frmEditarJ input[name="edad"]').val(edad);
}

$('#fechaNac').change(function(){
    var fecha =  document.getElementById('fechaNac').value;

Edad(fecha);

resultado();


});

$('#frmEditarJ input[name="fechaNacimiento"]').change(function(){
    var fecha = $('#frmEditarJ input[name="fechaNacimiento"]').val();

Edad(fecha);

resultadoE();


});

</script>