
<br><div id="app">


<div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="female icon"></i>
                Control General Categoría Femenina<font color="#DFD102" size="20px">.</font>
                </div>
                
        
        </div>
        
</div>
<div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

            

             <button style="width: 27%;" class="ui red  inverted segment"  onclick="cargarContenidoC()" id="btnVerCategorias">
            <center><i class="chart bar outline icon"></i>
            Categorías</center>
            </button>

            <button style="width: 22%;" class="ui green  inverted segment" onclick="cargarContenidoT()" id="btnVerTorneos">
            <i class="trophy icon"></i>
            Torneos
            </button>

            <button style="width: 22%;" class="ui blue inverted segment"  id="btnVerEquipos"
             onclick="cargarContenidoE()">
            <i class="futbol icon"></i>
            Equipos
            </button>

            <button style="width: 27%;" class="ui yellow  inverted segment" onclick="cargarContenidoJ()" id="btnVerJugadores">
            <i class="users icon"></i>
            Jugadores
            </button>
                
            
  </div>



 <div id="contenido"></div>

 
</div>


<script src="./res/tablas/tablaCategoriasF.js"></script>

<script>

$("#btnVerEquipos").click(function(){
    

    $("#btnVerEquipos").removeClass('ui blue  inverted segment');
    $("#btnVerEquipos").addClass('ui blue basic button');

    $("#btnVerJugadores").removeClass('ui yellow basic button');
    $("#btnVerJugadores").addClass('ui yellow inverted segment');
    $("#btnVerCategorias").removeClass('ui red basic button');
    $("#btnVerCategorias").addClass('ui red inverted segment');

    $("#btnVerTorneos").removeClass('ui green basic button');
    $("#btnVerTorneos").addClass('ui green  inverted segment');

    
});
$("#btnVerJugadores").click(function(){
    
   
    $("#btnVerJugadores").removeClass('ui yellow  inverted segment');
    $("#btnVerJugadores").addClass('ui yellow basic button');
   $("#btnVerEquipos").removeClass('ui blue basic button');
    $("#btnVerEquipos").addClass('ui blue inverted segment');
    $("#btnVerCategorias").removeClass('ui red basic button');
    $("#btnVerCategorias").addClass('ui red inverted segment');
    $("#btnVerTorneos").removeClass('ui green basic button');
    $("#btnVerTorneos").addClass('ui green  inverted segment');

    
});
$("#btnVerCategorias").click(function(){


    $("#btnVerCategorias").removeClass('ui red  inverted segment');
    $("#btnVerCategorias").addClass('ui red basic button');
    
    $("#btnVerEquipos").removeClass('ui blue basic button');
    $("#btnVerEquipos").addClass('ui blue inverted segment');

    $("#btnVerJugadores").removeClass('ui yellow basic button');
    $("#btnVerJugadores").addClass('ui yellow inverted segment');
  
    $("#btnVerTorneos").removeClass('ui green basic button');
    $("#btnVerTorneos").addClass('ui green  inverted segment');
    
});

$("#btnVerTorneos").click(function(){

    $("#btnVerTorneos").removeClass('ui green  inverted segment');
$("#btnVerTorneos").addClass('ui green basic button');

$("#btnVerCategorias").removeClass('ui red basic button');
$("#btnVerCategorias").addClass('ui red inverted segment');

$("#btnVerEquipos").removeClass('ui blue basic button');
$("#btnVerEquipos").addClass('ui blue inverted segment');
$("#btnVerJugadores").removeClass('ui yellow basic button');
$("#btnVerJugadores").addClass('ui yellow inverted segment');


});

    function cargarContenidoJ()
{
    
    var parametros = {};

    $.ajax({
        data : parametros,
        url : '?1=JugadoresController&2=gestionF',
        type : 'POST',
        cache: false,
        success: function(response){
            $("#contenido").empty();
            $("#contenido").append(response);
        }
    });
    
}


function cargarContenidoE()
{
    
    var parametros = {};

    $.ajax({
        data : parametros,
        url : '?1=EquipoController&2=gestionF',
        type : 'POST',
        cache: false,
        success: function(response){
            $("#contenido").empty();
            $("#contenido").append(response);
        }
    });
    
}

function cargarContenidoC()
{
    
    var parametros = {};

    $.ajax({
        data : parametros,
        url : '?1=CategoriaController&2=gestionF',
        type : 'POST',
        cache: false,
        success: function(response){
            $("#contenido").empty();
            $("#contenido").append(response);
        }
    });
    
}

function cargarContenidoT()
{
    
    var parametros = {};

    $.ajax({
        data : parametros,
        url : '?1=TorneosController&2=gestionF',
        type : 'POST',
        cache: false,
        success: function(response){
            $("#contenido").empty();
            $("#contenido").append(response);
        }
    });
    
}

</script>