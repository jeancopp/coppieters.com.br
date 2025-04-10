<script setup>
import avatar from "@assets/avatar.jpg";
</script>

<template>
  <section class="masthead">
    <img class="masthead__avatar" :src="avatar" alt="Le Saint Jean"/>
    <div class="masthead__content">
      <h1 class="masthead__heading">Jean Coppieters Souza</h1>
      <p class="masthead__subheading">Software development</p>
    </div>

  </section>
</template>

<style lang="scss" scoped>
.masthead {
  background-color: rgb(26, 188, 156);
  color: white;
  display: flex;
  flex-direction: row-reverse;
  justify-content: center;
  gap: 40px;

  &__content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 15px;
  }

  &__avatar {
    height: 25rem;
    border-radius: 15%;
  }
}

</style>