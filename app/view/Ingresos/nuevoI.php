<div class="ui fullscreen longer modal" id="modalIngreso">
<div class="header">
<i class="dollar sign icon"></i><i class="money bill icon"></i> Agregar Ingreso
</div>
<div class="content" class="ui equal width form">
<form class="ui form">
    <div class="field">
        <div class="fields">       
            <div class="six wide field">
                <label><i class="dollar icon"></i>Tipo de Ingreso</label>
                <select class="ui search dropdown" id="tipoIngreso">
                <option value="Gateway 2" selected="selected">Selecciona una opción</option>
                    <option value="gimnasio">Gimnasio</option>
                    <option value="escuelaFutbol">Escuela de Fútbol</option>
                    <option value="escuelaNatacion">Escuela de Natacion</option>
                    <option value="fondoComun">Fondo Común</option>
                    <option value="inscripcionE">Inscripción de Equipos</option>
                    <option value="inscripcionJ">Inscripción de Jugadores</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
        </div>
    </div> 
</form>
</div>  
<div class="row title-bar">
                            <div class="sixteen wide column">
                                <div class="ui divider"></div>
                            </div>
                        </div>
<div class="content" class="ui equal width form"> 
        
            
            <div class="field" id="otro">
            <form class="ui form" id="frmOtro">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i>
                    Nuevo Ingreso<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>
                <br>
                <div class="fields">
                            <div class="eight wide field" >
                            <label><i class="money bill icon"></i>Nombre del ingreso</label>
                            <input type="text" name="txtTitulo" id="txtTitulo" class="ui search dropdown"  placeholder="Nombre del Ingreso" />
                            </div>
                            <div class="eight wide field" >
                            <label><i class="dollar icon"></i>Cantidad del ingreso</label>
                            <input type="text" id="cantidad" name="cantidad" >
                            </div>
                            <div class="eight wide field" >
                            <label><br></label>
                            <a id="guardarOtro" class="ui blue button"> Agregar Ingreso</a>
                            </div>
                </div>
                </form>
            </div>


            <div class="field" id="gimnasio">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i><i class="weight icon"></i>
                    Nuevo Ingreso de Gimnasio<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>
                <br>
                <div class="row">
            <div class="sixteen wide column">
                <table id="dtGimnasioPago" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                        <th style="background-color: #217CD1; color:white;">N°</th>
                        <th style="background-color: #217CD1; color:white;">Acciones</th>
                        <th style="background-color: #217CD1; color:white;">Cod. Expediente</th>
                        <th style="background-color: #217CD1; color:white;">Nombres</th>
                        <th style="background-color: #217CD1; color:white;">Apellido</th>
                        <th style="background-color: #217CD1; color:white;">Fecha de Nacimiento</th>
                        <th style="background-color: #217CD1; color:white;">Edad</th>
                        <th style="background-color: #217CD1; color:white;">DUI / Carnet Minoridad</th>
                        <th style="background-color: #217CD1; color:white;">Fecha de Inscripción</th>
                        <th style="background-color: #217CD1; color:white;">Inscrito hasta</th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
               
            </div>

            <div class="field" id="escuelaFutbol">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i><i class="futbol icon"></i>
                    Nuevo Ingreso de Escuela de Fútbol<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>
                <br>
                <div class="row">
            <div class="sixteen wide column">
                <table id="dtEscFutbolPago" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                        <th style="background-color: #04B4AE; color:white;">N°</th>
                        <th style="background-color: #A901DB; color:white;"></th>
                            <th style="background-color: #A901DB; color:white;">Cod. Expediente</th>
                            <th style="background-color: #A901DB; color:white;">Nombres</th>
                            <th style="background-color: #A901DB; color:white;">Apellido</th>
                            <th style="background-color: #A901DB; color:white;">Edad</th>
                            <th style="background-color: #A901DB; color:white;">Carnet Min.</th>
                            <th style="background-color: #A901DB; color:white;">Encargado</th>
                            <th style="background-color: #A901DB; color:white;">Teléfono</th>
                            <th style="background-color: #A901DB; color:white;">Nivel</th>
                            <th style="background-color: #A901DB; color:white;">Fecha de Inscripción</th>
                            <th style="background-color: #A901DB; color:white;">Inscrito hasta</th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

            </div>

            <div class="field" id="escuelaNatacion">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i><i class="life ring icon"></i>
                    Nuevo Ingreso de Escuela de Natación<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>
                <br>
                <div class="row">
            <div class="sixteen wide column">
                <table id="dtPagosNatacion" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #04B4AE; color:white;">N°</th>
                            <th style="background-color: #04B4AE; color:white;"></th>
                            <th style="background-color: #04B4AE; color:white;">Cod. Expediente</th>
                            <th style="background-color: #04B4AE; color:white;">Nombres</th>
                            <th style="background-color: #04B4AE; color:white;">Apellido</th>
                            <th style="background-color: #04B4AE; color:white;">Edad</th>
                            <th style="background-color: #04B4AE; color:white;">DUI / Carnet Minoridad</th>
                            <th style="background-color: #04B4AE; color:white;">Encargado</th>
                            <th style="background-color: #04B4AE; color:white;">Tel. Encargado</th>
                            <th style="background-color: #04B4AE; color:white;">Fecha de Inscripción</th>
                            <th style="background-color: #04B4AE; color:white;">Fecha Final</th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
                
            </div>

            <div class="field" id="fondoComun">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i><i class="money bill icon"></i>
                    Nuevo Ingreso de Fondo Común<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>
                <br>
                <div class="row">
                        <div class="sixteen wide column">
                            <table id="dtFondo" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                    <th style="background-color: #CD2020; color: white;">N°</th>
                                    <th style="background-color: #CD2020; color: white;"></th>
                                    <th style="background-color: #CD2020; color: white;">Cod. Expediente</th>
                                    <th style="background-color: #CD2020; color: white;">Nombre</th>
                                    <th style="background-color: #CD2020; color: white;">Apellido</th>
                                    <th style="background-color: #CD2020; color: white;">DUI/Carnet Minoridad</th>
                                    <th style="background-color: #CD2020; color: white;">Fecha de Nacimiento</th>
                                    <th style="background-color: #CD2020; color: white;">Edad del Jugador</th>                
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>

            <div class="field" id="inscripcionEq">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i><i class="money bill icon"></i>
                    Nuevo Ingreso de Inscripción de Equipo<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>
                <br>
                
                <div class="row">
                        <div class="sixteen wide column">
                            <table id="dtCobroEquipos" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #0174DF;">N°</th>
                                        <th style="background-color: #217CD1; color:white;">Nombre del  Equipo</th>
                                        <th style="background-color: #217CD1; color:white;">Encargado del Equipo</th>
                                        <th style="background-color: #217CD1; color:white;">Teléfono Encargado</th>
                                        <th style="background-color: #217CD1; color:white;">Encargado Aux</th>
                                        <th style="background-color: #217CD1; color:white;">Teléfono Aux</th>
                                        <th style="background-color: #217CD1; color:white;">Categoría del Equipo</th>
                                        <th style="background-color: #217CD1; color:white;">Estado en torneo</th>
                                        <th style="background-color: #217CD1; color:white;">Torneo </th>
                                        <th style="background-color: #217CD1; color:white;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>


            <div class="field" id="inscripcionJu">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i><i class="money bill icon"></i>
                    Nuevo Ingreso de Inscripción de Jugadores<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>
                <br>
                
                <div class="row">
                        <div class="sixteen wide column">
                        <table id="dtJugPenPago" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #FACC2E; color:white;">N°</th>
                                        <th style="background-color: #7401DF; color:white;" ></th>
                                        <th style="background-color: #7401DF; color:white;">Cod. Expediente</th>
                                        <th style="background-color: #7401DF; color:white;">Nombre</th>
                                        <th style="background-color: #7401DF; color:white;">Apellido</th>
                                        <th style="background-color: #7401DF; color:white;">Dui / Carnet Min.</th>
                                        <th style="background-color: #7401DF; color:white;">Edad del Jugador</th>   
                                        <th style="background-color: #7401DF; color:white;">Equipo</th>     
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            
</div>
    <div class="actions">
        <button id="btnCerrar" class="ui red button">
        Cerrar
        </button>
     </div>

