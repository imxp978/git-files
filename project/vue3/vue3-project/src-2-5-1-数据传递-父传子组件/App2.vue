<script>
import School from './components/School.vue'
export default {
  components:{
    School
  },
  data(){
    return{
      age:20
    }
  }
}
</script>

<template>
  <div>
    <h2>父组件-App</h2>
    <School teacherName="王强" :salary="5000" :age="age"></School>
  </div>
</template>

<style scoped>
</style>

