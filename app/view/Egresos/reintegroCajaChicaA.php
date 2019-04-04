<?php
$anio= date('Y');
?>

<div class="ui  modal" id="reintegroCaja">
<div class="header">
<i class="box icon"></i><i class="dollar icon"></i>Reintegro para caja Chica Aderel<br><br>
<a style="font-size:20px; color:green;">Monto a mantener en caja: $ <?php echo $monto; ?></a>
<br><br>
<a style="font-size: 20px; color:black;">
Monto actual de la caja:  <?php if($montoActual < 10 ){ ?>
                        <a style="font-weight:bold; color:red; font-size: 20px;"> $ <?php echo $montoActual;
                         }else{?> </a>
                         <a style="font-weight:bold; color:blue; font-size: 20px;"> $ <?php echo $montoActual;
                        }?> </a>
    </a>
<br><br>
</div>


<div class="content">


<div class="ui equal width form">
            <form class="ui form" id="frmEgresos">
                <div class="field">
                    <div class="fields">
                            <div class="four wide field">
                                <label><i class="money bill alternate icon"></i>Ch NO</label>
                                <input type="text" name="cheque" placeholder="N° Cheque" id="cheque">
                                <div class="ui red pointing label"  id="labelCheque"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                <div class="field">
                <a id="label-error" style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;" class="ui blue fluid large label">
                    ChNo ya fue utilizado</a>
                </div>
                            </div>
                            <div class="six wide field">
                                <label><i class="edit icon"></i>Concepto de Egreso</label>
                                <input type="text"  id="conceptoEgreso" name="conceptoEgreso" value="Reintegro de caja chica general" readonly>
                                
                                <div class="ui red pointing label"  id="labelConcepto"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                            </div>     
                   
                                <div class="six wide field">
                                <label><i class="dollar sign icon"></i>Cantidad</label>
                                    <input type="text" name="cantidad" placeholder="$$ 00.00" id="cantidad">
                                    <div class="ui red pointing label"  id="labelCantidad"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                                </div>                             
                                </div>
                </div>
                <input type="hidden"  id="mes" name="mes">
   <input type="hidden"  id="anio" name="anio" value="<?php echo $anio ?>">
            </form>
        </div>
</div>

<div class="actions">
<button class="ui yellow button" id="btnCancelar">
Salir
</button>

<button class="ui blue button" id="btnReintegro">
Realizar reíntegro
</button>
</div>

</div>


<script>
$(document).ready(function(){
    $("#cantidad").mask("###0.00", {reverse: true});
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

    $("#reintegroCaja").modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');

    var monto = <?php echo $monto; ?>;
    var montoAc = <?php echo $montoActual; ?>;

    var recom = (monto -montoAc).toFixed(2);
    
   
    $("#cantidad").val(recom);
});

$("#btnCancelar").click(function(){
    
    location.href = "?1=IngresosController&2=nuevoIngreso";
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
                 
                $("#btnReintegro").attr("disabled", true);
                $('#label-error').css('display','block');
             }    
             else{

                $("#btnReintegro").attr("disabled", false);
             }  
     }
         });

});


$(function () {
            $('#cheque').keyup(function () {
                $('#label-error').css('display', 'none');
                $("#btnReintegro").attr("disabled", false);
                $('#labelCheque').css('display', 'none');
            });
        });

        $(function(){
        $('#btnReintegro').click(function() {
            if($("#cheque").val()=="" && $("#conceptoEgreso").val()=="" && $("#cantidad").val()==""){
                $('#labelCheque').css('display', 'block');
                $('#labelConcepto').css('display', 'block');
                $('#labelCantidad').css('display', 'block');
            $("#btnReintegro").attr("disabled", true);
            }
            else if($("#cheque").val()=="" && $("#conceptoEgreso").val()>1 && $("#cantidad").val()>1){
                $('#labelCheque').css('display', 'block');
            $("#btnReintegro").attr("disabled", true);
            }
           else if($("#conceptoEgreso").val()=="" && $("#cantidad").val()>1 && $("#cheque").val()>1 ){
                $('#labelConcepto').css('display', 'block');
            $("#btnReintegro").attr("disabled", true);
            }
           else if($("#cantidad").val()=="" && $("#conceptoEgreso").val()>1 && $("#cheque").val()>1){
                $('#labelCantidad').css('display', 'block');
            $("#btnReintegro").attr("disabled", true);
            }

           else if($("#cheque").val()==""){
                $('#labelCheque').css('display', 'block');
            $("#btnReintegro").attr("disabled", true);
            }
           else if($("#conceptoEgreso").val()==""){
                $('#labelConcepto').css('display', 'block');
            $("#btnReintegro").attr("disabled", true);
            }
           else if($("#cantidad").val()==""){
                $('#labelCantidad').css('display', 'block');
            $("#btnReintegro").attr("disabled", true);
            }
            else{
                alertify.confirm("¿Desea realizar el reintegro a caja chica aderel?",
            function(){
              var  chequeP = $('#cheque').val();
              var  cantidadP = $('#cantidad').val();
              var  meses = $('#mes').val();
              var  anios = $('#anio').val();
            $.ajax({
                    type: 'POST',
                    url: '?1=EgresosController&2=reintegroCajaAA',
					data: {
                        cheque: chequeP,
                     //   conceptoEgreso: conceptoEgresoP,
                        cantidad: cantidadP,
                        //retencionMonto: retencionP,
                       // pagado: pagadoP,
                        mes: meses,
                        anio: anios,
                    },
                    success: function(r) {
                                    if(r == 1) {
                                        $('#reintegroCaja').modal('hide');
                                        swal({
                                            title: 'Listo',
                                            text: 'Reintegro realizado con éxito',
                                            type: 'success',
                                            showConfirmButton: false,
                                             timer: 1700

                                        }).then((result) => {
                                            
                                                location.href = '?1=EgresosController&2=reintegroCajaA';
                                            
                                        }); 
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
    });

</script>