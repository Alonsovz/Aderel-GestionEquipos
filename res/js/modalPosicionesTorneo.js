
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
                        <th style="background-color: #58D3F7;">Equipo</th>
                        <th style="background-color: #58D3F7;">PJ</th>
                        <th style="background-color: #58D3F7;">G</th>
                        <th style="background-color: #58D3F7;">E</th>
                        <th style="background-color: #58D3F7;">P</th>
                        <th style="background-color: #58D3F7;">GF</th>
                        <th style="background-color: #58D3F7;">GC</th>
                        <th style="background-color: #58D3F7;">DG</th>
                        <th style="background-color: #58D3F7;">Puntos</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-torneo="detalle.idTorneo">     
                        
                        <td>{{detalle.nombreE}}</td> 
                        <td>{{detalle.partidosJugados}}</td>         
                        <td>{{detalle.partidosGanados}}</td>
                        <td>{{detalle.partidosEmpatados}}</td>
                        <td>{{detalle.partidosPerdidos}}</td>
                        <td>{{detalle.golesFavor}}</td>
                        <td>{{detalle.golesContra}}</td> 
                        <td>{{detalle.golesFavor - detalle.golesContra}}</td> 
                        <td style="font-weight: bold;">{{detalle.puntaje}}</td>
                        
                                </tr>
                    </tbody>
                </table>
            </form>
        </div>

        


        

        
        <div class="actions">
            <button @click="$parent.cerrarModalT()" class="ui blue button">
                Cerrar
            </button>
        </div>
    </div>`
    
    
    
    
        
    

    });