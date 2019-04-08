<br>
<div id="app">
<modal-pagos :detalles="detalles"></modal-pagos>
<modal-pagosfutbol :detalles="detalles"></modal-pagosfutbol>
<modal-pagosnatacion :detalles="detalles"></modal-pagosnatacion>


<div class="row"  id="dashboard-card-Ingreso">
       
                <div class="titulo">
                <i class="dollar icon"></i> <i class="money bill icon"></i>
                        Ingresos <font color="#1CC647" size="20px">.</font>

        

                </div>
 
<div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

<a class="ui blue inverted segment"  style="width: 49%; text-align:center; font-size: 25px;" href="?1=IngresosController&2=nuevo">
      <i class="plus icon"></i>
         Agregar Ingreso
</a>

<a class="ui yellow inverted segment" style="width: 49%; text-align:center; font-size: 25px;" href="?1=IngresosController&2=Ingresos">
        <i class="dollar icon"></i>
         Vista de Ingresos
        </a>
       

                  
</div>

</div>
<br>
<div class="row"  id="dashboard-card-egreso">
    <br>
    <div class="titulo">
                    <i class="dollar icon"></i> <i class="money bill outline icon"></i>
                            Egresos <font color="#1CC647" size="20px">.</font>

            

                    </div>
    <br>
    <div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

    <a class="ui blue inverted segment" style="width: 32%; text-align:center; font-size: 25px;"
    href="?1=EgresosController&2=Egresos">
    <i class="money bill icon"></i>
    Egreso por cheque
    </a> 

    <a class="ui yellow inverted segment" style="width: 32%; text-align:center; font-size: 25px;"
    href="?1=EgresosController&2=reintegroCajaG">
    <i class="dollar icon"></i>
    Reintegro caja general
    </a>

    <a class="ui blue inverted segment" style="width: 32%; text-align:center; font-size: 25px;"
    href="?1=EgresosController&2=reintegroCajaA">
    <i class="dollar icon"></i>
    Reintegro caja aderel
    </a>   
    </div>

</div>
<br>

<div class="row"  id="dashboard-card-Ingreso">
<div class="titulo">
                <i class="dollar icon"></i> <i class="money bill icon"></i>
                        Caja Chica <font color="#1CC647" size="20px">.</font>
 </div>
 <div class="row tiles" style="display: flex !important; align-items: baseline; justify-content: space-between">

<a class="ui yellow inverted segment" style="width: 49%; text-align:center; font-size: 25px;"
 href="?1=EgresosController&2=cajaChicaGeneral">
<i class="box icon"></i><i class="dollar icon"></i>
   General
</a> 

<a class="ui blue inverted segment" style="width: 49%; text-align:center; font-size: 25px;"
 href="?1=EgresosController&2=cajaChicaAderel">
<i class="box icon"></i><i class="dollar icon"></i>
  ADEREL
</a> 
</div>
</div>




</div>

