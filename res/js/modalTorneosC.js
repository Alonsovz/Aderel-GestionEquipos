Vue.component('modal-detalles', {

    props: {
    detalles: {
    type: Array,
    required: false
    }
    },
    
    
    template: `<div class="ui  modal" id="modalDetalles" >
        <div class="header">
           Torneos de la Categoria
        </div>
    
        <div class="scrolling content">
            <form action="" class="ui form" id="frmDetalles">
                <table v-if="detalles" class="ui selectable very compact single line table">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #BEF781;">Nombre del Torneo</th>
                            <th style="background-color: #BEF781;">Equipos Permitidos</th>
                            <th style="background-color: #BEF781;">Cupos Disponibles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-categoria="detalle.idCategoria">
                                <td>{{detalle.nombreTorneo}}</td>
                                <td>{{detalle.numeroEquipos}}</td>
                                <td>{{detalle.disponibles}}</td>
                                
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