<script setup>
import {inject} from "vue";
const studentName = inject('studentName');
</script>

<template>
  <div class="student-style">
    <h2>学生姓名：{{ studentName }}</h2>
  </div>
</template>

<style scoped>
.student-style {
  background-color: pink;
  margin: 20px;
}
</style>