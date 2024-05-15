import { defineStore } from "pinia";
import data from "@/data.json";

export const useCategoryStore = defineStore("categories", {
  state: () => {
    return { categories: data.category };
  },
});
