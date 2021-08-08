<template>
  <div class="menu">
    <div
      class="menu__icon"
      :class="{'_active': openMenu}"
      @click="openMenu=!openMenu"
    >
      <span></span>
    </div>

    <nav
      class="menu__body container "
      :class="{'_active': openMenu}"
    >
      <slot></slot>
    </nav>
  </div>
</template>


<script>


export default {
  name: 'MenuToggle',
  data: () => ({
    isMobile: false,
    openMenu: false,
  }),

}
</script>
