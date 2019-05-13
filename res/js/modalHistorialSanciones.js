Vue.component('modal-jugador', {

    props: {
    detalles: {
    type: Array,
    required: false
    }
    },
    
    
    template: `<div class="ui  modal" id="modalVer" >
        <div class="header">
          Historial del Jugador
        </div>
    
        <div class="scrolling content">
            <form action="" class="ui form" id="frmDetalles">
                <table v-if="detalles" class="ui selectable very compact single line table">
                    <thead>
                        <tr>
                        
                            <th style="background-color: #BEF781;">Nombre</th>
                            <th style="background-color: #BEF781;">Apellido</th>
                            <th style="background-color: #BEF781;">Motivo</th>
                            <th style="background-color: #BEF781;">Fecha</th>
                            <th style="background-color: #BEF781;">Estado</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-jugador="detalle.idJugador">
                                <td>{{detalle.nombre}}</td>
                                <td>{{detalle.apellido}}</td>
                                <td>{{detalle.motivo}}</td>
                                <td>{{detalle.fecha}}</td>
                                <td v-if="detalle.estado == 1" style="background-color: #F5BCA9;">
                                Activo
                                </td>
                                <td v-if="detalle.estado == 2" style="background-color: #81F79F;">
                                    Finalizada
                                </td>
                                
                            
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="actions">
            <button @click="$parent.cerrarModalD" class="ui deny black button">
                Cerrar
            </button>
        </div>
    </div>`
    
    });