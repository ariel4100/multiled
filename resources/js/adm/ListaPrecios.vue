<template>
    <section class=" ">

        <button type="button" @click="precio = {}" class="btn btn-primary mx-0" data-toggle="modal" data-target="#addPrecio">
            Añadir
        </button>

        <!-----------TABLA DE PRECIOS------------->
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <!--<th scope="col">#</th>-->
                <th scope="col">Nombre</th>
                <th scope="col">Orden</th>
                <th style="width: 200px">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in precios">
                <td>{{ item.text.name }}</td>
                <td>{{ item.text.order }}</td>
                <td>
                    <a @click="edit(item)" class="btn btn-warning" data-toggle="modal" data-target="#editPrecio"><i class="fas fa-edit"></i></a>
                    <a @click="destroy(item)"  class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            </tbody>
        </table>


        <!-- ADDPRECIO -->
        <div class="modal fade" id="addPrecio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lista de Precio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <fieldset class="m t-5" >
                            <legend></legend>
                            <div class="row">
                                <div class="md-form col-md-6">
                                    <input type="text"  class="form-control" placeholder="Nombre" v-model="precio.name">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text"  class="form-control" placeholder="Orden" v-model="precio.order">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <a @click="save()" class="btn btn-primary">Guardar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editPrecio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lista de Precio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" v-if="precio.text">
                        <fieldset class="m t-5" >
                            <legend></legend>
                            <div class="row">
                                <div class="md-form col-md-6">
                                    <input type="text"  class="form-control" placeholder="Nombre" v-model="precio.text.name">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text"  class="form-control" placeholder="Orden" v-model="precio.text.order">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <a @click="save()" class="btn btn-primary">Guardar</a>
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
        },
        data(){
            return{

                lang: [],
                precio:{
                    name:'',
                    order:'',
                },
                precios: [],

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
                    // console.log(res)
                    this.precios = res.data.prices_list;
                    //
                    if (res.data.idioma){
                        this.content.lang = res.data.idioma
                    }
                });
            },
            save(){
                // console.log(this.cliente)
                axios.post(this.urlAdd,this.precio).then(res => {
                    console.log(res)
                    toastr.success('Se creo correctamente')
                    this.getData()
                }).catch(res => console.log(res));
            },
            edit(item){
                this.precio = item;
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
