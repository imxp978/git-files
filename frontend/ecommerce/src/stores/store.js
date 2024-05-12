import { defineStore } from "pinia";
import data from "@/data.json";

export const useStore = defineStore("store", {
  state: () => {
    return {
      categories: data.category,
      products: data.product,
      cart: [],
    };
  },
  getters: {
    getProductById: (state) => (productId) => {
      return state.products.find((item) => item.id === productId);
    },
  },
});
