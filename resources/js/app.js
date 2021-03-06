
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// import Vue from 'vue';
// import axios from 'axios';
import Form from './core/Form';

// window.axios = axios;
window.Form = Form;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('adauga-producator', require('./components/AdaugaProducator.vue').default);
Vue.component('editeaza-producator', require('./components/EditeazaProducator.vue').default);
Vue.component('adauga-companie', require('./components/AdaugaCompanie.vue').default);
Vue.component('editeaza-companie', require('./components/EditeazaCompanie.vue').default);
Vue.component('produse-producator', require('./components/ProduseProducator.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Toasted from 'vue-toasted';

Vue.use(Toasted)

// register modal component
Vue.component('modal', {
    template: '#modal-template'
})
const app = new Vue({
    el: '#wrapper'
});
