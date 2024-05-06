<!--回顾Vue2相关代码-->
<script>
export default {
  data(){
    return{
      happy: true,
      name: "jack",
      numbers: {
        x: 1,
        y: 1
      }
    }
  },
  methods: {
    changeMood() {
      this.happy = !this.happy;
    }
  },
  computed: {
    mood() {
      return this.happy ? "高兴" : "难过";
    }
  },
  watch:{
    /*happy:{
      immediate:true,
      handler(newValue,oldValue){
        console.log('happy属性被修改了',newValue,oldValue)
      }
    }*/
    happy(value){
      console.log('happy属性被修改了',value)
    },
    numbers: {
      deep:true,
      handler(value) {
        console.log('numbers.x属性被修改了', value.x);
      }
    }
  }
}
</script>

<template>
  <div>
    <h2>我是{{name}},今天我很{{ mood }}</h2>
    <button @click="changeMood">改变心情</button>
    <br>
    <button @click="numbers.x++">x++</button>
  </div>
</template>

<style scoped>

</style>