</div>


<div class="ui tiny modal" id="quitarFondo">
    <div class="header">
    Quitar a <a id="nombre"></a> <a id="apellido"></a> de Fondo Común
    </div>

    <div class="content"> 
        <form class="ui form">
            <div class="field">
            <input type="hidden" id="idJ">
            <i class="dollar icon"></i> Cantidad a pagar:
            <input type="text" id="cantidadF" name="cantidadF">
            </div>
        </form>

    </div>

    <div class="actions">

    <button class="ui blue button" id="cerrarFondo">
    <i class="close icon"></i> Cerrar
    <button>

    <button class="ui green button" id="guardarFondo">
    <i class="save icon"></i> Guardar
    <button>

    </div>


</div>

<div class="ui tiny modal" id="modalCobroGim">
    <div class="header">
    <h3>Cobrar mensualidad de Gimnasio a <a id="nombreG"></a> <a id="apellidoG"></a> que tiene como fecha límite <a id="fechaPagoG"></a></h3>
    </div>

    <div class="content"> 
    

        <form class="ui form" id="frmCobroGim">
        <input type="hidden" id="idUsuario">
            <input type="hidden" id="idCobro" name="idCobro">
            <div class="field">
            <i class="dollar icon"></i> Cantidad a pagar:
            <input type="text" id="cantidadG" name="cantidadG" >
            </div>
        </form>
    </div>


    <div class="actions">

    <button class="ui blue button" id="cerrarGim">
    <i class="close icon"></i> Cerrar
    <button>

    <button class="ui green button" id="guardarGim">
    <i class="save icon"></i> Guardar
    <button>

    </div>


