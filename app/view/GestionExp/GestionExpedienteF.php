
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

            

             <button style="width: 27%;" class="ui pink  inverted segment"  onclick="cargarContenidoC()" id="btnVerCategorias">
            <center><i class="chart bar outline icon"></i>
            Categorías</center>
            </button>

            <button style="width: 22%;" class="ui purple  inverted segment" onclick="cargarContenidoT()" id="btnVerTorneos">
            <i class="trophy icon"></i>
            Torneos
            </button>

            <button style="width: 22%;" class="ui olive inverted segment"  id="btnVerEquipos"
             onclick="cargarContenidoE()">
            <i class="futbol icon"></i>
            Equipos
            </button>

            <button style="width: 27%;" class="ui violet  inverted segment" onclick="cargarContenidoJ()" id="btnVerJugadores">
            <i class="users icon"></i>
            Jugadores
            </button>
                
            
  </div>



 <div id="contenido"></div>

 
</div>


<script src="./res/tablas/tablaCategoriasF.js"></script>
<script src="./res/tablas/tablaEquiposF.js"></script>
<script>

$("#btnVerEquipos").click(function(){
    

    $("#btnVerEquipos").removeClass('ui olive  inverted segment');
    $("#btnVerEquipos").addClass('ui olive basic button');

    $("#btnVerJugadores").removeClass('ui violet basic button');
    $("#btnVerJugadores").addClass('ui violet inverted segment');
    $("#btnVerCategorias").removeClass('ui pink basic button');
    $("#btnVerCategorias").addClass('ui pink inverted segment');

    $("#btnVerTorneos").removeClass('ui purple basic button');
    $("#btnVerTorneos").addClass('ui purple  inverted segment');

    
});
$("#btnVerJugadores").click(function(){
    
   
    $("#btnVerJugadores").removeClass('ui violet  inverted segment');
    $("#btnVerJugadores").addClass('ui violet basic button');
   $("#btnVerEquipos").removeClass('ui olive basic button');
    $("#btnVerEquipos").addClass('ui olive inverted segment');
    $("#btnVerCategorias").removeClass('ui pink basic button');
    $("#btnVerCategorias").addClass('ui pink inverted segment');
    $("#btnVerTorneos").removeClass('ui purple basic button');
    $("#btnVerTorneos").addClass('ui purple  inverted segment');

    
});
$("#btnVerCategorias").click(function(){


    $("#btnVerCategorias").removeClass('ui pink  inverted segment');
    $("#btnVerCategorias").addClass('ui pink basic button');
    
    $("#btnVerEquipos").removeClass('ui olive basic button');
    $("#btnVerEquipos").addClass('ui olive inverted segment');

    $("#btnVerJugadores").removeClass('ui violet basic button');
    $("#btnVerJugadores").addClass('ui violet inverted segment');
  
    $("#btnVerTorneos").removeClass('ui purple basic button');
    $("#btnVerTorneos").addClass('ui purple  inverted segment');
    
});

$("#btnVerTorneos").click(function(){

    $("#btnVerTorneos").removeClass('ui purple  inverted segment');
$("#btnVerTorneos").addClass('ui purple basic button');

$("#btnVerCategorias").removeClass('ui pink basic button');
$("#btnVerCategorias").addClass('ui pink inverted segment');

$("#btnVerEquipos").removeClass('ui olive basic button');
$("#btnVerEquipos").addClass('ui olive inverted segment');
$("#btnVerJugadores").removeClass('ui violet basic button');
$("#btnVerJugadores").addClass('ui violet inverted segment');


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