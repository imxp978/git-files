<script setup>
// export default {
//   props:{
//     teacherName:String,
//     salary:Number,
//     age:Number
//   }
// }

const props = defineProps({
  teacherName: String,
  salary: Number,
  age: Number
})
</script>

<template>
  <div class="school-style">
    <h3>子组件-School</h3>
    <h3>父组件App参数[teacherName]：{{teacherName}}</h3>
    <h3>父组件App参数[salary]：{{salary+1000}}</h3>
    <h3>父组件App参数[age]：{{age}}</h3>
  </div>
</template>

<style scoped>
.school-style {
  background-color: #5bc0de;
}
</style>