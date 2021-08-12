<template>
    <div class="login__checkPassword">
        <input type="checkbox" id="checkAddress" name="check_address" v-model="check_address" @click="checkAddress">
        <label for="checkAddress">Указать адрес доставки</label>
    </div>
</template>

<script>
  export default {
    name: "CheckAddressComponent",
    data() {
      return {
        check_address: false,
      }
    },
    methods: {
      checkAddress() {
        if (!this.check_address) {
          document.getElementById('check_address_block').classList.remove('d-n');
        } else {
          document.getElementById('check_address_block').classList.add('d-n');
        }
      }
    },
    mounted() {
      const value = document.getElementById('check_address_block').classList.contains('d-n');
      if (!value) {
        this.check_address = true;
      }
    }
  }
</script>

<style scoped>

</style>
