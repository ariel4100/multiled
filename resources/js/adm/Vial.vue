<template>
    <section class=" ">

        <button type="button" class="btn btn-primary mx-0" data-toggle="modal" data-target="#addProducto">
            Añadir
        </button>

        <!-----------TABLA DE FAMILIAS------------->
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <!--<th scope="col">#</th>-->
                <th scope="col">Titulo</th>
                <!--<th scope="col">Categoria</th>-->
                <th scope="col">Orden</th>
                <th style="width: 200px">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in content.productos">
                <td>{{ item.text != null ? item.text.es.title : null }}</td>
                <td>{{ item.order }}</td>
                <td>
                    <a @click="edit(item)" class="btn btn-warning" data-toggle="modal" data-target="#editProducto"><i class="fas fa-edit"></i></a>
                    <a @click="destroy(item)"  class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            </tbody>
        </table>


        <!-- ADDFAMILIA -->
        <div class="modal fade" id="addProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nueva Producto</h5>
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
                                <div class="md-form col-md-8">
                                    <input type="text" :id="'subtitle-'+index" class="form-control" placeholder="Subtitulo" v-model="item.subtitle">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <!--<div class="md-form col-md-12">-->
                                    <!--<input type="text" :id="'metadatos-'+index" class="form-control" placeholder="Metadatos" v-model="item.keyword">-->
                                <!--</div>-->
                                <div class="md-form col-md-12">
                                    <p>Descripcion</p>
                                <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                                    <jodit-vue v-model="item.text" :id="'text-'+index"></jodit-vue>
                                </div>
                                <div class="md-form col-md-12">
                                    <p>Aplicaciones</p>
                                    <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                                    <jodit-vue v-model="item.aplicaciones" :id="'aplicaciones-'+index"></jodit-vue>
                                </div>
                                <div class="md-form col-md-12">
                                    <p>Mensajes</p>
                                    <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                                    <jodit-vue v-model="item.mensaje" :id="'mensaje-'+index"></jodit-vue>
                                </div>
