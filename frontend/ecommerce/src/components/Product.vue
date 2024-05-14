<script setup>
// import sourceData from "@/data.json";
import { ref, onMounted } from "vue";
import { useStore } from "@/stores/store.js";
import { useRoute } from "vue-router";

const quantity = ref(1);
const route = useRoute();
const store = useStore();
const products = store.products;

const productId = ref(parseInt(route.params.id));

// let product = ref(store.getProductById(productId.value));

// mount時才賦值
let product = ref(null);
onMounted(()=>{
  product.value = store.getProductById(productId.value);
});

function increase() { product.value.quantity ++ };
function decrease() { product.value.quantity -- };

let cart = store.cart;
function addToCart() {
  console.log('store.cart: '+store.cart)
  console.log('product.value: '+product.value)
  if (product.value.quantity > 0) {
    let cartIndex = cart.findIndex((item)=>item.id === product.value.id)
    if (cartIndex === -1) {
      cart.push({id: product.value.id, title: product.value.title, price: product.value.price, image: product.value.image, quantity: quantity.value})
      console.log('store.cart: '+store.cart)
    } else {
      cart[cartIndex].quantity = parseInt(cart[cartIndex].quantity)
      cart[cartIndex].quantity += parseInt(quantity.value);
    } added()
    console.log('added')
  } 
}

let notice = ref(false)
function added() {
  setTimeout(showNotice, 500)
  setTimeout(showNotice, 1500)
}

function showNotice() {
  notice.value = !notice.value;
}

function notifyMe() {

}


// 從data.json取product
// const product = computed(() => {
//   return sourceData.product.find((product) => product.id === productId.value);
// });

</script>

<template>
  <!-- <Product /> -->
  <section id="product" v-if="product">
    <div class="container">
      <div class="row">
          <div class="d-flex justify-content-center">
            <Transition>
            <div class="notice col-12 position-fixed d-flex justify-content-center" v-if="notice">
                <p class="mx-auto my-auto">Added to cart <i class="fa-regular fa-circle-check"></i></p>
              </div>
            </Transition>
          </div>

        <div class="col-12 col-lg-6">
          <div class="product_image">
            <img :src="`../images/category_images/${product.image}`" alt="" />
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="container d-flex flex-column">
            <h4 class="my-5">{{ product.title }}</h4>
            <p class="fs-4 text-end">
              <i class="fa-solid fa-dollar-sign"></i> {{ product.price }}
            </p>
            <p v-if="product.quantity > 0" class="text-end">In Stock</p>
            <p v-else class="text-end" style="color: red">Out of Stock</p>
            <p>
              {{ product.description }}
            </p>
            <div class="d-flex justify-content-end">
              <div class="testing only col-3 d-flex justify-content-between align-items-baseline border">
                <button class="btn btn-sm btn-light" @click ="decrease">-</button>
                <p>{{ product.quantity }}</p>
                <button class="btn btn-sm btn-light" @click ="increase">+</button>
              </div>
            </div>
            <div class="row d-flex justify-content-center m-3">
              <select
                v-if="product.quantity > 0"
                v-model="quantity" 
                name="quantity"
                id="quantify"
                class="form-select m-3"
              >
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            <button
              v-if="product.quantity > 0"
              @click="addToCart"
              class="btn btn-dark m-3"
            >
              ADD TO CART <i class="fa-solid fa-cart-shopping"></i>
            </button>
            <button v-else 
              @click="notifyMe" 
              class="btn btn-danger m-3">
              NOTIFY ME <i class="fa-solid fa-bell"></i>
            </button>
          </div>
          <hr />
        </div>
        <div class="col-12 col-lg-6">
          <div class="container">
            <h5>SPEC</h5>
            <p>
              {{ product.description }}
            </p>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="container">
            <h5>DESCRIPTION</h5>
            <p>
              {{ product.description }}
            </p>
          </div>
        </div>
      </div>
    </div>
    <hr />
  </section>
</template>

<style>
.notice {
  background: rgba(0, 0, 0, 0.33);
  border-radius: 5px;
  width: 10vw;
  min-width: 150px;
  height: 10vh;
  z-index: 1;
  top: 50%;
}

.notice p {
  color: white;
}
</style>
