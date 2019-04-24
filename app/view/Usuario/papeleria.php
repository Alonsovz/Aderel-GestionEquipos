

<div id="app">
<modal-eliminar id_form="frmReeestablecerE" id="modalReestablecerE" url="?1=EquipoController&2=reestablecerE" titulo="Reestablecer equipo"
sub_titulo="¿Está seguro de querer reestablecer este equipo?" :campos="campos_reestablecerE" tamanio='tiny'></modal-eliminar>


<modal-eliminar id_form="frmReeestablecerJ" id="modalReestablecerJ" url="?1=JugadoresController&2=reestablecerJ" titulo="Reestablecer jugador/a"
sub_titulo="¿Está seguro de querer reestablecer este jugador/a?" :campos="campos_reestablecerJ" tamanio='tiny'></modal-eliminar>


<modal-eliminar id_form="frmReeestablecerU" id="modalReestablecerU" url="?1=UsuarioController&2=reestablecerU" titulo="Reestablecer usuario/a"
sub_titulo="¿Está seguro de querer reestablecer este usuario/a?" :campos="campos_reestablecerU" tamanio='tiny'></modal-eliminar>


<br><br>
<div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="recycle icon"></i>
                    Papelería ADEREL<font color="#DFD102" size="20px">.</font>
                </div>
        </div>
        

        <div class="row title-bar">
            <div class="sixteen wide column">
            <br><br>
            <div class="titulo" style="font-size:15px;">
                <i class="male icon"></i><i class="futbol icon"></i>
                    Jugadores  Eliminados<font color="#DFD102" size="20px">.</font>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
            <table id="dtJugadoresE" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
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

       
        <div class="row title-bar">
            <div class="sixteen wide column">
        <br><br>
                
            <div class="titulo" style="font-size:15px;">
                <i class="users icon"></i><i class="futbol icon"></i>
                    Equipos  Eliminados<font color="#DFD102" size="20px">.</font>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
            <table id="dtEquiposE" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #0174DF;">N°</th>
                                        <th style="background-color: #86B404; color:white;">Nombre del  Equipo</th>
                                        <th style="background-color: #86B404; color:white;">Encar. del Equipo</th>
                                        <th style="background-color: #86B404; color:white;">Tel. Encargado</th>
                                        <th style="background-color: #86B404; color:white;">Encargado Aux</th>
                                        <th style="background-color: #86B404; color:white;">Tel. Aux</th>
                                        <th style="background-color: #86B404; color:white;">Categoría</th>
                                        <th style="background-color: #86B404; color:white;">Torneo </th>
                                        <th style="background-color: #86B404; color:white;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
            </div>
        </div>

        

        


        <div class="row title-bar">
            <div class="sixteen wide column">
        <br><br>
                
            <div class="titulo" style="font-size:15px;">
                <i class="users icon"></i>
                    Usuarios  Eliminados<font color="#DFD102" size="20px">.</font>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
                <table id="dtUsuariosE" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #E6C404;">N°</th>
                            <th style="background-color: #E6C404;">Nombres</th>
                            <th style="background-color: #E6C404;">Apellido</th>
                            <th style="background-color: #E6C404;">Usuario</th>
                            <th style="background-color: #E6C404;">Email</th>
                            <th style="background-color: #E6C404;">Rol</th>
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
<script src="./res/tablas/tablaUsuariosE.js"></script>
<script src="./res/tablas/tablaJugadoresE.js"></script>
<script src="./res/tablas/tablaEquiposE.js"></script>
<script src="./res/js/modalReestablecer.js"></script>

<script>
var app = new Vue({
        el: "#app",
        data: {
            campos_reestablecerE: [{
                name: 'idReestablecer',
                type: 'hidden'
            }],
            campos_reestablecerJ: [{
                name: 'idReestablecer',
                type: 'hidden'
            }],
            campos_reestablecerU: [{
                name: 'idReestablecer',
                type: 'hidden'
            }]
        },
        methods: {
            refrescarTabla() {
                tablaUsuariosE.ajax.reload();
                tablaJugadoresE.ajax.reload();
                tablaEquiposE.ajax.reload();
            },
            
        }
    });


var reestablecerE=(ele)=>{
  $('#modalReestablecerE').modal('setting', 'closable', false).modal('show');
  $('#idReestablecer').val($(ele).attr("id"));
}

var reestablecerJ=(ele)=>{
  $('#modalReestablecerJ').modal('setting', 'closable', false).modal('show');
  $('#idReestablecer').val($(ele).attr("id"));
}

var reestablecerU=(ele)=>{
  $('#modalReestablecerU').modal('setting', 'closable', false).modal('show');
  $('#idReestablecer').val($(ele).attr("id"));
}



</script>