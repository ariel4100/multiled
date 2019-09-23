<template>
    <span class="">
        {{carrito.length}}
    </span>
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


            }
        },
        components: {

        },
        mounted() {
            console.log(this.carrito.length)
            // let pedidoData = localStorage.getItem("pedidoData")?JSON.parse(localStorage.getItem("pedidoData")):{}
            // axios.get(this.urlData).then((response) => {
            //     this.productos = response.data.productos
            //     // console.log(this.productos)
            //     // this.car = localStorage.getItem("tubulonCar")
            //
            // });

        },
        methods:{

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
                                // localStorage.removeItem('joldencarrito');
                                // setTimeout(function(){
                                //     location.href = "./pedidos";
                                // }, 3000);
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



        },
        computed: {

        },
    }
</script>
<style scoped>

</style>