</div>

<div class="ui tiny modal" id="modalCobroEscFubol">
    <div class="header">
    <h3>Cobrar mensualidad de Escuela de Fútbol a <a id="nombreEF"></a> <a id="apellidoEF"></a>
    del: <a id="nivelEF"></a> que tiene como fecha límite <a id="fechaPagoEF"></a></h3>
    </div>

    <div class="content"> 
    

        <form class="ui form" id="frmCobroEscuelaFutbol">
        <input type="hidden" id="idUsuarioEF" name="idUsuarioEF">
            <input type="hidden" id="idCobroEF" name="idCobroEF">
            <div class="field">
            <i class="dollar icon"></i> Cantidad a pagar:
            <input type="text" id="cantidadEF" name="cantidadEF" >
            </div>
        </form>
    </div>


    <div class="actions">

    <button class="ui blue button" id="cerrarEF">
    <i class="close icon"></i> Cerrar
    <button>

    <button class="ui green button" id="guardarEF">
    <i class="save icon"></i> Guardar
    <button>

    </div>
</div>


<div class="ui tiny modal" id="modalCobroNa">
    <div class="header">
    <h3>Cobrar mensualidad de Escuela de Natación a <a id="nombreN"></a> <a id="apellidoN"></a> que tiene como fecha límite <a id="fechaPagoN"></a></h3>
    </div>

    <div class="content"> 
    

        <form class="ui form" id="frmCobroNa">
        <input type="hidden" id="idUsuarioN">
            <input type="hidden" id="idCobroN" name="idCobroN">
            <div class="field">
            <i class="dollar icon"></i> Cantidad a pagar:
            <input type="text" id="cantidadN" name="cantidadN" >
            </div>
        </form>
    </div>


    <div class="actions">

    <button class="ui blue button" id="cerrarNa">
    <i class="close icon"></i> Cerrar
    <button>

    <button class="ui green button" id="guardarNa">
    <i class="save icon"></i> Guardar
    <button>

    </div>


</div>



<div class="ui tiny modal" id="modalCobroInscripcionE">
    <div class="header">
    <h3>Cobrar Inscripcion del equipo <a id="nombreE"></a> de la Categoria: <a id="categoriaE"></a> en el torneo: 
    <a id="torneoE"></a></h3>
    </div>

    <div class="content"> 
    

        <form class="ui form" id="frmCobroEquipo">
        <input type="hidden" id="idEquipoCobro" name="idEquipoCobro">
        <input type="hidden" id="cupos" name="cupos">
        <input type="hidden" id="idTorneoEq" name="idTorneoEq">
            <div class="field">
            <i class="dollar icon"></i> Cantidad a pagar:
            <input type="text" id="cantidadCobroE" name="cantidadCobroE" >
            </div>
        </form>
    </div>


    <div class="actions">

    <button class="ui blue button" id="cerrarEquiposCobro">
    <i class="close icon"></i> Cerrar
    <button>

    <button class="ui green button" id="guardarEquiposCobro">
    <i class="save icon"></i> Guardar
    <button>

    </div>


</div>

<div class="ui tiny modal" id="modalCobroInscripcionJ">
    <div class="header">
    <h3>Cobrar Inscripcion de <a id="nombreJ"></a> <a id="apellidoJ"></a> al equipo: <a id="equipoJ"></a> 
    para el torneo <a id="torneoJ"></a>.<br><br>

    Carnets gratis que tiene el equipo:  <a id="carnetGra"></a>
    </div>

    <div class="content"> 

        <form class="ui form" id="frmCobroJugador">
        <input type="hidden" id="idJugador" name="idJugador">
        <input type="hidden" id="cuposJ" name="cuposJ">
        <input type="hidden" id="idEquip" name="idEquip">
            <div class="field">
            <i class="dollar icon"></i> Cantidad a pagar:
            <input type="text" id="cantidadCobroJ" name="cantidadCobroJ" >
            </div>
        </form>
    </div>


    <div class="actions">
    <button class="ui blue button" id="cerrarJugadoresCobro">
    <i class="close icon"></i> Cerrar
    <button>


    <button class="ui red button" id="exonerarCobroJ">
    <i class="trash icon"></i> Exonerar
    <button>
  
    
    <button class="ui green button" id="guardarJugadoresCobro">
    <i class="save icon"></i> Guardar
    <button>
    
    </div>


</div>


