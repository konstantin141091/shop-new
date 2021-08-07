<template>
    <div>
        <div class="basket-item__list">
            <div
                    class="basket-item"
                    v-for="(item, index) in CART"
                    :key="'item' + index"
            >
                <div class="basket-item__img">
                    <img :src="`/storage/images/products/${item.img}`" :alt="item.name">
                </div>
                <p class="basket-item__name">{{ item.name }}</p>
                <p class="basket-item__price">{{ item.quantity }}&nbsp;х&nbsp;<span>{{ item.price }}&nbsp;руб</span></p>
            </div>
        </div>

        <div class="basket-item__info">
            <p>Сумма по товарам</p>
            <p><strong>{{ CART_TOTAL_PRICE }}&nbsp;руб</strong></p>
        </div>

        <div class="basket-item__info">
            <p>Стоимость доставки</p>
            <p><strong>{{ 1000 }}&nbsp;руб</strong></p>
        </div>

        <hr>

        <div class="basket-item__info basket-item__info_total">
            <p>Итого:</p>
            <p><strong>{{ CART_TOTAL_PRICE + 1000 }}&nbsp;руб</strong></p>
        </div>
    </div>
</template>

<script>
  import {mapGetters} from "vuex/dist/vuex.mjs";

  export default {
    name: "CartItemListComponent",
    computed: {
      ...mapGetters([
        'CART', 'CART_TOTAL_PRICE'
      ])
    }
  }
</script>

<style scoped>

</style>
