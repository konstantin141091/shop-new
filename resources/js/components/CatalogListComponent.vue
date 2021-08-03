<template>
    <div class="catalog">
        <Notification
                :messages="messageAddProduct"
        />
        <ProductCardComponent
                v-for="item in products"
                :key="item.id"
                :imageUrl="item.img ? `/storage/images/products/` + item.img : '/storage/images/no_photo.png'"
                :product-data="item"
                :url="url + '/' + item.id"
                @addToCart="addToCart(item)"
        />
    </div>
</template>

<script>
  import ProductCardComponent from './ProductCardComponent'
  import Notification from './Notification'
  import {mapActions} from "vuex/dist/vuex.mjs";

  export default {
    name: "CatalogListComponent",
    components: { ProductCardComponent, Notification },
    props: {
      products: {
        required: true,
      },
      url: {
        required: true,
        type: String,
      }
    },
    data() {
      return {
        items: [],
        messageAddProduct: [],
      }
    },
    methods: {
      ...mapActions([
        'ADD_TO_CART'
      ]),
      addToCart(data) {
        this.ADD_TO_CART(data);
        let timeStamp = Date.now().toLocaleString();
        this.messageAddProduct.unshift(
          {name: 'Товар добавлен в корзину!', id: timeStamp}
        )
      },
    }

  }
</script>

<style lang="scss" scoped>
    .catalog {
        display: flex;
        flex-wrap: wrap;
        column-gap: 3rem;
        row-gap: 3rem;
        &__top {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
        }

        &__title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 3rem;
            text-transform: capitalize;
        }
    }
</style>
