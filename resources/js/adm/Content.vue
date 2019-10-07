<template>
    <div class="col-md-12">
        <div id="carouselExampleIndicators" v-if="content.gallery.length != 0" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" :data-slide-to="index"  v-for="(item,index) in content.gallery" :class="index == 0 ? 'active' : ''"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item" style="height: 400px" :class="index == 0 ? 'active' : ''" v-for="(item,index) in content.gallery">
                    <img :src="createImageURL(item.image)" class="img-fluid" style="height: 400px;">

                    <div class="caption cajap text-white wow fadeInLeft" style="">
                        <div class="  px-3" style="z-index: 1">
                            <div class=" ">
                                <span class="text-white font-weight-bold" style="font-size: 30px; line-height: 1;white-space: pre-line;">{{ item.title }}<br></span>
                            </div>
                            <p class="mt-2" style="white-space: pre-line; font-size: 14px">{{ item.text }}</p><br>
                            <!--<a href="" class="btn bg-white rounded-pill btn-md text-dark my-3">PRODUCTOS</a>-->
                        </div>
                    </div>
                    <div class="carousel-caption d-none d-md-block" style="right: 10%; left:50%;">
                        <textarea v-model="item.title" class="form-control" placeholder="Titulo" rows="2"></textarea>
                        <textarea v-model="item.text" class="form-control" placeholder="Descripción" rows="3"></textarea>
                    </div>
                    <!--                    <jodit-vue-->
                    <!--                        v-model="item.title"-->
                    <!--                        :id="'title-'+index"-->
                    <!--                        :value="item.title"-->
                    <!--                    ></jodit-vue>-->
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <fieldset v-if="content.gallery.length != 0" @dragover="onDropGalleryOver" @drop="onDropGallery">
            <legend>Selecionar imagenes de sliders 1200x400</legend>
            <draggable v-model="content.gallery" class="row  " draggable=".item" @change="log">
                <div class="col-md-3 item" v-for="(item, index) in content.gallery" :key="index">
                    <div class="gallery-item draggable-item" for="inputgallery">
                        <div class="gallery-item-overlay"></div>
                        <div class="gallery-item-container">
                            <img :src="createImageURL(item.image)" alt="" class="img-fluid">
                        </div>
                        <div class="position-absolute" style="top: 0">
                            <button type="button" class="btn btn-danger" @click="deleteFileGallery(index)"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                </div>
                <div slot="footer" class="col-md-3 text-center">
                    <label class="gallery-item" for="inputgallery">
                        <input type="file" id="inputgallery" class="d-none" @change="onFileGallery($event)" multiple>
                        <div class="gallery-item-overlay"></div>
                        <div class="gallery-item-container">
                            <div class="gallery-item-container">
                                                        <div class="text-center">
                                                            <i class="fas fa-upload fa-5x"></i>
                                                            <br>
                                                            Seleccionar
                                                        </div>
                            </div>
                        </div>
                    </label>
                </div>
            </draggable>
        </fieldset>

        <section class="card shadow">
            <div class="card-body">
                <fieldset class="mt-5"  v-for="(item,index) in content.lang " :key="index ">
                    <legend>{{ item.name }}</legend>
                    <div class="md-form" v-if="item.title" >
                        <input type="text" :id="'title-'+index" class="form-control" placeholder="Texto 1" v-model="item.title">
                        <!--<label :for="'title-'+index">Texto</label>-->
                    </div>
                    <div class="md-form"  v-if="item.text">
                        <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                        <jodit-vue v-model="item.text" :id="'text-'+index"></jodit-vue>
                    </div>
                    <div class="md-form" v-if="item.title_2" >
                        <input type="text" :id="'title-'+index" class="form-control" placeholder="Texto 2" v-model="item.title_2">
                        <!--<label :for="'title-'+index">Texto</label>-->
                    </div>
                    <div class="md-form"  v-if="item.text_2">
                        <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                        <jodit-vue v-model="item.text_2" :id="'text_2-'+index"></jodit-vue>
                    </div>
                </fieldset>
                <a @click="addImage()" class="btn btn-info btn-md">Añadir</a>
                <draggable v-model="content.images" class="row  " draggable=".item" @change="log">

                        <div class="col-md-3 item" v-for="(item,index) in content.images" :key="index">
                            <input-file-image
                                    class=" "
                                    :model.sync="item.image"
                                    id="input-file-descarga"
                                    label-text="Seleccione Imagen"
                            ></input-file-image>
                            <div class="md-form">
                                <input type="text" class="form-control" v-model="item.title" placeholder="Titulo">
                            </div>
                            <div class="md-form">
                                <input type="text" class="form-control" v-model="item.link" placeholder="Link">
                            </div>
                        </div>


                </draggable>

                <div class="row mt-5">
                    <div class="col-md-4 " v-for="(item,index) in content.lang " :key="index ">
                        <input-file-image
                                v-if="item.banner != 'undefined'"
                                class="w-100"
                                :model.sync="item.banner"
                                id="input-file-descarga-banner"
                                label-text="Seleccione Imagen"
                        ></input-file-image>
                        <!--<div class="md-form">-->
                            <!--<input type="text" class="form-control" v-model="item.title_banner" placeholder="Titulo">-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a @click="save()" class="btn btn-primary">Guardar</a>
            </div>
        </section>
    </div>
</template>

