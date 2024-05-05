<!--Vue3相关代码-->
<script setup>
// export default {
//   data(){
//     return{
//       num : 0
//     }
//   },
//   methods:{
//     addNum(){
//       this.num++
//     }
//   }
// }
//普通变量
import {reactive} from "vue";

let num = 0;
const addNum = ()=>{
  num++;
  console.log(num);
}

// 响应式对象
const state = reactive({
  count:0
})
const addCount = ()=>{
  state.count++
  console.log(state.count)
}
</script>

<template>
  <div>
    <button @click="addNum">{{num}}</button><br>
    <button @click="addCount">{{state.count}}</button><br>
  </div>
</template>

<style scoped>

</style>
