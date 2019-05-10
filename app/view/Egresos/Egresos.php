<script>
$(function() {
    overflowRestore();
});
</script>
<br>

<div id="app">

    <modal-registrar id_form="frmRegistrar" id="modalRegistrar" url="?1=EgresosController&2=registrar" titulo="Registrar Egreso"
        :campos="campos_registro" tamanio='tiny'></modal-registrar>
    
    <modal-editar id_form="frmEditar" id="modalEditar" url="?1=EgresosController&2=editar" titulo="Editar Egreso"
        :campos="campos_editar" tamanio='tiny'></modal-editar>

    <modal-eliminar id_form="frmEliminar" id="modalEliminar" url="?1=EgresosController&2=eliminar" titulo="Eliminar Egreso"
        sub_titulo="¿Está seguro de querer eliminar este egreso?" :campos="campos_eliminar" tamanio='tiny'></modal-eliminar>

<div class="ui tiny modal" id="modalReportes" style="width:40%;">
<div class="header">
   <i class="clipboard outline icon"></i> Reportes Egresos<font color="#DFD102" size="20px">.</font>
</div><br>
<div class="content" class="ui equal width form">
    <form class="ui form" id="frmFechas">
        <div class="field">

              <div class="fields">
              <div class="three wide field"></div>
                    <div class="five wide field">
                            <label for="" style="font-weight: bold; font-size: 17px;">Reporte Diario General: </label>
                    </div>
                    <div class="six wide field">
                         <a href="?1=EgresosController&2=llamaReporte" target="_blank">
                        <button class="ui olive deny button" id="btnCancelar" style="color:black; margin: auto;" 
                        id="btnReportes" type="button" >
                         <i class="eye icon"></i>Ver reporte
                        </button></a>
                   </div> 
                   <div class="two wide field"></div>
            </div>
        </div>
    </form>

</div>
<br>
<div class="ui divider"></div>
    <div class="content" class="ui equal width form">
    <form class="ui form" id="frmFechas">
                        <div class="field">

                            <div class="fields">
                            <div class="one wide field"></div>
                                <div class="seven wide field">

                                    <label>
                                    <i class="calendar icon"></i>Fecha inicial:</label>
                                    <input type="date" name="fecha1" id="fecha1" required>
                                </div>

                                <div class="seven wide field">
                                    <label>
                                    <i class="calendar icon"></i>Fecha final:</label>
                                    <input type="date" name="fecha2" id="fecha2" required >
                                </div>

                            </div>
                        </div>
                        <div class="field">
                            <div class="fields">
                            <div class="six wide field"></div>
                                <div class="seven wide field">
                                <button class="ui green right button" id="btnGenerarReportePorFechas">
                                Generar reporte
                                </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        
    </form>                    
    </div>
    <div class="actions">
    <button class="ui black deny button" id="btnCancelar">
        Cancelar
    </button>
</div>
</div>


