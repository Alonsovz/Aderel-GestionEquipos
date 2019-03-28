Vue.component('modal-pagosfutbol', {

    props: {
    detalles: {
    type: Array,
    required: false
    }
    },
    
    
    template: `<div class="ui  modal" id="modalDetalles">
        <div class="header">
            <i class="weight icon"></i><i class="dollar icon"></i>Cobrar cuota del Gimnasio 
        </div>
    
        <div class="scrolling content">
            <form action="" class="ui form" id="frmDetalles">
                <table v-if="detalles" class="ui table">
                    <thead>
                        <tr>
                        <th>Nombre </th>
                            <th>Fecha de Pago</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-equipo="detalle.idUsuario">     
                        <td>{{detalle.nombre}} {{detalle.apellido}}</td>         
                        <td>{{detalle.fechaP}}</td>
                        <td v-if="detalle.estado == '1'" style="background-color: #FA5858;">
                                Pendiente de Pago
                            </td>
                        <td v-else-if="detalle.estado == '2'" style="background-color: #58FAAC;">
                            Pagado
                        </td>

                                <td v-if="detalle.estado == '1'">
                                <button @click="$parent.cobrarEscFutbol(detalle.id, detalle.idUsuario, detalle.nombre, detalle.apellido, detalle.fechaP,detalle.nivel)"" type="button" class="ui green button">
                                    <i class="dollar icon"></i>
                                    Cobrar
                                </button>
                                </td>
                                <td v-if="detalle.estado == '2'">
                                
                                </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="actions">
            <button @click="$parent.cerrar" class="ui deny black button">
                Cerrar
            </button>
        </div>
    </div>`
    
    });