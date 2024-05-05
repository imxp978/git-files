<script setup>

// import School from './components/School.vue'
// export default {
//   components:{
//     School
//   },
//   data(){
//     return{
//       age:20
//     }
//   }
// }

import School from './components/School.vue'
import {ref, watch} from "vue";

const age = ref(20);

setTimeout(()=>{
  age.value = 30;
}, 2000)


// setInterval (() => {
//   age.value += 5;
// }, 1000)

// watch(age, (newValue) => {
//   if (newValue === 50) {
//     console.log(newValue); 
//     age.value = 0;
//   }
// })

</script>

<template>
  <div>
    <h2>父组件-App</h2>
    <School teacherName="王强" :salary="5000" :age="age"></School>
  </div>
</template>

<style scoped>
</style>

