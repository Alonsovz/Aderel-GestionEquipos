<br><div id="app">
    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <i class="team icon"></i>
                        Equipos-Jugadores-Categorías existentes<font color="#DFD102" size="20px">.</font>
                    </div>
                    
            
            </div>
            
    </div>
    <div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

                 <button style="width: 23%;" class="ui yellow  inverted segment" id="btnVerTorneos">
                <i class="trophy icon"></i>
                Torneos
                </button>

                <button style="width: 23%;" class="ui blue inverted segment"  id="btnVerEquipos">
                <i class="futbol icon"></i>
                Equipos
                </button>

                <button style="width: 23%;" class="ui yellow  inverted segment" id="btnVerJugadores">
                <i class="users icon"></i>
                Jugadores
                </button>
                    
                <button style="width: 23%;" class="ui blue  inverted segment" id="btnVerCategorias">
                <i class="chart bar outline icon"></i>
                Categorías
                </button>
      </div>
      
      <div id="divTorneos">
      <div class="ui grid">
            <div class="row">
                 <div class="titulo">
                    <i class="trohpy icon"></i>
                    Torneos<font color="#DFD102" size="20px">.</font>
                    <button class="ui right floated yellow labeled icon button"  id="btnReporteEquipos">
                        <i class="file icon"></i>
                    Reporte de Torneos
                    </button>
                    </div>
            </div>
            <div class="row title-bar">
                    <div class="sixteen wide column">
                        <button class="ui right floated blue labeled icon button" id="btnModalRegistroTorneo">
                            <i class="plus icon"></i>
                            Agregar Torneo
                        </button>
                    </div>
                 </div>
        </div>
      </div>

      <div id="divEquipos">
      <div class="ui grid">
            <div class="row">
                 <div class="titulo">
                    <i class="team icon"></i>
                    Equipos<font color="#DFD102" size="20px">.</font>
                    <button class="ui right floated yellow labeled icon button"  id="btnReporteEquipos">
                        <i class="file icon"></i>
                    Reporte de Equipos
                    </button>
                    </div>
            </div>

                 <div class="row title-bar">
                    <div class="sixteen wide column">
                        <button class="ui right floated blue labeled icon button" id="btnModalRegistroEquipo">
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
                            <table id="dtEquipos" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #E6C404;">N°</th>
                                        <th style="background-color: #E6C404;">Nombre del  Equipo</th>
                                        <th style="background-color: #E6C404;">Encargado del  Equipo</th>
                                        <th style="background-color: #E6C404;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
            
        </div>
      </div>
    
      <div id="divJugadores">
        <div class="ui grid">
                        <div class="row">
                                <div class="titulo">
                                    <i class="team icon"></i>
                                    Jugadores<font color="#DFD102" size="20px">.</font>
                                
                                <button class="ui right floated yellow labeled icon button"  id="btnReporteJugadores">
                                    <i class="file icon"></i>
                                Reporte de Jugadores
                                </button>
                                </div>
                        </div>
                        <div class="row title-bar">
                            <div class="sixteen wide column">
                                <button class="ui right floated blue labeled icon button" id="btnModalRegistroJugador">
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
                                    
                                        <th style="background-color: #E6C404;">N°</th>
                                        <th style="background-color: #E6C404;">Nombre del Jugador</th>
                                        <th style="background-color: #E6C404;">Apellido</th>
                                        <th style="background-color: #E6C404;">Foto</th>
                                        <th style="background-color: #E6C404;">Dui</th>
                                        <th style="background-color: #E6C404;">Fecha de Nacimiento</th>
                                        <th style="background-color: #E6C404;">Equipo</th>
                                        <th style="background-color: #E6C404;">Categoria</th>
                                        <th style="background-color: #E6C404;">Acciones</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
                    
        </div>
      </div>

      <div id="divCategorías">
      <div class="ui grid">
        <div class="row">
                    <div class="titulo">
                            <i class="team icon"></i>
                            Categorías<font color="#DFD102" size="20px">.</font>
                        
                        <button class="ui right floated yellow labeled icon button"  id="btnReporteCategorias">
                            <i class="file icon"></i>
                        Reporte de Categorías
                        </button>
                    </div>
        </div>
                    <div class="row title-bar">
                            <div class="sixteen wide column">
                                <button class="ui right floated blue labeled icon button" id="btnModalRegistroCategoria">
                                    <i class="plus icon"></i>
                                    Agregar Categoría
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
                            <table id="dtCategorias" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #E6C404;">N°</th>
                                        <th style="background-color: #E6C404;">Nombre de la Categoria</th>
                                        <th style="background-color: #E6C404;">Rango de edad</th>
                                        <th style="background-color: #E6C404;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
                   
        </div>
        </div>
      </div>
</div>

