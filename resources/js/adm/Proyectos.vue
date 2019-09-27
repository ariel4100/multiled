<template>
    <section class=" ">

        <button type="button" class="btn btn-primary mx-0" data-toggle="modal" data-target="#addNovedad">
            Añadir
        </button>

        <!-----------TABLA DE NOVEDADES------------->
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
            <tr v-for="(item,index) in content.novedades">
                <td>{{ item.text.es.title }}</td>
                <td>{{ item.order }}</td>
                <td>
                    <a @click="edit(item)" class="btn btn-warning" data-toggle="modal" data-target="#editNovedad"><i class="fas fa-edit"></i></a>
                    <a @click="destroy(item)"  class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            </tbody>
        </table>


        <!-- ADDNOVEDADES -->
        <div class="modal fade" id="addNovedad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nueva Novedad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <fieldset class="m t-5"  v-for="(item,index) in content.lang" :key="index">
                            <legend>{{ item.name }}</legend>
                            <div class="row">
                                <div class="md-form col-md-8">
                                    <input type="text" :id="'title-'+index" class="form-control" placeholder="Titulo" v-model="item.title">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <div class="md-form col-md-4">
                                    <input type="text" :id="'title-'+index" class="form-control" placeholder="Orden" v-model="item.order">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <div class="md-form col-md-12">
                                    <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                                    <jodit-vue v-model="item.text" :id="'text2-'+index"></jodit-vue>
                                </div>
                                <!--<div class="md-form col-md-12">-->
                                    <!--<select v-model="item.category_id" :id="'category_id-'+index" class="custom-select">-->
                                        <!--<option :value="item.id" v-for="item in content.categorias">{{ item.text.es.title }}</option>-->
                                    <!--</select>-->
                                <!--</div>-->
                                <div class="md-form col-md-4 d-flex justify-content-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" v-model="item.featured" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Destacado</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <a @click="addImage()" class="btn btn-info btn-md">Añadir</a>
                        <div class="row">
                            <div class="col-md-4" v-for="(item,index) in content.images" :key="index">
                                <input-file-image
                                        class=" "
                                        :model.sync="item.image"
                                        id="input-file-descarga"
                                        label-text="Seleccione Imagen"
                                ></input-file-image>
                                <!--<div class="md-form">-->
                                <!--<input type="text" class="form-control" v-model="item.title" placeholder="Titulo">-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <a @click="save()" class="btn btn-primary">Guardar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- EDITNOVEDADES -->
        <div class="modal fade" id="editNovedad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Editar Novedad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <fieldset class="m t-5"  v-for="(item,index) in content.novedad.text" :key="index">
                            <legend>{{ item.name }}</legend>
                            <div class="row">
                                <div class="md-form col-md-8">
                                    <input type="text" :id="'title2-'+index" class="form-control" placeholder="Titulo" v-model="item.title">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <div class="md-form col-md-4">
                                    <input type="text" :id="'title1-'+index" class="form-control" placeholder="Orden" v-model="item.order">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <div class="md-form col-md-12">
                                    <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                                    <jodit-vue v-model="item.text" :id="'textedit2-'+index"></jodit-vue>
                                </div>
                                <!--<div class="md-form col-md-12">-->
                                    <!--<select v-model="item.category_id" :id="'category_ide-'+index" class="custom-select">-->
                                        <!--<option :value="item.id" v-for="item in content.categorias">{{ item.text.es.title }}</option>-->
                                    <!--</select>-->
                                <!--</div>-->
                                <div class="md-form col-md-4 d-flex justify-content-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" v-model="item.featured" id="customCheck12">
                                        <label class="custom-control-label" for="customCheck12">Destacado</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <a @click="addImage()" class="btn btn-info btn-md">Añadir</a>
                        <div class="row">
                            <div class="col-md-4" v-for="(item,index) in content.images" :key="index">
                                <input-file-image
                                        class=" "
                                        :model.sync="item.image"
                                        id="input-file-descargas"
                                        label-text="Seleccione Imagen"
                                ></input-file-image>
                                <!--<div class="md-form">-->
                                <!--<input type="text" class="form-control" v-model="item.title" placeholder="Titulo">-->
                                <!--</div>-->
                            </div>
                        </div>
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
            InputFileImage
        },
        data(){
            return{
                content: {
                    lang: [],
                    novedad:{},
                    novedades: [],
                    categorias: [],
                    images: [],
                },
                formData: new FormData(),
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
                    console.log(res)
                    this.content.novedades = res.data.novedades;
                    this.content.categorias = res.data.categorias;

                    if (res.data.idioma){
                        this.content.lang = res.data.idioma
                    }
                });
            },
            save(){
                console.log(this.content)

                var self = this
                // if (self.content.image) {
                //     Object.keys(self.content.image).forEach(function(key){
                //         self.formData.append('images['+key+']', self.content.image[key]);
                //     })
                // }
                if (self.content.images) {
                    Object.keys(self.content.images).forEach(function(key){

                        let file = self.content.images[key]
                        if (file && file instanceof File) {
                            self.formData.append('images['+key+']', file);
                        }
                        if (typeof file === 'string' || file instanceof String) {
                            self.formData.append('images['+key+']', file);
                        }
                        if (typeof file === 'object' || file instanceof Object) {
                            // console.log( file.image)
                            self.formData.append('images['+key+'][image]', file.image);
                            self.formData.append('images['+key+'][title]', file.title);
                        }
                    })
                }
                self.formData.append('data', JSON.stringify(self.content));
                axios.post(this.urlAdd,self.formData).then(res => {
                    console.log(res)
                    toastr.success('Se creo correctamente')
                    this.getData()
                }).catch(res => console.log(res));
            },
            edit(item){

                this.content.novedad = item;
                this.content.images = item.file ? item.file : [];
                console.log(this.content)
            },
            update(){
                console.log(this.content)
                var self = this
                if (self.content.images) {
                    Object.keys(self.content.images).forEach(function(key){

                        let file = self.content.images[key]
                        if (file && file instanceof File) {
                            self.formData.append('images['+key+']', file);
                        }
                        if (typeof file === 'string' || file instanceof String) {
                            self.formData.append('images['+key+']', file);
                        }
                        if (typeof file === 'object' || file instanceof Object) {
                            // console.log( file.image)
                            self.formData.append('images['+key+'][image]', file.image);
                            self.formData.append('images['+key+'][title]', file.title);
                        }
                    })
                }
                self.formData.append('data', JSON.stringify(self.content));
                axios.post(this.urlUpdate,self.formData).then(res => {
                    console.log(res)
                    toastr.success('Se actualizo correctamente')

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
            },
            addImage(){
                this.content.images.push({
                    image:{},
                    title:'',
                })
            },

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