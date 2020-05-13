/** Axios */
import axios from 'axios';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

/** Vue  */
import Vue from 'vue';

import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

//import carousel from 'vue-owl-carousel';
//Vue.component('owl-carousel', carousel);

/**  Vue:  Components */
const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => {
    Vue.component(key.split('/').pop().split('.')[0], files(key).default);
});

/**  Vue: App */
const app = new Vue({ el: '#app' });