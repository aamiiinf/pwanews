import VueAxios from 'vue-axios';
import axios from 'axios';
import router from './router';

require('./bootstrap');
require("bootstrap-css-only/css/bootstrap.min.css");
require("mdbvue/lib/css/mdb.min.css");
require("@fortawesome/fontawesome-free/css/all.min.css");

window.Vue = require('vue').default;
Vue.use(VueAxios, axios);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    router
});
