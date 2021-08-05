<template>
    <div class="cart-item">

        <div class="cart-item__description">
            <div class="cart-item__img">
                <img :src="imageUrl" :alt="name">
            </div>
            <div class="cart-item__text">
                <a class="cart-item__name" :href="urlProduct">{{ name }}</a>
                <p class="cart-item__price">{{ price }} руб/{{ unit }}</p>
            </div>
        </div>

        <div class="cart-item__control field-control">
            <div class="field-control__quantity">
                <button class="field-control__btn" @click="decrementItem">-</button>
                <input
                        class="field-control__input"
                        type="number"
                        min="1"
                        max="999"
                        value="1"
                        v-model="quantity"
                        required>
                <button class="field-control__btn" @click="incrementItem">+</button>
            </div>
            <p class="field-control__total">{{ totalPriceProduct }}&nbsp;руб</p>
            <div class="field-control__del">
                <button @click="deleteFromCart">x</button>
            </div>
        </div>
    </div>

</template>

<script>
  import {mapGetters} from "vuex";

  export default {
    name: "CartItem",
    props: {
      name: {
        type: String,
        default: ''
      },
      price: {
        type: Number,
        // default: 0
      },
      unit: {
        type: String,
        default: ''
      },
      quantity: {
        type: Number,
        default: ''
      },
      imageUrl: {
        type: String
      },
      totalPriceProduct: {
        type: Number,
      },
      urlProduct: {
        required: true,
      }
    },
    computed: {
      ...mapGetters([
        'CART'
      ]),
    },
    methods: {
      deleteFromCart() {
        this.$emit('deleteFromCart')
      },
      decrementItem() {
        this.$emit('decrementItem')
      },
      incrementItem() {
        this.$emit('incrementItem')
      }
    }
  }
</script>

<style scoped>

</style>
