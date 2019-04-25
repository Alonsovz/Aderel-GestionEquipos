

<div id="app">
<modal-eliminar id_form="frmReeestablecerE" id="modalReestablecerE" url="?1=EquipoController&2=reestablecerE" titulo="Reestablecer equipo"
sub_titulo="¿Está seguro de querer reestablecer este equipo?" :campos="campos_reestablecerE" tamanio='tiny'></modal-eliminar>


<modal-eliminar id_form="frmReeestablecerJ" id="modalReestablecerJ" url="?1=JugadoresController&2=reestablecerJ" titulo="Reestablecer jugador/a"
sub_titulo="¿Está seguro de querer reestablecer este jugador/a?" :campos="campos_reestablecerJ" tamanio='tiny'></modal-eliminar>


<modal-eliminar id_form="frmReeestablecerU" id="modalReestablecerU" url="?1=UsuarioController&2=reestablecerU" titulo="Reestablecer usuario/a"
sub_titulo="¿Está seguro de querer reestablecer este usuario/a?" :campos="campos_reestablecerU" tamanio='tiny'></modal-eliminar>

<modal-eliminar id_form="frmReeestablecerI" id="modalReestablecerI" url="?1=IngresosController&2=reestablecerI" titulo="Reestablecer ingreso"
sub_titulo="¿Está seguro de querer reestablecer este ingreso?" :campos="campos_reestablecerU" tamanio='tiny'></modal-eliminar>

<modal-eliminar id_form="frmReeestablecerEg" id="modalReestablecerEg" url="?1=EgresosController&2=reestablecerEg" titulo="Reestablecer egreso"
sub_titulo="¿Está seguro de querer reestablecer este egreso?" :campos="campos_reestablecerU" tamanio='tiny'></modal-eliminar>


<br><br>
<div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="recycle icon"></i>
                    Papelería ADEREL<font color="#DFD102" size="20px">.</font>
                </div>
        </div>

<div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">



<button  style="width:16%; text-align:center;"  class="ui yellow button" id="btnUsuarios">
    Usuarios
    <div class="ui divider"></div>
    <i class="cogs icon"></i><i class="users icon"></i>
</button>

<button  style="width: 16%; text-align:center;" class="ui violet button" id="btnJugadores">
Jugadores
    <div class="ui divider"></div>
    <i class="futbol icon"></i><i class="male icon"></i><i class="female icon"></i>
</button>



<button style="width: 16%; text-align:center;"  class="ui olive button" id="btnEquipos">
    Equipos
    <div class="ui divider"></div>
    <i class="futbol icon"></i><i class="users icon"></i>
</button>



<button style="width: 16%; text-align:center;"  class="ui red button" id="btnIngresos">
    Ingresos
    <div class="ui divider"></div>
    <i class="money bill icon"></i><i class="dollar icon"></i><i class="reply icon"></i>
</button>


<button style="width: 16%; text-align:center;"  class="ui green button" id="btnEgresos">
    Egresos
    <div class="ui divider"></div>
    <i class="money bill icon"></i><i class="dollar icon"></i><i class="share icon"></i>
</button>



<button style="width: 16%; text-align:center;"  class="ui purple button" id="btnVales">
    Vales de Caja
    <div class="ui divider"></div>
    <i class="box icon"></i><i class="dollar icon"></i><i class="share icon"></i>
</button>


</div>

<div id="jugadores">
        <div class="row title-bar">
            <div class="sixteen wide column">
            <br><br>
            <div class="titulo">
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

</div>
    <div id="equipos">
        <div class="row title-bar">
            <div class="sixteen wide column">
        <br><br>
                
            <div class="titulo">
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

        
</div>
        

<div id="users">
        <div class="row title-bar">
            <div class="sixteen wide column">
        <br><br>
                
            <div class="titulo">
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


<div id="ingresos">
        <div class="row title-bar">
            <div class="sixteen wide column">
            <br><br>
            <div class="titulo">
                <i class="dollar icon"></i><i class="reply icon"></i>
                    Ingresos  Eliminados<font color="#DFD102" size="20px">.</font>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
            <table id="dtIngresosE" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                        <th style="background-color: #CD2020; color: white;">N°</th>
                                        <th style="background-color: #CD2020; color: white;">Ingreso</th>
                                        <th style="background-color: #CD2020; color: white;">Cantidad</th>
                                        <th style="background-color: #CD2020; color: white;">Fecha</th>
                                        <th style="background-color: #CD2020; color: white;">Acciones</th>
                                                 
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
            </div>
        </div>

</div>


<div id="egresos">
        <div class="row title-bar">
            <div class="sixteen wide column">
            <br><br>
            <div class="titulo">
                <i class="dollar icon"></i><i class="share icon"></i>
                    Egresos  Eliminados<font color="#DFD102" size="20px">.</font>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
            <table id="dtEgresosE" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        <th style="background-color: #E6C404;">ID</th>
                            <th style="background-color: #1CC647; color:white;">Ch No.</th>
                            <th style="background-color: #1CC647; color:white;">Concepto Egreso</th>
                            <th style="background-color: #1CC647; color:white;">Cantidad</th>
                            <th style="background-color: #1CC647; color:white;">Retención</th>
                            <th style="background-color: #1CC647; color:white;">Pagado</th>
                            <th style="background-color: #1CC647; color:white;">Chequera</th>
                            <th style="background-color: #1CC647; color:white;">Fecha</th>
                            <th style="background-color: #1CC647; color:white;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

</div>

