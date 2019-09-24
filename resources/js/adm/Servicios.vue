<template>
    <section class=" ">

        <button type="button" class="btn btn-primary mx-0" @click="showmodal1 = 1"  data-toggle="modal" data-target="#addFamilia">
            Añadir
        </button>

        <!-----------TABLA DE FAMILIAS------------->
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
            <tr v-for="(item,index) in content.familias">
                <td>{{ item.text != null ? item.text.es.title : null }}</td>
                <td>{{ item.order }}</td>
                <td>
                    <a @click="edit(item)"  class="btn btn-warning" data-toggle="modal" data-target="#editFamilia"><i class="fas fa-edit"></i></a>
                    <a @click="destroy(item)"  class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            </tbody>
        </table>


        <!-- ADDFAMILIA -->
        <div  class="modal fade" id="addFamilia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" v-if="showmodal1">
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
                        <a @click="save()" class="btn btn-primary">Guardar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- EDITFAMILIA -->
        <div  class="modal fade" id="editFamilia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Editar Subfamilia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" v-if="showmodal1">
                        <fieldset class="m t-5"  v-for="(item,index) in content.familia.text" :key="index">
                            <legend>{{ item.name }}</legend>
                            <div class="row">
                                <div class="md-form col-md-6">
                                    <input type="text" :id="'title1-'+index" class="form-control" placeholder="Titulo" v-model="item.title">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <!--<div class="md-form">-->
                                <!--&lt;!&ndash;<input type="text" class="d-none" v-model="item.text = 's'">&ndash;&gt;-->
                                <!--<jodit-vue v-model="item.text" :id="'text-'+index"></jodit-vue>-->
                                <!--</div>-->
                                <div class="md-form col-md-6">
                                    <input type="text" :id="'title1-'+index" class="form-control" placeholder="Orden" v-model="item.order">
                                    <!--<label :for="'title-'+index">Texto</label>-->
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

    </section>
</template>

<script>
    import toastr from 'toastr';
    import 'jodit/build/jodit.min.css'
    import JoditVue from 'jodit-vue'
    import Gallery from './../components/GalleryComponent';
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
            Gallery,
            InputFileImage,
        },
        data(){
            return{
                content: {
                    lang: [],
                    familia:{},
                    familias: [],
                    novedades: [],
                    images: [],
                    imagesedit: [],
                },
                show: 0,
                showmodal1: 1,
                formData: new FormData(),
            }
        },
        mounted() {
            // console.log(this.urlData)
            this.getData()
        },
        computed: {
        },
        updated: function(){
        },
        created() {

        },
        methods: {
            getData(){
                axios.get(this.urlData).then(res => {
                    // console.log(res)
                    if (res.data.familias){
                        this.content.familias = res.data.familias;
                    }
                    //
                    if (res.data.idioma){
                        this.content.lang = res.data.idioma
                    }
                });
            },
            save(){
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
                axios.post(this.urlAdd,self.formData).then(res => {
                    console.log(res)
                    toastr.success('Se creo correctamente')
                    this.getData()
                    location.reload()
                    // this.content.familia = {};
                }).catch(res => console.log(res));
            },
            edit(item){
                let self = this
                // this.showmodal1 = 0

                // console.log(this.showmodal1)
                this.content.familia = item;
                // this.content.images = []
                this.content.images = item.file ? item.file : [];
                // if (item.file != null){
                //     item.file.forEach((item)=>{
                //         self.content.images.push(item)
                //     })
                // }else{
                //     console.log('es null')
                //     this.content.images = []
                // }

                // if (this.content.familia.text == null){
                //     this.content.familia.text
                // }
                // this.show = 0
                // this.show = 1
                $('#editFamilia').on('hidden.bs.modal', function() {
                    self.content.familia = {};
                    console.log('entar')
                    console.log(self.content);

                }) ;
                // this.show = 1
            },
            update(){
                console.log(this.content)
                // axios.post(this.urlUpdate,this.content).then(res => {
                //     console.log(res)
                //     toastr.success('Se actualizo correctamente')
                //
                //     this.getData()
                // }).catch(res => console.log(res));
            },
            destroy(item){
                // console.log(item)
                axios.post(this.urlDestroy,item).then(res => {
                    console.log(res)
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