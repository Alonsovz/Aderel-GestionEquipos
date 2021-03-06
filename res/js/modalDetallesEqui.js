Vue.component('modal-detalles', {

    props: {
    detalles: {
    type: Array,
    required: false
    }
    },
    
    
    template: `<div class="ui fullscreen modal" id="modalDetalles">
        <div class="header">
            <i class="futbol icon"></i>Jugadores del Equipo 
        </div>
    
        <div class="scrolling content">
            <form action="" class="ui form" id="frmDetalles">
                <table v-if="detalles" class="ui selectable very compact single line table">
                    <thead>
                        <tr>
                        
                            <th>Foto</th>
                            <th>Cod. Expediente</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                            <th>Equipo</th>
                            <th>Cupo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detalle in detalles" :codigo-equipo="detalle.idEquipo">        
                        <td><img :src=detalle.foto height="50" width="50"></img></td>         
                        <td>{{detalle.correlativo}}</td>
                                <td>{{detalle.nombre}}</td>
                                <td>{{detalle.apellido}}</td>
                                <td>{{detalle.edad}}</td>
                                <td style="background-color: lightblue;">{{detalle.equipo}}</td>
                                <td v-if="detalle.mayor == '1'" style="background-color: #D8D8D8;">
                                Normal
                                </td>
                                <td v-if="detalle.mayor == '2'" style="background-color: #F5D0A9;">
                                Mayor
                                </td>

                                <td v-if="detalle.estado == '2'" style="background-color: #81F7D8;">
                                Activo
                                </td>
                                <td v-if="detalle.estado == '5'" style="background-color: #F5A9A9;">
                                Sancionado
                                </td>

                                <td v-if="detalle.pago == '1'" style="background-color: #FA5858;">
                                <b>Pendiente de Pago</b>--
                                <a @click="$parent.eliminarIns(detalle.idE,detalle.idJugador,detalle.mayor)"
                                class="ui gray button" style="color: black; font-weight:bold;">
                                    <i class="trash icon"></i>
                                    Eliminar
                                </a>
                            </td>
                            <td v-else-if="detalle.pago == '2' && detalle.estado!='5'">
                            <a @click="$parent.traspasos(detalle.nombre, detalle.apellido ,detalle.equipo,detalle.idJugador,detalle.idE)"  class="ui olive button">
                                    <i class="dollar icon"></i>
                                    Traspasos
                                </a>
                                <div @click="$parent.eliminarIns(detalle.idE,detalle.idJugador,detalle.mayor)"
                                class="ui red button">
                                    <i class="trash icon"></i>
                                    Eliminar
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="actions">
            <button @click="$parent.cerrarModalE" class="ui deny black button">
                Cerrar
            </button>
        </div>
    </div>`
    
    });