<div class="ui tiny modal" id="modalExonerarGim">
    <div class="header">
    <h3>Exonerar mensualidad de Gimnasio a <a id="nombreGim"></a> <a id="apellidoGim"></a> que tiene como fecha límite <a id="fechaPagoGim"></a></h3>
    </div>

    <div class="content"> 
    

        <form class="ui form" id="frmExonerarGim">
        <input type="hidden" id="idUsuarioGim">
            <input type="hidden" id="idCobroGim" name="idCobroGim">
        </form>
    </div>


    <div class="actions">

    <button class="ui blue button" id="cerrarGimE">
    <i class="close icon"></i> Cancelar
    <button>

    <button class="ui green button" id="guardarGimE">
    <i class="save icon"></i> Exonerar
    <button>

    </div>


</div>


<div class="ui tiny modal" id="modalExonerarEscFubol">
    <div class="header">
    <h3>Exonerar mensualidad de Escuela de Fútbol a <a id="nombreEFutbol"></a> <a id="apellidoEFutbol"></a>
    del: <a id="nivelEFutbol"></a> que tiene como fecha límite <a id="fechaPagoEFutbol"></a></h3>
    </div>

    <div class="content"> 
    

        <form class="ui form" id="frmExonerarEscuelaFutbol">
        <input type="hidden" id="idUsuarioEFutbol" name="idUsuarioEFutbol">
            <input type="hidden" id="idCobroEFutbol" name="idCobroEFutbol">
        </form>
    </div>


    <div class="actions">

    <button class="ui blue button" id="cerrarEFutbol">
    <i class="close icon"></i> Cerrar
    <button>

    <button class="ui green button" id="guardarEFutbol">
    <i class="save icon"></i> Exonerar
    <button>

    </div>
</div>


<div class="ui tiny modal" id="modalExonerarNa">
    <div class="header">
    <h3>Exonerar mensualidad de Escuela de Natación a <a id="nombreNa"></a> <a id="apellidoNa"></a> que tiene como fecha límite <a id="fechaPagoNa"></a></h3>
    </div>

    <div class="content"> 
    

        <form class="ui form" id="frmExonerarNa">
        <input type="hidden" id="idUsuarioNa">
            <input type="hidden" id="idCobroNa" name="idCobroNa">
           
        </form>
    </div>


    <div class="actions">

    <button class="ui blue button" id="cerrarNat">
    <i class="close icon"></i> Cerrar
    <button>

    <button class="ui green button" id="guardarNat">
    <i class="save icon"></i> Exonerar
    <button>

    </div>


</div>

<script src="./res/tablas/tablaFondoComun.js"></script>
<script src="./res/tablas/tablaPagosGim.js"></script>
<script src="./res/js/modalPagos.js"></script>
<script src="./res/js/modalPagosNatacion.js"></script>
<script src="./res/js/modalPagosEscFutbol.js"></script>
<script src="./res/tablas/tablaEscFutbolPago.js"></script>
<script src="./res/tablas/tablaPagosNatacion.js"></script>
<script src="./res/tablas/tablaCobroEquipos.js"></script>
<script src="./res/tablas/tablaJugPenPago.js"></script>
<script>

