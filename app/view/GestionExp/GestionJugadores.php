<?php
            $fechaMaxima = date('d/m/Y');
            $fechaMax = strtotime ( '- day' , strtotime ( $fechaMaxima ) ) ;
            $fechaMax = date ( 'd/m/Y' , $fechaMax );
             
            $fechaMinima = date('Y-m-d');
            $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
            $fechaMin = date ( 'd/m/Y' , $fechaMin );

            $anio= date('Y');
            $mes = date('M');
            $mesN = date('m')
?>

<div id="appJ">

<modal-eliminar id_form="frmEliminarJ" id="modalEliminarJ" url="?1=JugadoresController&2=eliminar" titulo="Eliminar Jugador"
        sub_titulo="¿Está seguro de querer eliminar este jugador?" :campos="campos_eliminarJ" tamanio='tiny'></modal-eliminar>


        <div class="ui grid">
                        <div class="row">
                                <div class="titulo">
                                    <i class="team icon"></i>
                                    Jugadores<font color="#DFD102" size="20px">.</font>
                                <?php echo $fechaMin; ?>
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

            <div class="field">
            <div class="fields">
            <div class="four wide field"></div>
                <div class="eight wide field">
                <input type="text" id="edad" name="edad">
                </div>
            <div class="four wide field"></div>
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
        <button id="btncerrar" onclick="cerrarCambiosJugador()" class="ui yellow button">
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
            
            campos_editar: [{
                    label: 'Nombre del Equipo',
                    name: 'nombreEquipo',
                    type: 'text'
                },
                {
                    label: 'Encargado del Equipo:',
                    name: 'encargado',
                    type: 'text'
                },
                {
                    label: 'Categoría del Equipo:',
                    name: 'selectCategoria',
                    type: 'select',
                    
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
            cargarDatosE() {
                var id = $("#idDetalleE").val();

                fetch("?1=EquipoController&2=cargarDatosEquipo&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmEditarE input[name="nombre"]').val(dat.nombre);
                        $('#frmEditarE input[name="encargado"]').val(dat.encargado);
                        $('#frmEditarE select[name="selectCategoria"]').dropdown('set selected', dat.idCategoria);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            
           
            

        }
    });
</script>
<script type="text/javascript">

$(document).on("click", ".btnEliminarJ", function () {
  $('#modalEliminarJ').modal('setting', 'closable', false).modal('show');
  $('#idEliminar').val($(this).attr("id"));
});


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

        function cerrarCambiosJugador() {      
                $("#edad").text('');
                $('#nombreJ').val('');
                $('#apellidoJ').val('');
                $('#dui').val('');
                $('#fechaNac').val('');
                $('#equipo').val('');
                $('#categoria').val('');
                $('#Imagen').val('');
                $('#modalAgregarJugador').modal('hide');
            }   

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
}


$("#fechaNac").change(function(){
    var fecha = document.getElementById('fechaNac').value;
Edad(fecha);

resultado();


});

</script>