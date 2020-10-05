import './bootstrap';
import Vue from 'vue';
import axios from 'axios'

// require('./bootstrap');
window.Vue = require('vue');


Vue.component('example' , require('./components/ExampleCo.vue').default);
Vue.component('pos' , require('./components/PosComponent.vue').default);

const app = new Vue({
    el : '#app'
});

export default app;
