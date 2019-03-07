<?php
            $fechaMaxima = date('Y-m-d');
            $fechaMax = strtotime ( '-0 day' , strtotime ( $fechaMaxima ) ) ;
            $fechaMax = date ( 'Y-m-d' , $fechaMax );
             
            $fechaMinima = date('Y-m-d');
            $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
            $fechaMin = date ( 'Y-m-d' , $fechaMin );

            $anio= date('Y');
            $mes = date('M');
            $mesN = date('m')
?>


<div id="app">
<div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

    <a href="?1=IngresosController&2=Ingresos"  style="width: 22%; text-align:center;" class="ui blue inverted segment">
    Ingresos
        <div class="ui divider"></div>
        <i class="money bill alternate  icon"></i>
    </a>

    <a href="?1=EgresosController&2=Egresos" style="width: 22%; text-align:center;"  class="ui yellow inverted segment">
    Egresos
        <div class="ui divider"></div>
        <i class="money bill alternate outline icon"></i>
    </a>

    <button id="btnReportes" style="width:24%; text-align:center;"  class="ui blue inverted segment">
        Reportes
        <div class="ui divider"></div>
        <i class="file outline icon"></i>
    </button>

    <button style="width: 30%; text-align:center;"  class="ui yellow inverted segment" id="btnCierre">
        Cierre de <?php echo $mes?>_<?php echo $anio ?>
        <div class="ui divider"></div>
        <i class="dollar icon"></i>
    </button>
   
    
</div>
<input type="hidden"  id="mes" name="mes" >
   <input type="hidden"  id="anio" name="anio" value="<?php echo $anio ?>">

<div class="ui  modal" id="modalCierre" style="">
<div class="header">
   <i class="clipboard outline icon"></i>Datos del Mes en Curso<font color="orange" size="20px">.</font>
   &nbsp;&nbsp;
   <font color="blue">
   <?php echo $mes?>_<?php echo $anio ?>
   </font>
 
</div>

