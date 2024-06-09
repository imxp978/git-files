import { defineStore } from "pinia";
import data from "@/data.json";

export const useCategoryStore = defineStore("categories", {
  state: () => {
    return { categories: data.category };
  },

  getters:{
    getCategoryById: (state) => (id) => {
      return state.categories.find((item) => item.id === id);
    },
  },
});
