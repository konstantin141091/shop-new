<template>

  <div class="footer-menu__item">
    <div class="footer-menu__title">
      <p><slot name="title"></slot></p>
      <button @click="showMenu=!showMenu">
        <span class="material-icons" :class="{'rotate': showMenu}">keyboard_arrow_down</span>
      </button>
    </div>
    <div class="menu-items" :class="{'_active': showMenu}">
      <slot></slot>
    </div>
  </div>

</template>

<script>


export default {
  name: 'SpoilerToggle',
  data: () => ({
    showMenu: false,
  }),

}
</script>

<style scoped>
.menu-items {
  display: none;
}
._active {
  display: block;
}

.material-icons.rotate {
  transform: rotate(180deg);
}

</style>
