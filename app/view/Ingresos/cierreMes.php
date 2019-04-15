<?php
            $fechaMaxima = date('Y-m-d');
            $fechaMax = strtotime ( '-0 day' , strtotime ( $fechaMaxima ) ) ;
            $fechaMax = date ( 'Y-m-d' , $fechaMax );
             
            $fechaMinima = date('Y-m-d');
            $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
            $fechaMini = date ( 'Y-m-d' , $fechaMin );

            $anio= date('Y');
            $mes = date('M');
            $mesN = date('m')
?>

<br>
<div id="app">

<div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="money bill alternate icon"></i>
                    Cierre de Mes financiero ADEREL<font color="#DFD102" size="20px">.</font>
                   
                </div> 

                <input type="hidden"  id="mes" name="mes" >
   <input type="hidden"  id="anio" name="anio" value="<?php echo $anio ?>">
        </div>
        
        
        <div class="row">
            <div class="sixteen wide column">

            <form class="ui form" id="frmCierre">
            <h3><font color="orange">Detalle General</font></h3>
                <div class="ui divider"></div>
                <div class="field">
                    <div class="fields">
                    <div class="four wide field">
                                <label><i class="dollar sign icon"></i>En Efectivo</label>
                                    <input type="text" name="efectivo"  id="efectivo" placeholder="Dinero en Efectivo">
                                    <div class="ui red pointing label"  id="labelEfectivo"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                     </div>
                     <div class="four wide field">
                                <label><i class="box icon"></i>Caja Chica General</label>
                                    <input type="text" id="cajaChicaG" placeholder="Dinero en Caja Chica General" name="cajaChicaG">
                                    <div class="ui red pointing label"  id="labelCaja"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                      </div>

                      <div class="four wide field">
                                <label><i class="box icon"></i>Caja Chica ADEREL</label>
                                    <input type="text" id="cajaChicaA" placeholder="Dinero en Caja Chica ADEREL" name="cajaChicaA">
                                    <div class="ui red pointing label"  id="labelCaja"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                      </div>

                      <div class="four wide field">
                        <label><br></label>
                        <a class="ui orange button" id="cuadrarMes">
                            <i class="undo icon"></i>Cuadrar Mes
                        </a>

                        <a class="ui red button" href="?1=IngresosController&2=cierreMes" id="reload">
                            <i class="undo icon"></i> Volver a actualizar
                        </a>
                      </div>
                                                              
                                
                    </div>
                </div>
                
                <div id="cierre">
                <h3><font color="orange">Ingresos</font></h3>
                <div class="ui divider"></div>
                <div class="field">
                    <div class="fields">
                            <div class="five wide field">
                                <label><i class="dollar icon"></i>Saldo de Mes Anterior</label>
                                <input type="text" name="saldoAnterior" id="saldoAnterior" readonly style="background-color:#F0ECEC;
                                color: black; font-weight:bold;">
                            </div>
                            <div class="field" style="font-size:20px;">
                                <br>
                                <b>
                                 +
                                 </b>
                            </div> 
                            <div class="five wide field">
                                <label><i class="dollar icon"></i>Ingresos durante el Mes: <font color="blue">
                                 <?php echo $mes?>_<?php echo $anio ?></font></label>
                                <input type="text"  id="ingresoMes" name="ingresoMes"
                                readonly style="background-color:#F0ECEC; color: black; font-weight:bold;">
                            </div>  
                            <div class="field" style="font-size:20px;">
                                <br>
                                <b>
                                 =
                                 </b>
                            </div> 
                            <div class="five wide field">
                                <label><i class="dollar icon"></i>Total</label>
                                <input type="text"  id="totalI" name="totalI"
                                readonly style="background-color:#F0ECEC;
                                color: black; font-weight:bold;">
                            </div>  
                    </div>
                </div>  
                
                <h3><font color="orange">Egresos</font></h3>
                <div class="ui divider"></div>
                <div class="fields">
                            <div class="eight wide field">
                                <label><i class="dollar icon"></i>Total de Cantidad</label>
                                <input type="text" name="totalCantidad" id="totalCantidad" readonly style="background-color:#F0ECEC;
                                color: black; font-weight:bold;">
                            </div>
                            
                            <div class="eight wide field">
                                <label><i class="dollar icon"></i>Total de Retención</label>
                                <input type="text"  id="totalRetencion" name="totalRetencion" readonly style="background-color:#F0ECEC;
                                color: black; font-weight:bold;">
                            </div>  
                            
                            <div class="eight wide field">
                                <label><i class="dollar icon"></i>Total Pagado</label>
                                <input type="text"  id="totalPagado" name="totalPagado" readonly style="background-color:#F0ECEC;
                                color: black; font-weight:bold;">
                            </div>  
                    </div>
                 
                
                <h3><font color="orange">Cuentas</font></h3>
                <div class="ui divider"></div>
                <div class="field">
                    <div class="fields">
                    <div class="eight wide field">
                                <label><i class="dollar sign icon"></i>Cuenta Corriente </label>
                                 
                                    <input type="text" name="cuentaCorriente" id="cuentaCorriente"  readonly 
                                    style="background-color:#F0ECEC;
                                    color: black; font-weight:bold;">
                                </div>  
                                <div class="two wide field"></div>
                                <div class="three wide field">
                                <label><br></label>
                                
                            </div>
                            <br>
                            <div class="three wide field">
                            <label style="color: blue; font-size:18px;"><b><i class="dollar icon"></i>Nuevo Saldo</b></label>
                                <input type="text" name="nuevoSaldo" id="nuevoSaldo" readonly style="background-color:#F0ECEC;
                                color: black; font-weight:bold;">
                                </div>
                    </div>
                </div>

                
            </form>
            <br>
            <span style="float: right">
                <button class="ui green button" id="guardarDatos">
                <i class="save icon"></i> Cerrar Mes
                </button>
            </span>
            </div>
            </div>
        </div>
    </div>


