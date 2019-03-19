
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
<script src="./res/tablas/tablaIngresos.js"></script>

 </head>
<script>
<?php
            $fechaMaxima = date('Y-m-d');
            $fechaMax = strtotime ( '-0 day' , strtotime ( $fechaMaxima ) ) ;
            $fechaMax = date ( 'Y-m-d' , $fechaMax );
             
            $fechaMinima = date('Y-m-d');
            $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
            $fechaMin = date ( 'Y-m-d' , $fechaMin );

            $año= date('Y');
?>


            
</script>


<style>
.fc-past {
        background-color: #C4D1FC;
    }
.fc-future {
        background-color: #EEFAA3;
}   

 

.fc th{
    padding: 10px 0px;
    vertical-align: middle;
    background: #E6C404;
    color: #370987;
    border: black 1px solid;
    
}
.fc td{
    border: black 1px solid;
}
.fc-toolbar{
    font-weight: bold;
    background: #E6C404;
    color: #370987;
    border: black 1px solid;
    
}
.fc-view-container{
    
    margin: auto;
    background: #D9D9E7;
    font-weight: bold;
    color: #370987;
    border: black 0px solid;
}


.fc-today-button{
    
    background: #140E93  ;
    color: #E6C404 ;
}

.fc-prev-button{
    
    background: #140E93  ;
    color: #E6C404 ;

}
.fc-next-button{
    
    background: #140E93  ;
    color: #E6C404 ;
}

.fc-head{
    border: black 1px solid;
}
.fc-body{
    border: black 1px solid;
   
}
.fc-basicDay-button{
    
    background: #140E93  ;
    color: #E6C404 ;
}

.fc-basicWeek-button{
    
    background: #140E93 ;
    color: #E6C404 ;
}
.fc-month-button{
    
    background:#140E93  ;
    color: #E6C404 ;
}




</style>

<div class="modal fade" id="modalReportes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  style="background-color:#0B0B64; color: yellow">
        <h5 class="modal-title" id="">Reportes de Ingresos ADEREL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color:#0B0B64; color: yellow">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <hr>
      <div class="container">
        <div class="row">
        <div class="col-md-6">
      <label style="font-weight: bold; font-size: 15px;">Reporte diario de Ingresos</label>
      </div>
      
        <a href="?1=IngresosController&2=llamaReporte" target="_blank">
                        <button class="btn btn-warning" id="btnCancelar" style="color:black; margin: auto;" 
                        id="btnReportes" type="button" >
                         <i class="eye icon"></i>Ver reporte
                        </button></a>
                    
                <div class="col-md-3"></div>  
                    
                        
                   
                    
        </div>
         
      </div>
      
      
      <br><br><div class="ui divider"></div>
      <div class="container">
      <label style="font-weight: bold; font-size: 15px;">Por Fechas</label>
        <div class="row">
            <div class="col-md-6">
                    <i class="calendar icon"></i><b>Fecha inicial:</b><br>
                    <input type="date" name="fecha1" id="fecha1" class="form-control" required max=<?php echo $fechaMin;?>>
            </div>
            <div class="col-md-6">
                <i class="calendar icon"></i><b>Fecha final:</b>
                <input type="date" name="fecha2" id="fecha2" class="form-control" required max=<?php echo $fechaMax;?>>
                
            </div>
           
        </div>
        <br>
        <div class="row">
        <div class="col-md-4"></div>
            <div class="col-md-4">
            
                 <button class="ui blue right button" id="btnGenerarReportePorFechas" style="width:100%;">
                 <i class="file icon"></i>Generar
                 </button>
           
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    </div>
    <br>
      <div class="modal-footer">
      
     
     

      </div>
    </div>
  </div>
</div>
 
        <div class="row">
               
                <div class="col-md-8">
                <h2>
                <i class="money bill alternate outline icon"></i>
                    Ingresos Aderel<font color="#DFD102" size="18px">.</font>
                    
                </h2>
               </div>
               
              
                <div class="col-md-4">
                
                <br>
                
                <div class="btn-toolbar float-right" role="toolbar">
                    <div class="btn-group ">

                        <button class="btn btn-default" id="btnResumen" style="background: #E6C404;color: #370987;">
                            <i class="file icon"></i> Resumen de Ingresos
                        </button>
                    </div>


                    <div class="btn-group">
                        <button class="btn btn-default" id="btnFechas" style="background: #140E93;color: #E6C404 ;">
                            <i class="file icon"></i> Reporte de Ingresos
                            </button>
                    </div>
                
                </div>
                </div>        
               
                
        </div>
                
    <hr>


    
    <div class="row">
    
             <div class="col-12"><div id="CalendarioWeb"></div></div> 

             
    </div>   
             
        


<!--modal resumen-->
<div class="modal fade bd-example-modal-xl" id="modalResumen" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header"   style="background-color:#0B0B64; color: yellow">
        <h5 class="modal-title" id="tituloIngreso">Ingreso ADEREL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color:#0B0B64; color: yellow">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body" >
        <div class="container">
                
                <div class="row" >
                    <div class="col"></div>
                        <div class="col-md-10">
                            <table id="dtIngresos" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                        <th style="background-color: #E6C404;">N°</th>
                                        <th style="background-color: #E6C404;">Ingreso</th>
                                        <th style="background-color: #E6C404;">Cantidad</th>
                                        <th style="background-color: #E6C404;">Fecha</th>
                                                 
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                         </div>
                         <div class="col"></div>  
                </div>
            </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>




  <!--modal calendario-->

