<template>
  <section id="content">
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
  </section>
</template>

<script setup>
import { ref } from "vue";

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

<style></style>