<!--modal agregar-->
<div class="ui  modal" id="modalAgregar">

        <div class="header">
        <i class="money bill alternate  icon"></i> Agregar nuevo Egreso
        </div>
        <div class="content" class="ui equal width form">
            <form class="ui form" id="frmEgresos">
                <div class="field">
                    <div class="fields">
                            <div class="two wide field">
                                <label><i class="money bill alternate icon"></i>Ch NO</label>
                                <input type="text" name="cheque" placeholder="N° Cheque" id="cheque">
                                <div class="field">
                <a id="label-error" style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;" class="ui blue fluid large label">
                    ChNo ya fue utilizado</a>
                </div>
                       
                                <div class="ui red pointing label"  id="labelCheque"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                            </div>

                            <div class="five wide field">
                                <label><i class="money bill alternate icon"></i>Chequera</label>
                                <select name="chequeras" id="chequeras" class="ui search dropdown"></select>
                                
                            </div>


                            <div class="nine wide field">
                                <label><i class="edit icon"></i>Concepto de Egreso</label>
                                <textarea rows="4" id="conceptoEgreso" name="conceptoEgreso" placeholder="Concepto de Egreso" >
                                </textarea>
                                <div class="ui red pointing label"  id="labelConcepto"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                            </div>     
                    </div>
                </div>  
                
                <div class="field">
                    <div class="fields">
                                <div class="six wide field">
                                <label><i class="dollar sign icon"></i>Cantidad</label>
                                    <input type="text" name="cantidad" placeholder="$$ 00.00" id="cantidad">
                                    <div class="ui red pointing label"  id="labelCantidad"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                                </div>                               
                                <div class="six wide field">
                                <br>                               
                                    <div class="ui toggle checkbox">
                                    <input type="checkbox" tabindex="0" class="hidden" id="retencion" name="retencion">
                                    <label for="">Retención 10%</label>
                                    </div>
                                </div>
                                <div class="six wide field divRetencion" id="divRetencion">
                                <label><i class="percent icon"></i>Retención</label>
                                    <input type="text" id="retencionMonto" name="retencionMonto" disabled
                                    style="background-color:#F0ECEC;
                                    color: black; font-weight:bold;">
                                </div>   
                    </div>     
                                <div class="fields">
                                <div class="six wide field" id="divPagado">
                                <label><i class="money bill outline icon"></i> Pagado</label>
                                <input type="text" name="pagado" placeholder="$$ 00.00" id="pagado" disabled
                                style="background-color:#F0ECEC;
                                    color: black; font-weight:bold;">
                                </div>
                                </div>
                </div>
            </form>
        </div>
            <div class="actions">
                <button id="btncerrar" onclick="cerrarCambios()" class="ui yellow button">
                    Cancelar
                </button>
                <button class="ui blue button" id="btnGuardar" >
                Guardar
                </button>
            </div>
</div>

        <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="money bill alternate icon"></i>
                    Egresos por cheque Aderel<font color="#DFD102" size="20px">.</font>
                    <a href="?1=IngresosController&2=nuevoIngreso" class="ui left floated red button">
                            <i class="hand left point icon"></i> Volver
                        </a>
                    <input type="hidden"  id="mes" name="mes">
   <input type="hidden"  id="anio" name="anio" value="<?php echo $anio ?>">

                    <button class="ui right floated blue labeled icon button"  id="btnReporte">
                    <i class="file icon"></i>
                 Reporte de Egresos
                </button>
                </div>
                
        
        </div>

        <div class="row title-bar">

        <div class="sixteen wide column">
        <br>
                <button class="ui right floated yellow labeled icon button"  id="btnAgregar">
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
                <table id="dtEgresos" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        <th style="background-color: #E6C404;">ID</th>
                            <th style="background-color: #E6C404;">Ch No.</th>
                            <th style="background-color: #E6C404;">Concepto Egreso</th>
                            <th style="background-color: #E6C404;">Cantidad</th>
                            <th style="background-color: #E6C404;">Retención</th>
                            <th style="background-color: #E6C404;">Pagado</th>
                            <th style="background-color: #E6C404;">Chequera</th>
                            <th style="background-color: #E6C404;">Fecha</th>
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



<script src="./res/tablas/tablaEgresos.js"></script>
<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>