<!--Este es el modal para añadir nuevo jugador-->
<div class="ui tiny modal" id="modalAgregarJugador">

        <div class="header">
        <i class="male icon"></i><i class="trophy icon"></i><i class="futbol icon"></i> Agregar nuevo Jugador
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
                                <div class="ten wide field">
                                    <label><i class="photo icon"></i>Foto</label>
                                        <input type="file" name="Imagen" placeholder="Cargar Foto del jugador" id="Imagen">
                                            <div class="ui red pointing label"  id="labelFoto"
                                            style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                            Completa este campo
                                            </div>
                                </div>                               
                                <div class="six wide field">
                                <label><i class="address card icon"></i>N° Dui del Jugador</label>
                                    <input type="text" name="dui" placeholder="DUI del jugador" id="dui">
                                            <div class="ui red pointing label"  id="labelDui"
                                            style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                            Completa este campo
                                            </div>
                                </div>
                                
                    </div>   
                        <div class="field">
                                <div class="fields">
                                    <div class="five wide field">
                                    <label><i class="calendar icon"></i>Fecha de Nacimiento</label>
                                        <input type="date" id="fechaNac" name="fechaNac">
                                            <div class="ui red pointing label"  id="labelFecha"
                                                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                                                Completa este campo</div>
                                            </div>   
                                    <div class="six wide field">
                                    <label><i class="calendar icon"></i>Nombre del Equipo</label>
                                        <input type="text" id="equipo" name="equipo">
                                    </div> 
                                    <div class="five wide field">
                                    <label><i class="chart bar outline icon"></i>Categoría</label>
                                        <input type="text" id="categoria" name="categoria">
                                    </div>  
                                </div>
                        </div>
                </div>
                
            </form>
        </div>
            <div class="actions">
                <button id="btncerrar" onclick="cerrarCambiosJugador()" class="ui yellow button">
                    Cancelar
                </button>
                <button class="ui blue button" id="btnGuardarJugador" >
                Guardar
                </button>
            </div>
</div>

<script src="./res/tablas/tablaEquipos.js"></script>
<script src="./res/tablas/tablaCategorias.js"></script>
<script src="./res/tablas/tablaJugadores.js"></script>
<script type="text/javascript">
window.onload =  function ()
{
    
    $("#divEquipos").hide();
    $("#divJugadores").hide();
    $("#divCategorías").hide();
    $("#divTorneos").hide();
    
}


$(function(){
    $("#btnVerTorneos").click(function(){
        
        $("#btnVerTorneos").removeClass('ui yellow  inverted segment');
        $("#btnVerTorneos").addClass('ui yellow basic button');

        $("#btnVerEquipos").removeClass('ui blue  basic button');
        $("#btnVerEquipos").addClass('ui blue inverted segment');

        $("#btnVerJugadores").removeClass('ui yellow basic button');
        $("#btnVerJugadores").addClass('ui yellow inverted segment');

        $("#btnVerCategorias").removeClass('ui blue basic button');
        $("#btnVerCategorias").addClass('ui blue inverted segment');

        $("#divTorneos").show();
        $("#divJugadores").hide();
        $("#divCategorías").hide();
             $("#divEquipos").hide();
        
    });

    $("#btnVerEquipos").click(function(){
        
        $("#btnVerTorneos").removeClass('ui yellow basic button');
        $("#btnVerTorneos").addClass('ui yellow  inverted segment');

        $("#btnVerEquipos").removeClass('ui blue  inverted segment');
        $("#btnVerEquipos").addClass('ui blue basic button');

        $("#btnVerJugadores").removeClass('ui yellow basic button');
        $("#btnVerJugadores").addClass('ui yellow inverted segment');

        $("#btnVerCategorias").removeClass('ui blue basic button');
        $("#btnVerCategorias").addClass('ui blue inverted segment');

        $("#divEquipos").show();
        $("#divJugadores").hide();
        $("#divCategorías").hide();
      $("#divTorneos").hide();
        
    });

    $("#btnVerJugadores").click(function(){
        
        $("#btnVerTorneos").removeClass('ui yellow basic button');
        $("#btnVerTorneos").addClass('ui yellow  inverted segment');

        $("#btnVerJugadores").removeClass('ui yellow  inverted segment');
        $("#btnVerJugadores").addClass('ui yellow basic button');

       $("#btnVerEquipos").removeClass('ui blue basic button');
        $("#btnVerEquipos").addClass('ui blue inverted segment');

        $("#btnVerCategorias").removeClass('ui blue basic button');
        $("#btnVerCategorias").addClass('ui blue inverted segment');

        $("#divEquipos").hide();
        $("#divJugadores").show();
        $("#divCategorías").hide();
       $("#divTorneos").hide();
        
    });

    $("#btnVerCategorias").click(function(){
  
        $("#btnVerTorneos").removeClass('ui yellow basic button');
        $("#btnVerTorneos").addClass('ui yellow  inverted segment');

        $("#btnVerCategorias").removeClass('ui blue  inverted segment');
        $("#btnVerCategorias").addClass('ui blue basic button');
        
        $("#btnVerEquipos").removeClass('ui blue basic button');
        $("#btnVerEquipos").addClass('ui blue inverted segment');

        $("#btnVerJugadores").removeClass('ui yellow basic button');
        $("#btnVerJugadores").addClass('ui yellow inverted segment');

        $("#divEquipos").hide();
        $("#divJugadores").hide();
        $("#divCategorías").show();
       $("#divTorneos").hide();
        
    });
   

    $(document).on("click", "#btnModalRegistroJugador", function () {
            $('#modalAgregarJugador').modal('setting', 'autofocus', true).modal('setting', 'closable', true).modal('show');
        });

});

function cerrarCambiosJugador() {      
                $('#modalAgregarJugador').modal('hide');
            }


//esta es la funcion para enviar datos
$(function(){
            $('#btnGuardarJugador').click(function() {

              var  nombreJ = $('#nombreJ').val();
              var  apellidoJ = $('#apellidoJ').val();
              var  dui = $('#dui').val();
              var fecha = $('#fechaNac').val();
              var  equipo = $('#equipo').val();
              var  categoria = $('#categoria').val();
                
               var   formdata = new FormData();
               var file =$("#Imagen").prop('files')[0];
                formdata.append("Imagen", file);
        
            $.ajax({
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    url: '?1=GestionExpController&2=guardarJugador',
					data: {
                        nombre: nombreJ,
                        apellido: apellidoJ,
                       foto: formdata,
                        dui: dui,
                        fecha: fecha,
                        equipo: equipo,
                        categoria: categoria,
                    },
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
                                        
                                    } 
                                }
            });
            });
});

</script>