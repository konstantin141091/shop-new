<template>

  <div class="product">
    <a :href="url" class="product__img">
      <img :src="imageUrl" :alt="productData.name">
    </a>
    <div class="product__text">
      <a :href="url" class="product__title">{{ productData.name }}, 1 {{ productData.unit }}</a>
      <p class="product__price">{{ productData.price }} руб.</p>
    </div>
    <div class="product__btn">
      <button @click="addToCart">
        В корзину
      </button>
    </div>
  </div>

</template>

<script>
export default {
  name: "ProductCardComponent",
  props: {
    productData: {
      type: Object,
      default: () => {
        return {}
      }
    },
    imageUrl: {
      type: String
    },
    url: {
      required: true,
      type: String,
    }
  },
  methods: {
    addToCart() {
      this.$emit('addToCart', this.productData)
    }
  },
}
</script>

<style lang="scss" scoped>
@import "../../sass/variables";

.product {
  display: flex;
  flex-direction: column;
  border-radius: 10px;
  border: 1px solid #ededed;
  min-width: 200px;
  max-width: 310px;

  height: 350px;
  flex: 1 1 calc(33.33% - 30px);

  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-top-left-radius: inherit;
    border-top-right-radius: inherit;
    //padding: 10px;
  }

  &__img {
    display: block;
    height: 180px;
    margin-bottom: 1.5rem;
    border-top-left-radius: inherit;
    border-top-right-radius: inherit;
  }

  &__text {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding-left: 10px;
    padding-right: 10px;
  }

  &__title {
    font-size: 16px;
    color: $colorText;

    &:hover {
      color: $colorBtn;
    }
  }

  &__price {
    font-size: 2.4rem;
    font-weight: bold;
  }

  &__btn {
    padding: 10px;

    button {
      font-size: 16px;
      cursor: pointer;
      color: #ffffff;
      background-color: $colorBtn;
      width: 100%;
      padding: 10px;
      border-radius: 5px;
    }
  }

}

</style>
