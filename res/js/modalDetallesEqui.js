Vue.component('modal-detalles', {

    props: {
    detalles: {
    type: Array,
    required: false
    }
    },
    
    
    template: `<div class="ui  modal" id="modalDetalles">
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
                                <td v-if="detalle.pago == '1'" style="background-color: #FA5858;">
                                <b>Pendiente de Pago</b>--
                                <button @click="" type="button" class="ui gray button" style="color: black; font-weight:bold;">
                                    <i class="dollar icon"></i>
                                    Eliminar
                                </button>
                            </td>
                            <td v-else-if="detalle.pago == '2'">
                            <button @click="" type="button" class="ui olive button">
                                    <i class="dollar icon"></i>
                                    Traspasos
                                </button>

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