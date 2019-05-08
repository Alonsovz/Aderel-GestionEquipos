

<br><div id="appE">

<modal-detalles :detalles="detalles"></modal-detalles>


    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <i class="trophy icon"></i> <i class="futbol icon"></i>
                       Historial de  Torneos Femeninos<font color="#1CC647" size="20px">.</font>

                        </div>
            </div>
            <a class='ui red floated button' href="?1=TorneosController&2=gestionF">
            <i class="left point hand icon"></i>Volver
            </a>

         <div class="row title-bar">
                            <div class="sixteen wide column">
                                <div class="ui divider"></div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="sixteen wide column">
                            <table id="dtHistorialTF" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #FACC2E; color:white;">N°</th>
                                        <th style="background-color: #1CC647; color:white;">Nombre del Torneo</th>
                                        <th style="background-color: #1CC647; color:white;">Categoría del Torneo</th>
                                        <th style="background-color: #1CC647; color:white;">Acciones</th>
                                       
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
    
                </div>

     




</div>

<script src="./res/tablas/tablaHistorialTF.js"></script>
<script src="./res/js/modalHistorialTorneo.js"></script>
<script>
var appE = new Vue({
        el: "#appE",
        data: {
            detalles: [],
          
        },
        methods: {
            cargarDetalles(id) {

                this.idTorneo = parseInt(id);

                $('#frmDetalles').addClass('loading');
                $.ajax({
                type: 'POST',
                url: '?1=TorneosController&2=mostrarEquiposHF',
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
            },
            historial(idTorneo, nombre){
                    var idTorneo = idTorneo;
                    var nombre = nombre;
            window.open('?1=EquipoController&2=historial&idTorneo='+idTorneo+'&nombre='+nombre,'_blank');
            return false;
                }
        }
    });
</script>
<script>



  var estadisticas=(ele)=>{
     $('#eleccion').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    $("#idTorneoEs").val($(ele).attr('id'));
   // appE.goleadores($(ele).attr('id'));
  }

 

var verEquipos=(ele)=>{
            $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
            appE.cargarDetalles($(ele).attr('id'));
}




</script>


