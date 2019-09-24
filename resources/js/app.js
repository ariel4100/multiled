/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import es from 'vuetify/es5/locale/es'
import Vuetify from 'vuetify'
// const opts = { ... }
Vue.use(Vuetify)



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//ADM
Vue.component('form-component', require('./adm/Content.vue').default);
Vue.component('metadatos', require('./adm/Metadatos.vue').default);
Vue.component('contacto-component', require('./adm/Contacto.vue').default);
Vue.component('categoria', require('./adm/Categoria.vue').default);
Vue.component('novedades', require('./adm/Novedades.vue').default);
Vue.component('familia', require('./adm/Familia.vue').default);
Vue.component('productos', require('./adm/Productos.vue').default);
Vue.component('servicios', require('./adm/Servicios.vue').default);
Vue.component('descargas', require('./adm/Descargas.vue').default);
Vue.component('clientes', require('./adm/Clientes.vue').default);
Vue.component('datos', require('./adm/Datos.vue').default);
Vue.component('redes', require('./adm/Redes.vue').default);
Vue.component('proyectos', require('./adm/Proyectos.vue').default);

//PRIVATE
Vue.component('carrito', require('./private/Carrito.vue').default);
Vue.component('pedidos', require('./private/Pedidos.vue').default);
Vue.component('count', require('./private/Count').default);

Vue.component('usuario', require('./adm/Usuarios').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        lang: {
            locales: { es },
            current: 'es',
        },
    })
});