var app = new Vue({
        el: "#app",
        data: {
            detalles: []
        },
        methods: {
             cargarDetalles(id) {

                this.idUsuario = parseInt(id);

                $('#frmDetalles').addClass('loading');
                $.ajax({
                type: 'POST',
                url: '?1=GimnasioController&2=pagos',
                data: {
                id: id
                },
                success: function (data) {
                app.detalles = JSON.parse(data);
                $('#frmDetalles').removeClass('loading');
                }
                });

                },

            cargarDetallesEscF(id) {

                this.idUsuario = parseInt(id);

                $('#frmDetalles').addClass('loading');
                $.ajax({
                type: 'POST',
                url: '?1=EscFutbolController&2=pagos',
                data: {
                id: id
                },
                success: function (data) {
                app.detalles = JSON.parse(data);
                $('#frmDetalles').removeClass('loading');
                }
                });

                },
                cargarDetallesNa(id) {

                this.idUsuario = parseInt(id);

                $('#frmDetalles').addClass('loading');
                $.ajax({
                type: 'POST',
                url: '?1=NatacionController&2=pagos',
                data: {
                id: id
                },
                success: function (data) {
                app.detalles = JSON.parse(data);
                $('#frmDetalles').removeClass('loading');
                }
                });

                },
            cerrarE() {
                
                $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
                $("#modalDetallesEs").modal('hide');
                this.detalles = [];
            },
            cerrar() {
                
                $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
                $("#modalDetalles").modal('hide');
                this.detalles = [];
            },
            exonerarGim(id,idUsuario,nombre,apellido,fecha) {
                var idCobro = parseInt(id);
                var idUsuario = parseInt(idUsuario);

                $("#idUsuarioGim").val(idUsuario);
                $("#idCobroGim").val(idCobro);
                $("#nombreGim").text(nombre);
                $("#apellidoGim").text(apellido);
                $("#fechaPagoGim").text(fecha);
                
                $('#modalExonerarGim').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
            },

            cobrar(id,idUsuario,nombre,apellido,fecha) {
                var idCobro = parseInt(id);
                var idUsuario = parseInt(idUsuario);

                $("#idUsuario").val(idUsuario);
                $("#idCobro").val(idCobro);
                $("#nombreG").text(nombre);
                $("#apellidoG").text(apellido);
                $("#fechaPagoG").text(fecha);
                
                $('#modalCobroGim').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
            },
            cobrarNa(id,idUsuario,nombre,apellido,fecha) {
                var idCobroN = parseInt(id);
                var idUsuarioN = parseInt(idUsuario);

                $("#idUsuarioN").val(idUsuarioN);
                $("#idCobroN").val(idCobroN);
                $("#nombreN").text(nombre);
                $("#apellidoN").text(apellido);
                $("#fechaPagoN").text(fecha);
                
                $('#modalCobroNa').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
            },

            exonerarNa(id,idUsuario,nombre,apellido,fecha) {
                var idCobroNa = parseInt(id);
                var idUsuarioNa = parseInt(idUsuario);

                $("#idUsuarioNa").val(idUsuarioNa);
                $("#idCobroNa").val(idCobroNa);
                $("#nombreNa").text(nombre);
                $("#apellidoNa").text(apellido);
                $("#fechaPagoNa").text(fecha);
                
                $('#modalExonerarNa').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
            },
            cobrarEscFutbol(id,idUsuario,nombre,apellido,fecha,nivel) {
                var idCobroEF = parseInt(id);
                var idUsuarioEF = parseInt(idUsuario);

                $("#idUsuarioEF").val(idUsuarioEF);
                $("#idCobroEF").val(idCobroEF);
                $("#nombreEF").text(nombre);
                $("#apellidoEF").text(apellido);
                $("#fechaPagoEF").text(fecha);
                $("#nivelEF").text(nivel);
                
                $('#modalCobroEscFubol').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
            },
            exonerarEscF(id,idUsuario,nombre,apellido,fecha,nivel) {
                var idCobroEFu = parseInt(id);
                var idUsuarioEFu = parseInt(idUsuario);

                $("#idUsuarioEFutbol").val(idUsuarioEFu);
                $("#idCobroEFutbol").val(idCobroEFu);
                $("#nombreEFutbol").text(nombre);
                $("#apellidoEFutbol").text(apellido);
                $("#fechaPagoEFutbol").text(fecha);
                $("#nivelEFutbol").text(nivel);
                
                $('#modalExonerarEscFubol').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
            }
        }
    });

 
</script>

<script>
var cobrar=(ele)=>{
     $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    app.cargarDetalles($(ele).attr('id'));
  }

  var cobrarEscuelaF=(ele)=>{
     $('#modalDetallesEs').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    app.cargarDetallesEscF($(ele).attr('id'));
  }

  var cobrarNatacion=(ele)=>{
     $('#modalDetallesNa').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    app.cargarDetallesNa($(ele).attr('id'));
  }


