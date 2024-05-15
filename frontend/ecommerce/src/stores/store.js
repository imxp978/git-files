import { defineStore } from "pinia";
// import { ref, computed } from 'vue';
import data from "@/data.json";

// option store
export const useStore = defineStore("store", {
  state: () => {
    return {
      categories: data.category,
      products: data.product,
      carousels: data.carousel,
      reviews: data.review,
      cart: [],
    };
  },
  getters: {
    getProductById: (state) => (productId) => {
      console.log(state.cart.length)
      return state.products.find((item) => item.id === productId);
    },

    // getItemNumber: (state) => {
    //   console.log(state.cart)
    //   if (state.cart.length > 0) {
    //   return state.cart.reduce((accumulator, item) => {
    //     console.log('itemnumber is: '+accumulator + item.quantity)
    //     return accumulator + item.quantity
    //     })
    //   } else {
    //     return 0
    //   }  
    // }
  },
});

// setup store
// export const useStore = defineStore('store', ()=>{
//   const categories = ref(data.category)
//   const products = ref(data.product)
//   const carousels = ref(data.carousel)
//   const reviews = ref(data.review)
//   const cart = ref([])

//   const getProductById = computed((itemID) => {
//     products.value.find((product) => product.id === itemID)
//   })

//   return {categories, products, carousels, reviews, cart, getProductById, }
// })