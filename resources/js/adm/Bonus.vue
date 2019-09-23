<template>
    <section class=" ">

        <button type="button" class="btn btn-primary mx-0" data-toggle="modal" data-target="#addDescarga">
            Añadir
        </button>

        <!-----------TABLA DE DESCARGA------------->
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <!--<th scope="col">#</th>-->
                <th scope="col">Bonificación</th>
                <th style="width: 200px">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in descuentos">
                <td>Bonificación {{ item.percentage }}%</td>
                <td>
                    <a @click="edit(item)" class="btn btn-warning" data-toggle="modal" data-target="#addEdit"><i class="fas fa-edit"></i></a>
                    <a @click="destroy(item)"  class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            </tbody>
        </table>


        <!-- ADDDESCARGA -->
        <div class="modal fade" id="addDescarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="card shadow">
                            <div class="card-body">
                                <fieldset class="mt-5" >
                                    <!--<legend>{{ descarga.name }}</legend>-->
                                    <div class=" row">
                                        <!--<div class="md-form col-md-8">-->
                                            <!--<input type="text" :id="'title-1' " class="form-control" placeholder="Nombre" v-model="descarga.title">-->
                                            <!--&lt;!&ndash;<label :for="'title-'+index">Texto</label>&ndash;&gt;-->
                                        <!--</div>-->
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" placeholder="Bonificación" v-model="descuento.percentage" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">%</span>
                                            </div>
                                        </div>
                                        <!--<div class="md-form col-md-4">-->
                                            <!--<input type="text" :id="'title-2' " class="form-control" placeholder="Orden" v-model="descarga.order">-->
                                            <!--&lt;!&ndash;<label :for="'title-'+index">Texto</label>&ndash;&gt;-->
                                        <!--</div>-->
                                        <!--<input-file-image-->
                                                <!--class="col-md-8"-->
                                                <!--:model.sync="descarga.file"-->
                                                <!--id="input-file-descarga"-->
                                                <!--label-text="Seleccione Archivo"-->
                                        <!--&gt;</input-file-image>-->
                                    </div>
                                </fieldset>
                            </div>
                            <div class="card-footer text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <a @click="save()" class="btn btn-primary">Guardar</a>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>
        <!-- EDITDESCARGA -->
        <div class="modal fade" id="addEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="card shadow">
                            <div class="card-body">
                                <fieldset class="mt-5" >
                                    <!--<legend>{{ descarga.name }}</legend>-->
                                    <div class="row">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" placeholder="Bonificación" v-model="descuento.percentage" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon21">%</span>
                                            </div>
                                        </div>
                                        <!--<input-file-image-->
                                                <!--class="col-md-8"-->
                                                <!--:model.sync="descarga.file"-->
                                                <!--id="input-file-descarga"-->
                                                <!--label-text="Seleccione Archivo"-->
                                        <!--&gt;</input-file-image>-->
                                    </div>
                                </fieldset>
                            </div>
                            <div class="card-footer text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <a @click="save()" class="btn btn-primary">Guardar</a>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>

    </section>
</template>

<script>
    import toastr from 'toastr';
    import 'jodit/build/jodit.min.css'
    import JoditVue from 'jodit-vue'
    import InputFileImage from '../components/ImageComponent';

    export default {
        props:{
            // idioma: Object,
            urlData: '',
            urlAdd: '',
            urlUpdate: '',
            urlDestroy: '',
        },
        components: {
            JoditVue,
            InputFileImage,
        },
        data(){
            return{
                // lang: [],
                descuento:{
                    percentage: '',
                },
                descuentos: [],
                formData : new FormData(),
            }
        },
        mounted() {
            // console.log(this.clientes)
            this.getData()
        },
        computed: {
        },
        methods: {
            getData(){
                axios.get(this.urlData).then(res => {
                    console.log(res)
                    this.descuentos = res.data.descuentos;
                    //
                    // if (res.data.idioma){
                    //     this.descarga.lang = res.data.idioma
                    // }
                });
            },
            save(){
                console.log(this.descuento)
                // let config = {
                //     header : {
                //         'Content-Type' : 'multipart/form-data'
                //     }
                // }
                // var self = this
                // if (this.descarga.file) {
                //     console.log(Object.values(this.descarga.file))
                //     Object.keys(self.descarga.file).forEach(function(key){
                //         console.log(key)
                //         self.formData.append('images['+key+']', self.descarga.file[key]);
                //     })
                // }

                // this.formData.append('data', JSON.stringify(this.descarga.lang));
                // console.log(self.formData)
                // console.log(this.formData)
                axios.post(this.urlAdd,this.descuento).then(res => {
                    console.log(res)
                    toastr.success('Se creo correctamente')
                    this.getData()
                }).catch(res => console.log(res));
            },
            edit(item){
                this.descuento = item;
                console.log(this.descuento)
            },
            destroy(item){
                // console.log(item)
                axios.post(this.urlDestroy,item).then(res => {
                    console.log(res)
                    toastr.success('Se elimino correctamente')
                    this.getData()
                }).catch(res => console.log(res));
            }

        },
    }
</script>
<style>
    fieldset{
        border: 1px solid #dedede;
        padding: 16px;
    }
    legend{
        font-size: 16px;
        width: auto;
        text-transform: uppercase;
    }
</style>