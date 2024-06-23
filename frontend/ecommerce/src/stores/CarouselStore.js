import { defineStore } from "pinia";
import data from "@/data.json";
import axios from "axios";

export const useCarouselStore = defineStore("CarouselStore", {
  // state: () => {
  //   return { carousels: data.carousel };
  // },

  state: () => ({
    carousels: [],
  }),

  actions: {
    async loadCarousels() {
      try {
        const response = await axios.get('./data.json');
        this.carousels = response.data.carousel;
      } catch(error) {
        console.error('Carousel loaded failed', error);
      }
    }
  }
});
