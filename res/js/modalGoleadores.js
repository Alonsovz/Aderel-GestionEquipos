
Vue.component('modal-goleo', {

    props: {
    detalles: {
    type: Array,
    required: false
    }
    },
    
    
    template: `<div class="ui modal" id="modalGoleo">
        <div class="header">
        <h2><i class="futbol icon"></i>Tabla de Goleadores</h2>
            </div>
        

        <div class="scrolling content">
        
            <form action="" class="ui form" id="frmDetalles">
                <table v-if="detalles" class="ui selectable very compact celled table"  style="text-align:center;">
                    <thead>
                        <tr>
                        <th style="background-color: #F78181;">Nombre del Jugador</th>
                        <th style="background-color: #F78181;">Equipo</th>
                        <th style="background-color: #F78181;">Goles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-torneo="detalle.idTorneo">     
                        <td>{{detalle.nombre}} {{detalle.apellido}}</td> 
                        <td>{{detalle.equipo}}</td> 
                        <td>{{detalle.goles}}</td> 
                        
                        
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>


        

        
        <div class="actions">
            <button @click="$parent.cerrarModalG()" class="ui  red button">
                Cerrar
            </button>
        </div>
    </div>`
    
    
    
    
        
    

    });