</div>
<script>
var app = new Vue({
        el: "#app",
        data: {
           
        },
        methods: {
            refrescarTabla() {

                tablaPrimerN.ajax.reload();

                
            },
            saldoUltimoMes(mes,anio) {
                

                fetch("?1=RemanenteController&2=saldoAnterior&mes="+mes+"&anio="+anio)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmCierre input[name="saldoAnterior"]').val(dat.nuevoSaldo);
                      
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            ingresosMes(mes,anio){
                

                fetch("?1=IngresosController&2=verPorMes&mes="+mes+"&anio="+anio)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmCierre input[name="ingresoMes"]').val(dat.ingresoMes);
                      
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },

            egresosMes(mes,anio){
                

                fetch("?1=EgresosController&2=verPorMes&mes="+mes+"&anio="+anio)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmCierre input[name="totalCantidad"]').val(dat.cantidad);
                        $('#frmCierre input[name="totalRetencion"]').val(dat.retencion);
                        $('#frmCierre input[name="totalPagado"]').val(dat.pagado);
                      
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
           
            

        }
    });
</script>

<script>
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


 $("#mes").val(n);
 
 $("#cierre").hide();
 //carga de datos
var mes = $("#mes").val();
var anio = $("#anio").val();
    app.saldoUltimoMes(mes,anio);
    app.ingresosMes(mes,anio);
    app.egresosMes(mes,anio);


    $('#frmCierre input[name="efectivo"]').mask("###0.00", {reverse: true});
    $('#frmCierre input[name="cajaChicaA"]').mask("###0.00", {reverse: true});
    $('#frmCierre input[name="cajaChicaG"]').mask("###0.00", {reverse: true});


});






$("#cuadrarMes").click(function(){
   
    $("#cuadrarMes").hide();
    $("#reload").show();
    var mes = $("#mes").val();
    var anio = $("#anio").val();


    $('#frmCierre input[name="saldoAnterior"]').mask("###0.00", {reverse: true});
    $('#frmCierre input[name="ingresoMes"]').mask("###0.00", {reverse: true});
    $('#frmCierre input[name="totalI"]').mask("###0.00", {reverse: true});
    $('#frmCierre input[name="cuentaCorriente"]').mask("###0.00", {reverse: true});

    $('#frmCierre input[name="totalPagado"]').mask("###0.00", {reverse: true});
    $('#frmCierre input[name="nuevoSaldo"]').mask("###0.00", {reverse: true});

    app.saldoUltimoMes(mes,anio);
    app.ingresosMes(mes,anio);
    app.egresosMes(mes,anio);

    var  saldo = $('#saldoAnterior').val();
    var  ingreso = $('#ingresoMes').val();


    var cajaChicaG = $('#cajaChicaG').val();
    var cajaChicaA = $('#cajaChicaA').val();
    var efectivo = $('#efectivo').val();

    saldo = parseFloat(saldo);
    ingreso = parseFloat(ingreso);

    efectivo = parseFloat(efectivo);
    cajaChicaA = parseFloat(cajaChicaA);
    cajaChicaG = parseFloat(cajaChicaG);

    var total = saldo + ingreso;

    var descCuenta = efectivo + cajaChicaA + cajaChicaG;

    $('#totalI').val(total.toFixed(2));


    var pagado = $("#totalPagado").val();

    pagado = parseFloat(pagado);
    var totalIngre = total - pagado;

    var totalF = totalIngre - descCuenta;

    $("#cuentaCorriente").val(totalF.toFixed(2));

    var nuevoSa = totalF + descCuenta;

    $("#nuevoSaldo").val(nuevoSa.toFixed(2));

    $("#cierre").show("10");
});






</script>