<!--
                                <!--<div class="md-form col-md-6" v-if="item.family_id">-->
                                    <!--<h6>Seleccione una Subamilia</h6>-->
                                    <!--<select v-model="item.subfamily_id" :id="'subfamily_id-'+index" class="custom-select">-->
                                        <!--<option :value="subfamily.id" v-for="subfamily in item.family_id.subfamily">-->
                                            <!--{{ subfamily.text.es.title }}-->
                                        <!--</option>-->
                                    <!--</select>-->
                                <!--</div>-->
                                <div class=" col-md-6">
                                    <h6 class=" ">Caracteristicas</h6>
                                    <div class=" ">
                                        <multiselect v-model="content.services_related" :options="content.services" :multiple="true" :custom-label="customLabel" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" track-by="id">
                                            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
                                        </multiselect>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6 class=" ">Productos relacionados</h6>
                                    <div class=" ">
                                        <!--<label class="typo__label"></label>-->
                                        <multiselect v-model="content.related" :options="content.productos" :multiple="true" :custom-label="customLabel" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" track-by="id">
                                            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
                                        </multiselect>
                                    </div>
                                </div>
                                <input-file-image
                                        class=" mt-5"
                                        :model.sync="ficha"
                                        id="input-file-ficha"
                                        label-text="Seleccione Ficha tecnica"
                                ></input-file-image>
                                <!--<div class="md-form col-md-4 d-flex justify-content-center">-->
                                    <!--<div class="custom-control custom-checkbox">-->
                                        <!--<input type="checkbox" class="custom-control-input" v-model="item.news" id="customCheck1">-->
                                        <!--<label class="custom-control-label" for="customCheck1">Novedades</label>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="md-form col-md-4 d-flex justify-content-center">-->
                                    <!--<div class="custom-control custom-checkbox">-->
                                        <!--<input type="checkbox" class="custom-control-input" v-model="item.featured" id="customCheck2">-->
                                        <!--<label class="custom-control-label" for="customCheck2">Destacado</label>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="md-form col-md-4 d-flex justify-content-center">-->
                                    <!--<div class="custom-control custom-checkbox">-->
                                        <!--<input type="checkbox" class="custom-control-input" v-model="item.new" id="customCheck3">-->
                                        <!--<label class="custom-control-label" for="customCheck3">Nuevo</label>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <div class="col-md-12 mt-5">
                                    <a @click="addImageGallery()" class="btn btn-info btn-md">Añadir Galeria</a>
                                    <div class="row">
                                        <div class="col-md-4 position-relative" v-for="(item,index) in content.images_gallery" :key="index">
                                            <span @click="deleteImageGallery(index)" class="badge badge-danger text-white rounded-circle position-absolute" style="top: -10px; right: 0; cursor: pointer; z-index: 11"">X</span>
                                            <input-file-image
                                                    class=" "
                                                    :model.sync="item.image"
                                                    id="input-file-gallery"
                                                    label-text="Seleccione Imagen"
                                            ></input-file-image>
                                            <!--<div class="md-form">-->
                                            <!--<input type="text" class="form-control" v-model="item.title" placeholder="Titulo">-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <a @click="addImage()" class="btn btn-info btn-md">Añadir Imagen</a>
                                    <div class="row">
                                        <div class="col-md-4 position-relative" v-for="(item,index) in content.images" :key="index">
                                            <span @click="deleteImage(index)" class="badge badge-danger text-white rounded-circle position-absolute" style="top: -10px; right: 0; cursor: pointer; z-index: 11">X</span>
                                            <input-file-image
                                                    class=" "
                                                    :model.sync="item.image"
                                                    id="input-file-image"
                                                    label-text="Seleccione Imagen"
                                            ></input-file-image>
                                            <!--<div class="md-form">-->
                                            <!--<input type="text" class="form-control" v-model="item.title" placeholder="Titulo">-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <a @click="addVideo()" class="btn btn-info btn-md">Añadir Video</a>
                                    <!--<p class=""><b class="font-weight-bold text-info">Video</b> Para ingresar un video de Youtube, deberá ingresar el código que se encuentra al final de la URL del video.-->
                                        <!--<br>-->
                                        <!--Ejemplo:-->
                                        <!--<br>https://www.youtube.com/watch?v= <b class="font-weight-bold">a5uQMwRMHcs</b>-->
                                        <!--<br>https://youtu.be/ <b class="font-weight-bold">a5uQMwRMHcs</b></p>-->
                                    <div class="row">
                                        <div class="col-md-4 position-relative" v-for="(item,index) in content.videos" :key="index">
                                            <span @click="deleteVideo(index)" class="badge badge-danger text-white rounded-circle position-absolute" style="top: -10px; right: 0; cursor: pointer; z-index: 11">X</span>
                                            <!--<iframe width="100%" height="200" :src="'https://www.youtube.com/embed/'+item.video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                                            <!--<div class="md-form">-->
                                                <!--<input type="text" class="form-control" v-model="item.video" placeholder="Codigo del video">-->
                                            <!--</div>-->
                                            <input-file-image
                                                    class=" "
                                                    :model.sync="item.video"
                                                    id="input-file-video"
                                                    label-text="Seleccione Video"
                                            ></input-file-image>
                                        </div>
                                    </div>
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

        <!-- EDITFAMILIA -->
        <div class="modal fade" id="editProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Editar Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <fieldset class="m t-5"  v-for="(item,index) in content.producto.text" :key="index">
                            <legend>{{ item.name }}</legend>
                            <div class="row">
                                <div class="md-form col-md-8">
                                    <input type="text" :id="'title2-'+index" class="form-control" placeholder="Titulo" v-model="item.title">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <div class="md-form col-md-4">
                                    <input type="text" :id="'title2-'+index" class="form-control" placeholder="Orden" v-model="item.order">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <div class="md-form col-md-8">
                                    <input type="text" :id="'subtitle-'+index" class="form-control" placeholder="Subtitulo" v-model="item.subtitle">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <!--<div class="md-form col-md-12">-->
                                <!--<input type="text" :id="'metadatos-'+index" class="form-control" placeholder="Metadatos" v-model="item.keyword">-->
                                <!--</div>-->
                                <div class="md-form col-md-12">
                                    <p>Descripcion</p>
                                    <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                                    <jodit-vue v-model="item.text" :id="'texte-'+index"></jodit-vue>
                                </div>
                                <div class="md-form col-md-12">
                                    <p>Aplicaciones</p>
                                    <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                                    <jodit-vue v-model="item.aplicaciones" :id="'aplicacionese-'+index"></jodit-vue>
                                </div>
                                <div class="md-form col-md-12">
                                    <p>Mensajes</p>
                                    <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                                    <jodit-vue v-model="item.mensaje" :id="'mensajee-'+index"></jodit-vue>
                                </div>
                                <!--
                                                                <!--<div class="md-form col-md-6" v-if="item.family_id">-->
                                <!--<h6>Seleccione una Subamilia</h6>-->
                                <!--<select v-model="item.subfamily_id" :id="'subfamily_id-'+index" class="custom-select">-->
                                <!--<option :value="subfamily.id" v-for="subfamily in item.family_id.subfamily">-->
                                <!--{{ subfamily.text.es.title }}-->
                                <!--</option>-->
                                <!--</select>-->
                                <!--</div>-->
                                <div class="md-form col-md-6">
                                    <h6 class=" ">Caracteristicas</h6>
                                    <div class=" ">
                                        <multiselect v-model="content.services_related" :options="content.services" :multiple="true" :custom-label="customLabel" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" track-by="id">
                                            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
                                        </multiselect>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6 class=" ">Productos relacionados</h6>
                                    <div class=" ">
                                        <!--<label class="typo__label">Productos relacionados</label>-->
                                        <multiselect v-model="content.related" :options="content.productos" :multiple="true" :custom-label="customLabel" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" track-by="id">
                                            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
                                        </multiselect>

                                    </div>
                                    <!--<related :model.sync="content.related" :related="content.productos"></related>-->
                                </div>
                                <input-file-image
                                        class=" mt-5"
                                        :model.sync="ficha"
                                        id="input-file-ficha"
                                        label-text="Seleccione Ficha tecnica"
                                ></input-file-image>
                                <div class="col-md-12 mt-5">
                                    <a @click="addImageGallery()" class="btn btn-info btn-md">Añadir Galeria</a>
                                    <div class="row">
                                        <div class="col-md-4 position-relative" v-for="(item,index) in content.images_gallery" :key="index">
                                            <span @click="deleteImageGallery(index)" class="badge badge-danger text-white rounded-circle position-absolute" style="top: -10px; right: 0; cursor: pointer; z-index: 11"">X</span>
                                            <input-file-image
                                                    class=" "
                                                    :model.sync="item.image"
                                                    id="input-file-gallery"
                                                    label-text="Seleccione Imagen"
                                            ></input-file-image>
                                            <!--<div class="md-form">-->
                                            <!--<input type="text" class="form-control" v-model="item.title" placeholder="Titulo">-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <a @click="addImage()" class="btn btn-info btn-md">Añadir Imagen</a>
                                    <div class="row">
                                        <div class="col-md-4 position-relative" v-for="(item,index) in content.images" :key="index">
                                            <span @click="deleteImage(index)" class="badge badge-danger text-white rounded-circle position-absolute" style="top: -10px; right: 0; cursor: pointer; z-index: 11">X</span>
                                            <input-file-image
                                                    class=" "
                                                    :model.sync="item.image"
                                                    id="input-file-image"
                                                    label-text="Seleccione Imagen"
                                            ></input-file-image>
                                            <!--<div class="md-form">-->
                                            <!--<input type="text" class="form-control" v-model="item.title" placeholder="Titulo">-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <a @click="addVideo()" class="btn btn-info btn-md">Añadir Video</a>
                                    <!--<p class=""><b class="font-weight-bold text-info">Video</b> Para ingresar un video de Youtube, deberá ingresar el código que se encuentra al final de la URL del video.-->
                                    <!--<br>-->
                                    <!--Ejemplo:-->
                                    <!--<br>https://www.youtube.com/watch?v= <b class="font-weight-bold">a5uQMwRMHcs</b>-->
                                    <!--<br>https://youtu.be/ <b class="font-weight-bold">a5uQMwRMHcs</b></p>-->
                                    <div class="row">
                                        <div class="col-md-4 position-relative" v-for="(item,index) in content.videos" :key="index">
                                            <span @click="deleteVideo(index)" class="badge badge-danger text-white rounded-circle position-absolute" style="top: -10px; right: 0; cursor: pointer; z-index: 11">X</span>
                                            <!--<iframe width="100%" height="200" :src="'https://www.youtube.com/embed/'+item.video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                                            <!--<div class="md-form">-->
                                            <!--<input type="text" class="form-control" v-model="item.video" placeholder="Codigo del video">-->
                                            <!--</div>-->
                                            <input-file-image
                                                    class=" "
                                                    :model.sync="item.video"
                                                    id="input-file-video"
                                                    label-text="Seleccione Video"
                                            ></input-file-image>
                                        </div>
                                    </div>
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
    import {Money} from 'v-money'
    import Gallery from './../components/GalleryComponent';
    import Price from './../components/MoneyComponent';
    import Related from './../components/RelatedComponent';
    import 'jodit/build/jodit.min.css'
    import JoditVue from 'jodit-vue'
    import InputFileImage from '../components/ImageComponent';
    import Multiselect from 'vue-multiselect'
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
            Related,
            Price,
            Money,
            InputFileImage,
            Multiselect
        },
        data(){
            return{
                content: {
                    lang: [],
                    producto:{},
                    subfamilias: [],
                    familias: [],
                    productos: [],
                    images: [],
                    images_gallery: [],
                    videos: [],
                    services: [],
                    related: [],
                    services_related:[],
                },
                money: {
                    decimal: ',',
                    thousands: '.',
                    prefix: '$',
                    // suffix: '',
                    precision: 2,
                    masked: false /* doesn't work with directive */
                },
                formData: new FormData(),
                ficha:'',
            }
        },
        mounted() {
            console.log(this.content)
            this.getData()
        },
        computed: {
        },
        methods: {
            getData(){
                axios.get(this.urlData).then(res => {
                    // console.log(res)
                    this.content.productos = res.data.productos;
                    this.content.subfamilias = res.data.subfamilias;
                    this.content.familias = res.data.familias;
                    this.content.services = res.data.servicios;
                    //
                    if (res.data.idioma){
                        this.content.lang = res.data.idioma
                    }
                });
            },
            save(){
                console.log(this.content)
                // return false
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
                if (self.content.images_gallery) {
                    Object.keys(self.content.images_gallery).forEach(function(key){

                        let file = self.content.images_gallery[key]
                        if (file && file instanceof File) {
                            self.formData.append('gallery['+key+']', file);
                        }
                        if (typeof file === 'string' || file instanceof String) {
                            self.formData.append('gallery['+key+']', file);
                        }
                        if (typeof file === 'object' || file instanceof Object) {
                            // console.log( file.image)
                            self.formData.append('gallery['+key+'][image]', file.image);
                            // self.formData.append('gallery['+key+'][title]', file.title);
                        }
                    })
                }
                if (self.content.video) {
                    Object.keys(self.content.video).forEach(function(key){

                        let file = self.content.video[key]
                        if (file && file instanceof File) {
                            self.formData.append('video['+key+']', file);
                        }
                        if (typeof file === 'string' || file instanceof String) {
                            self.formData.append('video['+key+']', file);
                        }
                        if (typeof file === 'object' || file instanceof Object) {
                            // console.log( file.image)
                            self.formData.append('video['+key+'][video]', file.video);
                            // self.formData.append('gallery['+key+'][title]', file.title);
                        }
                    })
                }
                self.formData.append('data', JSON.stringify(self.content));
                self.formData.append('seccion', 'vial');
                // console.log(form)
                axios.post(this.urlAdd,self.formData).then(res => {
                    console.log(res)
                    toastr.success('Se creo correctamente')
                    this.getData()
                }).catch(res => console.log(res));
            },
            edit(item){
                let self = this
                this.content.producto = item;
                // if (this.content.familia.text == null){
                //     this.content.familia.text
                // }
                this.content.images = item.file ? item.file : [];
                console.log(self.content);
                // if (this.content.familia.text == null){
                //     this.content.familia.text
                // }
                $('#editProducto').on('hidden.bs.modal', function() {
                    self.content.producto = {};
                    console.log('entar')
                    console.log(self.content);

                }) ;
                // console.log(this.content);
            },
            update(){
                // console.log(this.content.categoria)
                axios.post(this.urlUpdate,this.content).then(res => {
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
            addVideo(){
                this.content.videos.push({
                    video:'',
                    title:'',
                })
            },
            addImage(){
                this.content.images.push({
                    image:{},
                    title:'',
                })
            },
            addImageGallery(){
                this.content.images_gallery.push({
                    image:{},
                    title:'',
                })
            },

            deleteImage(index) {
                this.content.images.splice(index, 1);
            },

            deleteImageGallery(index) {
                this.content.images_gallery.splice(index, 1);
            },

            deleteVideo(index) {
                this.content.videos.splice(index, 1);
            },

            customLabel ({ text, order }) {
                // console.log(text);
                // return `${text.title_es} – ${desc}`
                return `${text.es.title}`
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
