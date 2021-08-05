require('./bootstrap');
window.Vue = require('vue');
import store from './store/index.js';

Vue.component('promo-component', require('./components/PromoComponent.vue').default);
Vue.component('new-arrival-component', require('./components/NewArrivalComponent.vue').default);
Vue.component('catalog-list-component', require('./components/CatalogListComponent.vue').default);
Vue.component('product-buy-component', require('./components/ProductBuyComponent.vue').default);
Vue.component('header-cart-component', require('./components/HeaderCartComponent.vue').default);

const app = new Vue({
    el: '#app',
    store: new Vuex.Store(store)
});
