<template>
    <div class="col-md-12">
        <section class="card shadow">
            <div class="card-body">
                <a @click="addImage()" class="btn btn-info btn-md">Añadir</a>
                <div class="row">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="width: 100px">SECCIÓN</th>
                            <th scope="col">KEYWORDS</th>
                            <th scope="col">DESCRIPCIÓN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!--<div class="col-md-4" v-for="(item,index) in content.images" :key="index">-->
                            <!--<input-file-image-->
                                    <!--class=" "-->
                                    <!--:model.sync="item.image"-->
                                    <!--id="input-file-descarga"-->
                                    <!--label-text="Seleccione Imagen"-->
                            <!--&gt;</input-file-image>-->
                            <!--<div class="md-form">-->
                                <!--<input type="text" class="form-control" v-model="item.title" placeholder="Titulo">-->
                            <!--</div>-->
                        <!--</div>-->
                        <tr v-for="(item,index) in content.images" :key="index">
                            <td>
                                <div class="md-form">
                                    <input type="text" class="form-control" v-model="item.title" placeholder="Sección">
                                </div>
                            </td>
                            <td>
                                <textarea v-model="item.keyword" placeholder="Palabras claves(,) " class="form-control" rows="2"></textarea>
                            </td>
                            <td>
                                <textarea v-model="item.description" placeholder="Descripción" class="form-control" rows="2"></textarea>
                            </td>
                        </tr>

                        </tbody>
                    </table>


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
                config: {},
                content: {
                    lang: [],
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
                displayImage: true,

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
                    this.content.gallery = res.data.contenido.slider ? res.data.contenido.slider :[]
                    this.content.images = res.data.contenido.file ? res.data.contenido.file :[]
                    if (res.data.contenido.text != null){
                        this.content.lang = res.data.contenido.text

                    }else{
                        this.content.lang = res.data.idioma
                    }
                });
            },

            addImage(){
              this.content.images.push({
                  image:{},
                  title:'',
                  keyword:'',
                  description:'',
              })
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
                            console.log( file.image)
                            self.formData.append('images['+key+'][image]', file.image);
                            self.formData.append('images['+key+'][title]', file.title);
                            self.formData.append('images['+key+'][keyword]', file.keyword);
                            self.formData.append('images['+key+'][description]', file.description);
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
                            self.formData.append('gallery['+key+'][keyword]', file.keyword);
                            self.formData.append('gallery['+key+'][description]', file.description);
                        }
                    })
                }
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
                    return file
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
        width: 450px;

        /*background-color: #10462F;*/
        display: flex;
        justify-content: center;
        align-items: center;
        background-blend-mode: multiply;
    }
    .cajap::before {
        mix-blend-mode: multiply;
        position: absolute;
        content: '';
        background-color: #10462F ;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }
    .caption {
        position: absolute;
        right: 50%;
        /*bottom: 20px;*/
        top: 10%;
        left: 15%;
        /*z-index: unset !important;*/
        padding-top: 20px;
        padding-bottom: 20px;
        color: #fff;

    }
</style>
