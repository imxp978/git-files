import { defineStore } from "pinia";
import data from "@/data.json";
export const useProductStore = defineStore("products", {
  state: () => {
    return { products: data.product };
  },
  getters: {
    getProductById: (state) => (productId) => {
      return state.products.find((item) => item.id === productId);
    },
  },
});
