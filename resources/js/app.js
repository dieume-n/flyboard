require('./bootstrap');

window.Vue = require('vue');

import VModal from 'vue-js-modal';

Vue.use(VModal);

Vue.component('new-project-modal', require('./components/NewProjectModal.vue').default)


const app = new Vue({
    el: '#app'
});
