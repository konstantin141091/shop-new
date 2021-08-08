<template>
<div style="display: none"></div>
</template>

<script>
  import {mapActions} from "vuex/dist/vuex.mjs";
  export default {
    name: "ClearCartComponent",
    methods: {
      ...mapActions([
        'CLEAR_ALL_CART'
      ]),
    },
    mounted() {
      this.CLEAR_ALL_CART();
    }
  }
</script>

<style scoped>

</style>