<div class="scrolling content" style="overflow: scroll;">
<form class="ui form" id="frmEgresos">
                <div class="field">
                    <div class="fields">
                            <div class="five wide field">
                                <label><i class="dollar icon"></i>Saldo de Mes Anterior</label>
                                <input type="text" name="saldoAnterior" id="saldoAnterior"
                                value="<?php echo $_SESSION["nuevoSaldo"]; ?>" disabled style="background-color:#F0ECEC;
                                color: black; font-weight:bold;">
                            </div>
                            <div class="field" style="font-size:20px;">
                                <br>
                                <b>
                                 +
                                 </b>
                            </div> 
                            <div class="five wide field">
                                <label><i class="dollar icon"></i>Ingresos durante el Mes:<font color="blue">
                                 <?php echo $mes?>_<?php echo $anio ?></font></label>
                                <input type="text"  id="ingresoMes" name="ingresoMes" value="<?php echo $_SESSION["$"]; ?>"
                                disabled style="background-color:#F0ECEC; color: black; font-weight:bold;">
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
                                 disabled style="background-color:#F0ECEC;
                                color: black; font-weight:bold;">
                            </div>  
                    </div>
                </div>  
                
                <h3><font color="orange">Egresos</font></h3>
                <div class="ui divider"></div>
                <div class="fields">
                            <div class="eight wide field">
                                <label><i class="dollar icon"></i>Total de Cantidad</label>
                                <input type="text" name="totalCantidad" id="totalCantidad"
                                value="<?php echo $_SESSION["cantidad"]; ?>" disabled style="background-color:#F0ECEC;
                                color: black; font-weight:bold;">
                            </div>
                            
                            <div class="eight wide field">
                                <label><i class="dollar icon"></i>Total de Retención</label>
                                <input type="text"  id="totalRetencion" name="totalRetencion"
                                value="<?php echo $_SESSION["retencion"]; ?>" disabled style="background-color:#F0ECEC;
                                color: black; font-weight:bold;">
                            </div>  
                            
                            <div class="eight wide field">
                                <label><i class="dollar icon"></i>Total Pagado</label>
                                <input type="text"  id="totalPagado" name="totalPagado"
                                value="<?php echo $_SESSION["pagado"]; ?>" disabled style="background-color:#F0ECEC;
                                color: black; font-weight:bold;">
                            </div>  
                    </div>
                 
                <h3><font color="orange">Detalle General</font></h3>
                <div class="ui divider"></div>
                <div class="field">
                    <div class="fields">
                    <div class="eight wide field">
                                <label><i class="dollar sign icon"></i>En Efectivo</label>
                                    <input type="text" name="efectivo"  id="efectivo" placeholder="Dinero en Efectivo">
                                    <div class="ui red pointing label"  id="labelEfectivo"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                     </div>
                     <div class="eight wide field">
                                <label><i class="percent icon"></i>Caja Chica</label>
                                    <input type="text" id="cajaChica" placeholder="Dinero en Caja Chica" name="cajaChica">
                                    <div class="ui red pointing label"  id="labelCaja"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                      </div>
                                                              
                                
                    </div>
                </div>
               
                <div class="field">
                    <div class="fields">
                    <div class="eight wide field">
                                <label><i class="dollar sign icon"></i>Cuenta Corriente </label>
                                 
                                    <input type="text" name="cuentaCorriente" id="cuentaCorriente"  disabled 
                                    style="background-color:#F0ECEC;
                                    color: black; font-weight:bold;">
                                </div>  
                                <div class="two wide field"></div>
                                <div class="three wide field">
                                <label><br></label>
                                <a  class="ui olive deny button" id="btnCalcular">
                            <i class="redo icon"></i>Nuevo Saldo
                            </a>
                            </div>
                            <div class="three wide field">
                            <label><br></label>
                                <input type="text" name="nuevoSaldo" id="nuevoSaldo" disabled style="background-color:#F0ECEC;
                                color: black; font-weight:bold;">
                                </div>
                    </div>
                </div>
            </form>

                  
</div>

    
    <div class="actions">
    <button class="ui yellow deny button" id="btnCancelar">
        Cancelar
    </button>
    <button class="ui blue deny button" id="btnGuardar">
        Cerrar Mes
    </button>
</div>
</div>

<div class="ui tiny modal" id="modalReportes" style="width:40%;">
<div class="header">
   <i class="clipboard outline icon"></i> Reportes ADEREL<font color="#DFD102" size="20px"> .</font>
</div><br>
<div class="content" class="ui equal width form">
    <form class="ui form" id="frmFechas">
        <div class="field">

              <div class="fields">
              <div class="two wide field"></div>
                    <div class="eight wide field">
                    
                            <label for="" style="font-weight: bold; font-size: 16px;">Reporte Consolidado de
                            <font color="blue"><?php echo $mes?>_<?php echo $anio ?>:</font> </label>
                    </div>
                    <div class="six wide field">
                         
                        <button class="ui black deny button"  style="color:white;" 
                        id="btnReporteC" type="button" >
                         <i class="eye icon"></i>Ver reporte
                        </button>
                   </div> 
                   <div class="two wide field"></div>
            </div>
        </div>
    </form>

</div>
<br>
<div class="ui divider"></div>
    <div class="content" class="ui equal width form">
<div class="ui form">
                        <div class="field">

                            <div class="fields">
                            <div class="one wide field"></div>

                                <div class="seven wide field">

                                    <button class="ui blue button" id="btnEgresos" style="width: 100%;">
                                    Egresos del mes: &nbsp; <?php echo $mes?>_<?php echo $anio ?>
                                    </button>
                                </div>

                                <div class="seven wide field">
                                <button class="ui yellow button" id="btnIngresos" style="width: 100%;">
                                    Ingresos del mes: &nbsp;<?php echo $mes?>_<?php echo $anio ?>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="field">
                            <div class="fields">
                            <div class="six wide field"></div>
                                <div class="six wide field">
                                <button class="ui purple  button" id="btnGenerarReporteIng">
                                Ver Ingresos
                                </button>
                                <button class="ui green  button" id="btnGenerarReporteEg">
                                Ver Egresos
                                </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        
    </div>                    
    </div>
    <div class="actions">
    <button class="ui brown deny button" id="btnCerrar">
        Cancelar
    </button>
