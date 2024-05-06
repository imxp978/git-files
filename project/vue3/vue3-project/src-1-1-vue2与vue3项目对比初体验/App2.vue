<!--回顾Vue2相关代码-->
<template>
  <div>
    <button @click="addCount">{{count}}</button>
  </div>
</template>

<script>
export default {
  data(){
    return {
      count:0
    }
  },
  methods:{
    addCount(){
      this.count++
    }
  }
}
</script>

<style scoped>

</style>