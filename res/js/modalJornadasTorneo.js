Vue.component('modal-jornadas', {

    props: {
    detalles: {
    type: Array,
    required: false
    }
    },
    
    
    template: `<div class="ui  modal" id="modalDetallesJornadasM">
        <div class="header">
            <i class="futbol icon"></i><i class="calendar icon"></i>Jornadas del Torneo
            </div>
        <div class="scrolling content">
            <form action="" class="ui form" id="frmDetalles">
                <table v-if="detalles" class="ui table">
                    <thead>
                        <tr>
                        <th>Vuelta</th>
                        <th>Jornada</th>
                        <th>Enfrentamiento</th>
                        <th>N° Partido</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-torneo="detalle.idTorneo">     
                        <td>{{detalle.vuelta}}</td> 
                        <td>{{detalle.jornada}}</td> 
                        <td>{{detalle.equipo1}} vs {{detalle.equipo2}}</td>         
                        <td>{{detalle.partido}}</td>
                        <td>{{detalle.fecha}}</td>
                        <td>{{detalle.hora}}</td>
                        
                        <td>
                         <button @click="$parent.resultados(detalle.equipo1, detalle.equipo2, detalle.vuelta, detalle.jornada,
                            detalle.hora, detalle.fecha,detalle.nombreT, detalle.idTor,detalle.idPartido)" 
                         type="button" class="ui blue button">
                              <i class="pencil icon"></i> Resultados
                        </button>
                        </td>
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