</div>
</div>
</div>
<center>
        <a class="btnGraficos ui center teal button"  id="btnActualizar">
            <i class="chart bar icon"></i>Actualizar Datos
        </a>
      </center>
      
    
      <div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between; width:100%;">

   
        <div id="piechart" style="width: 100%;"></div>
        
       
        <div id="donutchart" style="width:100%;"></div>

    
      </div>



<script type="text/javascript">


$(document).ready(function(){
    $("#btnGenerarReporteIng").hide();
    $("#btnGenerarReporteEg").hide();
});

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
});


function ingresos()
{
    
    var  meses = $('#mes').val();
              var  anios = $('#anio').val();
         
            
            
            $.ajax({
                    type: 'POST',
                    url: '?1=IngresosController&2=verPorMes',
					data: {
                        mes: meses,
                        anio: anios,

                    }
        
        });
        
}
function totalI(){
    var  saldo = $('#saldoAnterior').val();
    var  ingreso = $('#ingresoMes').val();
    saldo = parseFloat(saldo);
    ingreso = parseFloat(ingreso);

    var total = saldo + ingreso;
    $('#totalI').val(total.toFixed(2));

    var pagado = $("#totalPagado").val();

    pagado = parseFloat(pagado);
    var totalIngre = total - pagado;

    $("#cuentaCorriente").val(totalIngre.toFixed(2));
}
function egresos()
{
    
            var  meses = $('#mes').val();
              var  anios = $('#anio').val();
         
            
            
            $.ajax({
                    type: 'POST',
                    url: '?1=EgresosController&2=verPorMes',
					data: {
                        mes: meses,
                        anio: anios,

                    }
        
        });
        
}

function saldoAnterior()
{
    var  meses = $('#mes').val();
              var  anios = $('#anio').val();
            $.ajax({
                    type: 'POST',
                    url: '?1=RemanenteController&2=saldoAnterior',
					data: {
                        mes: meses,
                        anio: anios,

                    }
        
        });
        
}

function id()
{
    $("#nuevoSaldo").hide();
}

window.onload =  function ()
{
    ingresos();
    saldoAnterior();
    egresos();
    id();
    totalI();
    
};

</script>

 <script>
$('#saldoAnterior').mask("###0.00", {reverse: true});
$('#totalI').mask("###0.00", {reverse: true});
$('#ingresoMes').mask("###0.00", {reverse: true});
$('#totalCantidad').mask("###0.00", {reverse: true});
$('#totalRetencion').mask("###0.00", {reverse: true});
$('#totalPagado').mask("###0.00", {reverse: true});
$('#cuentaCorriente').mask("###0.00", {reverse: true});
$('#nuevoSaldo').mask("###0.00", {reverse: true});
$('#efectivo').mask("###0.00", {reverse: true});
$('#cajaChica').mask("###0.00", {reverse: true});

$(function(){
    $("#saldoAnterior").keyup(function(){
        $("#nuevoSaldo").hide();
        $("#nuevoSaldo").val('');
        var saldo = $("#saldoAnterior").val();
        var ingresoMes = $("#ingresoMes").val();
        var pagado = $("#totalPagado").val();
        

        var total = parseFloat(saldo) + parseFloat(ingresoMes);

        var totalCuenta= parseFloat(total) - parseFloat(pagado);

        if(total>1){
        $("#totalI").val(parseFloat(total));
        $("#cuentaCorriente").val(totalCuenta);
       // $("#nuevoSaldo").val(totalCuenta);
        }else{
            $("#totalI").val(ingresoMes);
            $("#cuentaCorriente").val('');
        //    $("#nuevoSaldo").val('');
        }
    });

}); 

