<template>
    <div class="new-arrival">
        <div>
            <Notification
                    v-if="messages.length"
                    :messages="messages"
            />
            <div class="new-arrival__head">
                <h2 class="new-arrival__title">Новое поступление</h2>
                <div class="new-arrival__arrows">
                    <button @click="prevSlide" class="btn-prev" :class="{disabled: isDisabled}"
                            :style="{background: 'url(\'/storage/icons/arrow-left.svg\') 0 0 / 100% no-repeat'}">🠐
                    </button>
                    <button @click="nextSlide" class="btn-next"
                            :style="{background: 'url(\'/storage/icons/arrow-right.svg\') 0 0 / 100% no-repeat'}">🠒
                    </button>
                </div>
            </div>

            <VueSlickCarousel v-bind="newProductsSliderSettings" ref="slider">
                <ProductCardComponent
                        v-for="item in products"
                        :key="'new-product-' + item.id"
                        :product-data="item"
                        :image-url="item.img ? imageUrl + item.img : '/storage/images/no_photo.png'"
                        :url="url + '/' + item.id"
                        @addToCart="addToCart"
                />
            </VueSlickCarousel>
        </div>
    </div>
</template>

<script>
  import VueSlickCarousel from 'vue-slick-carousel'
  import 'vue-slick-carousel/dist/vue-slick-carousel.css'
  // optional style for arrows & dots
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
  import {mapActions} from "vuex/dist/vuex.mjs";

  import ProductCardComponent from '../ProductCardComponent'
  import Notification from '../Notification'
  export default {
    name: "NewArrivalComponent",
    components: { VueSlickCarousel, ProductCardComponent, Notification },
    props: {
      products: {
        required: true,
      },
      url: {
        required: true,
        type: String,
      },
    },
    data() {
      return {
        newProductsSliderSettings: {
          arrows: false,
          slidesToShow: 4,
          infinite: false,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                initialSlide: 2,
                swipeToSlide: true
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                swipeToSlide: true
              }
            }
          ]
        },
        isDisabled: false,
        loading: true,
        messages: [],
      }
    },
    computed: {
      imageUrl() {
        return `/storage/images/products/`
      },
    },
    methods: {
      ...mapActions([
        'ADD_TO_CART'
      ]),
      prevSlide() {
        this.$refs.slider.prev()
      },

      nextSlide() {
        this.$refs.slider.next()
      },
      addToCart(data) {
        this.ADD_TO_CART(data);
        let timeStamp = Date.now().toLocaleString();
        this.messages.unshift(
          {name: 'Товар добавлен в корзину!', id: timeStamp}
        )
      },
    }
  }
</script>

<style lang="scss" scoped>
    .new-arrival {
        margin-bottom: 3rem;
        width: 100%;
        text-align: center;

        &__head {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        &__title {
            font-size: 3.2rem;
            font-weight: bold;
            margin-bottom: 3rem;
        }


        .btn-prev, .btn-next {
            font-size: 0;
            line-height: 0;

            width: 30px;
            height: 40px;
            padding: 0;
        }

        .btn-prev + .btn-next {
            margin-left: 30px;
        }

        .disabled {
            opacity: .5;
            pointer-events: none;
        }
    }
</style>
