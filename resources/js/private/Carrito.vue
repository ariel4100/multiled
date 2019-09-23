<template>
    <div class="container my-5">
        <h5 class="text-muted font-weight-bold  ">REALIZAR COMPRA</h5>
        <h1 class="jolden-color2 font-weight-bold   ">Carrito ({{ Object.keys(carrito).length }})</h1>
        <div class="row justify-content-center my-5">
            <div class="col-md-12 ">
                    <table class="table text-center" style="border-bottom: 3px solid #10462F">
                        <thead >
                        <tr style="background-color: #ECECEC; border-bottom: 3px solid #10462F;">
<!--                            <th class="jolden-color font-weight-bold"></th>-->
                            <th style="vertical-align: middle;" class="jolden-color font-weight-bold">PRODUCTO</th>
                            <th style="vertical-align: middle;" class="jolden-color font-weight-bold">CATEGORÍA</th>
                            <th style="vertical-align: middle; width: 100px" class="jolden-color font-weight-bold">UNIDAD DE VENTA</th>
                            <th style="vertical-align: middle; width: 100px" class="jolden-color font-weight-bold">PRECIO UNITARIO</th>
                            <th style="vertical-align: middle;" class="jolden-color font-weight-bold">IVA</th>
                            <th style="vertical-align: middle; width: 100px" class="jolden-color font-weight-bold">CANTIDAD DE PRODUCTOS</th>
                            <th style="vertical-align: middle;" class="jolden-color font-weight-bold">SUBTOTAL</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr  v-for="(item,index) in carrito" :key="index">
                            <td class="text-center">
                                <img  :src="item.image" alt="" style="width: 100px; height: 100px" class="img-fluid">
                            </td>
                            <td class="font-weight-bold">{{ item.producto }}</td>
                            <td class="font-weight-bold">{{ item.subfamilia }}</td>
                            <td class="font-weight-bold text-center">{{  item.venta ? item.venta : 0  }}</td>
                            <td class="font-weight-bold" >
                                <!--<span v-if="item.currency == 'D'">u$s</span>-->
                                <span>$</span>
                                <!--<span v-if="item.currency == 'E'"></span>-->
                                {{ parseFloat(item.precio).toFixed(2) }}
                            </td>
                            <!--<td style="vertical-align: middle">{{ item.producto }}</td>-->
                            <!--<td style="vertical-align: middle">{{ item.cc }}</td>-->
                            <td class="font-weight-bold">
                                <input type="number" class="form-control text-center" style="width: 100px" v-model="item.cantidad"  :min="item.venta" :step="item.venta">
                            </td>
                            <td class="font-weight-bold" >$ {{ parseFloat(item.precio * item.cantidad).toFixed(2) }}</td>
                            <td>
                                <a @click="deleteProduct(index)" class="border rounded-circle  text-dark"><i class="far fa-times-circle"></i></a>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            <div class="col-md-4 offset-md-8" v-if="carrito.length > 0">

                <hr class="wolf-fondo">
                <div class="d-flex justify-content-between">
                    <h5 class="jolden-color font-weight-bold">Sub Total</h5>
                    <h5 class="font-weight-bold">$  {{ total.toFixed(2) }}</h5>
                </div>
                <div class="d-flex justify-content-between" v-if="cliente && cliente.percentage">
                    <h5 class="jolden-color font-weight-bold">Descuento({{ cliente.percentage }}%)</h5>
                    <h5 class="font-weight-bold">${{ ( (total.toFixed(2)*cliente.percentage/100)).toFixed(2) }}</h5>
                </div>

                <div class="d-flex justify-content-between" v-if="bonificacion && bonificacion.percentage">
                    <h5 class="jolden-color font-weight-bold">Bonificación({{ bonificacion.percentage }}%)</h5>
                    <h5 class="font-weight-bold">${{ ( (total.toFixed(2)*bonificacion.percentage/100)).toFixed(2) }}</h5>
                </div>
                <!--<div  v-if="compra.envio == 'caba'" class="d-flex justify-content-between">-->
                    <!--<h5 class="wolf-color font-weight-bold">Envio</h5>-->
                    <!--<h5 v-if="compra.error != undefined" class="font-weight-bold">$ {{ parseFloat(compra.costoenvio).toFixed(2) }}</h5>-->
                    <!--<h5 v-if="compra.error == undefined" class="font-weight-bold">$ {{ parseFloat(0).toFixed(2) }}</h5>-->
                <!--</div>-->
                <div class="d-flex justify-content-between align-item-center mt-3">
                    <h5 class="jolden-color m-0 font-weight-bold">Total a pagar</h5>
                    <h5 v-if="cliente && cliente.percentage && bonificacion && bonificacion.percentage" class="m-0 text-dark font-weight-bold">$ {{ (total.toFixed(2) - (total.toFixed(2)*bonificacion.percentage/100) - (total.toFixed(2)*cliente.percentage/100)).toFixed(2) }}</h5>
                    <h5 v-else-if="bonificacion && bonificacion.percentage" class="m-0 text-dark font-weight-bold">$ {{ (total.toFixed(2) - (total.toFixed(2)*bonificacion.percentage/100)).toFixed(2) }}</h5>
                    <h5 v-else-if="cliente && cliente.percentage" class="m-0 text-dark font-weight-bold">$ {{ (total.toFixed(2) - (total.toFixed(2)*cliente.percentage/100)).toFixed(2) }}</h5>
                    <h5 v-else  class="m-0 text-dark font-weight-bold">$ {{ total.toFixed(2)  }}</h5>
                </div>
                <div class="d-flex justify-content-between">
                    <!--<p class="text-small m-0 p-0">Precio Final IVA incluido</p>-->
                </div>
                <hr class="distren-fondo">
                <div class="d-flex justify-content-between">
                    <a href="./pedidos" class="btn btn-md rounded-pill p-2 px-4 font-weight-bold" style="border: 1px solid #10462F; font-size: .80rem;">CONTINUAR PEDIDO</a>
                    <a  v-if="loading" class="btn btn-md p-2 px-4 font-weight-bold jolden-fondo rounded-pill text-white" style="font-size: .80rem;"><i class="fas fa-spinner fa-pulse"></i></a>
                    <a @click="confirmOrder" v-else class="btn btn-md p-2 px-4 font-weight-bold jolden-fondo rounded-pill text-white" style="font-size: .80rem;">REALIZAR PEDIDO</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import toastr from 'toastr';
    export default {
        //props:['galeria','familia'],
        props:{
            urlData: String,
            info: Object,
            cliente: Object,
            bonificacion: Object,
        },
        data(){
            return {

                carrito: localStorage.joldencarrito ? JSON.parse(localStorage.joldencarrito) : [],
                compra:{
                    descuento: this.cliente && this.cliente.percentage ? this.cliente.percentage : 0,
                    bonificacion: this.bonificacion && this.bonificacion.percentage ? this.bonificacion.percentage : 0,
                    total: 0,
                },
                loading:false,
                pageNumber: 0,
                car: {},

                inputSearch: '',

            }
        },
        components: {

        },
        mounted() {
            console.log(this.bonificacion)
            // let pedidoData = localStorage.getItem("pedidoData")?JSON.parse(localStorage.getItem("pedidoData")):{}
            // axios.get(this.urlData).then((response) => {
            //     this.productos = response.data.productos
            //     // console.log(this.productos)
            //     // this.car = localStorage.getItem("tubulonCar")
            //
            // });

        },
        methods:{
            calcularEnvio(){
                // console.log(this.compra)
                axios.post(this.urlData,{'compra':this.compra}).then((response) => {
                    this.compra.costoenvio = response.data.price != undefined ? response.data.price : 0
                    this.compra.error = response.data.price != undefined ? response.data.price : undefined
                    console.log(this.compra)
                    // this.car = localStorage.getItem("tubulonCar")
                });
                // console.log('calculo')
            },
            confirmOrder(){
                this.$swal({
                    title: 'Estas seguro de realizar el pedido?',
                    // text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        // console.log(this.compra)
                        localStorage.setItem('joldencarrito', JSON.stringify(this.carrito));
                        // localStorage.setItem('compra', JSON.stringify(this.compra));

                        let mostrat = []
                        mostrat = JSON.parse(localStorage.joldencarrito)
                        console.log(mostrat)


                        axios.post(this.urlData,{carrito: this.carrito,compra: this.compra}).then(res => {
                            console.log(res)
                            this.loading = false;

                            if(res.data == 1){
                                // console.log('entra aca')
                                this.$swal({
                                    type: 'success',
                                    title: 'Compra realizado correctamente',
                                    showConfirmButton: false,
                                    timer: 3500
                                })
                                localStorage.removeItem('joldencarrito');
                                setTimeout(function(){
                                    location.href = "./mi-cuenta";
                                }, 3000);
                            }

                        }).catch(e => {
                            // console.log('document.location', this.url);
                            this.loading = false;
                            // console.log(e);
                        });
                    } else {
                        // this.$swal({
                        //     title: 'Custom animation with Animate.css',
                        //     animation: false,
                        //     customClass: {
                        //         popup: 'animated  tada'
                        //     }
                        // })
                    }
                })


            },
            deleteProduct: function (index) {
                //console.log(index);
                this.carrito.splice(index, 1);
                localStorage.setItem('joldencarrito', JSON.stringify(this.carrito));
                let ver = JSON.parse(localStorage.joldencarrito);
                console.log(ver);
                location.reload()
                // toastr.success('Have fun storming the castle!', 'Miracle Max Says')
                // if (this.carrito.length === 0)
                //     this.addCarrito()

            },
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
            total: function() {
                if (!this.carrito) {
                    return 0;
                }
                let costo = 0
                if (this.compra.envio == 'caba')
                {
                    costo = parseFloat(this.compra.costoenvio)
                }
                let self = this
                return this.carrito.reduce(function (total, value) {
                    // return  console.log(value)

                    self.compra.total = total + (parseFloat(value.precio) * parseInt(value.cantidad)) + costo

                    return total + (parseFloat(value.precio) * parseInt(value.cantidad))
                    // return total + Number(value.total);
                }, 0);
            },

        },
    }
</script>
<style scoped>

</style>