<div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header"  style="background-color:#E6C404; color: blue">
        <h5 class="modal-title" id="tituloIngreso">Ingreso ADEREL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="txtId" name="txtId" class="form-control"/>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label><i class="calendar icon"></i>Fecha :</label>
                    <input type="text" id="txtFecha" name="txtFecha" class="form-control" disabled/></br>
                </div>
                <div class="form-group col-md-4">               
                    <label><i class="money bill alternate outline icon"></i>Nombre del Ingreso:</label>
                  
                   <input type="text" name="txtTitulo" id="txtTitulo" class="form-control input-lg" autocomplete="off" placeholder="Nombre del Ingreso" />
                  
                <div class="ui red pointing label"  id="labelTitulo"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                </div>  
            
                <div class="form-group col-md-4">       
                    <label><i class="dollar icon"></i> Cantidad :</label>
                    <input type="text" id="txtCantidad" name="txtCantidad" class="form-control" placeholder="$0.00"/>
                    <div class="ui red pointing label"  id="labelCantidad"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Completa este campo</div>
                </div>
                <input type="hidden" name="txtMes" id="txtMes"/>
             <input type="hidden" name="txtAnio" id="txtAnio"/>  
            </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-warning" id="btnAgregar" >Agregar Ingreso</button>
      <button type="button" class="btn btn-primary" id="btnModificar">Modificar Ingreso</button>
      <button type="button" class="btn btn-warning" id="btnEliminar">Eliminar Ingreso</button>
      <button type="button" class="btn btn-info" id="btnCerrar" >Cancelar</button>
      </div>
    </div>
  </div>
  </div>



 
<script>



$('#my-button').click(function() {
    $('#modalCierre').modal();
    var moment = $('#CalendarioWeb').fullCalendar('getDate');
            var myarray = moment.format().split("-")
            
            mes = myarray[1];

            $("#mesRemanente").val(mes);

});

$('#btnCerrar').click(function() {
  $("#modalCalendar").modal('toggle');
  $('#labelTitulo').css('display', 'none');
  $('#labelCantidad').css('display', 'none');
  $("#btnAgregar").attr("disabled", false);
  $("#txtId").val('');
    $("#txtTitulo").val('');
    $("#txtCantidad").val('');
});

$(document).on("click", "#btnGenerarReportePorFechas", function () {
        var fecha = $('#fecha1').val();
        var fecha2 = $('#fecha2').val();
window.open('?1=IngresosController&2=reportePorFechas&fecha='+fecha+'&fecha2='+fecha2,'_blank');
return false;
});

   $('#btnResumen').click(function(){
    $('#modalResumen').modal();
   });
    $('#txtCantidad').mask("###0.00", {reverse: true});
    $(document).ready(function(){
       

        $('#CalendarioWeb').fullCalendar({
            height: 550,
            columnHeaderText: function(mom) {
    if (mom.weekday() === 0) {
      return 'Lun';
    } 
    if (mom.weekday() === 1) {
      return 'Mar';
    }
    if (mom.weekday() === 2) {
      return 'Mier';
    }
    if (mom.weekday() === 3) {
      return 'Jue';
    }
    if (mom.weekday() === 4) {
      return 'Vie';
    }
    if (mom.weekday() === 5) {
      return 'Sab';
    }
    if (mom.weekday() === 6) {
      return 'Dom';
    }
    
  },
            header:
            {
                left: 'today,prev,next',
                center: 'title',
                right: 'month, basicWeek, basicDay'

            },
            customButtons: {
                Miboton: {
                    text: "Agregar",
                    click:function(){
                        alert("accion");
                    }
                }
            },
            
            dayClick:function(date,jsEvent,view)
            {
                var f = new Date();
                var mes;
                if(f.getMonth()<10)
                {
                   mes= "0" + (f.getMonth()+1);
                }else{
                    mes = f.getMonth()+1;
                }
       fechaAc= f.getFullYear() + "-" + (mes) + "-" + f.getDate();
             //   alert(fechaAc);

       // alert(date.format());   

                
                var moment = $('#CalendarioWeb').fullCalendar('getDate');
            var myarray = moment.format().split("-")
            anio = myarray[0];
            mes = myarray[1];
            
            
           
                $('#btnAgregar').show();
                $('#btnModificar').hide();
                $('#btnEliminar').hide();
                limpiarFormulario();
                $('#txtFecha').val(date.format());
                $('#txtMes').val(mes);
                  $('#txtAnio').val(anio);
                $("#modalCalendar").modal();
               
            },
                events: "?1=IngresosController&2=IngresosBD",
                
            eventClick:function(calEvent,jsEvent,view){
                $('#btnAgregar').hide();
                $('#btnModificar').show();
                $('#btnEliminar').show();

                $("#tituloIngreso").html(calEvent.title);
                //$("#txtDescripcion").val(calEvent.descripcion);
                $("#txtTitulo").val(calEvent.title);
                $("#txtCantidad").val(calEvent.cantidad);
                $('#txtMes').val(calEvent.mes);
                $('#txtAnio').val(calEvent.anio);
                $("#txtId").val(calEvent.id);

                Fecha= calEvent.start._i.split(" ");

                $("#txtFecha").val(Fecha[0]);
                $("#modalCalendar").modal();
            },
            editable:true,
            eventDrop:function(calEvent)
            {
                
                $("#txtId").val(calEvent.id);
                $("#txtTitulo").val(calEvent.title);
              //  $("#txtDescripcion").val(calEvent.descripcion);
                $("#txtCantidad").val(calEvent.cantidad);
                
                var moment = $('#CalendarioWeb').fullCalendar('getDate');
            var myarray = moment.format().split("-")
            anio = myarray[0];
            mes = myarray[1];
            $('#txtMes').val(mes);
                  $('#txtAnio').val(anio);

                var fecha = calEvent.start.format().split("T");
                $("#txtFecha").val(fecha[0]);
                RecolectarDatosGUI();
                EnviarInformacion('modificar',NuevoEvento,true);
            }
            
        });
    });
