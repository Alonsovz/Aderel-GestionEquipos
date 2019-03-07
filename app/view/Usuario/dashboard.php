<script>
    /* $(function() {
    $('.contenedor').css('width', '100vw');
    $('.contenedor').css('padding', '10px 0px');
}); */
</script>

<br><table style="width: 94%;">
    <td>

        <div  id="dashboard-grid" class="ui grid">
            <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=medium&timezone=America%2FEl_Salvador"
            width="100%" height="115" frameborder="0" seamless></iframe>
        </div>
    
    </td>
    
    <td>
    <div class="row" id="dashboard-card">
        <h2 class="ui header">
            <b>
               Bienvenido/a: &nbsp; <?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"]?>
                <div class="sub header">
                    <?php echo $_SESSION["email"]?>
            </b>
         </h2>   
                 </div>
    </div>

    </td>

    

</table>
<!--     <div class="row">
    <h1>
    <i class="envelope icon"></i> Mensajería
    </h1>
    </div>
 -->

 <?php

 if($_SESSION["descRol"] == 'Administrador') {
     require_once 'dashboardAdmin.php';
 } else {
     require_once 'dashboardSoli.php';
 }

?>

</div>