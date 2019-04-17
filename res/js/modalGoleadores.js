
Vue.component('modal-goleo', {

    props: {
    detalles: {
    type: Array,
    required: false
    }
    },
    
    
    template: `<div class="ui modal" id="modalGoleo">
        <div class="header">
        <h2>Tabla de Goleadores</h2>
            </div>
        

        <div class="scrolling content">
        
            <form action="" class="ui form" id="frmDetalles">
                <table v-if="detalles" class="ui table"  style="text-align:center;">
                    <thead>
                        <tr>
                        <th>Jugador</th>
                        <th>Goles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-torneo="detalle.idTorneo">     
                        <td>{{detalle.nombre}} {{detalle.apellido}}</td> 
                        <td>{{detalle.goles}}</td> 
                        
                        
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>


        

        
        <div class="actions">
            <button @click="" class="ui deny black button">
                Cerrar
            </button>
        </div>
    </div>`
    
    
    
    
        
    

    });