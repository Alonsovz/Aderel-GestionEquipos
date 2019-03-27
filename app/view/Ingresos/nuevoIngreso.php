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

<div class="ui longer modal" id="modalIngreso">
<div class="header">
<i class="dollar sign icon"></i><i class="money bill icon"></i> Agregar Ingreso
</div>
<div class="content" class="ui equal width form">
    <div class="field">
        <div class="fields">       
            <div class="five wide field">
                <label><i class="users icon"></i>Tipo de Ingreso</label>
                <select class="ui search dropdown" id="tipoIngreso">
                <option selected>Selecciona una opción</option>
                    <option value="gimnasio">Gimnasio</option>
                    <option value="escuelaFutbol">Escuela de Fútbol</option>
                    <option value="escuelaNatacion">Escuela de Natacion</option>
                    <option value="fondoComun">Fondo Común</option>
                    <option value="taquilla">Taquilla</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
        </div>
    </div> 

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
                            <input type="text" id="titulo" >
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

            <div class="field" id="taquilla">
            <form class="ui form" id="taquillaForm">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i><i class="futbol icon"></i>
                    Nuevo Ingreso de Taquilla<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>
                <br>
                <div class="fields">
                            <div class="eight wide field" >
                            <label><i class="money bill icon"></i>Categoria</label>
                            <input type="text" id="titulo" >
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
            <form class="ui form" id="fondoComunForm">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i><i class="money bill icon"></i>
                    Nuevo Ingreso de Fondo Común<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>
                <br>
                <div class="fields">
                            
                </div>
                </form>
            </div>
            
</div>
    <div class="actions">
        <button id="btnCerrar" class="ui red button">
        Cerrar
        </button>
     </div>

</div>

<script>

$("#btnModalIngreso").click(function(){
    $('#modalIngreso').modal('setting', 'autofocus', false).modal('setting', 'closable', false).modal('show');
});

$("#btnCerrar").click(function(){
    $('#modalIngreso').modal('hide');
    $("#otro").hide();
$("#taquilla").hide();
$("#gimnasio").hide();
$("#escuelaFutbol").hide();
$("#escuelaNatacion").hide();
$("#fondoComun").hide();
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
        $("#taquilla").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").hide();
        $("#fondoComun").hide();
     }
     else if($("#tipoIngreso").val() == "taquilla"){
        $("#taquilla").show();
        $("#otro").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").hide();
        $("#fondoComun").hide();
     }
     else if($("#tipoIngreso").val() == "gimnasio"){
        $("#taquilla").hide();
        $("#otro").hide();
        $("#gimnasio").show();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").hide();
        $("#fondoComun").hide();
        
     }
     else if($("#tipoIngreso").val() == "fondoComun"){
        $("#taquilla").hide();
        $("#otro").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").hide();
        $("#fondoComun").show();
     }
     else if($("#tipoIngreso").val() == "escuelaFutbol"){
        $("#taquilla").hide();
        $("#otro").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").show();
        $("#escuelaNatacion").hide();
        $("#fondoComun").hide();
        
     }

     else if($("#tipoIngreso").val() == "escuelaNatacion"){
        $("#taquilla").hide();
        $("#otro").hide();
        $("#gimnasio").hide();
        $("#escuelaFutbol").hide();
        $("#escuelaNatacion").show();
        $("#fondoComun").hide();
        
     }

 });
 
});
</script>