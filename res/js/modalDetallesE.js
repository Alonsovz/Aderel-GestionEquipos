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
                        
                            <th style="background-color: #BEF781;">Nombre del Equipo</th>
                            <th style="background-color: #BEF781;">Encargado</th>
                            <th style="background-color: #BEF781;">Encargado Auxiliar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-torneo="detalle.idTorneo">
                                <td>{{detalle.nombre}}</td>
                                <td>{{detalle.encargado}}</td>
                                <td>{{detalle.encargadoAux}}</td>
                                
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