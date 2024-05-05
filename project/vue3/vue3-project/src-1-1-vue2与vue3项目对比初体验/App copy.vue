
<script setup>
import {ref} from "vue";


const count = ref(0);
const addCount = ()=> count.value++;


// export default {
//   data(){
//     return {
//       count:0
//     }
//   },
//   methods:{
//     addCount(){
//       this.count++
//     }
//   }
// }
</script>

<template>
  <div>
    <button @click="addCount">{{count}}</button>
  </div>
</template>

<style scoped>

</style>