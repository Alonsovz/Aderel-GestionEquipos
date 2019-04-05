<div id="app">

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

<a style="font-size: 20px; color: green;">
    <i class="dollar icon"></i> Monto maximo que acepta la caja: $ <?php echo $monto; ?>
    </a>
    <br>
    <br>
    <hr>
    <br>
    <a style="font-size: 20px;">
    <i class="dollar icon"></i> Monto actual de la caja:  <?php if($montoActual < 10 ){ ?>
                                                <a style="font-weight:bold; color:red; font-size: 20px;"> $ <?php echo $montoActual;
                                                 }else{?> </a>
                                                 <a style="font-weight:bold; color:blue; font-size: 20px;"> $ <?php echo $montoActual;
                                                 }?> </a>
    </a>
    
 <br>
 <br>
<div id="emitirNuevo">
<form class="ui form" id="frmCaja" style="font-size:17px;">
    <div class="field">
        <div class="fields">
            <div class="four wide field">
                <label><i class="calendar icon"></i> Fecha:</label>
                <input type="text"  id="fechaVista" readonly>
            </div>

            <div class="four wide field">
                <label><i class="dollar icon"></i> Por:</label>
                <input type="text" id="cantidad" name="cantidad" placeholder="Cantidad a Recibir">
                <div class="ui red pointing label"  id="error"
                style="display: none; margin: 0; text-align:center; width:100%; font-size: 12px;">
                Excede el monto disponible en caja
                </div>
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
                <div id="cantidadLe" name="cantidadLe" style="font-size:17px;"></div>
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
<i class="box icon"></i><i class="dollar icon"></i>Cantidad disponible para caja chica ADEREL actual: $ <a> <?php echo $monto; ?></a>
</div>

<div class="content">
<form class="ui form" id="frmActualizarCaja">
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

<button class="ui blue button" id="actualizarCaja">
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



<div class="ui  modal" id="modalVerVale" >

<div class="header">
<i class="list icon"></i><i class="dolar icon"></i> Vale emitido
</div>
<div class="content" class="ui equal width form">
    <form class="ui form" id="frmVerVale"> 
        <div class="field">
            <div class="fields">

            <div class="three wide field">
            <label><i class="calendar icon"></i>Fecha de emisión</label>
            <input type="text" name="fecha"  id="fecha" readonly>
            
            </div>


            <div class="three wide field">
            <label><i class="dollar icon"></i>Cantidad</label>
            <input type="text" name="cantidadV"  id="cantidadV" readonly>
            
            </div>

            <div class="ten wide field">
            <label><i class="dollar icon"></i>Recibido</label>
            <input type="text" name="recibido" id="recibido" readonly>
            
            </div>
            </div>
        </div>

        <div class="field">
            <div class="fields">
            <div class="eight wide field">
            <label><i class="list icon"></i>Concepto</label>
            <textarea rows="4" name="concepto" id="concepto" readonly></textarea>
            </div>

            <div class="eight wide field">
            <label><i class="male icon"></i>Recibido por:</label>
            <input type="text" name="recibidoPor"  id="recibidoPor" readonly>
            
            </div>
            </div>
        </div>
       
    </form>
</div>
    <div class="actions">
        <button class="ui blue button" id="btnListo" >
        Listo
        </button>
    </div>
</div>

</div>

