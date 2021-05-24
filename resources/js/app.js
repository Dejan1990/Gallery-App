require('./bootstrap');

//window.Vue = require('vue');
import Vue from 'vue'

Vue.component('album', require('./components/AlbumComponent.vue').default);
Vue.component('index', require('./components/IndexComponent.vue').default);

const app = new Vue({
    el: '#app',
});