<script>
var app = new Vue({
        el: "#app",
        data: {
            campos_registro: [{
                    label: 'Ch No:',
                    name: 'chNo',
                    type: 'number'
                },
                {
                    label: 'Concepto de Egreso:',
                    name: 'conceptoEgreso',
                    type: 'text'
                },
                {
                    label: 'Cantidad',
                    name: 'cantidad',
                    type: 'text',
                    
                },
                {
                 label: "Agregar Mensajero",
                 name: 'retencion',
                 type: 'checkbox',
                },
                
            ],
            campos_editar: [
                {
                    label: 'Ch No:',
                    name: 'chNo',
                    type: 'number'
                },
                {
                    label: 'Concepto de Egreso:',
                    name: 'conceptoEgreso',
                    type: 'text'
                },
                {
                    label: 'Cantidad',
                    name: 'cantidad',
                    type: 'text',
                },
                {
                    name: 'quitar',
                    type: 'button',
                    id: 'btnQuitar',
                },
                {
                    label: 'Retencion',
                    name: 'retencion',
                    type: 'text',
                    
                },
                {
                    label: 'Pagado',
                    name: 'pagado',
                    type: 'text',
                },
                {
                    label: 'Chequera:',
                    name: 'selectChequera',
                    type: 'select',
                    options: <?php echo $chequeCMB;?>,
                },
                
                {
                    name: 'idDetalle',
                    type: 'hidden'
                }

            ],
            campos_eliminar: [{
                name: 'idEliminar',
                type: 'hidden'
            }]
        },
        methods: {
            refrescarTabla() {
                tablaEgresos.ajax.reload();
            },
            modalRegistrar() {
                $('#modalRegistrar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal(
                    'show');
            },
            cargarDatos() {
                var id = $("#idDetalle").val();

                fetch("?1=EgresosController&2=cargarDatosEgresos&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);
                        


                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmEditar input[name="chNo"]').val(dat.chNo);
                        $('#frmEditar input[name="conceptoEgreso"]').val(dat.conceptoEgreso);
                        $('#frmEditar input[name="cantidad"]').val(dat.cantidad);
                        $('#frmEditar input[name="retencion"]').val(dat.retencion);
                        if(dat.retencion == 0){
                            $('#frmEditar input[name="quitar"]').val("Agregar Retención");
                        }
                        else{
                            $('#frmEditar input[name="quitar"]').val("Quitar Retención");
                        }
                        
                       // $('#frmEditar input[name="agregar"]').val("Agregar");
                        $('#frmEditar input[name="pagado"]').val(dat.pagado);
                        $('#frmEditar select[name="selectChequera"]').dropdown('set selected', dat.idChequera);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        }
    });
</script>
<script type="text/javascript">


$(document).ready(function(){
    var d = new Date();
var month = new Array();
month[0] = "01";
month[1] = "02";
month[2] = "03";
month[3] = "04";
month[4] = "05";
month[5] = "06";
month[6] = "07";
month[7] = "08";
month[8] = "09";
month[9] = "10";
month[10] = "11";
month[11] = "12";
var n = month[d.getMonth()];
var anio = d.getFullYear();

 $("#mes").val(n);
 $("#anio").val(anio);
});
$(document).ready(function(){
    
        $('#frmEditar input[name="quitar"]').addClass("mini ui red button");
    
    
    $("#frmEditar input[name='cantidad']").mask("###0.00", {reverse: true});
    $('#frmEditar input[name="retencion"]').attr('readonly', true);
    $('#frmEditar input[name="pagado"]').attr('readonly', true);
    $('#frmEditar input[name="pagado"]').css("background-color", "#F0ECEC");
    $('#frmEditar input[name="pagado"]').css("color", "black");
    $('#frmEditar input[name="pagado"]').css("font-weight", "bold");
    $('#frmEditar input[name="retencion"]').css("background-color", "#F0ECEC");
    $('#frmEditar input[name="retencion"]').css("color", "black");
    $('#frmEditar input[name="retencion"]').css("font-weight", "bold");
});
</script>
<script>


$(document).on("click", "#frmEditar input[name=quitar]", function () {
    if($("#frmEditar input[name=quitar]").val()=="Agregar Retención"){
        
    var cantidad = $("#frmEditar input[name='cantidad']").val();
    var retencion = cantidad * 0.10;
    var totalPagado = cantidad - retencion;
    
    $("#frmEditar input[name=retencion]").val(retencion.toFixed(2));
    $("#frmEditar input[name=pagado]").val(totalPagado.toFixed(2));

    if($(" #frmEditar input[name=retencion]").val()>0){
        $('#frmEditar input[name="quitar"]').val("Quitar Retención");
        
    }
    }else{
        var cantidad = $("#frmEditar input[name='cantidad']").val();
        cantidad = parseFloat(cantidad);
    
    $('#frmEditar input[name=retencion]').val('0');
    $('#frmEditar input[name=pagado]').val(cantidad.toFixed(2));
    if($('#frmEditar input[name=retencion]').val()==0){
        $('#frmEditar input[name="quitar"]').val("Agregar Retención");
    }
    }
});
$("#frmEditar input[name='cantidad']").keyup(function(){
    $("#frmEditar input[name=retencion]").val('0');
    var cantidad = $("#frmEditar input[name='cantidad']").val();
    cantidad = parseFloat(cantidad);

    $("#frmEditar input[name=pagado]").val(cantidad.toFixed(2));

    if($("#frmEditar input[name=retencion]").val()==0){
        $('#frmEditar input[name="quitar"]').val("Agregar Retención");
    }
});
$("#cantidad").keypress(function(){
    $("#divRetencion").hide();
    $("#divPagado").hide();
    
});

//$(document).on("click", "input[name=quitar]", function () {
    
  //      });

$(document).on("click", "input[name=agregar]", function () {
   
        });
$(document).on("click", "#btnReporte", function () {
            $('#modalReportes').modal('setting', 'autofocus', true).modal('setting', 'closable', true).modal('show');
        });
$(document).ready(function(){
    $('#cantidad').mask("###0.00", {reverse: true});
    $("#divRetencion").hide();
    $("#divPagado").hide();
});

        $(document).on("click", ".btnEliminar", function () {
            $('#modalEliminar').modal('setting', 'closable', false).modal('show');
            $('#idEliminar').val($(this).attr("id"));
        });
        $(document).on("click", ".btnEditar", function () {
            $('#modalEditar').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
            $('#idDetalle').val($(this).attr("id")); 
            app.cargarDatos();

        
    
    //$("#frmEditar input[name='quitar']").show();

        });


        $(document).on("click", "#btnAgregar", function () {
            $('#modalAgregar').modal('setting', 'autofocus', true).modal('setting', 'closable', true).modal('show');
        });

        $(document).on("click", "#btnCerrar", function () {
            $('#modalAgregar').modal('hide');
        });
        $(document).on("click", "#btnGenerarReportePorFechas", function () {
        var fecha = $('#fecha1').val();
        var fecha2 = $('#fecha2').val();
window.open('?1=EgresosController&2=reportePorFechas&fecha='+fecha+'&fecha2='+fecha2,'_blank');
return false;
});





        $('.ui.toggle').checkbox();
        $('.ui.toggle').click(function() {
            var cantidadNeta=$("#cantidad").val();
            var retencion= cantidadNeta*0.10;
            var total = cantidadNeta-retencion;

            if ($('.ui.toggle').checkbox('is checked')) {
                $("#pagado").val(total.toFixed(2));
                $("#divRetencion").show();
                $("#divPagado").show();
                $("#retencionMonto").val(retencion.toFixed(2));

            }
            else {
                $("#pagado").val($("#cantidad").val());
                $("#divRetencion").show();
                $("#retencionMonto").val('0.00');
               // var cantidad=$("#cantidad").val();
                $("#pagado").val(cantidadNeta.toFixed(2));
            }
        });

    $("#cantidad").keyup(function(){
        var cantidadNeta=$("#cantidad").val();
        $("#pagado").val(cantidadNeta);
    });


        function cerrarCambios() {      
                limpiar();
                $('#modalAgregar').modal('hide');
                $('#labelCantidad').css('display', 'none');
                $('#labelCheque').css('display', 'none');
                $('#labelConcepto').css('display', 'none');
                $("#cheque").val('');
            $("#conceptoEgreso").val('');
            $("#cantidad").val('');
            $("#retencionMonto").val('');
            $("#pagado").val('');
            $("#divRetencion").hide();
            $("#divPagado").hide();
            $('#label-error').css('display', 'none');
            $("#btnGuardar").attr("disabled", false);
            }
        
        function limpiar()
        {
            $("#cheque").val('');
            $("#conceptoEgreso").val('');
            $("#cantidad").val('');
            $("#retencionMonto").val('');
            $("#pagado").val('');
            $("#divRetencion").hide();
            $('#label-error').css('display', 'none');
            $("#btnGuardar").attr("disabled", false);
        }    
        $(function () {
            $('#cheque').keyup(function () {
                $('#labelCheque').css('display', 'none');
                $("#btnGuardar").attr("disabled", false);
            });
            $('#conceptoEgreso').keyup(function () {
                $('#labelConcepto').css('display', 'none');
                $("#btnGuardar").attr("disabled", false);
            });
            $('#cantidad').keyup(function () {
                $('#labelCantidad').css('display', 'none');
                $("#btnGuardar").attr("disabled", false);
            });
        });
        $(function(){
        $('#btnGuardar').click(function() {
            if($("#cheque").val()=="" && $("#conceptoEgreso").val()=="" && $("#cantidad").val()==""){
                $('#labelCheque').css('display', 'block');
                $('#labelConcepto').css('display', 'block');
                $('#labelCantidad').css('display', 'block');
            $("#btnGuardar").attr("disabled", true);
            }
            else if($("#cheque").val()=="" && $("#conceptoEgreso").val()>1 && $("#cantidad").val()>1){
                $('#labelCheque').css('display', 'block');
            $("#btnGuardar").attr("disabled", true);
            }
           else if($("#conceptoEgreso").val()=="" && $("#cantidad").val()>1 && $("#cheque").val()>1 ){
                $('#labelConcepto').css('display', 'block');
            $("#btnGuardar").attr("disabled", true);
            }
           else if($("#cantidad").val()=="" && $("#conceptoEgreso").val()>1 && $("#cheque").val()>1){
                $('#labelCantidad').css('display', 'block');
            $("#btnGuardar").attr("disabled", true);
            }

           else if($("#cheque").val()==""){
                $('#labelCheque').css('display', 'block');
            $("#btnGuardar").attr("disabled", true);
            }
           else if($("#conceptoEgreso").val()==""){
                $('#labelConcepto').css('display', 'block');
            $("#btnGuardar").attr("disabled", true);
            }
           else if($("#cantidad").val()==""){
                $('#labelCantidad').css('display', 'block');
            $("#btnGuardar").attr("disabled", true);
            }
            else{
            
              var  chequeP = $('#cheque').val();
              var  conceptoEgresoP = $('#conceptoEgreso').val();
              var  cantidadP = $('#cantidad').val();
              var  retencionP = $('#retencionMonto').val();
              var pagadoP = $('#pagado').val();
              var  meses = $('#mes').val();
              var  anios = $('#anio').val();
              var  chequeras = $('#chequeras').val();
         
            
            
            $.ajax({
                    type: 'POST',
                    url: '?1=EgresosController&2=registrarEgreso',
					data: {
                        cheque: chequeP,
                        conceptoEgreso: conceptoEgresoP,
                        cantidad: cantidadP,
                        retencionMonto: retencionP,
                        pagado: pagadoP,
                        mes: meses,
                        anio: anios,
                        chequera: chequeras,
                    },
                    success: function(r) {
                                    if(r == 1) {
                                        $('#modalAgregar').modal('hide');
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
                                        $('#dtEgresos').DataTable().ajax.reload();
                                        limpiar();
                                    } 
                                }
            });
        }
        
        });
    });

    $("#cheque").change(function(){

var cheque=$("#cheque").val();

     $.ajax({
     type: 'POST',
     url: '?1=EgresosController&2=getChNo',
     data:{cheque},
     success: function(r) {

             if(r==1)
             {
                 
                $("#btnGuardar").attr("disabled", true);
                $('#label-error').css('display','block');
             }    
             else{

                $("#btnGuardar").attr("disabled", false);
             }  
     }
         });

});

$(function () {
            $('#cheque').keyup(function () {
                $('#label-error').css('display', 'none');
                $("#btnGuardar").attr("disabled", false);
            });
        });

        $(function() {
            var option = '';
            var chequeras = '<?php echo $chequerasCMB; ?>';

            $.each(JSON.parse(chequeras), function() {
                option = `<option value="${this.idChequera}">${this.chequera}</option>`;

                $('#chequeras').append(option);
            });
        });

        


</script>
