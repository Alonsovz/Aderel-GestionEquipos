

<div class="ui fullscreen longer modal" id="modalCajaAderel">
<div class="header">
    <br>
   
<i class="dollar sign icon"></i><i class="box icon"></i><i class="money bill icon"></i>Egreso de Caja Aderel

</div><br>
            
            <button class="ui right floated green labeled icon button" id="btnGestion">
            <i class="money bill icon"></i>Gestión de Caja Chica
            </button>

    <button class="ui right floated blue labeled icon button" id="btnEmitidos">
    <i class="list icon"></i>Vales emitidos
    </button>
    
    <button class="ui right floated yellow labeled icon button" id="btnNuevo">
    <i class="plus icon"></i>Emitir nuevo 
    </button>





<div class="content" class="ui equal width form">

<a style="font-size: 20px;">
    <i class="dollar icon"></i> Monto actual de Caja: $200.00 
    </a>
    <br>
    
 <br>
<div id="emitirNuevo">
<form class="ui form" id="frmCaja">
    <div class="field">
        <div class="fields">
            <div class="four wide field">
                <label><i class="calendar icon"></i> Fecha:</label>
                <input type="text"  id="fechaVista" readonly>
            </div>

            <div class="four wide field">
                <label><i class="dollar icon"></i> Por:</label>
                <input type="text" id="cantidad" name="cantidad" placeholder="Cantidad a Recibir">
            </div>

            <div class="two wide field" style="margin:auto;">
            <label><br></label>
            <a class="ui olive labeled icon button" id="btnConvertir">
            <i class="arrow circle right icon"></i> Convertir
            </a>
            </div>
            <br>
            <div class="eight wide field">
                <label><i class="dollar icon"></i> Recibí de Asociación deportiva y recreativa Lourdense la cantidad:</label>
                <div id="cantidadLe" name="cantidadLe" style="font-size:22px;"></div>
            </div>
            <input type="hidden" id="cantidadLetras" name="cantidadLetras">
        </div>
    </div>

    <br>
    <div class="field">
    <div class="fields">
            <div class="sixteen wide field">
            <label><i class="money  bill icon"></i> En concepto de :</label>
             <textarea rows="2" id="concepto" name="concepto" placeholder="Concepto de Egreso"></textarea>
            </div>

    </div>

    </div>

    <br>
    <div class="field">
    <div class="fields">
            <div class="ten wide field">
            <label><i class="male icon"></i> Recibido por :</label>
             <input type="text" id="recibido" name="recibido" placeholder="Nombre del Receptor">
            </div>

            <div class="six wide field">
            <label><br></label>
            <a class="ui red labeled icon button" id="btnGuardar">
                <i class="save icon"></i>Guardar
            </a>
            </div>

    </div>

    </div>

</form>
</div>

<div class="ui tiny modal" id="modalGestion">

<div class="header">
<i class="box icon"></i><i class="dollar icon"></i>Cantidad disponible para caja chica ADEREL actual: <a>30.00</a>
</div>

<div class="content">
<form class="ui form" id="actualizarCaja">
    <div class="field">
        <div class="fields">
            <div class="sixteen wide field">
            <label><i class="dollar icon"></i><i class="box icon"></i> Cantidad a actualizar:</label>
                <input type="text" id="cantidadActualizar" name="cantidadActualizar" placeholder="Cantidad a establecer para caja chica ADEREL">
            </div>
        </div>
    </div>
</form>
</div>

<div class="actions">
<button class="ui yellow button" id="btnCancelarA">
    Cancelar
</button>

<button class="ui blue button">
    Actualizar  
</button>
</div>

</div>


<div id="valesEmitidos">
                <div class="row">
                    <h3>
                    <i class="dollar icon"></i><i class="list icon"></i>
                    Vales Emitidos<font color="#FACC2E" size="20px">.</font>
                   </h3>
                </div>

                <br>
                <div class="row">
            <div class="sixteen wide column">
                <table id="dtCajaA" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                        <th style="background-color: #04B4AE; color:white;">N°</th>
                        <th style="background-color: #A901DB; color:white;">Fecha</th>
                            <th style="background-color: #A901DB; color:white;">Cantidad</th>
                            <th style="background-color: #A901DB; color:white;">Concepto</th>
                            <th style="background-color: #A901DB; color:white;">Recibido por</th>
                            <th style="background-color: #A901DB; color:white;">Acciones</th>
                            
                            
                           
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
<a href="?1=IngresosController&2=nuevoIngreso" class="ui orange button">
                            <i class="close icon"></i> Salir
                        </a>
</div>

</div>


<script src="./res/tablas/tablaCajaAderel.js"></script>
<script>
$(document).ready(function(){
    $("#modalCajaAderel").modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
    $("#valesEmitidos").hide();
    $("#btnNuevo").hide();
    $("#cantidad").mask("###0.00", {reverse: true});


var f = new Date();
var fecha=(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());

$("#fechaVista").val(fecha);
});

$("#btnNuevo").click(function(){
    $("#emitirNuevo").show();
    $("#valesEmitidos").hide();
    $("#btnNuevo").hide();
    $("#btnEmitidos").show();
});



$("#btnEmitidos").click(function(){
    $("#emitirNuevo").hide();
    $("#valesEmitidos").show();
    $("#btnNuevo").show();
    $("#btnEmitidos").hide();
});

$("#btnGestion").click(function(){
    $("#modalGestion").modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
    
});

$("#btnCancelarA").click(function(){
    $("#modalCajaAderel").modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
    $("#modalGestion").modal("hide");
    
});

$("#btnConvertir").click(function(){
   var cantidad = $("#cantidad").val();
   var canti = $("#cantidadLe").load("app/view/Egresos/ajax.php",{ cantidad : cantidad });
    
    
   });

   $("#concepto").keyup(function(){
    var cantidad = $("#cantidadLe").html();
    $("#cantidadLetras").val(cantidad);
   });

function limpiar(){
    $("#cantidad").val('');
    $("#concepto").val('');
    $("#cantidadLetras").val('');
    $("#recibido").val('');
    $("#cantidadLe").html('');
}

$("#btnGuardar").click(function(){
    const form = $('#frmCaja');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=CajaChicaController&2=registrarAderel',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                     //   $('#modalAgregarU').modal('hide');
                        swal({
                            title: 'Registrado',
                            text: 'Guardado con éxito',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            if (result.value) {
                                location.href = '?';
                            }
                        }); 
                        $('#dtCajaA').DataTable().ajax.reload();
                       limpiar();
                    } 
                }
            
        });

    });
    </script>