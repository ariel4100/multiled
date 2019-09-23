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
                <th scope="col">Familia</th>
                <th scope="col">Subfamilia</th>
                <th scope="col">Orden</th>
                <th style="width: 200px">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in content.productos">
                <td>{{ item.text != null ? item.text.es.title : null }}</td>
                <td>{{ item.family != null ? item.family.text.es.title : null }}</td>
                <td>{{ item.subfamily != null ? item.subfamily.text.es.title : null }}</td>
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
                                <div class="md-form col-md-6">
                                    <input type="number" :id="'code-'+index" class="form-control" placeholder="Codigo del producto" v-model="item.code">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="number" :id="'venta-'+index" class="form-control" placeholder="Unidad de venta" v-model="item.venta">
                                </div>
                                <!--<div class="md-form col-md-6">-->
                                    <!--<money v-model="item.precio" id="Precio"  class="form-control " style="text-align: right"  v-bind="money"></money>-->
                                <!--</div>-->

                                <div class="md-form col-md-12">
                                    <input type="text" :id="'metadatos-'+index" class="form-control" placeholder="Metadatos" v-model="item.keyword">
                                </div>
                                <div class="md-form col-md-12">
                                    <p>Descripcion</p>
                                <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                                    <jodit-vue v-model="item.text" :id="'text-'+index"></jodit-vue>
                                </div>
                                <div class="md-form col-md-12">
                                    <p>Caracteristicas</p>
                                    <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                                    <jodit-vue v-model="item.caracteristicas" :id="'caracteristicas-'+index"></jodit-vue>
                                </div>

