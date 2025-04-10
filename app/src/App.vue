<script setup>
import TopMenuComponent from "@components/TopMenuComponent.vue";
import FooterMenuComponent from "@components/FooterMenuComponent.vue";
</script>

<template>
  <div class="app">
    <top-menu-component class="app__top-menu"/>
    <div class="app__content">
      <router-view></router-view>
    </div>
    <footer-menu-component class="app__footer-menu"/>
  </div>
</template>

<style lang="scss" scoped>
//.app {
//  &__top-menu {
//    background-color: green;
//  }
//  &__content {
//
//    background-color: red;
//  }
//  &__footer-menu {
//    background-color: black;
//  }
//}
</style>