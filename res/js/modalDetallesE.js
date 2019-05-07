Vue.component('modal-detalles', {

    props: {
    detalles: {
    type: Array,
    required: false
    }
    },
    
    
    template: `<div class="ui  modal" id="modalDetalles" >
        <div class="header">
          Equipos inscritos en el torneo
        </div>
    
        <div class="scrolling content">
            <form action="" class="ui form" id="frmDetalles">
                <table v-if="detalles" class="ui selectable very compact single line table">
                    <thead>
                        <tr>
                        <th style="background-color: white;"></th>
                            <th style="background-color: #BEF781;">Nombre del Equipo</th>
                            <th style="background-color: #BEF781;">Encargado</th>
                            <th style="background-color: #BEF781;">Encargado Auxiliar</th>
                            <th style="background-color: #BEF781;">Historial</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-torneo="detalle.idTorneo">
                        <td style="background-color: white;color:white;">{{detalle.idTorneo}}</td>      
                        <td>{{detalle.nombre}}</td>
                                <td>{{detalle.encargado}}</td>
                                <td>{{detalle.encargadoAux}}</td>
                                <td>
                                <button class="ui blue button" @click="$parent.historial(detalle.idTorneo, detalle.nombre)">
                                <i class="clock icon"></i><i class="file icon"></i>
                                </button>
                                </td>
                                
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="actions">
            <button @click="$parent.cerrarModal" class="ui deny black button">
                Cerrar
            </button>
        </div>
    </div>`
    
    });