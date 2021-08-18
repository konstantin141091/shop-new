<template>
    <div class="feedback__submit">
        <div class="button feedback__btn" @click="sendFeedback">Отправить</div>
    </div>
</template>

<script>
  export default {
    name: "FeedbackComponent",
    data() {
      return {
        validate: true,
      }
    },
    props: {
      url: {
        required: true,
        type: String,
      }
    },
    methods: {
      sendFeedback() {
        // name
        const name = document.getElementById('feedback-name-input').value;
        if(!name) {
          document.getElementById('feedback-name-msg').innerText = "Поле имя обязательно для заполнения";
          document.getElementById('feedback-name').classList.remove('d-n');
          this.validate = false;
        } else {
          if (this.validateName(name)) {
            document.getElementById('feedback-name-msg').innerText = "";
            document.getElementById('feedback-name').classList.add('d-n');
            this.validate = true;
          } else {
            document.getElementById('feedback-name-msg').innerText = "Максимальное значение 255 символов";
            document.getElementById('feedback-name').classList.remove('d-n');
            this.validate = false;
          }
        }

        // email
        const email = document.getElementById('feedback-email-input').value;
        if(!email) {
          document.getElementById('feedback-email-msg').innerText = "Поле email обязательно для заполнения";
          document.getElementById('feedback-email').classList.remove('d-n');
          this.validate = false;
        } else {
          if (this.validateEmail(email)) {
            document.getElementById('feedback-email-msg').innerText = "";
            document.getElementById('feedback-email').classList.add('d-n');
            this.validate = true;
          } else {
            document.getElementById('feedback-email-msg').innerText = "Поле email некорректно";
            document.getElementById('feedback-email').classList.remove('d-n');
            this.validate = false;
          }
        }

        // text
        const text = document.getElementById('feedback-text-input').value;
        if(!text) {
          document.getElementById('feedback-text-msg').innerText = "Поле текст обязательно для заполнения";
          document.getElementById('feedback-text').classList.remove('d-n');
          this.validate = false;
        } else {
          if (this.validateText(text)) {
            document.getElementById('feedback-text-msg').innerText = "";
            document.getElementById('feedback-text').classList.add('d-n');
            this.validate = true;
          } else {
            document.getElementById('feedback-text-msg').innerText = "Максимальное значение 1000 символов";
            document.getElementById('feedback-text').classList.remove('d-n');
            this.validate = false;
          }
        }

        // agree
        const agree = document.getElementById('agree_rules').checked;
        if (!agree) {
          document.getElementById('feedback-agree').classList.add('agree-error');
          this.validate = false;
        }else {
          document.getElementById('feedback-agree').classList.remove('agree-error');
          this.validate = true;
        }

        // если валидация на фронте прошла, то отправляем запрос на бек
        if (this.validate) {
          (
            async () => {
              const csrf = document.getElementById('csrf')[0].value;
              const formData = new FormData();
              formData.append('_token', csrf);
              formData.append('name', name);
              formData.append('email', email);
              formData.append('text', text);
              const response = await fetch(this.url, {
                method: 'post',
                body: formData
              });
              const answer = await response.json();
              if (answer.status == 'success') {
                document.getElementById('feedback-success').classList.remove('d-n');
              }
            }
          )();
        }
      },

      validateEmail(email) {
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if(reg.test(email) == false) {
          return false;
        } else return true;
      },
      validateName(name) {
        if(name.length < 256) {
          return true;
        } else return false;
      },
      validateText(text) {
        if(text.length < 1001) {
          return true;
        } else return false;
      },
    }
  }
</script>

<style scoped>
    .feedback__btn {
        cursor: pointer;
    }
</style>
