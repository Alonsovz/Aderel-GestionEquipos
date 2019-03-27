<br><br>
<div id="app">

<div class="ui grid">

        <div class="row">
                <div class="titulo">
                <i class="dollar icon"></i> <i class="money bill icon"></i>
                        Ingresos <font color="#1CC647" size="20px">.</font>

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
    <div class="field">
        <div class="fields">       
            <div class="five wide field">
                <label><i class="users icon"></i>Tipo de Ingreso</label>
                <select class="ui search dropdown" id="tipoIngreso">
                    <option value="gimnasio">Gimnasio</option>
                    <option value="escuela">Escuela de Fútbol</option>
                    <option value="fondo">Fondo Común</option>
                    <option value="taquilla">Taquilla</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
        </div>
    </div> 

</div>  
<div class="content" class="ui equal width form"> 
    <form class="ui form">
    <div class="field" id="otro">

        <div class="fields">
                    <div class="five wide field" >
                    <label>Nombre del ingreso</label>
                    <input type="text" id="titulo" >
                    </div>
                    <div class="five wide field" >
                    <label>Cantidad del ingreso</label>
                    <input type="text" id="titulo" >
                    </div>
        </div>

    </div>
    </form>
   
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
});

</script>

<script>
$(document).ready(function(){
$("#otro").hide();
 $("#tipoIngreso").change(function(){

     if($("#tipoIngreso").val() == "otro"){
        $("#otro").show();
     }

 });
 
});
</script>