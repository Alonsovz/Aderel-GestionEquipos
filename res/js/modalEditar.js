Vue.component('modal-editar', {

    props: {

        id: {
            type: String,
            required: true
        },
        id_form: {
            type: String
        },
        titulo: {
            type: String,
            required: true
        },
        para: {
            type: String,
            required: false
        },
        sub_titulo: {
            type: String,
            required: false
        },
        tamanio: {
            type: String,
            required: false
        },
        campos: {
            type: Array,
            required: false
        },
        url: {
            type: String,
            required: false
        },
        excep: {
            type: String
        }
    },

    mounted() {
        $('.ui.checkbox').checkbox();
        $('.ui.radio.checkbox').checkbox();
    },
    
    data: function () {
        return {
            contador: 0,
            img:null
        }
    },

    methods: {
        editar(){
            
            var gatos = {};
        
            $('#' + this.id_form).addClass('loading');

            let form = new FormData(document.getElementById(this.id_form))

            var param = {
                method: 'POST',
                // headers: {
                //     "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
                // },
                body: form,
            };
            fetch(this.url, param)
                .then(response => {
                    return response.text();
                })
                .then(val => {
                    if (val == 1) {
                        swal({
                            title: 'Editado',
                            text: 'Los cambios han sido guardados',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#' + this.id_form).removeClass('loading')
                        $('#' + this.id).modal('hide');
                        this.$parent.refrescarTabla();
                    }
                }).catch(res => {
                    console.log(res);
                });
            
        },
        cancelar() {
            resetFrm(this.id_form, "#btnEditar");
        }, 
        nuevaImagen(e){
            let reader= new FileReader();

            reader.readAsDataURL(e.target.files[0]);

            reader.onload=(e)=>{
                this.img=e.target.result;
                $('[name=imagenNueva]').val(e.target.result);
            }
        }
    },


    template: `<div :class="['ui','modal',tamanio]" :id="id" style="overflow: scroll;">
                <div class="header">
                    {{titulo}}
                </div>
                <div class="content">
                <h4 v-if="sub_titulo">{{sub_titulo}}</h4>
                    <form action="" class="ui equal width form" :id="id_form">
                        <div v-for="campo in campos" class="field">
                            <label>{{campo.label}} </label>
                            <div v-if='campo.type== "img"' v-html='campo.val'></div>
                            <select class="ui dropdown" v-if="campo.type == 'select'" :name="campo.name">
                                <option v-for="(op,i) in campo.options" :value="op.val" :key='i'>
                                    {{op.text}}
                                </option>  
                            </select> 
                            <div class="ui radio checkbox" v-else-if="campo.type == 'radio'" v-for="(op,index) in campo.options" :key='index'>
                                <input type="radio" name="campo.name" tabindex="0" class="hidden" v-model='campo.value' :value='op.val' :checked='index==0'>
                                <label>{{op.text}}</label>
                            </div>

                            <div class="ui checkbox" v-else-if="campo.type == 'checkbox'" v-for="(op,index) in campo.options" :key='index'>
                                <input type="checkbox" tabindex="0" class="hidden" name="campo.name" v-model='campo.value' :value='op.val'>
                                <label>{{op.text}}</label>
                            </div>

                            <input v-else-if="campo.type == 'horita'" type="text" :name="campo.name" class="requerido timepicker timepicker-with-dropdown"/>

                            <input v-else-if="campo.type == 'number'" class="reqRegistrar" :type="campo.type" :name="campo.name" :min="campo.min" :max="campo.max" :id="campo.name" v-model.number="campo.val" :step='campo.step' :disabled='campo.disabled'>

                            <input v-else-if="campo.type == 'hidden'" :type="campo.type" :id="campo.name" :name="campo.name">

                            <input v-else-if='campo.type == "file"' class="requerido" :type="campo.type" :mask="campo.mask" :name="campo.name" @change='nuevaImagen'>
                            <input v-else-if='campo.type != "img"' class="requerido" :type="campo.type" :mask="campo.mask" :name="campo.name">
                            
                            <div class="ui red pointing label" style="display: none;">
                            </div>
                        </div>
                    </form>                 
                </div>
                <div class="actions">
                    <button class="ui black deny button" @click="cancelar">
                        Cancelar
                    </button>
                    <button class="ui right primary button" @click="editar" id="btnEditar">
                        Guardar Cambios
                    </button>
                </div>
            </div>`
});