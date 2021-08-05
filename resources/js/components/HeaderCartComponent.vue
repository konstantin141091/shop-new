<template>
    <a :href="url">
        <span class="header__cart">
            <img src="/storage/icons/shopping_cart_black.svg" alt="корзина">
            <span class="header__cart-badge">{{ CART.length }}</span>
        </span>
        <span v-show="!mobile" class="header__cart-text">{{ CART_TOTAL_PRICE }}&nbsp;руб</span>
    </a>
</template>

<script>
  import {mapGetters} from "vuex/dist/vuex.mjs";
  export default {
    name: "HeaderCartComponent",
    props: {
      mobile: {
        required: true,
      },
      url: {
        required: true,
        type: String,
      }
    },
    computed: {
      ...mapGetters([
        'CART', 'CART_TOTAL_PRICE'
      ]),
    }
  }
</script>

<style scoped>

</style>
