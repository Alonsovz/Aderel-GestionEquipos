



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

<div class="ui tiny modal" id="modalReportes">
      <div class="header"  >
        <h5><i class="file icon"></i>Reportes de Ingresos ADEREL</h5>
      </div>
      <hr>
      <div class="content">
        <div class="row">
      <center><label style="font-weight: bold; font-size: 15px; ">Reporte diario de Ingresos</label></center><br>
      </div>
      <div class="content" class="ui equal width form">
        <form class="ui form">
        <div class="field">
          <div class="fields">

        <a href="?1=IngresosController&2=llamaReporte" target="_blank" style="width:30%; margin:auto;" id="btnReportes" class="ui red button">
                         
                         <i class="eye icon"></i>Ver reporte
                        </a>
        </div>
        </div>
        </form>

        </div>
        
      <div class="ui divider"></div>
      <div class="row">
          <label style="font-weight: bold; font-size: 15px;">Por Fechas</label>
       </div>
       <div class="content" class="ui equal width form">
        <form class="ui form">
        <div class="field">
          <div class="fields">
            <div class="eight wide field"><br>
                      <label><i class="calendar icon"></i>Fecha inicial:</label>
                      <input type="date" name="fecha1" id="fecha1"  required max=<?php echo $fechaMin;?>>
            </div>

            <div class="eight wide field"><br>
                 <label> <i class="calendar icon"></i>Fecha final: </label>
                  <input type="date" name="fecha2" id="fecha2" class="form-control" required max=<?php echo $fechaMax;?>>
            </div>    

            </div>
            </div>
            
            <div class="field">
                   <div class="fields">
                      <a class="ui blue  button" id="btnGenerarReportePorFechas" style="width:30%; margin:auto;">
                      <i class="file icon"></i>Generar
                      </a>

                  </div>
            </div>

           </form>
          </div>
          </div>
    <br>
      <div class="actions">
      
      <button class="ui orange button" id="cerrarReporte">
                 <i class="close icon"></i>Cerrar
      </button>
      </div>
   </div>
 


    
<br><div id="app">
  <div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="dollar icon"></i> <i class="money bill icon"></i>
                        Ingresos <font color="#1CC647" size="20px">.</font>

                        <div class="sixteen wide column">

                        
                        <button class="ui right floated blue button" id="btnFechas">
                            <i class="file icon"></i> Reporte de Ingresos
                            </button>

                            <button class="ui right floated yellow purple button" id="btnResumen">
                            <i class="file icon"></i> Resumen de Ingresos
                        </button>
                    </div>

                </div>
        </div>
        
  </div>  
  </div>
  <br>
         
    <hr>


    
    <div class="row">
    
             <div class="col-12"><div id="CalendarioWeb"></div></div> 

             
    </div>   
             
        


<!--modal resumen-->
<div class="ui modal" id="modalResumen">
  
    <div class="header">
        <h5 class="modal-title" id="tituloIngreso">Ingreso ADEREL</h5>
      </div>
  
        <div class="content">
                
           
                <div class="row">
                        <div class="sixteen wide column">
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
                         
                </div>
            
      </div>
      <div class="actions" id="cerrarResumen">
      <button class="ui green button">Cerrar</button>
      </div>
    </div>
  




  <!--modal calendario-->





 
<script>

$("#cerrarReporte").click(function(){
  $("#modalReportes").modal('hide');
  $("#fecha1").val('');
  $("#fecha2").val('');
});

$("#cerrarResumen").click(function(){
  $("#modalResumen").modal('hide');
});


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
    $('#modalResumen').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
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
            
            
                events: "?1=IngresosController&2=IngresosBD",
                
            
            
        });
    });

    $("#btnFechas").click(function(){
    $("#modalReportes").modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
    });
</script>
