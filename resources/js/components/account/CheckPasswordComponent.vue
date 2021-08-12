<template>
    <div class="login__checkPassword">
        <input type="checkbox" id="checkPassword" name="check_password" v-model="check_password" @click="checkPassword">
        <label for="checkPassword">Сменить пароль</label>
    </div>
</template>

<script>
  export default {
    name: "CheckPasswordComponent",
    data() {
      return {
        check_password: false,
      }
    },
    methods: {
      checkPassword() {
        if (!this.check_password) {
          document.getElementById('check_password_block').classList.remove('d-n');
        } else {
          document.getElementById('check_password_block').classList.add('d-n');
        }
      }
    },
    mounted() {
      const value = document.getElementById('check_password_block').classList.contains('d-n');
      if (!value) {
        this.check_password = true;
      }
    }
  }
</script>

<style scoped>

</style>
