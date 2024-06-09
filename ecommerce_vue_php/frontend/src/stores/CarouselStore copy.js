import { defineStore } from "pinia";
import data from "@/data.json";
import axios from "axios";

export const useCarouselStore = defineStore("CarouselStore", {

  state: () => ({
    carousels: [],
  }),

  actions: {
    async loadCarousels() {
      try {
        const response = await axios.get('/data.json');
        this.casousels = response.data.carousel;
      } catch (error) {
        console.error('Failed to load carousels:', error);
      }
    }
  }

  // state: () => {
  //   return { carousels: data.carousel };
  // },
});
