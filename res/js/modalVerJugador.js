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
                            <th style="background-color: #BEF781;">Equipo</th>
                            <th style="background-color: #BEF781;">Torneo</th>
                            <th style="background-color: #BEF781;">Categoria</th>
                            <th style="background-color: #BEF781;">Estado</th>
                            <th style="background-color: #BEF781;">En Caja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-jugador="detalle.idJugador">
                                <td>{{detalle.name}}</td>
                                <td>{{detalle.apellido}}</td>
                                <td>{{detalle.equipo}}</td>
                                <td>{{detalle.torneo}}</td>
                                <td>{{detalle.categoria}}</td>
                                <td v-if="detalle.estado == 2" style="background-color: #81BEF7">Activo</td>
                                <td v-else-if="detalle.estado == 3" style="background-color: #F5BCA9;">
                                Terminado
                            </td>
                            <td v-if="detalle.pago == 2" style="background-color: #A9F5BC;">
                                Solvente
                            </td>
                            <td v-if="detalle.pago == 1" style="background-color: #F5BCA9;">
                                Esperando Cobro
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