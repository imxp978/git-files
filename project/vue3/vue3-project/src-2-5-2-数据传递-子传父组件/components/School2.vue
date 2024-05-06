<script>
export default {
  methods:{
    sendAddress(){
      this.$emit('funGetAddress','浙江大学软件学院');
    }
  }
}
</script>

<template>
  <div class="school-style">
    <h3>子组件-School</h3>
    <button @click="sendAddress">使用$emit:向父组件发送学校地址</button><br>
  </div>
</template>

<style scoped>
.school-style {
  background-color: #5bc0de;
}
</style>