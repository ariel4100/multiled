<template>
    <section class=" ">
        
        <button type="button" @click="vendedor = {}" class="btn btn-primary mx-0" data-toggle="modal" data-target="#addVendedor">
            Añadir
        </button>

        <!-----------TABLA DE VENDEDORES------------->
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <!--<th scope="col">#</th>-->
                <th scope="col">Name</th>
                <th scope="col">Usuario</th>
                <th scope="col">Email</th>
                <th style="width: 200px">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in vendedores">
                <td>{{ item.name }}</td>
                <td>{{ item.username }}</td>
                <td>{{ item.email }}</td>
                <td>
                    <a @click="edit(item)" class="btn btn-warning" data-toggle="modal" data-target="#addVendedor"><i class="fas fa-edit"></i></a>
                    <a @click="destroy(item)"  class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            </tbody>
        </table>


        <!-- ADDVENDEDOR -->
        <div class="modal fade" id="addVendedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Vendedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <fieldset class="m t-5" >
                            <legend></legend>
                            <div class="row">
                                <div class="md-form col-md-6">
                                    <input type="text"  class="form-control" placeholder="Nombre" v-model="vendedor.name">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text" class="form-control" placeholder="Apellido" v-model="vendedor.surname">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text" class="form-control" placeholder="Nombre de Usuario" v-model="vendedor.username">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="password" class="form-control" placeholder="Contraseña" v-model="vendedor.password">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="email" class="form-control" placeholder="Email" v-model="vendedor.email">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text" class="form-control" placeholder="Provincia" v-model="vendedor.province">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text" class="form-control" placeholder="Localidad" v-model="vendedor.location">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text" class="form-control" placeholder="Dirrección" v-model="vendedor.address">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text" class="form-control" placeholder="Session" v-model="vendedor.session">
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

                lang: [],
                vendedor:{
                    name:'',
                    surname:'',
                    username:'',
                    password:'',
                    email:'',
                    location:'',
                    province:'',
                    address:'',
                    date:'',
                    session:'',
                    password_expiration:'',
                },
                vendedores: [],

            }
        },
        mounted() {
            // console.log(this.clientes)
            this.getData()
        },
        computed: {
        },
        methods: {
            getData(){
                axios.get(this.urlData).then(res => {
                    // console.log(res)
                    this.vendedores = res.data.vendedores;
                    //
                    if (res.data.idioma){
                        this.content.lang = res.data.idioma
                    }
                });
            },
            save(){
                // console.log(this.cliente)
                axios.post(this.urlAdd,this.vendedor).then(res => {
                    console.log(res)
                    toastr.success('Se creo correctamente')
                    this.getData()
                }).catch(res => console.log(res));
            },
            edit(item){
                this.vendedor = item;
            },
            destroy(item){
                // console.log(item)
                axios.post(this.urlDestroy,item).then(res => {
                    console.log(res)
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