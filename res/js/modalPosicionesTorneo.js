
Vue.component('modal-posiciones', {

    props: {
    detalles: {
    type: Array,
    required: false
    },
    
    },
    
    
    template: `<div class="ui modal" id="modalPosiciones">
        <div class="header">
            Tabla de posiciones

            </div>
        <div class="scrolling content" id="tablaPos">
       
            <form action="" class="ui form" id="frmDetalles">
                <table v-if="detalles" class="ui table"  style="text-align:center;">
                    <thead>
                        <tr>
                        <th>Equipos</th>
                        <th>PJ</th>
                        <th>G</th>
                        <th>E</th>
                        <th>P</th>
                        <th>Puntos</th>
                        <th>GF</th>
                        <th>GE</th>
                        <th>DG</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-torneo="detalle.idTorneo">     
                        
                        <td>{{detalle.nombreE}}</td> 
                        <td>{{detalle.partidosJugados}}</td>         
                        <td>{{detalle.partidosGanados}}</td>
                        <td>{{detalle.partidosEmpatados}}</td>
                        <td>{{detalle.partidosPerdidos}}</td>
                        <td style="font-weight: bold;">{{detalle.puntaje}}</td>
                        <td>{{detalle.golesFavor}}</td>
                        <td>{{detalle.golesContra}}</td> 
                        <td>{{detalle.golesFavor - detalle.golesContra}}</td> 
                        
                        
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