<script src="./res/tablas/tablaCajaAderel.js"></script>
<script>
var app = new Vue({
        el: "#app",
        data: {
            
            campos_editarE: [
                {
                    label: 'Nombre del Equipo',
                    name: 'nombre',
                    type: 'text'
                },
                {
                    label: 'Encargado del Equipo:',
                    name: 'encargado',
                    type: 'text'
                },
                {
                    label: 'Teléfono Encargado:',
                    name: 'telefonoE',
                    type: 'text'
                },
                {
                    label: 'Encargado Aux del Equipo:',
                    name: 'encargadoAux',
                    type: 'text'
                },
                {
                    label: 'Teléfono Aux del Equipo:',
                    name: 'telefonoAux',
                    type: 'text'
                },
                {
                    name: 'idDetalleE',
                    type: 'hidden'
                }

            ],
            camposFondoComun: [{
                name: 'idEliminar',
                type: 'hidden'
            }],
            campos_eliminarE: [{
                name: 'idEliminar',
                type: 'hidden'
            }]
        },
        methods: {
             

            cargarDatos(id) {
                this.id = parseInt(id);

                fetch("?1=CajaChicaController&2=cargarDatosCajaA&id=" + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(dat => {

                        console.log(dat);

                        // $('#frmEditar input[name="idDetalle"]').val(dat.codigoUsuari);
                        $('#frmVerVale input[name="recibido"]').val(dat.recibo);
                        $('#frmVerVale input[name="cantidadV"]').val(dat.cantidad);
                      $('#frmVerVale textarea[name="concepto"]').val(dat.concepto);
                      $('#frmVerVale input[name="recibidoPor"]').val(dat.recibido);
                      $('#frmVerVale input[name="fecha"]').val(dat.fecha);
                        //$('#frmInscribir select[name="selectCategoria"]').dropdown('set selected', dat.idCategoria);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }

        }
    });
</script>
<script>

var ver=(ele)=>{
     $('#modalVerVale').modal('setting', 'autofocus', false).modal('setting', 'closable', false)
     .modal('show');
    app.cargarDatos($(ele).attr('id'));
  }

$(document).ready(function(){
    $("#modalCajaAderel").modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
    $("#valesEmitidos").hide();
    $("#btnNuevo").hide();
    $("#cantidad").mask("###0.00", {reverse: true});
    $("#cantidadActualizar").mask("###0.00", {reverse: true});


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


$("#btnListo").click(function(){
    $("#modalCajaAderel").modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
   $("#modalVerVale").modal("hide");
});

$("#btnCancelarA").click(function(){
    $("#modalCajaAderel").modal('setting', 'autofocus', false).modal('setting', 'closable', false)
                            .modal('show');
    $("#modalGestion").modal("hide");
    $("#cantidadActualizar").val('');
});

$("#btnConvertir").click(function(){
    var cantidad = $("#cantidad").val();

if(cantidad==''){

}else{
 var canti = $("#cantidadLe").load("app/view/Egresos/ajax.php",{ cantidad : cantidad });
}
    
    
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
    var dis = <?php echo $montoActual; ?>;
    var can = $("#cantidad").val();
    if(can > dis){
        swal({
        title: 'Error',
        text: 'El monto solicitado excede la cantidad disponible en caja',
        type: 'error',
        showConfirmButton: true
        });

    }else{
    alertify.confirm("¿Emitir vale de caja?",
            function(){
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
                            location.href = '?1=EgresosController&2=cajaChicaAderel';
                        }); 
                       
                    } 
                }
            
        });
    },
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            });
        }

    });


    $("#actualizarCaja").click(function(){
        alertify.confirm("¿Desea actualizar el monto que la caja aceptará?",
            function(){
    const form = $('#frmActualizarCaja');

                const datosFormulario = new FormData(form[0]);
         
        
            $.ajax({
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                url: '?1=CajaChicaController&2=gestionCajaAderel',
                data: datosFormulario,
                success: function(r) {
                    if(r == 1) {
                     $('#modalGestion').modal('hide');
                        swal({
                            title: 'Listo',
                            text: 'El monto disponible para la caja ha sido actualizado',
                            type: 'success',
                            showConfirmButton: false,
                                timer: 1700

                        }).then((result) => {
                            location.href = '?1=EgresosController&2=cajaChicaAderel';
                        }); 
                        
                    } 
                }
            
        });
    },
            function(){
                //$("#modalCalendar").modal('toggle');
                alertify.error('Cancelado');
                
            });

    });
    </script>