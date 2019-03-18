<div id="app">
<div class="content" class="ui equal width form">
<form class="ui form"> 
     <div class="field" >
         <div class="fields">
         <div class="twelve wide field"></div>                
            <div class="two wide field">
                <a style="width: 100%;"  class="ui right floated pink  inverted segment" onclick="cargarContenidoEF()" id="btnVerF">
                <center><i class="female icon"></i>
                Femenino
                </center>
                </a>   
            </div> 
            <div class="two wide field">
                <a style="width: 100%;" class="ui right floated teal  inverted segment"  onclick="cargarContenidoEM()" id="btnVerM">
                <center><i class="male icon"></i>
                Masculino</center>
                </a>
            </div>
         </div>
     </div>
</form>
</div>            
            



 <div id="contenidoEquipos"></div>

 </div>





<script>

$("#btnVerM").click(function(){
    

    $("#btnVerM").removeClass('ui teal  inverted segment');
    $("#btnVerM").addClass('ui grey  inverted segment');

    $("#btnVerF").removeClass('ui grey  inverted segment');
    $("#btnVerF").addClass('ui pink inverted segment');
   

    
});
$("#btnVerF").click(function(){
    
   
    $("#btnVerF").removeClass('ui pink  inverted segment');
    $("#btnVerF").addClass('ui grey  inverted segment');

   $("#btnVerM").removeClass('ui grey  inverted segment');
    $("#btnVerM").addClass('ui teal  inverted segment');
    

    
});



function cargarContenidoEF()
{
    
    var parametros = {};

    $.ajax({
        data : parametros,
        url : '?1=EquipoController&2=gestionF',
        type : 'POST',
        cache: false,
        success: function(response){
            $("#contenidoEquipos").empty();
            $("#contenidoEquipos").append(response);
        }
    });
    
}

function cargarContenidoEM()
{
    
    var parametros = {};

    $.ajax({
        data : parametros,
        url : '?1=EquipoController&2=gestionM',
        type : 'POST',
        cache: false,
        success: function(response){
            $("#contenidoEquipos").empty();
            $("#contenidoEquipos").append(response);
        }
    });
    
}

</script>