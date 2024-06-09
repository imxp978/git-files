import { defineStore } from "pinia";
import data from "@/data.json";

export const useProductStore = defineStore("products", {
  state: () => {
    return { products: data.product };
  },

  getters: {
    getProductById: (state) => (id) => {
      return state.products.find((item) => item.id === id);
    },
  },

  actions: {
    increase(id) {
      const product = this.getProductById(id);
      product.quantity++;
    },
    decrease(id) {
      const product = this.getProductById(id);
      product.quantity--;
    },
  },
});
