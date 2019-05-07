
Vue.component('modal-suspendidos', {

    props: {
    detalles: {
    type: Array,
    required: false
    }
    },
    
    
    template: `<div class="ui modal" id="modalSuspendidos">
        <div class="header">
        <h2><i class="futbol icon"></i><i class="close icon"></i>Tabla de suspendidos</h2>
            </div>
        

        <div class="scrolling content">
        
            <form action="" class="ui form" id="frmDetalles">
                <table v-if="detalles" class="ui selectable very compact celled table"  style="text-align:center;">
                    <thead>
                        <tr>
                        <th style="background-color: #FACC2E;">Nombre del Jugador</th>
                        <th style="background-color: #FACC2E;">Equipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-torneo="detalle.idTorneo">     
                        <td>{{detalle.nombre}} {{detalle.apellido}}</td> 
                        <td>{{detalle.equipo}}</td> 


                        
                        
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