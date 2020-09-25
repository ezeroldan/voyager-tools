import Vue from 'vue';
import axios from 'axios';
import store from './store';
import BootstrapVue from 'bootstrap-vue';

// @ts-ignore
import OwlCarousel from 'vue-owl-carousel';
Vue.component('owl-carousel', OwlCarousel);

/** Bootstrap Vue */
Vue.use(BootstrapVue, {
    BButton: { variant: 'primary' }
});

// @ts-ignore
import x5GMaps from 'x5-gmaps';
Vue.use(x5GMaps, process.env.MIX_GOOGLE_MAPS_KEY);

import VueSlider from 'vue-slider-component';
Vue.component('VueSlider', VueSlider);

/** Axios */
let meta: HTMLMetaElement | null = document.head.querySelector('meta[name="csrf-token"]');
axios.defaults.headers.common['X-CSRF-TOKEN'] = meta!.content;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**  Vue:  Components */
import components from './components';

/**  Vue: App */
new Vue({ el: '#app', components, store });