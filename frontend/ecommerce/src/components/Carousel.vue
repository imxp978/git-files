<template>
    <section id="carousel">
    <div class="container">
  <div
        id="carouselExampleCaptions"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
          <button
            v-for="(item, index) in carousels"
            :key="index"
            type="button"
            data-bs-target="#carouselExampleCaptions"
            :data-bs-slide-to="index"
            :class="{ active: index === 0 }"
            :aria-current="{ true: index === 0 }"
            :aria-label="'Slide ' + index"
          ></button>
        </div>
        <div class="carousel-inner">
          <div
            class="carousel-item"
            v-for="(item, index) in carousels"
            :key="index"
            :class="{ active: index === 0 }"
          >
            <img :src="`images/carousel_images/${item.image}`" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>{{ item.title }}</h5>
              <p>{{ item.content }}</p>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        <hr />
      </div>
    </div>
      </section>
</template>

<script setup>
import { ref } from "vue";
import { useStore} from "@/stores/store.js"

const store = useStore();
const carousels = store.carousels;
 
// const carouselList = ref([
//   {
//     id: 1,
//     title: "image 1",
//     content: "content1",
//     image: "carousel00.jpg",
//   },
//   {
//     id: 2,
//     title: "image 2",
//     content: "content2",
//     image: "carousel01.webp",
//   },
//   {
//     id: 3,
//     title: "image 3",
//     content: "content3",
//     image: "carousel02.jpg",
//   },
//   {
//     id: 4,
//     title: "image 4",
//     content: "content4",
//     image: "carousel03.webp",
//   },
//   {
//     id: 5,
//     title: "image 5",
//     content: "content5",
//     image: "carousel04.webp",
//   },
// ]);
</script>

<style>

</style>
