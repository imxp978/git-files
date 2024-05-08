<script setup>
import sourceData from '@/data.json'

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
  <section id="product">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <img
            :src="`../../public/images/product_images/${product.image}`"
            width="100%"
            alt=""
          />
        </div>
        <div class="col-12 col-lg-6">
          <div class="container d-flex flex-column">
            <h5>{{ product.title }}</h5>
            <p class="fs-4 text-end">$: {{ product.price }}</p>
            <p v-if="product.quantity > 0" class="text-end">In Stock</p>
            <p v-else class="text-end">Not Available</p>
            <p>
              {{ product.description }}
            </p>
            <div class="row d-flex justify-content-center m-3">
              <select
                v-if="product.quantity > 0"
                name="quantity"
                id="quantify"
                class="form-select m-3"
              >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <!-- <button class="col-1 btn btn-sm btn-outline-dark">-</button>
                <div class="col-3 text-center">QUANTITY</div>
                <button class="col-1 btn btn-sm btn-outline-dark">+</button> -->
            </div>
            <button v-if="product.quantity > 0" class="btn btn-dark m-3">
              ADD TO CART
            </button>
            <button v-else class="btn btn-danger m-3">
              NOTIFY ME WHEN AVAILABLE
            </button>
          </div>
          <hr />
        </div>
        <div class="col-12 col-lg-6">
          <div class="container">
            <h5>DESCRIPTION</h5>
            <p>
              As featured in GQ, The New York Times, and more. Everything you
              need in your culinary toolkit (and nothing you don’t). Seven
              pieces of kitchenware you’ll reach for every day, for every meal -
              all carefully designed to look beautiful, feel great and last a
              lifetime. A wooden base with a magnetic inner wall for proper
              knife storage keeps it all at your fingertips.
            </p>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="container">
            <h5>SPEC</h5>
            <p>
              As featured in GQ, The New York Times, and more. Everything you
              need in your culinary toolkit (and nothing you don’t). Seven
              pieces of kitchenware you’ll reach for every day, for every meal -
              all carefully designed to look beautiful, feel great and last a
              lifetime. A wooden base with a magnetic inner wall for proper
              knife storage keeps it all at your fingertips.
            </p>
          </div>
        </div>
      </div>
    </div>
    <hr />
  </section>
</template>

<style></style>
