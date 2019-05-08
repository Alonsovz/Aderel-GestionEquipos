

<br><div id="appE">
<modal-detalles :detalles="detalles"></modal-detalles>
<modal-campeon :detalles="detalles"></modal-campeon>
<modal-goleo :detalles="detalles"></modal-goleo>

    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <i class="trophy icon"></i> <i class="futbol icon"></i>
                       Historial de  Torneos Masculinos<font color="#1CC647" size="20px">.</font>
                        </div>
            </div>
            <a class='ui red floated button' href="?1=TorneosController&2=gestionM">
            <i class="left point hand icon"></i>Volver
            </a>
         <div class="row title-bar">
                            <div class="sixteen wide column">
                                <div class="ui divider"></div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="sixteen wide column">
                            <table id="dtHistorialTM" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
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


<div class="ui tiny modal" id="eleccion">
<div class="header">
<i class="sort amount up icon"></i> Estadísticas del torneo: <a id="nombreT"></a>

</div>

<div class="content">
<br>
<input type="hidden" id="idTorneoEs">
    <div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

    <button class="ui blue inverted segment"  style="width: 49%; text-align:center;" id="verPosiciones">
     Campeón
     <div class="ui divider"></div>
     <i class="futbol icon"></i> <i class="calendar icon"></i>
    </button>

    <button class="ui orange inverted segment" id="tablaGol" style="width: 49%; text-align:center;">
    Goleadores
    <div class="ui divider"></div>
    <i class="futbol icon"></i> <i class="male icon"></i>
    </button>


    </div>
</div>
<div class="actions">
<button class="ui black deny button">
Cancelar
</button>
</div>
</div>
</div>


<script src="./res/tablas/tablaHistorialTM.js"></script>
<script src="./res/js/modalHistorialTorneo.js"></script>
<script src="./res/js/modalCampeon.js"></script>
<script src="./res/js/modalGoleadores.js"></script>
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
                url: '?1=TorneosController&2=mostrarEquiposHM',
                data: {
                id: id
                },
                success: function (data) {
                appE.detalles = JSON.parse(data);
                $('#frmDetalles').removeClass('loading');
                }
                });

            },
            cerrarModalG() {
                
                $('#eleccion').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                 .modal('show');
                 this.detalles = [];
            },
            cargarCampeon(id) {

            this.idTorneo = parseInt(id);

            $('#frmDetalles').addClass('loading');
            $.ajax({
            type: 'POST',
            url: '?1=TorneosController&2=campeon',
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
                },
                goleadores(id) {

            this.idTorneo = parseInt(id);

            $('#frmDetalles').addClass('loading');
            $.ajax({
            type: 'POST',
            url: '?1=TorneosController&2=goleadores',
            data: {
            id: id
            },
            success: function (data) {
            appE.detalles = JSON.parse(data);
            $('#frmDetalles').removeClass('loading');
            }
            });

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

var verEstadisticas=(ele)=>{
    
    $('#eleccion').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
     $('#idTorneoEs').val($(ele).attr('id'));
     $("#nombreT").text($(ele).attr('torneo'));
  }

  $("#tablaGol").click(function(){
    appE.goleadores($("#idTorneoEs").val());
    $('#modalGoleo').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
  });


  $("#verPosiciones").click(function(){
    appE.cargarCampeon($("#idTorneoEs").val());
    $('#modalDetallesC').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
  });



</script>

