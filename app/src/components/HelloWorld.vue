<script setup>
import {useCounterStore} from "@store/counter";

const store = useCounterStore();

defineProps({
  msg: String,
})

</script>

<template>
  <h1>{{ msg }}</h1>

  <div class="card">
    <button type="button" @click="store.increment()">count is {{ store.count }}</button>
  </div>

</template>

<style scoped>
.read-the-docs {
  color: #888;
}
</style>
