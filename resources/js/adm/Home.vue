<template>
    <div class="col-md-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" :data-slide-to="index"  v-for="(item,index) in content.gallery" :class="index == 0 ? 'active' : ''"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item" :class="index == 0 ? 'active' : ''" v-for="(item,index) in content.gallery">
                    <img :src="createImageURL(item.image)" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block bg-success" style="top: 10%;right: 50%;bottom: 50%;">
                        <h5>{{ item.title }}</h5>
                        <h5>{{ item.text }}</h5>
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ item.title }}</h5>
                        <input type="text" class="form-control" v-model="item.title">
                        <textarea v-model="item.text" class="form-control" rows="3"></textarea>
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


        <fieldset  @dragover="onDropGalleryOver" @drop="onDropGallery">
            <legend>Imagenes</legend>
            <draggable v-model="content.gallery" class="row" draggable=".item" @change="log">
                <div class="col-md-3 item" v-for="(item, index) in content.gallery" :key="index">
                    <div class="gallery-item draggable-item" for="inputgallery">
                        <div class="gallery-item-overlay"></div>
                        <div class="gallery-item-container">
                            <img :src="createImageURL(item.image)" alt="">
                        </div>
                        <div class="gallery-item-controls">
                            <button type="button" class="btn btn-danger" @click="deleteFileGallery(index)"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                </div>
                <div slot="footer" class="col-md-3">
                    <label class="gallery-item" for="inputgallery">
                        <input type="file" id="inputgallery" class="d-none" @change="onFileGallery($event)" multiple>
                        <div class="gallery-item-overlay"></div>
                        <div class="gallery-item-container">
                            <div class="gallery-item-container">
                                                        <span class="text-center">
                                                            <i class="fas fa-upload fa-5x"></i>
                                                            <br>
                                                            Seleccionar
                                                        </span>
                            </div>
                        </div>
                    </label>
                </div>
            </draggable>
        </fieldset>
        <button type="button" @click="postForm()" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
            <i class="fas fa-save fa-sm text-white-50"></i>
            Guardar
        </button>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    import 'jodit/build/jodit.min.css'
    import JoditVue from 'jodit-vue'

    export default {
        props: {
            urlData: '',
            urlBack: '',
            urlAction: '',
            formName: '',
        },
        components: {
            draggable,
            JoditVue,
        },
        data(){
            return{
                config: {},
                content: {
                    lang: [
                        'es',
                        'en'
                    ],
                    order: {},
                    url: {},
                    title: {},
                    subtitle: {},
                    text: {},
                    description: {},
                    image: {},
                    date: '',
                    featured: 0,
                    gallery: [],
                },
                formData: new FormData(),
                languages: {},
                loaded: 0,
                displayImage: true,
            }
        },
        created() {
            // this.$nextTick(() => {
            //     axios.get(this.urlData).then((response) => {
            //         this.config  = response.data.config
            //         this.languages = response.data.languages
            //         if (response.data.content != null) {
            //             this.content = response.data.content
            //         }
            //         if (this.content.lang.length == 0) {
            //             this.content.lang = Object.keys(response.data.languages)
            //         }
            //         this.loaded = 1
            //     });
            // });
        },
        methods: {
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
                axios.post('/home', self.formData).then((response) => {
                    console.log(response)
                    var self = this
                    // setTimeout(function(){
                    //     window.location.href = self.urlBack
                    // }, 1000);
                });
            },

            onFileGallery(e){
                for (let index = 0; index < e.target.files.length; index++) {
                    this.content.gallery.push({
                        image: e.target.files[index],
                        title:''
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
                    return file
                }
                if (typeof file === 'object' || file instanceof Object) {
                    return file.url
                }
            },

            deleteFileGallery(index) {
                // this.content.gallery.splice(index, 1);
            }
        }
    }
</script>
<style lang="scss" scoped>
    .custom-file-label {
        height: 100px;
    }
    .custom-file-label::after {
        content: "Seleccione Archivo" !important;
        height: auto !important;
        justify-content: center;
        align-items: center;
        display: flex;
    }
    .custom-file {
        height: 100px !important;
    }
    .gallery-item {
        position: relative;
        width: 100%;
        margin-bottom: 5px;
    }
    .gallery-item-controls {
        position: absolute;
        right: 0;
        top: 0;
    }
    .gallery-item-container{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2px;
        border: solid 1px #CCC;
        img {
            max-width: 100%;
            max-height: 100%;
        }
    }
    .gallery-item-overlay {
        padding-bottom: 100%;
    }
    .draggable-item {
        cursor: move;
    }
</style>
