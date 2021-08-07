<template>
    <button class="form__btn" @click="makeOrder">Подтвердить заказ</button>
</template>

<script>
  import {mapGetters} from "vuex/dist/vuex.mjs";

  export default {
    name: "OrderButtonComponent",
    data() {
      return {
        order: {
          name: null,
          email: null,
          address: null,
          delivery: 'самовывоз',
          comment: null,
          phone: null,
        },

      }
    },
    computed: {
      ...mapGetters([
        'CART', 'CART_TOTAL_PRICE'
      ])
    },
    methods: {
      makeOrder() {
        this.
        const formData = new FormData(document.forms.order);
        formData.append("cart", this.CART);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/order/store");
        xhr.send(formData);
        console.log('end');



        // const csrf = document.getElementById('csrf')[0].value;
        // if (document.getElementById('name').value) {
        //   this.order.name = document.getElementById('name').value;
        // }
        // if (document.getElementById('phone').value) {
        //   this.order.phone = document.getElementById('phone').value;
        // }
        // if (document.getElementById('address').value) {
        //   this.order.address = document.getElementById('address').value;
        // }
        // if (document.getElementById('comment').value) {
        //   this.order.comment = document.getElementById('comment').value;
        // }
        // if (document.getElementById('email').value) {
        //   this.order.email = document.getElementById('email').value;
        // }
        // this.order.delivery = document.querySelector('input[name="delivery"]:checked').value;

        // fetch('/order/store', {
        //   method: 'post',
        //   headers: {
        //     'Accept': 'application/json, text/plain, */*',
        //     'Content-Type': 'application/json'
        //   },
        //   body: JSON.stringify({
        //     _token: csrf,
        //     order: this.order,
        //     cart: this.CART,
        //   })
        // });
      }
    }
  }
</script>

<style scoped>

</style>