$(function(){
    $("#efectivo").keyup(function(){
        $("#nuevoSaldo").hide();
        $("#nuevoSaldo").val('');
        var saldo = $("#totalI").val();
        var pagado = $("#totalPagado").val();
        var efectivo = $("#efectivo").val();
        var cajaChica = $("#cajaChica").val();

        saldo = parseFloat(saldo);
        efectivo = parseFloat(efectivo);
        pagado = parseFloat(pagado);
        cajaChica = parseFloat(cajaChica);

        var cuentaSinEfectivo = (saldo) - (pagado);

       // var cajaEfectivo = (efectivo) + (cajaChica);

        var cuentaConEfectivo = (cuentaSinEfectivo) - (efectivo);
        
        var nuevoSaldo = (cuentaConEfectivo) + (efectivo);

      if($("#efectivo").val()=="" && $("#cajaChica").val() > 1)
      {
          
        var cajaEfectivo = cajaChica;
        var cuentaConEfectivos = (cuentaSinEfectivo) - (cajaEfectivo);

        $("#cuentaCorriente").val(cuentaConEfectivos.toFixed(2));
      }
      else if($("#efectivo").val()=="")
      {
        $("#cuentaCorriente").val(cuentaSinEfectivo.toFixed(2));
      }
      else
      {
        $("#cuentaCorriente").val(cuentaConEfectivo.toFixed(2));
        //$("#nuevoSaldo").val(cuentaConEfectivo);
        }
    });

});


$(function(){
    $("#cajaChica").keyup(function(){
        $("#nuevoSaldo").hide();
        $("#nuevoSaldo").val('');
        var saldo = $("#totalI").val();
        var pagado = $("#totalPagado").val();
        var efectivo = $("#efectivo").val();
        var cajaChica = $("#cajaChica").val();

        saldo = parseFloat(saldo);
        efectivo = parseFloat(efectivo);
        pagado = parseFloat(pagado);
        cajaChica = parseFloat(cajaChica);

        var cajaEfectivo = (efectivo) + (cajaChica);

        var cuentaSinEfectivo = (saldo) - (pagado);

        var cuentaConEfectivo = (cuentaSinEfectivo) - (cajaEfectivo);
        
        var nuevoSaldo = (cuentaConEfectivo) + (efectivo);

      if($("#cajaChica").val()=="" && $("#efectivo").val() > 1)
      {
        var cajaEfectivo = efectivo;
        var cuentaConEfectivos = (cuentaSinEfectivo) - (cajaEfectivo);
        $("#cuentaCorriente").val(cuentaConEfectivos.toFixed(2));
      }
      else if($("#cajaChica").val()=="")
      {
        $("#cuentaSinEfectivo").val(cuentaConEfectivos.toFixed(2));
      }
      
      else
      {
        $("#cuentaCorriente").val(cuentaConEfectivo.toFixed(2));
        //$("#nuevoSaldo").val(cuentaConEfectivo);
        }
    });

});
$(function(){
        $('#btnIngresos').click(function() {
            $("#btnGenerarReporteIng").show();
        $("#btnGenerarReporteEg").hide();
        });

        $('#btnEgresos').click(function() {
            $("#btnGenerarReporteIng").hide();
        $("#btnGenerarReporteEg").show();
        });

        $('#btnCerrar').click(function() {
            $("#btnGenerarReporteIng").hide();
        $("#btnGenerarReporteEg").hide();
        });

        $(document).on("click", "#btnGenerarReporteIng", function () {
        var mes = $('#mes').val();
        var anio = $('#anio').val();
        window.open('?1=IngresosController&2=reportePorMes&mes='+mes+'&anio='+anio,'_blank');
        return false;
});

$(document).on("click", "#btnGenerarReporteEg", function () {
        var mes = $('#mes').val();
        var anio = $('#anio').val();
        window.open('?1=EgresosController&2=reportePorMes&mes='+mes+'&anio='+anio,'_blank');
        return false;
});

$(document).on("click", "#btnReporteC", function () {
        var mes = $('#mes').val();
        var anio = $('#anio').val();
        window.open('?1=UsuarioController&2=reporteConsolidado&mes='+mes+'&anio='+anio,'_blank');
        return false;
});
    });
