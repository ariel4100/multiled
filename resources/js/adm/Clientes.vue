<template>
    <section class=" ">

        <button type="button" @click="cliente = {}" class="btn btn-primary mx-0" data-toggle="modal" data-target="#addCliente">
            Añadir
        </button>

        <!-----------TABLA DE CLIENTES------------->
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
            <tr v-for="(item,index) in clientes">
                <td>{{ item.name }}</td>
                <td>{{ item.username }}</td>
                <td>{{ item.email }}</td>
                <td>
                    <a @click="edit(item)" class="btn btn-warning" data-toggle="modal" data-target="#addCliente"><i class="fas fa-edit"></i></a>
                    <a @click="destroy(item)"  class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            </tbody>
        </table>


        <!-- ADDCLIENTE -->
        <div class="modal fade" id="addCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <fieldset class="m t-5" >
                            <legend></legend>
                            <div class="row">
                                <div class="md-form col-md-6">
                                    <input type="text"  class="form-control" placeholder="Nombre" v-model="cliente.name">
                                    <!--<label :for="'title-'+index">Texto</label>-->
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text" class="form-control" placeholder="Apellido" v-model="cliente.surname">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text" class="form-control" placeholder="Nombre de Usuario" v-model="cliente.username">
                                </div>

                                <div class="md-form col-md-6">
                                    <input type="password" class="form-control" placeholder="Contraseña" v-model="cliente.password">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="email" class="form-control" placeholder="Email" v-model="cliente.email">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text" class="form-control" placeholder="Provincia" v-model="cliente.province">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text" class="form-control" placeholder="Localidad" v-model="cliente.location">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text" class="form-control" placeholder="Dirrección" v-model="cliente.address">
                                </div>
                                <div class="md-form col-md-6">
                                    <input type="text" class="form-control" placeholder="Session" v-model="cliente.session">
                                </div>

                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">vencimiento Iliminato</label>
                                    </div>
                                </div>
                                <div class="md-form col-md-6">
                                    <h6>Tipo de Cliente</h6>
                                    <select v-model="cliente.tipo" :id="'tipo-'" class="custom-select">
                                        <option value="mayorista">Mayorista</option>
                                        <option value="minorista">Minorista</option>
                                    </select>
                                </div>
                                <div class="md-form col-md-6">
                                    <h6>Seleccione un vendedor</h6>
                                    <select v-model="cliente.seller_id"   class="custom-select">
                                        <option :value="item.id" v-for="item in sellers">{{ item.name }}</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="md-form col-md-4">
                                            <h6>Seleccione un Descuento</h6>
                                            <select v-model="cliente.discount_id"   class="custom-select">
                                                <option :value="item.id" v-for="item in discounts">{{ item.percentage }}%</option>
                                            </select>
                                        </div>
                                        <div class="md-form col-md-4">
                                            <h6>Seleccione una bonificacion</h6>
                                            <select v-model="cliente.bonus_id"   class="custom-select">
                                                <option :value="item.id" v-for="item in bonuses">{{ item.percentage }}%</option>
                                            </select>
                                        </div>
                                        <div class="md-form col-md-4">
                                            <h6>Seleccione un Precio de lista</h6>
                                            <select v-model="cliente.price_list"  class="custom-select">
                                                <option :value="item" v-for="item in prices">{{ item.toUpperCase() }}</option>
                                            </select>
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
                cliente:{
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
                    seller_id:'',
                    discount_id:'',
                    bonus_id:'',
                    price_list:'',
                    password_expiration:'',
                    tipo:''
                },
                clientes: [],
                discounts: [],
                sellers: [],
                bonuses: [],
                prices: [],
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
                    console.log(res)

                    this.clientes = res.data.clientes;
                    this.sellers = res.data.vendedores;
                    this.prices = res.data.precios;
                    this.discounts = res.data.descuento;
                    this.bonuses = res.data.bonus;
                    //
                    if (res.data.idioma){
                        this.content.lang = res.data.idioma
                    }
                });
            },
            save(){
                // console.log(this.cliente)
                axios.post(this.urlAdd,this.cliente).then(res => {
                    console.log(res)
                    toastr.success('Se creo correctamente')
                    this.getData()
                }).catch(res => console.log(res));
            },
            edit(item){
                this.cliente = item;
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
