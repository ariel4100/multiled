<template>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Search form -->
                <div class="input-group md-form pl-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text jolden-fondo  " id="basic-text1"><i class="fas fa-search text-white"
                                                                        aria-hidden="true"></i>
                        </span>
                    </div>
                    <input class="form-control my-0 py-1" type="text"  v-model="inputSearch" placeholder="Buscar por codigo,nombre,categoria..." aria-label="Search">
                </div>
                <!--<form class=" md-form  active-cyan-2 mt-2">-->
                    <!--<input class="form-control" v-model="inputSearch" type="text" placeholder="Buscar por nombre o marca"-->
                           <!--aria-label="Search">-->
                    <!--<i class="fas fa-search" aria-hidden="true"></i>-->
                <!--</form>-->
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-12">
                <table class="table  text-center">
                    <thead class="wolf-color" >
                    <tr style="background-color: #ECECEC; border-bottom: 3px solid #10462F;">
                        <th style="vertical-align: middle;" class="jolden-color font-weight-bold">IMAGEN</th>
                        <th style="vertical-align: middle;" class="jolden-color font-weight-bold">PRODUCTO</th>
                        <th style="vertical-align: middle;" class="jolden-color font-weight-bold">CATEGORÍA</th>
                        <th style="vertical-align: middle; width: 100px" class="jolden-color font-weight-bold">UNIDAD DE VENTA</th>
                        <th style="vertical-align: middle; width: 100px" class="jolden-color font-weight-bold">PRECIO UNITARIO</th>
                        <th style="vertical-align: middle;" class="jolden-color font-weight-bold">IVA</th>
                        <th style="vertical-align: middle; width: 100px" class="jolden-color font-weight-bold">CANTIDAD DE PRODUCTOS</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr   v-for="(item,index) in filtered" :key="index">
                        <td class="text-center">
                            <img  :src="item.image" alt="" style="width: 100px; height: 100px" class="img-fluid">
                        </td>
                        <td class="jolden-color font-weight-bold">{{ item.producto }}</td>
                        <td class="font-weight-bold">{{ item.subfamilia }}</td>
                        <td class="font-weight-bold">
                            {{  item.venta }}
                        </td>
                        <td class="font-weight-bold" >
                            <!--<span v-if="item.currency == 'D'">u$s</span>-->
                            <span>$</span>
                            <!--<span v-if="item.currency == 'E'"></span>-->
                            {{ parseFloat(item.precio).toFixed(2) }}
                        </td>
                        <!--<td style="vertical-align: middle">{{ item.producto }}</td>-->
                        <!--<td style="vertical-align: middle">{{ item.cc }}</td>-->
                        <td class="font-weight-bold">{{ item.iva ? item.iva+'%' : '' }}</td>
                        <td class="d-flex">
<!--                            <integer-plusminus></integer-plusminus>-->
<!--                            <a @click="decrement(item)" class="btn p-2 bg-info">-</a>-->
                            <input type="number" class="form-control text-center" style="width: 100px" v-model="item.cantidad"  :min="item.venta" :step="item.venta">
<!--                            <a @click="increment(item)" class="btn p-2 bg-info">+</a>-->
                        </td>
                        <td>
                            <a  @click="addProduct(item)" class="btn btn-md font-weight-bold rounded-pill jolden-fondo text-white">AÑADIR AL CARRITO</a>
                            <!--<a v-else href="contacto" class="btn btn-md wolf-color btn-block text-white" style="border: 2px solid #C60101;">CONSULTAR</a>-->
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import toastr from 'toastr';
    // import  IntegerPlusminus  from 'vue-integer-plusminus';
    export default {
        //props:['galeria','familia'],
        props:{
            urlData: String,
            productos: Array,
        },
        data(){
            return {


                discounts: [],
                // productos: [],

                pageNumber: 0,
                car: {},

                inputSearch: '',

            }
        },
        components: {
            // IntegerPlusminus,
        },
        mounted() {
            // console.log(this.productos)
            // let pedidoData = localStorage.getItem("pedidoData")?JSON.parse(localStorage.getItem("pedidoData")):{}
            // axios.get(this.urlData).then((response) => {
            //     this.productos = response.data.productos
            //     // console.log(this.productos)
            //     // this.car = localStorage.getItem("tubulonCar")
            //
            // });
            // if (
            //     Object.keys(pedidoData).length == 0 ||
            //     (((new Date() - new Date(pedidoData.updated_at))/1000)/60) > 0.001) {
            //     console.log('consulto')
            //     axios.get(this.urlData).then((response) => {
            //         console.log(response)
            //         this.productos = response.data.productos
            //         // this.car = localStorage.getItem("tubulonCar")
            //
            //     });
            // }
        },
        methods:{
            decrement(item){

            },
            increment(item){
                let inc
                item.cantidad += item.venta
                console.log(item.cantidad)
                // return inc
            },
            addProduct(item){
                let carrito = []
                let new_id = true

                // console.log(this.productos.qty)
                if (item.cantidad > 0){
                if (localStorage.joldencarrito){
                    carrito = JSON.parse(localStorage.joldencarrito);
                }
                if (carrito.length)
                {
                    carrito.filter(cart => {
                        // console.log(cart)
                        if (cart && cart.id == item.id) {
                            cart.cantidad = item.cantidad
                            cart.precio = item.precio
                            localStorage.setItem('joldencarrito', JSON.stringify(carrito));
                            new_id = false
                        }
                    });
                }else{
                    new_id = true
                }
                // console.log(new_id)
                if (new_id){
                    carrito.push(item);
                    localStorage.setItem('joldencarrito', JSON.stringify(carrito));
                }
                location.reload()
                    toastr.success('Agregado al carrito',item.producto)
                    console.log(JSON.parse(localStorage.joldencarrito))
                }else{
                    toastr.warning('Agregue algun producto')
                }
                // localStorage.setItem('wolfcarrito', JSON.stringify(carrito));
                // console.log(JSON.parse(localStorage.wolfcarrito))
            }

            // increase(item) {
            //
            //     console.log(item)
            //     this.productos[item].qty++
            //  /*   self.timerInterval = setTimeout(() => {
            //         self.timerInterval = setInterval(function(){
            //             self.alterCar(item, parseInt(cant))
            //         }, 200)
            //     }, 500)*/
            // },
            // decrease(item) {
            //
            //     // self.timerInterval = setTimeout(() => {
            //     //     self.timerInterval = setInterval(function(){
            //     //         self.alterCar(item, -parseInt(cant))
            //     //     }, 200)
            //     // }, 700)
            // },

        },
        computed: {
            filtered() {
                return this.productos.filter(item => {
                    // console.log(item)
                    // let parameters = this.inputSearch.toLowerCase().split(' ')
                    // let match = []
                    // parameters.forEach(function (parameter) {
                    //     match.push(String(Object.keys(item)).toLowerCase().includes(parameter))
                    // })
                    // return match.every((val) => {
                    //     return val == true
                    // })
                    return String(item.producto).toLowerCase().includes(this.inputSearch.toLowerCase())||
                        (item.code ? item.code : '').toLowerCase().includes(this.inputSearch.toLowerCase()) ||
                        //item.c.includes(this.search.toLowerCase()) ||
                        String(item.precio).toLowerCase().includes(this.inputSearch.toLowerCase());

                }).slice(0, 25)
            }
        },
    }
</script>
<style scoped>

</style>
