require('./bootstrap');
window.Vue = require('vue');
import store from './store/index.js';

Vue.component('promo-component', require('./components/PromoComponent.vue').default);
Vue.component('new-arrival-component', require('./components/NewArrivalComponent.vue').default);
Vue.component('catalog-list-component', require('./components/CatalogListComponent.vue').default);
// Vue.component('product-card-component', require('./components/ProductCardComponent.vue').default);

const app = new Vue({
    el: '#app',
    store: new Vuex.Store(store)
});
