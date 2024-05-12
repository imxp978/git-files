<script setup>
import sourceData from '@/data.json'
import Product from '../components/Product.vue'
import {computed} from 'vue'
import {useRoute} from 'vue-router'

const route = useRoute()

const product = computed(() => {
    let productId = parseInt(route.params.id)
    return sourceData.product.find(product => product.id === productId)
})

// "Option API"
// export default {
//     computed: {
//         productId(){
//             return parseInt(this.$route.params.id)
//         },
//         product() {
//             return sourceData.product.find(product => product.id === this.productId)
//         }
//     }
// }
</script>

<template>
    <Product />

</template>

<style></style>