$("#btnModalIngreso").click(function(){
    $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

$("#cerrarFondo").click(function(){
    
    $("#cantidadF").val('');
    $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
                $('#quitarFondo').modal('hide');
});

$("#cerrarGim").click(function(){
    
    $("#cantidadG").val('');
    $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
                $('#modalCobroGim').modal('hide');
});

$("#cerrarGimE").click(function(){
    
    $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
                $('#modalExonerarGim').modal('hide');
});

$("#cerrarEF").click(function(){
    
    $("#cantidadEF").val('');
    $('#modalDetallesEs').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
     $('#modalCobroEscFubol').modal('hide');
});

$("#cerrarEFutboñ").click(function(){
    
   // $("#cantidadEF").val('');
    $('#modalDetallesEs').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
     $('#modalExonerarEscFubol').modal('hide');
});

$("#cerrarNa").click(function(){
    
    $("#cantidadN").val('');
    $('#modalDetallesNa').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
     $('#modalCobroNa').modal('hide');
});

$("#cerrarNat").click(function(){
    
    //$("#cantidadN").val('');
    $('#modalDetallesNa').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
     $('#modalExonerarNa').modal('hide');
});

$("#cerrarEquiposCobro").click(function(){
    
    $("#cantidadCobroE").val('');
    $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
     $('#modalCobroInscripcionE').modal('hide');
});

$("#cerrarJugadoresCobro").click(function(){
    
    $("#cantidadCobroJ").val('');
    $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
     $('#modalCobroInscripcionJ').modal('hide');
});

</script>

<script>
$(document).ready(function(){
    $('#cantidad').mask("###0.00", {reverse: true});
    $('#cantidadN').mask("###0.00", {reverse: true});
    $('#cantidadF').mask("###0.00", {reverse: true});
    $('#cantidadEF').mask("###0.00", {reverse: true});
    $('#cantidadG').mask("###0.00", {reverse: true});
    $('#cantidadG').mask("###0.00", {reverse: true});
    $('#cantidadCobroJ').mask("###0.00", {reverse: true});
    $('#cantidadCobroE').mask("###0.00", {reverse: true});
});
var quitarFondo=(ele)=>{
    $("#nombre").text($(ele).attr("nombre"));
    $("#apellido").text($(ele).attr("apellido"));
    $("#idJ").val($(ele).attr("id"));
    $('#quitarFondo').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
}


var cobrarEquipo=(ele)=>{
    $("#nombreE").text($(ele).attr("nombreE"));
    $("#torneoE").text($(ele).attr("torneoE"));
    $("#idTorneoEq").val($(ele).attr("idTorneoEq"));
    $("#categoriaE").text($(ele).attr("categoriaE"));
    $("#idEquipoCobro").val($(ele).attr("id"));
    $("#cupos").val($(ele).attr("carnets"));
    $('#modalCobroInscripcionE').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
}


var cobrarJugador=(ele)=>{
    $("#nombreJ").text($(ele).attr("nombre"));
    $("#apellidoJ").text($(ele).attr("apellido"));
    $("#equipoJ").text($(ele).attr("equipo"));
    $("#torneoJ").text($(ele).attr("torneo"));
    $("#carnetGra").text($(ele).attr("carnets"));
    $("#cuposJ").val($(ele).attr("carnets"));
    $("#idJugador").val($(ele).attr("id"));
    $("#idEquip").val($(ele).attr("idEq"));
    $('#modalCobroInscripcionJ').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                .modal('show');
}

$("#guardarGim").click(function(){
    var idU= $("#idUsuario").val();
    var nombre = $("#nombreG").text();
    var apellido = $("#apellidoG").text();

    alertify.confirm("¿Desea cobrar la cuota del gimnasio a "+ nombre +" "+ apellido + "?",
            function(){
    const form = $('#frmCobroGim');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=GimnasioController&2=cobrar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $("#modalCobroGim").modal("hide");
                        swal({
                            title: 'Listo',
                            text: 'Cuota cobrada con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            $("#modalCobroGim").modal("hide");
                            $("#cantidadG").val('');
                            app.detalles=[];
                            $('#modalDetalles').modal('hide');

                            alertify.confirm("¿Volver a cobrar?",
                        function(){
                            
                            $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
                            app.cargarDetalles(idU);
                        
                            
                        },
                        function(){
                            $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                            alertify.error('Cancelado');
                            
                        });
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

$("#guardarGimE").click(function(){
    var idU= $("#idUsuarioGim").val();
    var nombre = $("#nombreGim").text();
    var apellido = $("#apellidoGim").text();

    alertify.confirm("¿Desea exonerar la cuota del gimnasio a "+ nombre +" "+ apellido + "?",
            function(){
    const form = $('#frmExonerarGim');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=GimnasioController&2=exonerar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $("#modalCobroGim").modal("hide");
                        swal({
                            title: 'Listo',
                            text: 'Cuota exonerada con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            $("#modalExonerarGim").modal("hide");
                            //$("#cantidadG").val('');
                            app.detalles=[];
                            $('#modalDetalles').modal('hide');

                            alertify.confirm("¿Volver a talonario de pago?",
                        function(){
                            
                            $('#modalDetalles').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
                            app.cargarDetalles(idU);
                        
                            
                        },
                        function(){
                            $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                            alertify.error('Cancelado');
                            
                        });
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

$("#guardarEF").click(function(){
    var idUs= $("#idUsuarioEF").val();
    var nombre = $("#nombreEF").text();
    var apellido = $("#apellidoEF").text();

    alertify.confirm("¿Desea cobrar la cuota de la mensualidad de la escuela de fútbol a "+ nombre +" "+ apellido + "?",
            function(){
    const form = $('#frmCobroEscuelaFutbol');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=EscFutbolController&2=cobrar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $("#modalCobroEscFubol").modal("hide");
                        swal({
                            title: 'Listo',
                            text: 'Mensualidad cobrada con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            $("#modalCobroEscFubol").modal("hide");
                            $("#cantidadEF").val('');
                            app.detalles=[];
                            $('#modalDetallesEs').modal('hide');

                            alertify.confirm("¿Realizar cobro de otra mensualidad?",
                        function(){
                            
                            $('#modalDetallesEs').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
                            app.cargarDetallesEscF(idUs);
                        
                            
                        },
                        function(){
                            $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                            alertify.error('Cancelado');
                            
                        });
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

$("#exonerarCobroJ").click(function(){
    var nombre =  $("#nombreJ").text();
    var apellido =  $("#apellidoJ").text();
    var equipo =  $("#equipoJ").text();
    var car = $("#carnetGra").text();

    if(car == 0){
        swal({
            title: 'Error',
             text: 'Se han agotado los carnets gratis para este equipo',
            type: 'error',
            showConfirmButton: true

         });

    }else{

        

    alertify.confirm("¿Desea regalar el carnet al jugador " + nombre + " "+apellido+ " del equipo " +equipo+"?",
            function(){
    const form = $('#frmCobroJugador');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=JugadoresController&2=exonerar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $("#modalCobroInscripcionJ").modal("hide");
                        swal({
                            title: 'Listo',
                            text: 'Carnet ha sido emitido gratuitamente',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            
                            $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                            
                            
                        
                        }); 
                        $('#dtJugPenPago').DataTable().ajax.reload();  
                    } 

                }
            });
        },
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            }); 

    }

   

});

$("#guardarEFutbol").click(function(){
    var idUs= $("#idUsuarioEFutbol").val();
    var nombre = $("#nombreEFutbol").text();
    var apellido = $("#apellidoEFutbol").text();

    alertify.confirm("¿Desea exonerar la cuota de la mensualidad de la escuela de fútbol a "+ nombre +" "+ apellido + "?",
            function(){
    const form = $('#frmExonerarEscuelaFutbol');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=EscFutbolController&2=exonerar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $("#modalExonerarEscFubol").modal("hide");
                        swal({
                            title: 'Listo',
                            text: 'Mensualidad exonerada con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            $("#modalExonerarEscFubol").modal("hide");
                           // $("#cantidadEF").val('');
                            app.detalles=[];
                            $('#modalDetallesEs').modal('hide');

                            alertify.confirm("¿Volver al talonario de pagos?",
                        function(){
                            
                            $('#modalDetallesEs').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
                            app.cargarDetallesEscF(idUs);
                        
                            
                        },
                        function(){
                            $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                            alertify.error('Cancelado');
                            
                        });
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

$("#guardarNa").click(function(){
    var idUsu= $("#idUsuarioN").val();
    var nombre = $("#nombreN").text();
    var apellido = $("#apellidoN").text();

    alertify.confirm("¿Desea cobrar la cuota de la mensualidad de la escuela de natación a "+ nombre +" "+ apellido + "?",
            function(){
    const form = $('#frmCobroNa');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=NatacionController&2=cobrar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $("#modalCobroNa").modal("hide");
                        swal({
                            title: 'Listo',
                            text: 'Mensualidad cobrada con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            $("#modalCobroNa").modal("hide");
                            $("#cantidadN").val('');
                            app.detalles=[];
                            $('#modalDetallesNa').modal('hide');

                            alertify.confirm("¿Realizar otro cobro de mensualidad?",
                        function(){
                            
                            $('#modalDetallesNa').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
                            app.cargarDetallesNa(idUsu);
                        
                            
                        },
                        function(){
                            $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                            alertify.error('Cancelado');
                            
                        });
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


$("#guardarNat").click(function(){
    var idUsu= $("#idUsuarioNa").val();
    var nombre = $("#nombreNa").text();
    var apellido = $("#apellidoNa").text();

    alertify.confirm("¿Desea exonerar la cuota de la mensualidad de la escuela de natación a "+ nombre +" "+ apellido + "?",
            function(){
    const form = $('#frmExonerarNa');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=NatacionController&2=exonerar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $("#modalExonerarNa").modal("hide");
                        swal({
                            title: 'Listo',
                            text: 'Mensualidad exonerada con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            $("#modalExonerarNa").modal("hide");
                            //$("#cantidadN").val('');
                            app.detalles=[];
                            $('#modalDetallesNa').modal('hide');

                            alertify.confirm("¿Volver al talonario de pagos?",
                        function(){
                            
                            $('#modalDetallesNa').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
                            app.cargarDetallesNa(idUsu);
                        
                            
                        },
                        function(){
                            $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                            alertify.error('Cancelado');
                            
                        });
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

function limpiarOtro(){
    $("#cantidad").val('');
     $("#txtTitulo").val('');
}

$("#guardarOtro").click(function(){
    
    alertify.confirm("¿Desea guardar el ingreso?",
            function(){
    const form = $('#frmOtro');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=IngresosController&2=registrarOtro',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                     //$('#modalAgregarJugador').modal('hide');
                        swal({
                            title: 'Listo',
                            text: 'Guardado con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }); 
                       limpiarOtro();
                    } 
                }
            });
        },
            function(){
                limpiarOtro();
                alertify.error('Cancelado');
                
            }); 

});


$("#guardarFondo").click(function(){
    alertify.confirm("¿Desea quitar al jugador de fondo común?",
            function(){
   var id = $("#idJ").val();
   var cantidadF = $("#cantidadF").val();
         
        
            $.ajax({
                type: 'POST',
                url: '?1=IngresosController&2=quitarFondo',
                data:{
                    id:id,
                    cantidadF : cantidadF,
                },
                success: function(r) {
                    if(r == 11) {
                       $('#quitarFondo').modal('hide');
                        swal({
                            title: 'Listo',
                            text: 'Jugador/a ya puede ser inscrito en cualquier equipo',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                            $("#quitarFondo").modal('hide');
                        $("#cantidadF").val();
                        $('#dtFondo').DataTable().ajax.reload();
                        
                            
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


$("#guardarEquiposCobro").click(function(){
    var idCobro= $("#idEquipoCobro").val();
    var nombre =  $("#nombreE").text();
    alertify.confirm("¿Desea cobrar la inscipción del equipo " + nombre + "?",
            function(){
    const form = $('#frmCobroEquipo');
                const datosFormulario = new FormData(form[0]);
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=EquipoController&2=cobrar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $("#modalCobroInscripcionE").modal("hide");
                        swal({
                            title: 'Listo',
                            text: 'Inscrito con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700
                            }).then((result) => {
                            $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                            
                        $("#cantidadCobroE").val();
                        $('#dtCobroEquipos').DataTable().ajax.reload();      
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


        $("#guardarJugadoresCobro").click(function(){
    //var idJugador= $("#idJugador").val();
    var nombre =  $("#nombreJ").text();
    var apellido =  $("#apellidoJ").text();
    var equipo =  $("#equipoJ").text();

    alertify.confirm("¿Desea cobrar la inscipción del jugador " + nombre + " "+apellido+ " al equipo " +equipo+"?",
            function(){
    const form = $('#frmCobroJugador');
                const datosFormulario = new FormData(form[0]);
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=JugadoresController&2=cobrar',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                        $("#modalCobroInscripcionJ").modal("hide");
                        swal({
                            title: 'Listo',
                            text: 'Inscrito con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700
                            }).then((result) => {
                            $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
                            
                        $("#cantidadCobroJ").val();
                        $('#dtJugPenPago').DataTable().ajax.reload();      
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


$(document).ready(function(){
$("#otro").hide();
$("#taquilla").hide();
$("#gimnasio").hide();
$("#escuelaFutbol").hide();
$("#escuelaNatacion").hide();
$("#fondoComun").hide();
$("#inscripcionEq").hide();
$("#inscripcionJu").hide();
$('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');




 $("#tipoIngreso").change(function(){

     if($("#tipoIngreso").val() == "otro"){
        $("#otro").show();
        $("#gimnasio").hide();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").hide();
        $("#fondoComun").hide();
        $("#inscripcionEq").hide();
        $("#inscripcionJu").hide();
     }
     else if($("#tipoIngreso").val() == "gimnasio"){
        $("#otro").hide();
        $("#gimnasio").show();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").hide();
        $("#fondoComun").hide();
        $("#inscripcionEq").hide();
        $("#inscripcionJu").hide();
     }
     else if($("#tipoIngreso").val() == "fondoComun"){
        $("#otro").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").hide();
        $("#fondoComun").show();
        $("#inscripcionEq").hide();
        $("#inscripcionJu").hide();
     }
     else if($("#tipoIngreso").val() == "escuelaFutbol"){;
        $("#otro").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").show();
        $("#escuelaNatacion").hide();
        $("#fondoComun").hide();
        $("#inscripcionEq").hide();
        $("#inscripcionJu").hide();
     }

     else if($("#tipoIngreso").val() == "escuelaNatacion"){
        $("#otro").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").show();
        $("#fondoComun").hide();
        $("#inscripcionEq").hide();
        $("#inscripcionJu").hide();
     }

     else if($("#tipoIngreso").val() == "inscripcionE"){
        $("#otro").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").hide();
        $("#fondoComun").hide();
        $("#inscripcionEq").show();
        $("#inscripcionJu").hide();
     }
     else if($("#tipoIngreso").val() == "inscripcionJ"){
        $("#otro").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").hide();
        $("#fondoComun").hide();
        $("#inscripcionEq").hide();
        $("#inscripcionJu").show();
     }

 });
 
});
$(document).ready(function(){

    $("#btnCerrar").click(function(){
    location.href = "?1=IngresosController&2=nuevoIngreso";

});

 
$('#txtTitulo').typeahead({
 source: function(query, result)
 {
  $.ajax({
   url:"./app/view/Ingresos/fetch.php",
   method:"POST",
   data:{query:query},
   dataType:"json",
   success:function(data)
   {
    result($.map(data, function(item){
     return item;
    }));
   }
  })
 }
});

});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 