<!--                                <div class="md-form col-md-6">-->
<!--                                    <input type="text" :id="'venta-'+index" class="form-control" placeholder="Unidad de venta" v-model="item.venta">-->
<!--                                </div>-->
                                <div class="md-form col-md-6">
                                    <h6>Seleccione una Familia</h6>
                                    <select v-model="item.family_id" :id="'family_id-'+index" class="custom-select">
                                        <option :value="family" v-for="family in content.familias">
                                            {{ family.text.es.title }}
                                        </option>
                                    </select>
                                </div>
                                <div class="md-form col-md-6" v-if="item.family_id">
                                    <h6>Seleccione una Subamilia</h6>
                                    <select v-model="item.subfamily_id" :id="'subfamily_id-'+index" class="custom-select">
                                        <option :value="subfamily.id" v-for="subfamily in item.family_id.subfamily">
                                            {{ subfamily.text.es.title }}
                                        </option>
                                    </select>
                                </div>
                                <div class="md-form col-md-6">
                                    <h6>Seleccione una Marca</h6>
                                    <select v-model="item.brand_id" :id="'brand_id-'+index" class="custom-select">
                                        <option :value="brand.text.name" v-for="brand in content.brands">
                                            {{ brand.text.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class=" ">
                                        <label class="typo__label">Productos relacionados</label>
                                        <multiselect v-model="content.related" :options="content.productos" :multiple="true" :custom-label="customLabel" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" track-by="id">
                                            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
                                        </multiselect>

                                    </div>
                                </div>
                                <div class="md-form col-md-4 d-flex justify-content-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" v-model="item.news" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Novedades</label>
                                    </div>
                                </div>
                                <div class="md-form col-md-4 d-flex justify-content-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" v-model="item.featured" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Destacado</label>
                                    </div>
                                </div>
                                <div class="md-form col-md-4 d-flex justify-content-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" v-model="item.new" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Nuevo</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5">
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
                                <div class="md-form col-md-6">
                                    <input type="number" :id="'code-'+index" class="form-control" placeholder="Codigo del producto" v-model="item.code">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="number" :id="'venta-'+index" class="form-control" placeholder="Unidad de venta" v-model="item.venta">
                                </div>
                                <!--<div class="md-form col-md-6">-->
                                <!--<money v-model="item.precio" id="Precio"  class="form-control " style="text-align: right"  v-bind="money"></money>-->
                                <!--</div>-->

                                <div class="md-form col-md-12">
                                    <input type="text" :id="'metadatos2-'+index" class="form-control" placeholder="Metadatos" v-model="item.keyword">
                                </div>
                                <div class="md-form col-md-12">
                                    <p>Descripcion</p>
                                    <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                                    <jodit-vue v-model="item.text" :id="'text12-'+index"></jodit-vue>
                                </div>
                                <div class="md-form col-md-12">
                                    <p>Caracteristicas</p>
                                    <!--<input type="text" class="d-none" v-model="item.text = 's'">-->
                                    <jodit-vue v-model="item.caracteristicas" :id="'caracteristicas2-'+index"></jodit-vue>
                                </div>
                                <!--<div class="md-form col-md-6">-->
                                    <!--<h6>Tipo de Cliente</h6>-->
                                    <!--<select v-model="item.tipo" :id="'tipo-'+index" class="custom-select">-->
                                        <!--<option value="mayorista">Mayorista</option>-->
                                        <!--<option value="minorista">Minorista</option>-->
                                    <!--</select>-->
                                <!--</div>-->
<!--                                <div class="md-form col-md-6">-->
<!--                                    <input type="text" :id="'venta-'+index" class="form-control" placeholder="Unidad de venta" v-model="item.venta">-->
<!--                                </div>-->
                                <div class="md-form col-md-6">
                                    <h6>Seleccione una Familia</h6>
                                    <select v-model="item.family_id" :id="'family_id2-'+index" class="custom-select">
                                        <option :value="family" v-for="family in content.familias">
                                            {{ family.text.es.title }}
                                        </option>
                                    </select>
                                </div>
                                <div class="md-form col-md-6" v-if="item.family_id">
                                    <h6>Seleccione una Subamilia</h6>
                                    <select v-model="item.subfamily_id" :id="'subfamily_id-'+index" class="custom-select">
                                        <option :value="subfamily.id" v-for="subfamily in item.family_id.subfamily">
                                            {{ subfamily.text.es.title }}
                                        </option>
                                    </select>
                                </div>
                                <div class="md-form col-md-6">
                                    <h6>Seleccione una Marca</h6>
                                    <select v-model="item.brand_id" :id="'brand_id-'+index" class="custom-select">
                                        <option :value="brand.text.name" v-for="brand in content.brands">
                                            {{ brand.text.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class=" ">
                                        <label class="typo__label">Productos relacionados</label>
                                        <multiselect v-model="content.related" :options="content.productos" :multiple="true" :custom-label="customLabel" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="" selectLabel="Haga click para seleccionar" deselectLabel="Haga click para eliminar" selectedLabel="seleccionado" track-by="id">
                                            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">opciones seleccionadas {{ values.length }}</span></template>
                                        </multiselect>

                                    </div>
                                    <!--<related :model.sync="content.related" :related="content.productos"></related>-->
                                </div>
                                <div class="md-form col-md-4 d-flex justify-content-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" v-model="item.news" id="customCheck12">
                                        <label class="custom-control-label" for="customCheck12">Novedades</label>
                                    </div>
                                </div>
                                <div class="md-form col-md-4 d-flex justify-content-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" v-model="item.featured" id="customCheck22">
                                        <label class="custom-control-label" for="customCheck22">Destacado</label>
                                    </div>
                                </div>
                                <div class="md-form col-md-4 d-flex justify-content-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" v-model="item.new" id="customCheck32">
                                        <label class="custom-control-label" for="customCheck32">Nuevo</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5">
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
                    brands: [],
                    related: [],
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
                    this.content.brands = res.data.marcas;
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
                self.formData.append('data', JSON.stringify(self.content));
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
            addImage(){
                this.content.images.push({
                    image:{},
                    title:'',
                })
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
