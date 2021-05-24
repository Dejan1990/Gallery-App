require('./bootstrap');

//window.Vue = require('vue');
import Vue from 'vue'

Vue.component('album', require('./components/AlbumComponent.vue').default);

const app = new Vue({
    el: '#app',
});
