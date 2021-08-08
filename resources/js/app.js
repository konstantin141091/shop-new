require('./bootstrap');
window.Vue = require('vue');
import store from './store/index.js';

Vue.component('promo-component', require('./components/home/PromoComponent.vue').default);
Vue.component('new-arrival-component', require('./components/home/NewArrivalComponent.vue').default);
Vue.component('catalog-list-component', require('./components/CatalogListComponent.vue').default);
Vue.component('product-buy-component', require('./components/ProductBuyComponent.vue').default);
Vue.component('header-cart-component', require('./components/HeaderCartComponent.vue').default);
Vue.component('cart-page-component', require('./components/CartPageComponent.vue').default);
Vue.component('cart-item-list-component', require('./components/CartItemListComponent.vue').default);
Vue.component('order-button-component', require('./components/OrderButtonComponent.vue').default);

//menu
Vue.component('menu-toggle', require('./components/MenuToggle.vue').default);
//footer navigation
Vue.component('spoiler-toggle', require('./components/SpoilerToggle.vue').default);



const app = new Vue({
    el: '#app',
    store: new Vuex.Store(store)
});
