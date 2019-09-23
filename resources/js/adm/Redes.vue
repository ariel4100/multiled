<template>
    <div class="row">
        <div class="col s12">

            <div class="row" v-if="loaded == 1">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Redes Sociales</h6>
                            <div class="card-header-buttons">
                                <button type="button" class="btn btn-info" @click="addPhone()">
                                    <i class="fas fa-plus"></i>
                                    Añadir
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <draggable v-model="content.phones" class="row" draggable=".draggable-item" @change="log">
                                <div class="col-sm-12 col-md-6 col-lg-4 draggable-item" v-for="(item, index) in content.phones" :key="index">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset class="position-relative">
                                                <span @click="deletePhone(index)" class="badge badge-danger text-white rounded-circle position-absolute" style="top: 0; right: 0; cursor: pointer;">X</span>
                                                <select class="form-control" v-model="item.type">
                                                    <option value="fac">Facebook</option>
                                                    <option value="ins">Instagram</option>
                                                    <option value="you">Youtube</option>
                                                    <option value="lin">Linkedin</option>
                                                    <option value="twi">Twitter</option>
                                                </select>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text" id="basic-addon3" v-if="item.type == 'fac'">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </div>
                                                        <div class="input-group-text" id="basic-addon3" v-else-if="item.type == 'ins'">
                                                            <i class="fab fa-instagram"></i>
                                                        </div>
                                                        <div class="input-group-text" id="basic-addon3" v-else-if="item.type == 'you'">
                                                            <i class="fab fa-youtube"></i>
                                                        </div>
                                                        <div class="input-group-text" id="basic-addon3" v-else-if="item.type == 'lin'">
                                                            <i class="fab fa-linkedin-in"></i>
                                                        </div>
                                                        <div class="input-group-text" id="basic-addon3" v-else-if="item.type == 'twi'">
                                                            <i class="fab fa-twitter"></i>
                                                        </div>
                                                    </div>
                                                    <input v-model="item.link" type="text" class="form-control" placeholder="www.facebook.com">
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </draggable>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" v-if="loaded == 1">
                <div class="col-xl-12 col-lg-12 d-sm-flex align-items-center justify-content-end">
                    <button type="button" @click="postForm()" class=" btn btn-primary shadow-sm">
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

    import InputFileImage from '../components/ImageComponent';

    export default {
        props: {
            urlData: '',
            urlBack: '',
            urlAction: '',
            formName: '',
        },
        components: {
            draggable,

            'input-file-image': InputFileImage
        },
        data(){
            return{
                content:{
                    phones: [],
                },

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
                    console.log(res)
                    // this.content.gallery = res.data.contenido.slider ? res.data.contenido.slider :[]
                    // this.content.address = res.data.contenido.text.address ? res.data.contenido.text.address :[]
                    this.content.phones = res.data.contenido.text.phones ? res.data.contenido.text.phones :[]
                    // this.content.emails = res.data.contenido.text.emails ? res.data.contenido.text.emails :[]
                });
            },
            postForm() {
                console.log(this.content)
                this.formData.append('data', JSON.stringify(this.content));
                axios.post(this.urlAction,this.formData).then(res => {
                    console.log(res)
                });
            },
            addPhone() {
                this.content.phones.push({
                    type: 'fac',
                    link: ''
                });
            },

            deletePhone(index) {
                this.content.phones.splice(index, 1);
            },

            log() {

            }
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
