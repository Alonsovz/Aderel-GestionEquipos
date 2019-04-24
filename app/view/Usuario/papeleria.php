<?php
            $fechaMaxima = date('Y-m-d');
            $fechaMax = strtotime ( '-0 day' , strtotime ( $fechaMaxima ) ) ;
            $fechaMax = date ( 'Y-m-d' , $fechaMax );
             
            $fechaMinima = date('Y-m-d');
            $fechaMin = strtotime ( '-1 day' , strtotime ( $fechaMinima ) ) ;
            $fechaMini = date ( 'Y-m-d' , $fechaMin );

            $anio= date('Y');
            $mes = date('M');
            $mesN = date('m')
?>

<div id="app">
<br><br>
<div class="ui grid">
        <div class="row">
                <div class="titulo">
                <i class="recycle icon"></i>
                    Papelería ADEREL<font color="#DFD102" size="20px">.</font>
                </div>
        </div>
        

        <div class="row title-bar">
            <div class="sixteen wide column">
            <br><br>
            <div class="titulo" style="font-size:15px;">
                <i class="male icon"></i><i class="futbol icon"></i>
                    Jugadores  Eliminados<font color="#DFD102" size="20px">.</font>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
            <table id="dtJugadoresE" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #FACC2E; color:white;">N°</th>
                                        <th style="background-color: #7401DF; color:white;" ></th>
                                        <th style="background-color: #7401DF; color:white;">Cod. Expediente</th>
                                        <th style="background-color: #7401DF; color:white;">Nombre</th>
                                        <th style="background-color: #7401DF; color:white;">Apellido</th>
                                        <th style="background-color: #7401DF; color:white;">Dui / Carnet Minoridad</th>
                                        <th style="background-color: #7401DF; color:white;">Fecha de Nacimiento</th>
                                        <th style="background-color: #7401DF; color:white;">Edad del Jugador</th>        
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
            </div>
        </div>

       
        <div class="row title-bar">
            <div class="sixteen wide column">
        <br><br>
                
            <div class="titulo" style="font-size:15px;">
                <i class="users icon"></i><i class="futbol icon"></i>
                    Equipos  Eliminados<font color="#DFD102" size="20px">.</font>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
            <table id="dtEquiposE" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                                <thead>
                                    <tr>
                                    
                                        <th style="background-color: #0174DF;">N°</th>
                                        <th style="background-color: #86B404; color:white;">Nombre del  Equipo</th>
                                        <th style="background-color: #86B404; color:white;">Encar. del Equipo</th>
                                        <th style="background-color: #86B404; color:white;">Tel. Encargado</th>
                                        <th style="background-color: #86B404; color:white;">Encargado Aux</th>
                                        <th style="background-color: #86B404; color:white;">Tel. Aux</th>
                                        <th style="background-color: #86B404; color:white;">Categoría</th>
                                        <th style="background-color: #86B404; color:white;">Torneo </th>
                                        <th style="background-color: #86B404; color:white;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
            </div>
        </div>

        

        


        <div class="row title-bar">
            <div class="sixteen wide column">
        <br><br>
                
            <div class="titulo" style="font-size:15px;">
                <i class="users icon"></i>
                    Usuarios  Eliminados<font color="#DFD102" size="20px">.</font>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
                <table id="dtUsuariosE" class="ui selectable very compact celled table" style="width:100%; margin:auto;">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #E6C404;">N°</th>
                            <th style="background-color: #E6C404;">Nombres</th>
                            <th style="background-color: #E6C404;">Apellido</th>
                            <th style="background-color: #E6C404;">Usuario</th>
                            <th style="background-color: #E6C404;">Email</th>
                            <th style="background-color: #E6C404;">Rol</th>
                            <th style="background-color: #E6C404;">Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    

        
</div>


</div>
<script src="./res/tablas/tablaUsuariosE.js"></script>
<script src="./res/tablas/tablaJugadoresE.js"></script>
<script src="./res/tablas/tablaEquiposE.js"></script>
<script>




</script>