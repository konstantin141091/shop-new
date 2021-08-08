<template>
    <div>
        <div v-if="!cartList.length">
            <div>
                <p>Ваша корзина пуста</p>
            </div>
        </div>
        <div v-else class="cart__flex">
            <div class="cart__list">
                <CartItem
                        v-for="(item, index) in cartList"
                        :key="item.id"
                        :imageUrl="item.img ? imageUrl + item.img : '/images/no_photo.png'"
                        :name = item.name
                        :price = item.price
                        :unit = item.unit
                        :quantity="item.quantity"
                        :totalPriceProduct="item.totalPriceProduct"
                        :urlProduct = "url_product + '/' + item.id"
                        @deleteFromCart="deleteFromCart(index)"
                        @incrementItem="incrementItem(index)"
                        @decrementItem="decrementItem(index)"
                />
            </div>

            <div class="total">
                <div class="total__price">
                    <span>Итого</span>
                    <span>{{ CART_TOTAL_PRICE }}&nbsp;руб</span>
                </div>
                <a :href="url_order" class="button total__btn" >Оформить заказ</a>
            </div>
        </div>
    </div>
</template>

<script>
  import {mapActions, mapGetters} from "vuex/dist/vuex.mjs";
  import CartItem from "../components/CartItem";

  export default {
    name: "CartPageComponent",
    components: {CartItem},
    props: {
      url_order: {
        required: true,
      },
      url_product: {
        required: true,
      }
    },
    computed: {
      ...mapGetters ([
        'CART', 'CART_TOTAL_PRICE'
      ]),
      cartList() {
        return this.CART
      },
      imageUrl() {
        return `/storage/images/products/`
      },
    },
    methods: {
      ...mapActions([
        'DELETE_FROM_CART_INDEX', 'INCREMENT_TO_PRODUCT_INDEX', 'DECREMENT_TO_PRODUCT_INDEX'
      ]),
      deleteFromCart(index) {
        this.DELETE_FROM_CART_INDEX(index)
      },
      incrementItem(index) {
        this.INCREMENT_TO_PRODUCT_INDEX(index)
      },
      decrementItem(index) {
        this.DECREMENT_TO_PRODUCT_INDEX(index)
      },
    }
  }
</script>

<style lang="scss" scoped>
.total {
  padding: 20px 25px;
  background: #ededed;
  border-radius: 5px;
  width: 300px;

  &__price {
    color: #333333;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 3rem;
  }

  &__btn {
    padding: 12px;
  }
}
</style>
