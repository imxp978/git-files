<template>
  <section id="content">
    <div class="container">
      <div
        id="carouselExampleCaptions"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
          <button
            v-for="(item, index) in carouselList"
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
            v-for="(item, index) in carouselList"
            :key="index"
            :class="{ active: index === 0 }"
          >
            <img :src="item.image" class="d-block w-100" alt="..." />
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

      <div class="container px-5 text-center" py-5>
        <h3 class="my-5 movable slideIn">Category</h3>
        <div class="row gx-5 gy-5 my-5">
          <div
            class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5 movable slideIn"
            v-for="item in categoryList"
            :key="item.id"
          >
            <div class="card-image">
              <div class="card-modal" style="z-index: 1">
                <p>{{ item.title }}</p>
              </div>
              <a href="#"
                ><img :src="item.image" class="card-img-top" alt="..."
              /></a>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ item.title }}</h5>
              <p class="card-text">{{ item.content }}</p>
            </div>
          </div>
        </div>
      </div>
      <hr />
    </div>
  </section>
</template>

<script setup>
import { ref } from "vue";

const carouselList = ref([
  {
    id: 1,
    title: "image 1",
    content: "content1",
    image: "/images/carousel00.webp",
  },
  {
    id: 2,
    title: "image 2",
    content: "content2",
    image: "/images/carousel01.webp",
  },
  {
    id: 3,
    title: "image 3",
    content: "content3",
    image: "/images/carousel02.webp",
  },
  {
    id: 4,
    title: "image 4",
    content: "content4",
    image: "/images/carousel01.webp",
  },
  {
    id: 3,
    title: "image 3",
    content: "content3",
    image: "/images/carousel02.webp",
  },
  {
    id: 3,
    title: "image 3",
    content: "content3",
    image: "/images/carousel02.webp",
  },
  {
    id: 3,
    title: "image 3",
    content: "content3",
    image: "/images/carousel02.webp",
  },
]);

const categoryList = ref([
  {
    id: 1,
    title: "Plate",
    content: "content 1 is very tasty, definitely yum!",
    image: "/images/product_images/001.webp",
  },
  {
    id: 2,
    title: "Bowl",
    content: "content 2 is very tasty, definitely yum!",
    image: "/images/product_images/002.jpg",
  },
  {
    id: 3,
    title: "Tableware",
    content: "content 3 is very tasty, definitely yum!",
    image: "/images/product_images/003.jpg",
  },
  {
    id: 4,
    title: "Cooker",
    content: "content 4 is very tasty, definitely yum!",
    image: "/images/product_images/001.webp",
  },
  {
    id: 5,
    title: "Pot",
    content: "content 5 is very tasty, definitely yum!",
    image: "/images/product_images/004.jpg",
  },
  {
    id: 6,
    title: "Appliance",
    content: "content 6 is very tasty, definitely yum!",
    image: "/images/product_images/002.jpg",
  },
  {
    id: 7,
    title: "Good Stuff",
    content: "content 7 is very tasty, definitely yum!",
    image: "/images/product_images/003.jpg",
  },
  {
    id: 8,
    title: "good one 111",
    content: "content 8 is very tasty, definitely yum!",
    image: "/images/product_images/001.webp",
  },
  {
    id: 9,
    title: "good one too",
    content: "content 9 is very tasty, definitely yum!",
    image: "/images/product_images/002.jpg",
  },
  {
    id: 5,
    title: "Pot",
    content: "content 5 is very tasty, definitely yum!",
    image: "/images/product_images/004.jpg",
  },
  {
    id: 5,
    title: "Pot",
    content: "content 5 is very tasty, definitely yum!",
    image: "/images/product_images/004.jpg",
  },
  {
    id: 5,
    title: "Pot",
    content: "content 5 is very tasty, definitely yum!",
    image: "/images/product_images/004.jpg",
  },
]);
</script>

<style>

</style>