<div id="vales">
        <div class="row title-bar">
            <div class="sixteen wide column">
            <br><br>
            <div class="titulo">
                <i class="dollar icon"></i><i class="share icon"></i>
                    Vales  Eliminados<font color="#DFD102" size="20px">.</font>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
            <table id="dtCaja" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                        <th style="background-color: #04B4AE; color:white;">N°</th>
                        <th style="background-color: #A901DB; color:white;">Fecha</th>
                            <th style="background-color: #A901DB; color:white;">Cantidad</th>
                            <th style="background-color: #A901DB; color:white;">Concepto</th>
                            <th style="background-color: #A901DB; color:white;">Recibido por</th>
                            <th style="background-color: #A901DB; color:white;">Caja</th>
                            <th style="background-color: #A901DB; color:white;">Acciones</th>
                            
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

</div>

<div id="reestablecerV" class="ui tiny modal">
<div class="header">
                    Reestablecer vale de caja
                </div>
                <div class="content">
                    <h4>¿Desea reestablecer el vale a la caja?</h4>
                    <form action="" class="ui equal width form">
                        <input type="hidden" name="idVale" id="idVale">
                        <input type="hidden" name="idTipo" id="idTipo">
                    </form>        
                </div>
                <div class="actions">
                    <button class="ui black deny button">
                        Cancelar
                    </button>
                    <button class="ui right green button" id="btnReestablecerV" >
                        Reestablecer
                    </button>
                </div>
</div>
        
</div>


</div>
<script src="./res/tablas/tablaUsuariosE.js"></script>
<script src="./res/tablas/tablaJugadoresE.js"></script>
<script src="./res/tablas/tablaEquiposE.js"></script>
<script src="./res/js/modalReestablecer.js"></script>
<script src="./res/tablas/tablaIngresosE.js"></script>
<script src="./res/tablas/tablaEgresosE.js"></script>
<script src="./res/tablas/tablaCajaE.js"></script>
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
            }],
            campos_reestablecerI: [{
                name: 'idReestablecer',
                type: 'hidden'
            }],
            campos_reestablecerE: [{
                name: 'idReestablecer',
                type: 'hidden'
            }]
        },
        methods: {
            refrescarTabla() {
                tablaUsuariosE.ajax.reload();
                tablaJugadoresE.ajax.reload();
                tablaEquiposE.ajax.reload();
                tablaIngresosE.ajax.reload();
                tablaEgresosE.ajax.reload();
                tablaCajaE.ajax.reload();
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

var reestablecerI=(ele)=>{
  $('#modalReestablecerI').modal('setting', 'closable', false).modal('show');
  $('#idReestablecer').val($(ele).attr("id"));
}
var reestablecerEg=(ele)=>{
  $('#modalReestablecerEg').modal('setting', 'closable', false).modal('show');
  $('#idReestablecer').val($(ele).attr("id"));
}
var reestablecerC=(ele)=>{
  $('#reestablecerV').modal('setting', 'closable', false).modal('show');
  $('#idVale').val($(ele).attr("id"));
  $('#idTipo').val($(ele).attr("idTipo"));
}

$(document).ready(function(){
    
    $("#equipos").hide();
    $("#jugadores").hide();
    $("#ingresos").hide();
    $("#egresos").hide();
    $("#vales").hide();
});


$("#btnJugadores").click(function(){
    $("#users").hide('2000');
    $("#equipos").hide('2000');
    $("#jugadores").show('2000');
    $("#ingresos").hide('2000');
    $("#egresos").hide('2000');
    $("#vales").hide('2000');
});

$("#btnUsuarios").click(function(){
    $("#users").show('2000');
    $("#equipos").hide('2000');
    $("#jugadores").hide('2000');
    $("#ingresos").hide('2000');
    $("#egresos").hide('2000');
    $("#vales").hide('2000');
});

$("#btnEquipos").click(function(){
    $("#users").hide('2000');
    $("#equipos").show('2000');
    $("#jugadores").hide('2000');
    $("#ingresos").hide('2000');
    $("#egresos").hide('2000');
    $("#vales").hide('2000');
});

$("#btnIngresos").click(function(){
    $("#users").hide('2000');
    $("#equipos").hide('2000');
    $("#jugadores").hide('2000');
    $("#ingresos").show('2000');
    $("#egresos").hide('2000');
    $("#vales").hide('2000');
});

$("#btnEgresos").click(function(){
    $("#users").hide('2000');
    $("#equipos").hide('2000');
    $("#jugadores").hide('2000');
    $("#ingresos").hide('2000');
    $("#egresos").show('2000');
    $("#vales").hide('2000');
});

$("#btnVales").click(function(){
    $("#users").hide('2000');
    $("#equipos").hide('2000');
    $("#jugadores").hide('2000');
    $("#ingresos").hide('2000');
    $("#egresos").hide('2000');
    $("#vales").show('2000');
});


$('#btnReestablecerV').click(function() {
               var idVale = $('#idVale').val();
               var idTipo = $('#idTipo').val();
         
        
            $.ajax({
                type: 'POST',
                url: '?1=CajaChicaController&2=reestablecerV',
                data: {
                    idVale : idVale,
                    idTipo : idTipo,
                },
                success: function(r) {
                    if(r == 1) {
                        $('#reestablecerV').modal('hide');
                        swal({
                            title: 'Reestablecido',
                            text: 'El elemento fue reestablecido exitosamente',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1500

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtCaja').DataTable().ajax.reload();
                        
                    } 
                }
            });
            });

</script>