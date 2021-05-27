require('./bootstrap');

//window.Vue = require('vue');
import Vue from 'vue'

Vue.component('album', require('./components/AlbumComponent.vue').default);
Vue.component('index', require('./components/IndexComponent.vue').default);
Vue.component('edit', require('./components/EditComponent.vue').default);
Vue.component('upload', require('./components/UploadComponent.vue').default);
Vue.component('follow', require('./components/FollowComponent.vue').default);
Vue.component('avatar', require('./components/AvatarComponent.vue').default);
Vue.component('bg', require('./components/BackgroundPictureComponent.vue').default);

const app = new Vue({
    el: '#app',
});
