
<br><div id="app">


    <div class="ui grid">
            <div class="row">
                    <div class="titulo">
                    <i class="team icon"></i>
                        Equipos-Jugadores-Categorías existentes<font color="#DFD102" size="20px">.</font>
                    </div>
                    
            
            </div>
            
    </div>
    <div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">


                 <button style="width: 30%;" class="ui red  inverted segment"  onclick="cargarContenidoC()" id="btnVerCategorias">
                <i class="chart bar outline icon"></i>
                Categorías
                </button>

                <button style="width: 30%;" class="ui blue inverted segment"  id="btnVerEquipos"
                 onclick="cargarContenidoE()">
                <i class="futbol icon"></i>
                Equipos
                </button>

                <button style="width: 30%;" class="ui yellow  inverted segment" onclick="cargarContenidoJ()" id="btnVerJugadores">
                <i class="users icon"></i>
                Jugadores
                </button>
                    
                
      </div>


    
     <div id="contenido"></div>

     
</div>


<script src="./res/js/modalRegistrar.js"></script>
<script src="./res/js/modalEditar.js"></script>
<script src="./res/js/modalEliminar.js"></script>

<script>

$("#btnVerEquipos").click(function(){
        

        $("#btnVerEquipos").removeClass('ui blue  inverted segment');
        $("#btnVerEquipos").addClass('ui blue basic button');

        $("#btnVerJugadores").removeClass('ui yellow basic button');
        $("#btnVerJugadores").addClass('ui yellow inverted segment');
        $("#btnVerCategorias").removeClass('ui red basic button');
        $("#btnVerCategorias").addClass('ui red inverted segment');

        
    });
    $("#btnVerJugadores").click(function(){
        
       
        $("#btnVerJugadores").removeClass('ui yellow  inverted segment');
        $("#btnVerJugadores").addClass('ui yellow basic button');
       $("#btnVerEquipos").removeClass('ui blue basic button');
        $("#btnVerEquipos").addClass('ui blue inverted segment');
        $("#btnVerCategorias").removeClass('ui red basic button');
        $("#btnVerCategorias").addClass('ui red inverted segment');
 
        
    });
    $("#btnVerCategorias").click(function(){
  

        $("#btnVerCategorias").removeClass('ui red  inverted segment');
        $("#btnVerCategorias").addClass('ui red basic button');
        
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
            url : '?1=JugadoresController&2=gestion',
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
            url : '?1=EquipoController&2=gestion',
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
            url : '?1=CategoriaController&2=gestion',
            type : 'POST',
            cache: false,
            success: function(response){
                $("#contenido").empty();
                $("#contenido").append(response);
            }
        });
        
    }

</script>