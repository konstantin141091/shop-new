<template>
    <button @click="addToCart">
        В корзину
    </button>
</template>

<script>
  import {mapActions} from "vuex/dist/vuex.mjs"

  export default {
    name: "ProductBuyComponent",
    props: {
      product: {
        required: true,
      }
    },
    methods: {
      ...mapActions([
        'ADD_TO_CART'
      ]),
      addToCart() {
        this.ADD_TO_CART(this.product);
      },
    }
  }
</script>

<style scoped>

</style>
