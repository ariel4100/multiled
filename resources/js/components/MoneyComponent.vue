<template>
    <div class="col-md- 6  " :class="clase ? clase : 'col- md-6'">
        <div class="md-form">
            <label for="Precio">Precio Unitario</label>
            <money v-model="precio" id="Precio"  class="form-control " style="text-align: right"  v-bind="money"></money>
            <!--<input type="text" name="price" v-model="option.price" class="form-control">-->
        </div>
        <!--<div class="md-form">-->
            <!--<label for="surcharge">Recargo: </label>-->
            <!--<money v-model="surcharge" name="surcharge" id="surcharge"  class="form-control " style="text-align: right"  v-bind="porcentaje"></money>-->
            <!--&lt;!&ndash;<input type="text" name="price" v-model="option.price" class="form-control">&ndash;&gt;-->
        <!--</div>-->
        <!--<div class="md-form">-->
            <!--<p class="m-0 p-0">${{ parseFloat(price) + (parseFloat(price) * (surcharge/100)) }}</p>-->
        <!--</div>-->

    </div>
</template>

<script>
    import {Money} from 'v-money'
    export default {
        props:['precio','clase','recargo'],

        data(){
            return {
                surcharge: parseInt(this.recargo)  ? parseInt(this.recargo) : 0,
                price: this.precio ? this.precio : 0,

                money: {
                    decimal: ',',
                    thousands: '.',
                    prefix: '$',
                    // suffix: '',
                    precision: 2,
                    masked: false /* doesn't work with directive */
                },
                porcentaje: {
                    decimal: ',',
                    thousands: '.',
                    prefix: '',
                    suffix: '%',
                    precision: 0,
                    masked: false /* doesn't work with directive */
                },
            }
        },
        mounted() {
            console.log(this.precio)
        },

        methods:{

        }
    }
</script>
