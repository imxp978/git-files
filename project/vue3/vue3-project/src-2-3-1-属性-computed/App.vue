<!--回顾Vue2相关代码-->
<script>
export default {
  data() {
    return {
      totalPrice: 2000,
      amount: 10,
      discount: 8
    }
  },
  computed: {
    avgPrice() {
      return (this.totalPrice / this.amount) * (this.discount / 10);
    }
    /*avgPrice:{
      get(){
        console.log('调用计算属性avgPrice中Get函数')
        return (this.totalPrice/this.amount)*(this.discount/10);
      },
      set(value){
        console.log('调用计算属性avgPrice中Set函数')
      }
    }*/
  }
}
</script>

<template>
  <div>
    总价：<input type="text" v-model="totalPrice"> <br/>
    数量：<input type="text" v-model="amount"> <br/>
    折扣：<input type="text" v-model="discount">折<br/>
    折扣平均单价：<input type="text" v-model="avgPrice">元<br/>
  </div>
</template>

<style scoped>

</style>
