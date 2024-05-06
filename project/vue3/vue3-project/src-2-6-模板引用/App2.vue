<script>
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
    },
    sendLoadData(){
      this.$refs.school.loadData({id:1,name:'jack'});
    }
  },
  mounted() {
    //console.log(this.$refs.school);
    //this.$refs.school.$on('funGetAddress',this.getAddress)
    // this.$refs.school.$on('funGetAddress',(address)=>{
    //   this.myAddress = address;
    // })
  }
}
</script>

<template>
  <div>
    <h2>父组件-App</h2>
    <h2>学校地址:{{myAddress}}</h2>
    <button @click="sendLoadData">向子组件传递数据</button>
    <School ref="school"></School>
  </div>
</template>

