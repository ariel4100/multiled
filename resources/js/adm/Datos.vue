<template>
    <div class="row">
        <div class="col s12">
            <div class="row" >
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">LOGOS</h6>
                        </div>
                        <div class="card-body">
                            <a @click="addImage" class="btn btn-info btn-md">Añadir</a>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4" v-for="item in images">
                                    <input-file-image
                                            :model.sync="item.image"
                                            id="input-logo-header"
                                            :label-text="'Seleccione ' +item.title"
                                    ></input-file-image>
                                    <div class="md-form">
                                        <input type="text" class="form-control" v-model="item.title" placeholder="Titulo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row" >
                <div class="col-xl-12 col-lg-12 d-sm-flex align-items-center justify-content-end">
                    <button type="button" @click="save()" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                        <!--<i class="fas fa-save fa-sm text-white-50"></i>-->
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import draggable from 'vuedraggable'
    import toastr from 'toastr';
    import InputFileImage from '../components/ImageComponent';

    export default {
        props: {
            urlData: '',

            urlAction: '',

        },
        components: {
            draggable,
            'input-file-image': InputFileImage
        },
        data(){
            return{
                images: [],
                phones: [],
                emails: [],
                formData: new FormData(),
                languages: {},
                loaded: 1,
                displayImage: true,
            }
        },
        mounted() {
             this.getData()
        },
        methods: {
            getData(){
                axios.get(this.urlData).then(res => {
                    // console.log(res)
                    // this.content.gallery = res.data.contenido.slider ? res.data.contenido.slider :[]
                    this.images = res.data.contenido.file ? res.data.contenido.file :[]
                });
            },
            save() {
                // console.log(this.images)
                var self = this
                if (self.images) {
                    Object.keys(self.images).forEach(function(key){

                        let file = self.images[key]
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

                axios.post(this.urlAction,self.formData
                ).then(res => {
                    toastr.success('Se modifico correctamente')
                    // console.log(res)
                });
            },
            addImage(){
                this.images.push({
                    image:{},
                    title:'',
                })
            },

        }
    }
</script>
<style lang="scss" scoped>
    .draggable-item {
        cursor: move;
    }
    .card-header {
        position: relative;
        .card-header-buttons {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            display: flex;
        }
    }
</style>
