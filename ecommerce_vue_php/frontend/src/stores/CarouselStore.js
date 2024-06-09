import { defineStore } from "pinia";
import axios from 'axios';
import axiosInstance from '@/axiosConfig.js';

export const useCarouselStore = defineStore("CarouselStore", {
  state: () => ({
    carousels: [],
  }),

  actions: {
    async fetchCarousels() {
      console.log('fetchCarousels start');
      try {
        const response = await axiosInstance.get('/getcarousel.php');
        this.carousels = response.data;
        console.log('fetchCarousels success')
      } catch (error) {
        console.error('Failed to Fetch Carousel')
        console.log('fetchCarousels failed')
      }
      console.log('fetchCarousels end')
    },
  },
});
