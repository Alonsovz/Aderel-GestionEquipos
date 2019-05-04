<br>
<a class='ui red floated button' href="?1=TorneosController&2=gestionM">
    <i class="left point hand icon"></i>Volver
</a>

<button class="ui right floated green labeled icon button" onclick='enviar()' id="btnGuardar">
    <i class="save icon"></i>
    Guardar datos
</button>

<form id='clasificatoria'>
    <br>
    <h4>Etapa clasificatoria: <em><span id='etapa'></span></em></h4>
    <table class='ui  table' style='width:100%; margin:auto; font-weight: bold; border: 1px solid;'>
        <thead>
            <tr>

                <th style='background-color: #201EAC; color:white;'>
                    <center>N° de Partido
                </th>
                <th style='background-color: #201EAC;color:white;'>
                    <center>Enfrentamiento
                </th>
                <th style='background-color: #201EAC;color:white;'>
                    <center>Cancha
                </th>
                <th style='background-color: #201EAC;color:white;'>
                    <center>Hora
                </th>
                <th style='background-color: #201EAC;color:white;'>
                    <center>Fecha
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- PURO JQUERY PAPA! XD -->
        </tbody>
    </table>
</form><br>

<script>
const idTorneo = <?php if(isset($_REQUEST['torneo'])) echo $_REQUEST['torneo']; else echo 0 ?>;
let etapa;

$(document).ready(()=>{
    if(!idTorneo) //validacion pro xD
        Swal.fire({type: 'error',text:'No ha seleccionado un torneo '})
        .then((result) => window.location = '?1=TorneosController&2=gestionM');

    $.ajax({
        type: 'POST',
        url: '?1=TorneosController&2=posiciones',
        data: {
            id: idTorneo
        },
        success: function (data) {
            var datos = JSON.parse(data);
            let equipos_finalistas;
            const clasificatorias = [];

            if(datos.length>=10){
                //solo los primeros 8 equipos
                equipos_finalistas = datos.slice(0,8);
                for (let index = 0; index < 4; index++) {
                    clasificatorias.push({
                        partidoN:index+1,
                        etapa:'cuartos',
                        equiposId:[equipos_finalistas[index].idEquipo,equipos_finalistas[8-index-1].idEquipo],
                        equiposNombre:[equipos_finalistas[index].nombreE,equipos_finalistas[8-index-1].nombreE],
                        idTorneo:idTorneo,
                    });
                }
                etapa='cuartos de final';
            }else{
                equipos_finalistas = datos.slice(0,4);
                for (let index = 0; index < 2; index++) {
                    clasificatorias.push({
                        partidoN:index+1,
                        etapa:'semifinales',
                        equiposId:[equipos_finalistas[index].idEquipo,equipos_finalistas[4-index-1].idEquipo],
                        equiposNombre:[equipos_finalistas[index].nombreE,equipos_finalistas[4-index-1].nombreE],
                        idTorneo:idTorneo,
                    });
                }
                etapa='seminifinal';
            }

            // INSERTAR EN EL DOM
            $('#etapa').text(etapa);
            let html;
            clasificatorias.forEach((cat,i) => {
                html+=
                `
                <tr>
                    <td bgcolor='#F2F5A9' style='width: 10%;'>
                        <center>Partido ${i+1}
                    </td>
                    <td bgcolor='#F2F5A9' style='width: 30%;'>
                        <center>
                            ${cat.equiposNombre[0]} vs ${cat.equiposNombre[1]}
                            <input type='hidden' name='idEquipo1[${i+1}]' value='${cat.equiposId[0]}'>
                            <input type='hidden' name='idEquipo2[${i+1}]' value='${cat.equiposId[1]}'>
                            <input type='hidden' name='partido[${i+1}]' value='${i+1}'>
                    </td>
                    <td style='width: 10%;'>
                        <center>
                            <select name='cancha[${i+1}]'>
                                <option value='0'>Elegir cancha</option>
                                <option value='1'>Cancha 1</option>
                                <option value='2'>Cancha 2</option>
                            </select>
                    </td>
                    <td bgcolor='' style='width: 15%;'>
                        <center>Hora: <input type='time' name='hora[${i+1}]'>
                    </td>
                    <td bgcolor='#F2F5A9' style='width: 15%;'>
                        <center>Fecha: <input type='date' name='fecha[${i+1}]'>
                    </td>
                </tr>`;
            });

            $($('tbody')[0]).html(html);

            
            
        }
    });
});

const enviar = ()=>{
    alertify.confirm("¿Deseas guardar los datos?",()=>{
        const form = $('#clasificatoria');

        const datos = $(form).serializeArray();
        const datosEnviar     = [];


        for (let j = 1; j <= ((datos.length)/6); j++) {
            const partido = {};
            
            partido.equipo1= datos.find((elemento,indice)=>{
                return elemento.name==`idEquipo1[${j}]`;
            }).value;

            partido.equipo2= datos.find((elemento,indice)=>{
                return elemento.name==`idEquipo2[${j}]`;
            }).value;

            partido.fecha= datos.find((elemento,indice)=>{
                return elemento.name==`fecha[${j}]`;
            }).value;

            partido.hora= datos.find((elemento,indice)=>{
                return elemento.name==`hora[${j}]`;
            }).value;

            partido.cancha= datos.find((elemento,indice)=>{
                return elemento.name==`cancha[${j}]`;
            }).value;

            partido.partido= datos.find((elemento,indice)=>{
                return elemento.name==`partido[${j}]`;
            }).value;

            datosEnviar.push(partido);
        }

        $.ajax({
            type: 'POST',
            url: '?1=TorneosController&2=guardarClasificatorias',
            data: {datos: JSON.stringify(datosEnviar), idTorneo:idTorneo, etapa:etapa}
        });
    });


}
</script>