<template>
    <a href="/">
        <span class="header__cart">
            <img src="/storage/icons/shopping_cart_black.svg" alt="корзина">
            <span class="header__cart-badge">{{ CART.length }}</span>
        </span>
        <span v-show="!mobile" class="header__cart-text">{{ TOTAL_PRICE_CART }}&nbsp;руб</span>
    </a>

<!--    <a href="/">-->
<!--                                <span class="header__cart">-->
<!--                                    <img src="{{ asset('/storage/icons/shopping_cart_black.svg') }}" alt="корзина">-->
<!--                                    <span class="header__cart-badge">5</span>-->
<!--                                </span>-->
<!--    </a>-->
</template>

<script>
  import {mapGetters} from "vuex/dist/vuex.mjs";
  export default {
    name: "HeaderCartComponent",
    props: {
      mobile: {
        required: true,
      }
    },
    computed: {
      ...mapGetters([
        'CART', 'TOTAL_PRICE_CART'
      ]),
    }
  }
</script>

<style scoped>

</style>
