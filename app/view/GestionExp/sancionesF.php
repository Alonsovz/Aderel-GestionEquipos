<br><div id="app">


            <modal-jugador :detalles="detalles"></modal-jugador>

    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <i class="female icon"></i><i class="futbol icon"></i><i class="close icon"></i>
                        Sanciones graves<font color="#DFD102" size="20px">.</font>

                        <a href="?1=GestionExpController&2=sancionesTorneoF" class="ui olive button">
                   <i class="close icon"></i> Sanciones por torneo
                    </a>
                    </div>

            </div>

            

            <div class="row title-bar">
                <div class="sixteen wide column">
                    <div class="ui divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="sixteen wide column">
                <table id="dtJugadoresF" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #FACC2E; color:white;">N°</th>
                                        <th style="background-color: #7401DF; color:white;" ></th>
                                        <th style="background-color: #7401DF; color:white;">Cod. Expediente</th>
                                        <th style="background-color: #7401DF; color:white;">Nombre</th>
                                        <th style="background-color: #7401DF; color:white;">Apellido</th>
                                        <th style="background-color: #7401DF; color:white;">Dui / Carnet Minoridad</th>
                                        <th style="background-color: #7401DF; color:white;">Fecha de Nacimiento</th>
                                        <th style="background-color: #7401DF; color:white;">Edad del Jugador</th>        
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                </div>
            </div>
    </div>

    <div class="ui modal" id="modalSancion">
        <div class="header">
            Nueva Sanción
        </div>

        <div class="content">

        <form class="ui form">
            <div class="field">
                <div class="fields">
                    <div class="six wide field">
                        <label><i class="male icon"></i>Jugador</label>
                       <input type="text" name="nombre" id="nombre" readonly>
                       
                       <input type="hidden" name="idJugador" id="idJugador" readonly>
                    </div>
                    

                    <div class="ten wide field">
                        <label><i class="close icon"></i>Motivo de sanción</label>
                        <textarea rows="2" id="motivo" name="motivo" placeholder="Motivo de sanción">
                        </textarea>
                    </div>

                    

                </div>
            </div>
        </form>

        </div>

        <div class="actions">
            <button class="ui black deny button" id="cerrarSancion">
            Cancelar
            </button>

            <button class="ui blue button" id="aplicar">
            Sancionar
            </button>
        </div>
    </div>


    <div class="ui tiny modal" id="quitar">

                <div class="header">
                    Quitar sanción
                </div>
                <div class="content">
                    <h4>¿Quitar sanción a <a id="nom" style="color:black;"></a>?</h4>
                    <form action="" class="ui equal width form">
                        <div class="fields">
                            <div  class="field">
                                <input type="hidden" name="idJug" id="idJug">
                                
                            </div>
                        </div>
                    </form>        
                </div>
                <div class="actions">
                    <button class="ui black deny button">
                        Cancelar
                    </button>
                    <button class="ui right blue button" id="btnQuitar">
                        Quitar Sanción
                    </button>
                </div>
     </div>

</div>

<script src="./res/tablas/tablaJugadoresSancionGF.js"></script>
<script src="./res/js/modalHistorialSanciones.js"></script>
<script>
   
var appJ = new Vue({
        el: "#app",
        data: {
            detalles: [],
            
        },
        methods: {
            refrescarTabla() {
                
                tablaJugadoresF.ajax.reload();

                
            },
            verDetalle(id){
                this.idJugador = parseInt(id);

            $('#frmDetalles').addClass('loading');
            $.ajax({
            type: 'POST',
            url: '?1=JugadoresController&2=detallesSancion',
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
            
            
            
            
           
            

        }
    });
</script>
<script>
var sancionar=(ele)=>{
    $("#nombre").val($(ele).attr("nombre") +" "+$(ele).attr("apellido"));

   
    $("#idJugador").val($(ele).attr("id"));
   

   
    
    $("#modalSancion").modal('setting', 'closable', false).modal('show');
}
var ver=(ele)=>{
     $('#modalVer').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    appJ.verDetalle($(ele).attr('id'));
  }

var quitarSancion=(ele)=>{
    $("#nom").text($(ele).attr("nombre") +" "+$(ele).attr("apellido"));
   
    $("#idJug").val($(ele).attr("id"));
    $("#quitar").modal('setting', 'closable', false).modal('show');
}

$("#aplicar").click(function(){
    var idJugador =  $("#idJugador").val();
   // var idEquipo = $("#idEquipo").val();
    var motivo = $("#motivo").val();

    alertify.confirm("¿Desea aplicar la sanción a la jugadora?",
            function(){
    $.ajax({
                
                type: 'POST',
                url: '?1=JugadoresController&2=sancionGrave',
                data: {
                    idJugador : idJugador,
                    motivo : motivo,
                },
                success: function(r) {
                    if(r == 111) {
                        $('#modalSancion').modal('hide');
                        swal({
                            title: 'Listo',
                            text: 'Sanción aplicada con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtJugadoresF').DataTable().ajax.reload();
                        //$("#modalCambios").modal('setting', 'closable', false).modal('show');
                    } 
                }
            });
        },
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            });
});


$("#btnQuitar").click(function(){
    var idJugador =  $("#idJug").val();
    var idEquipo =  $("#idEquipo").val()
   

   
    $.ajax({
                
                type: 'POST',
                url: '?1=JugadoresController&2=quitarSancionGrave',
                data: {
                    idJugador : idJugador,
                    idEquipo : idEquipo,
                    
                },
                success: function(r) {
                    if(r == 111) {
                        $('#quitar').modal('hide');
                        swal({
                            title: 'Listo',
                            text: 'Sanción eliminada con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtJugadoresF').DataTable().ajax.reload();
                        //$("#modalCambios").modal('setting', 'closable', false).modal('show');
                    } 
                }
            });
        
});
</script>