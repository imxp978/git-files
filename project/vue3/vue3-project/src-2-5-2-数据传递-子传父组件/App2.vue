<script setup>
import School from "./components/School.vue";
export default {
  components:{
    School
  },
  data(){
    return{
      myAddress:''
    }
  },
  methods:{
    getAddress(address){
      this.myAddress = address;
    }
  }
}
// import {ref} from 'vue';
// const myAddress = ref('')
// const getAddress = (address) => {
//   myAddress.value = address;
// }
</script>

<template>
  <div>
    <h2>父组件-App</h2>
    <h2>学校地址:{{myAddress}}</h2>
    <School  @funGetAddress="getAddress"></School>
  </div>
</template>

<style scoped>

</style>

