<template>
    <section class=" ">
        
        <button type="button" class="btn btn-primary mx-0" data-toggle="modal" data-target="#addCategoria">
            Añadir
        </button>

        <!-----------TABLA DE CATEGORIA------------->
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <!--<th scope="col">#</th>-->
                <th scope="col">Titulo</th>
                <th scope="col">Orden</th>
                <th style="width: 200px">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in content.categorias">
                <td>{{ item.text.es.title }}</td>
                <td>{{ item.order }}</td>
                <td>
                    <a @click="edit(item)" class="btn btn-warning" data-toggle="modal" data-target="#editCategoria"><i class="fas fa-edit"></i></a>
                    <a @click="destroy(item)"  class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            </tbody>
        </table>


        <!-- ADDCATEGORIA -->
        <div class="modal fade" id="addCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <fieldset class="m t-5"  v-for="(item,index) in content.lang" :key="index">
                            <legend>{{ item.name }}</legend>
                            <div class="row">
                                <div class="md-form col-md-6">
                                    <input type="text" :id="'title-'+index" class="form-control" placeholder="Titulo" v-model="item.title">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <!--<div class="md-form">-->
                                <!--&lt;!&ndash;<input type="text" class="d-none" v-model="item.text = 's'">&ndash;&gt;-->
                                <!--<jodit-vue v-model="item.text" :id="'text-'+index"></jodit-vue>-->
                                <!--</div>-->
                                <div class="md-form col-md-6">
                                    <input type="text" :id="'title-'+index" class="form-control" placeholder="Orden" v-model="item.order">
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

        <!-- EDITCATEGORIA -->
        <div class="modal fade" id="editCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Editar Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <fieldset class="m t-5"  v-for="(item,index) in content.categoria.text" :key="index">
                            <legend>{{ item.name }}</legend>
                            <div class="row">
                                <div class="md-form col-md-6">
                                    <input type="text" :id="'title-'+index" class="form-control" placeholder="Titulo" v-model="item.title">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <!--<div class="md-form">-->
                                <!--&lt;!&ndash;<input type="text" class="d-none" v-model="item.text = 's'">&ndash;&gt;-->
                                <!--<jodit-vue v-model="item.text" :id="'text-'+index"></jodit-vue>-->
                                <!--</div>-->
                                <div class="md-form col-md-6">
                                    <input type="text" :id="'title-'+index" class="form-control" placeholder="Orden" v-model="item.order">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <a @click="update()" class="btn btn-primary">Guardar</a>
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
                content: {
                    lang: [],
                    categoria:{},
                    categorias: [],
                    novedades: [],
                },




            }
        },
        mounted() {
            // console.log(this.urlData)
            this.getData()
        },
        computed: {
        },
        methods: {
            getData(){
                axios.get(this.urlData).then(res => {
                    // console.log(res)
                    if (res.data.categorias){
                        this.content.categorias = res.data.categorias;
                    }
                    //
                    if (res.data.idioma){
                        this.content.lang = res.data.idioma
                    }
                });
            },
            save(){
                // console.log(this.content)
                axios.post(this.urlAdd,this.content).then(res => {
                    // console.log(res)
                    toastr.success('Se creo correctamente')
                    this.getData()
                    location.reload()
                }).catch(res => console.log(res));
            },
            edit(item){
                this.content.categoria = item;
            },
            update(){
                // console.log(this.content.categoria)
                axios.post(this.urlUpdate,this.content).then(res => {
                    // console.log(res)
                    toastr.success('Se actualizo correctamente')
                    location.reload()
                    this.getData()
                }).catch(res => console.log(res));
            },
            destroy(item){
                // console.log(item)
                axios.post(this.urlDestroy,item).then(res => {
                    // console.log(res)
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