<script>
    import toastr from 'toastr';
    import draggable from 'vuedraggable'
    import 'jodit/build/jodit.min.css'
    import InputFileImage from '../components/ImageComponent';
    import JoditVue from 'jodit-vue'
    export default {
        props:{
            idioma: Object,
            urlData: '',
            urlAction: '',
        },
        components: {
            JoditVue,
            draggable,
            InputFileImage,
        },
        data(){
            return{
                content: {
                    lang: [],
                    banner: '',
                    order: {},
                    url: {},
                    title: {},
                    subtitle: {},
                    text: {},
                    description: {},
                    images: [],
                    date: '',
                    featured: 0,
                    gallery: [],
                },
                formData: new FormData(),
                languages: {},
                loaded: 0,
                URL: document.__API_URL+'/',
                displayImage: true,

            }
        },
        mounted() {
            // console.log(this.content.gallery)
            this.getData()
        },
        computed: {
        },
        methods: {
            getData(){
                axios.get(this.urlData).then(res => {
                    console.log(res)
                    this.content.gallery = res.data.contenido.slider ? res.data.contenido.slider :[]
                    this.content.images = res.data.contenido.file ? res.data.contenido.file :[]
                    if (res.data.contenido.text != null){
                        this.content.lang = res.data.contenido.text
                        this.content.banner = res.data.contenido.text.es.banner

                    }else{
                        this.content.lang = res.data.idioma
                    }
                });
            },

            addImage(){
              this.content.images.push({
                  image:{},
                  title:'',
                  link:'',

              })
            },
            save(){
                console.log(this.content)
                // return false
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
                            console.log( file.image)
                            self.formData.append('images['+key+'][image]', file.image);
                            self.formData.append('images['+key+'][title]', file.title);
                            self.formData.append('images['+key+'][link]', file.link);
                        }
                    })
                }
                if (self.content.gallery) {
                    Object.keys(self.content.gallery).forEach(function(key){

                        let file = self.content.gallery[key]
                        if (file && file instanceof File) {
                            self.formData.append('gallery['+key+']', file);
                        }
                        if (typeof file === 'string' || file instanceof String) {
                            self.formData.append('gallery['+key+']', file);
                        }
                        if (typeof file === 'object' || file instanceof Object) {
                            console.log( file.image)
                            self.formData.append('gallery['+key+'][image]', file.image);
                            self.formData.append('gallery['+key+'][title]', file.title);
                            self.formData.append('gallery['+key+'][text]', file.text);
                        }
                    })
                }
                self.formData.append('banner', self.content.lang.es.banner);
                self.formData.append('data', JSON.stringify(self.content));
                console.log(self.formData)
                axios.post(this.urlAction,self.formData
                 ).then(res => {
                    toastr.success('Se modifico correctamente')
                    console.log(res)
                });
            },
            onDropGalleryOver(e) {
                var path = e.path || (e.composedPath && e.composedPath())
                e.preventDefault()
                if (e.dataTransfer.effectAllowed != 'move') {
                    path.every(function (element) {
                        if (element.localName == 'fieldset') {
                            element.style.backgroundColor = "#dedede"
                            return false
                        }
                        return true
                    })
                }
            },
            onDropGallery(e) {
                var path = e.path || (e.composedPath && e.composedPath())
                e.preventDefault();
                path.every(function (element) {
                    if (element.localName == 'fieldset') {
                        element.style.backgroundColor = ""
                        return false
                    }
                    return true
                })
                for (let index = 0; index < e.dataTransfer.files.length; index++) {
                    this.content.gallery.push(e.dataTransfer.files[index])
                }
                return true
            },
            log() {
                console.log(this.content.gallery)
            },

            postForm() {

                var self = this
                if (self.content.image) {
                    Object.keys(self.content.image).forEach(function(key){
                        self.formData.append('images['+key+']', self.content.image[key]);
                    })
                }
                if (self.content.gallery) {
                    Object.keys(self.content.gallery).forEach(function(key){
                        let file = self.content.gallery[key]
                        if (file && file instanceof File) {
                            self.formData.append('gallery['+key+']', file);
                        }
                        if (typeof file === 'string' || file instanceof String) {
                            self.formData.append('gallery['+key+']', file);
                        }
                        if (typeof file === 'object' || file instanceof Object) {
                            self.formData.append('gallery['+key+']', file.path);
                        }
                    })
                }
                self.formData.append('data', JSON.stringify(self.content));
                console.log(self.formData)
                // return false
                // axios.post('/home', self.formData).then((response) => {
                //     console.log(response)
                //     var self = this
                //     // setTimeout(function(){
                //     //     window.location.href = self.urlBack
                //     // }, 1000);
                // });
            },

            onFileGallery(e){
                let self = this
                for (let index = 0; index < e.target.files.length; index++) {
                    console.log(self.content.gallery)

                    self.content.gallery.push({
                        image: e.target.files[index],
                        title:'',
                        text:''
                    })
                }
                return true
            },
            createImageURL(file){
                // console.log(file)
                if (file && file instanceof File) {
                    return URL.createObjectURL(file)
                }
                if (typeof file === 'string' || file instanceof String) {
                    return this.URL+file
                }
                if (typeof file === 'object' || file instanceof Object) {
                    return file.url
                }
            },

            deleteFileGallery(index) {
                this.content.gallery.splice(index, 1);
            }
        },
    }
</script>
<style scoped>
    fieldset{
        border: 1px solid #dedede;
        padding: 16px;
    }
    legend{
        font-size: 16px;
        width: auto;
        text-transform: uppercase;
    }

    .cajap {
        position: relative;
        width: 350px;

        /*background-color: #10462F;*/
        display: flex;
        justify-content: center;
        align-items: center;
        /*background-blend-mode: multiply;*/
    }
    .cajap::before {
        /*mix-blend-mode: multiply;*/
        position: absolute;
        content: '';
        /*background-color: #55555 ;*/
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }
    .caption {
        position: absolute;
        /*right: 50%;*/
        /*bottom: 20px;*/
        top: 20%;
        left: 0%;
        /*z-index: unset !important;*/
        padding-top: 20px;
        padding-bottom: 20px;
        color: #fff;

    }
</style>