</script>
<script type="text/javascript">
//override defaults
alertify.defaults.title = "Confirmación";
alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-warning";
alertify.defaults.theme.cancel = "btn btn-primary";
alertify.defaults.theme.input = "form-control";


</script>
<script>

$(function () {
            $('#txtTitulo').keyup(function () {
                $('#labelTitulo').css('display', 'none');
                $("#btnAgregar").attr("disabled", false);
            });
            $('#txtCantidad').keyup(function () {
                $('#labelCantidad').css('display', 'none');
                $("#btnAgregar").attr("disabled", false);
            });
        });
$("#btnFechas").click(function(){
    $("#modalReportes").modal();
    });
var NuevoEvento;

    $("#btnAgregar").click(function(){
        if($("#txtTitulo").val()=="")
        {
          $('#labelTitulo').css('display','block');
          $("#btnAgregar").attr("disabled", true);
        }
        else if($("#txtCantidad").val()==""){
          $('#labelCantidad').css('display','block');
          $("#btnAgregar").attr("disabled", true);
        }

        else if($("#txtTitulo").val()=="" && $("#txtCantidad").val()>1)
        {
          $('#labelTitulo').css('display','block');
          $("#btnAgregar").attr("disabled", true);
        }
        else if($("#txtCantidad").val()=="" && $("#txtTitulo").val()>1){
          $('#labelCantidad').css('display','block');
          $("#btnAgregar").attr("disabled", true);
        }
        else{
        alertify.confirm("¿Desea agregar el nuevo ingreso?",
            function(){
                //$("#modalCalendar").modal('toggle');
                RecolectarDatosGUI();
                EnviarInformacion('agregar',NuevoEvento);  
            },
            function(){
                $("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            });
          }
    });

    $("#btnEliminar").click(function(){
        
        alertify.confirm("¿Desea eliminar el ingreso?",
            function(){
                //$("#modalCalendar").modal('toggle');
                RecolectarDatosGUI();
                EnviarInformacion('eliminar',NuevoEvento);
               
            },
            function(){
                $("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            });
       
    });

    $("#btnModificar").click(function(){
      
        alertify.confirm("¿Desea modificar el ingreso?",
                function(){
               // $("#modalCalendar").modal('toggle');    
                RecolectarDatosGUI();
                EnviarInformacion('modificar',NuevoEvento);
                },
                function(){
                    $("#modalCalendar").modal('toggle');
                    alertify.error('Cancelado');
                  });
       
    });

function RecolectarDatosGUI()
{
    
    NuevoEvento=
        {   
            id:$('#txtId').val(),
            title:$('#txtTitulo').val(),
           // descripcion:$('#txtDescripcion').val(),
            start:$('#txtFecha').val(),
            cantidad:$('#txtCantidad').val(),
            mes:$('#txtMes').val(),
            anio:$('#txtAnio').val(),
            color:'#140E93',
            textColor:'#E6C404 ',
            idEliminado:1
        };
      
    
}



function EnviarInformacion(accion,objEvento,modal)
{
    $.ajax(
        {
            type:'POST',
            url:'./app/view/Ingresos/IngresosBD.php?accion='+accion,
            data:objEvento,
            success: function(msg)
            {
                if(msg){
                    swal({
                            title: 'Listo',
                            text: 'Realizado con éxito',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1700
                        })
                    $('#CalendarioWeb').fullCalendar('refetchEvents');
                    $('#dtIngresos').DataTable().ajax.reload();
                            if(!modal){
                                 $("#modalCalendar").modal('toggle');
                            }
                            
                }
            },
            error:function()
            {
                alert("nel prro");
            }
        }
    );
}

function limpiarFormulario()
{
    $("#txtId").val('');
    $("#txtTitulo").val('');
    $("#txtCantidad").val('');
}
    
</script>
<script>
$(document).ready(function(){

    
 
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
