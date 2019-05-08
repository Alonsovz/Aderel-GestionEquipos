Vue.component('modal-campeon', {

    props: {
    detalles: {
    type: Array,
    required: false
    }
    },
    
    
    template: `<div class="ui  modal" id="modalDetallesC">
        <div class="header">
            <i class="futbol icon"></i>Campeón del torneo
        </div>
    
        <div class="scrolling content">
            <form action="" class="ui form" id="frmDetalles">
                <table v-if="detalles" class="ui selectable very compact single line table">
                    <thead>
                        <tr>
                        
                            <th>Equipo</th>
                            <th>Encargado</th>
                            <th>Encargado Auxiliar</th>
                            <th>Torneo</th>
                            <th>Historial</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-torneo="detalle.idTorneo">               
                        <td>{{detalle.equipo}}</td>
                                <td>{{detalle.encargado}}</td>
                                <td>{{detalle.encargadoAux}}</td>
                                <td>{{detalle.torneo}}</td>
                                <td>
                                <a class="ui blue button" @click="$parent.historial(detalle.idTorneo, detalle.equipo)">
                                <i class="clock icon"></i><i class="file icon"></i>
                                </a>
                                </td>
                               
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="actions">
            <button @click="$parent.cerrarModalG" class="ui deny black button">
                Cerrar
            </button>
        </div>
    </div>`
    
    });