import Vue from 'vue';
import axios from 'axios';
import store from './store';
import BootstrapVue from 'bootstrap-vue';

/** Bootstrap Vue */
Vue.use(BootstrapVue);

/** Axios */
let meta: HTMLMetaElement | null = document.head.querySelector('meta[name="csrf-token"]');
axios.defaults.headers.common['X-CSRF-TOKEN'] = meta!.content;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**  Vue:  Components */
import components from './components';

/**  Vue: App */
new Vue({ el: '#app', components, store });