$(function(){
        $('#btnCalcular').click(function() {
        
            var saldo = $("#totalI").val();
       
        var pagado = $("#totalPagado").val();
        var efectivo = $("#efectivo").val();
        var cajaChica = $("#cajaChica").val();

        saldo = parseFloat(saldo);
       // ingresoMes = parseInt(ingresoMes);
        pagado = parseFloat(pagado);
        efectivo = parseFloat(efectivo);
        cajaChica = parseFloat(cajaChica);

       var efecCaja = efectivo + cajaChica;
        var restaSaldo = pagado + efecCaja;
        
        var totalFinal = saldo - restaSaldo;
        
            var vali = saldo - pagado;

        if($("#efectivo").val() == '' && $("#cajaChica").val() == '' ){
            $("#nuevoSaldo").val(vali.toFixed(2));
        $("#nuevoSaldo").show();
        }else
        {
            var nuevoSaldo = totalFinal + efecCaja;
        $("#nuevoSaldo").val(nuevoSaldo.toFixed(2));
            $("#nuevoSaldo").show();
        }

            

});
});


$(document).on("click", "#btnCierre", function () {
        
       $('#modalCierre').modal('setting', 'autofocus', true).modal('setting', 'closable', true).modal('show');
                        
            
        });

$(document).on("click", "#btnCierre", function () {
        
        $('#modalCierre').modal('setting', 'autofocus', true).modal('setting', 'closable', true).modal('show');
                         
             
         });
$(document).on("click", "#btnReportes", function () {
        
        $('#modalReportes').modal('setting', 'autofocus', true).modal('setting', 'closable', true).modal('show');
                         
             
});

$(document).on("click", "#btnActualizar", function () {
    swal({
  title: 'Listo!!',
  text: 'Tus Datos se actualizarán',
  type: 'warning',
  showConfirmButton: false,
  timer: 2500
}).then(
  function () {
    location.href = "?1=UsuarioController&2=dashboard";
  },
  
);
     });

function limpiar(){
    
    $('#efectivo').val('');
    $('#cajaChica').val('');
    $('#nuevoSaldo').val('');
    $('#nuevoSaldo').hide();
   
    $('#cuentaCorriente').val('');
    $('#labelCaja').css('display','none');
    $('#labelEfectivo').css('display','none');
    $("#btnGuardar").attr("disabled", false);
}
$(document).on("click", "#btnCancelar", function () {
limpiar();
  
 });     
