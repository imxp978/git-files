import {defineStore} from "pinia";
import data from '@/data.json'

export const useCarouselStore = defineStore("CarouselStore", {
    state: () => {
        return {carousels: data.carousel}
    }
})