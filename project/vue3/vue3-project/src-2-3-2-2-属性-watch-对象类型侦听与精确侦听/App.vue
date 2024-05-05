<script setup>

import{ref, computed, watch} from "vue";

let data = ref({
  happy: true,
  name: 'jack',

});

const mood = computed(()=>{
  return data.value.happy ?"高興":"難過";
});

const changeMood = ()=> {
  data.value.happy = !data.value.happy;
};

const changeName = ()=> {
  data.value.name = data.value.happy ?'jack':'Tom';
};

// watch(data,(value) => {
//   console.log(`happy改變 新值為${value.happy}`)
//   console.log(`name改變 新值為${value.name}`)
// }, {deep: true,immediate: true});


watch(()=> data.value.name, (newValue)=> {
  console.log(`happy改變 新值為${newValue}`)
});
//***監聽object內的屬性 watch的參數會從"obj名"變成箭頭涵式 */

</script>

<template>
  <div>
    <h2>我是{{data.name}},今天我很{{ mood }}</h2>
    <button @click="changeMood">改变心情</button>
    <br>
    <button @click="changeName">改變姓名</button>
  </div>
</template>

<style scoped>

</style>