$(document).on("click", "#btnReportes", function () {
            $('#modalReportes').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
     });



     $(function(){
        $('#efectivo').keyup(function () {
                $('#labelEfectivo').css('display', 'none');
                $("#btnGuardar").attr("disabled", false);
            });
            $('#cajaChica').keyup(function () {
                $('#labelCaja').css('display', 'none');
                $("#btnGuardar").attr("disabled", false);
            });

        $('#btnGuardar').click(function() {
            if($('#efectivo').val()=="" && $('#cajaChica').val()=="")
            {
                $('#labelCaja').css('display','block');
            $('#labelEfectivo').css('display','block');
          $("#btnGuardar").attr("disabled", true);
            }
            else if($('#efectivo').val()=="")
            {
                $('#labelEfectivo').css('display','block');
          $("#btnGuardar").attr("disabled", true);
            }
            else if($('#efectivo').val()=="" && $('#cajaChica').val()>1)
            {
                $('#labelEfectivo').css('display','block');
          $("#btnGuardar").attr("disabled", true);
            }
           else if($('#cajaChica').val()==""){
                $('#labelCaja').css('display','block');
          $("#btnGuardar").attr("disabled", true);
            }
           else if($('#cajaChica').val()=="" && $('#efectivo').val()>1){
                $('#labelCaja').css('display','block');
          $("#btnGuardar").attr("disabled", true);
            }
            else{
             var saldoAnteriorC = $('#saldoAnterior').val();
              var  ingresoC = $('#totalI').val();
              var  cuentaC = $('#cuentaCorriente').val();
              var  efectivoC = $('#efectivo').val();
              var  cajaC = $('#cajaChica').val();
              var nuevoSaldo = $('#nuevoSaldo').val();
              var  meses = $('#mes').val();
              var  anios = $('#anio').val();    
            $.ajax({
                    type: 'POST',
                    url: '?1=RemanenteController&2=registrar',
					data: {
                        saldoa : saldoAnteriorC,
                        ingreso: ingresoC,
                        cuenta: cuentaC,
                        efectivo: efectivoC,
                        caja: cajaC,
                        saldo: nuevoSaldo,
                        mes: meses,
                        anio: anios,
                    },
                    success: function(r) {
                                    if(r == 1) {
                                        //$('#modalAgregar').modal('hide');
                                        swal({
                                    title: 'Listo!!',
                                    text: 'Datos Guardaos',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer: 2500
                                    }).then(
                                    function () {
                                        location.href = "?1=UsuarioController&2=dashboard";
                                    },
                                    
                                    );
                                        limpiar();
                                    } 
                                }
            });
        }
        
        });
    });
</script>



<?php
 require_once './vendor/autoload.php';
 $con = new mysqli("localhost","root","","ADEREL");
$sql="select count(id) as Ingreso, title  from ingresos where idEliminado=1 and start between (select ADDDATE(CURDATE(), INTERVAL -7 DAY)) and curdate() group by title;";
$res=$con->query($sql);

$Cantidad=mysqli_num_rows($res);

$ingresos=null;
$i=1;

if ($Cantidad==1) {
  while ($fila=$res->fetch_assoc()) {
   $ingresos[$i]=$fila['Ingreso'];
   $i++;
  }
}


?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Ingreso', 'Cantidad'],
           <?php
          while ($fila=$res->fetch_assoc()) {
          echo "['".$fila["title"]."',".$fila["Ingreso"]."],";
         // ['Work',     11],

          }
          ?>
        ]);

        var options = {
          title: 'Tipos de ingresos durante los ultimos 7 días',
          height:300,
         tooltip: {textStyle: {fontName: 'TimesNewRoman',fontSize: 14,bold: true}} 
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

    </script>


<?php
 require_once './vendor/autoload.php';
 $con = new mysqli("localhost","root","","ADEREL");
$sql="select count(idEgreso) as egresos, conceptoEgreso  from egresos
where idEliminado=1 and fechaEgreso between (select ADDDATE(CURDATE(), INTERVAL -7 DAY))
 and curdate() group by conceptoEgreso;";
$res=$con->query($sql);

$Cantidad=mysqli_num_rows($res);

$egresos=null;
$i=1;

if ($Cantidad==1) {
  while ($fila=$res->fetch_assoc()) {
   $egresos[$i]=$fila['egresos'];
   $i++;
  }
}


?>



<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['egresos', 'Cantidad'],
           <?php
          while ($fila=$res->fetch_assoc()) {
          echo "['".$fila["conceptoEgreso"]."',".$fila["egresos"]."],";
          }
          ?>
        ]);

        var options = {
          title: 'Tipos de egresos durante los ultimos 7 días',
          pieHole: 0.4,
         height:300,
         tooltip: {textStyle: {fontName: 'TimesNewRoman',fontSize: 14,bold: true}}
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
 

   





   
