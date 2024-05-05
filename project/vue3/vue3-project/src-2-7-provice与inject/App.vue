<script setup>
import {provide} from "vue";
import School from "./components/School.vue";

provide('studentName','jack');
</script>

<template>
  <div>
    <h1>父组件-App</h1>
    <School></School>
  </div>
</template>

<style scoped>

</style>

