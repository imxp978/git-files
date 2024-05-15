import {defineStore} from "pinia"
import data from "@/data.json"

export const useReviewStore = defineStore("reviews", {
    state: () => {
        return {reviews: data.review}
    }
})