<br><br>
<div id="app">

<div class="ui grid">

        <div class="row">
                <div class="titulo">
                <i class="dollar icon"></i> <i class="money bill icon"></i>
                        Ingresos <font color="#1CC647" size="20px">.</font>

                        <div class="sixteen wide column">

                        <a class="ui right floated blue labeled icon button"  href="?1=IngresosController&2=Ingresos">
                            <i class="dollar icon"></i>
                            Vista de Ingresos
                        </a>
                    </div>

                </div>
        </div>

                <div class="row title-bar">
                    <div class="sixteen wide column">

                        <button class="ui right floated green labeled icon button"  id="btnModalIngreso">
                            <i class="plus icon"></i>
                            Agregar Ingreso
                        </button>
                    </div>
                 </div>
        

</div>

</div>

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
            <form class="ui form" id="otroForm">
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
                            <input type="text" id="titulo" >
                            </div>
                            <div class="eight wide field" >
                            <label><br></label>
                            <button id="guardarOtro" class="ui blue button"> Agregar Ingreso</button>
                            </div>
                </div>
                </form>
            </div>


            <div class="field" id="gimnasio">
            <form class="ui form" id="gimnasioForm">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i><i class="weight icon"></i>
                    Nuevo Ingreso de Gimnasio<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>
                <br>
                <div class="fields">
                            
                </div>
                </form>
            </div>

            <div class="field" id="escuelaFutbol">
            <form class="ui form" id="escuelaFutbolForm">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i><i class="futbol icon"></i>
                    Nuevo Ingreso de Escuela de Fútbol<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>
                <br>
                <div class="fields">
                            
                </div>
                </form>
            </div>

            <div class="field" id="escuelaNatacion">
            <form class="ui form" id="escuelaNatacionForm">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i><i class="life ring icon"></i>
                    Nuevo Ingreso de Escuela de Natación<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>
                <br>
                <div class="fields">
                            
                </div>
                </form>
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
            
</div>
    <div class="actions">
        <button id="btnCerrar" class="ui red button">
        Cerrar
        </button>
     </div>

</div>

<script src="./res/tablas/tablaFondoComun.js"></script>
<script>

$("#btnModalIngreso").click(function(){
    $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});


</script>

<script>
$(document).ready(function(){
$("#otro").hide();
$("#taquilla").hide();
$("#gimnasio").hide();
$("#escuelaFutbol").hide();
$("#escuelaNatacion").hide();
$("#fondoComun").hide();

 $("#tipoIngreso").change(function(){

     if($("#tipoIngreso").val() == "otro"){
        $("#otro").show();
        $("#gimnasio").hide();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").hide();
        $("#fondoComun").hide();
     }
     else if($("#tipoIngreso").val() == "gimnasio"){
        $("#otro").hide();
        $("#gimnasio").show();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").hide();
        $("#fondoComun").hide();
        
     }
     else if($("#tipoIngreso").val() == "fondoComun"){
        $("#otro").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").hide();
        $("#fondoComun").show();
     }
     else if($("#tipoIngreso").val() == "escuelaFutbol"){;
        $("#otro").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").show();
        $("#escuelaNatacion").hide();
        $("#fondoComun").hide();
        
     }

     else if($("#tipoIngreso").val() == "escuelaNatacion"){
        $("#otro").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").show();
        $("#fondoComun").hide();
        
     }

 });
 
});
$(document).ready(function(){

    $("#btnCerrar").click(function(){
    $("#tipoIngreso").val('nada');
    $('#modalIngreso').modal('hide');
    $("#otro").hide();
$("#gimnasio").hide();
$("#escuelaFutbol").hide();
$("#escuelaNatacion").hide();
$("#fondoComun").hide();

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