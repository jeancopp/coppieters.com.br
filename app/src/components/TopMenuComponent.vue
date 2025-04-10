<script setup>

</script>

<template>
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div :class="{
      'container': true,
      'hidden': true
    }">
      <router-link class="navbar-brand" :to="{name: 'HomePage'}">Jean Coppieters</router-link>
      <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarResponsive"
              aria-controls="navbarResponsive"
              aria-expanded="false"
              aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <router-link :to="{name: 'CareerPage'}"  class="nav-link py-3 px-0 px-lg-3 rounded">
              Portfolio
            </router-link></li>
          <li class="nav-item mx-0 mx-lg-1">
            <router-link :to="{name: 'AboutPage'}" class="nav-link py-3 px-0 px-lg-3 rounded">
              About
            </router-link></li>
          <li class="nav-item mx-0 mx-lg-1">
            <router-link :to="{name: 'ContactPage'}" class="nav-link py-3 px-0 px-lg-3 rounded">
              Contact
            </router-link></li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style scoped>

</style>